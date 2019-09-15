<?php

namespace App\Http\Controllers;

use App\ClassModel;
use App\Http\Requests\StudentRequest;
use App\Jobs\SendEmailJob;
use App\Repositories\StudentEloquentRepository;
use App\Repositories\UserEloquentRepository;
use App\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Response;
use Mockery\Exception;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class StudentController extends Controller
{
    protected $studentRepository;
    protected $userRepository;
    protected $MALE = 1;
    protected $FEMALE = 2;
    protected $OTHER = 3;

    public function __construct(StudentEloquentRepository $studentRepository, UserEloquentRepository $userEloquentRepository)
    {
        parent::__construct();
        $this->studentRepository = $studentRepository;
        $this->userRepository = $userEloquentRepository;
        $this->middleware('permission:student-list');
        $this->middleware('permission:student-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:student-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:student-delete', ['only' => ['destroy']]);
        $this->middleware('permission:student-account', ['only' => ['setAccount','updateAccount']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $items = $request->items ?? 10;
        $students = $this->studentRepository->searchStudent(request()->all())->paginate($items);
        foreach ($students as $student) {
            $student->class_code = $student->ClassM->name;
        }

        $number = $this->studentRepository->countListStudents();
        return view('admin.Student.list', compact('students', 'items','number'));

    }

    public function showImage($id)
    {
        $student = $this->studentRepository->find($id);
        return view('admin.student.popup_image', compact('student'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $classes = ClassModel::all();
        $cls = $classes->pluck('name', 'id')->all();
        return view('admin.Student.create', compact('classes', 'cls'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(StudentRequest $request)
    {
        //
        $data = $request->all();
        if ($request->hasFile('image')) {
            $file = $request->image;
            $image = time() . $file->getClientOriginalName();
            $file->move('images', $image);
            $data['image'] = $image;
        }
        DB::beginTransaction();
        try {
            $user = $this->userRepository->store($data);
            $data['user_id'] = $user->id;
            $students = $this->studentRepository->store($data);
            $user->assignRole($request->input('roles'));
            DB::commit();
        } catch (Exception $exception) {
            DB::rollBack();
            throw new Exception($exception->getMessage());
        }
        return redirect(route('student.index'))->with('message', "Add successfully");
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $studentsubjects = $this->studentRepository->showResults($id);
        return view('admin.student_subject.list', compact('studentsubjects', 'id'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $classes = ClassModel::all();
        $student = $this->studentRepository->find($id);
        return view('admin.student.popupForm', compact('classes', 'student'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(StudentRequest $request, $id)
    {
        $data = $request->all();
        if ($request->hasFile('image')) {
            $file = $request->image;
            $image = time() . $file->getClientOriginalName();
            $file->move('images', $image);
            $data['image'] = $image;
        }
        $students = $this->studentRepository->update($id, $data);
        $students->class_code = $students->ClassM->name;
        if ($students->gender == $this->MALE) {
            $students->gender = "Male";
        } elseif ($students->gender == $this->FEMALE) {
            $students->gender = "Female";
        } elseif ($students->gender == $this->OTHER) {
            $students->gender = "Other";
        }
        return Response::json($students);
    }

    /**
     * Remove the specified resource from storage.d
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        if (Gate::allows('level')) {
            $this->studentRepository->delete($id);
            return redirect(route('student.index'))->with('message', 'Delete successfully');
        }
        return redirect(route('student.index'))->with('error', 'You have no permission to perform this action !');
    }

    public function sendMail($id)
    {
        $user = User::findOrFail($id);
        dispatch(new SendEmailJob($user))->delay(Carbon::now()->addMinutes(0.5));
        return redirect()->back()->with('message', 'Send Mail Sucessfully');
    }

    public function sendMails()
    {
        $students = $this->studentRepository->findScoreOfStudent(request()->all());
        foreach ($students as $student) {
            dispatch(new SendEmailJob($student->user))->delay(Carbon::now()->addMinutes(0.5));
        }
        return view('admin.Student.list', compact('students'));
    }

    public function setAccount($id)
    {

        $user = $this->userRepository->find($id);
        $student = $this->studentRepository->findStudentThroughUser($user->id);
        $classes = ClassModel::all();
        $cls = $classes->pluck('name', 'id')->all();
        return view('admin.account.account_infor', compact('user', 'student', 'cls'));
    }

    public function updateAccount(StudentRequest $request, $id)
    {
        $data = $request->all();
        if ($request->hasFile('image')) {
            $file = $request->image;
            $image = time() . $file->getClientOriginalName();
            $file->move('images', $image);
            $data['image'] = $image;
        }
        DB::beginTransaction();
        try {
            $user = $this->userRepository->update($id, $data);
            $data['user_id'] = $user->id;
            $student_id = $this->studentRepository->findStudentThroughUser($user->id);
            if (empty($student_id[0]->id)) {
                $student = $this->studentRepository->store($data);
            } else {
                $student = $this->studentRepository->update($student_id[0]->id, $data);
            }
            DB::commit();
        } catch (Exception $exception) {
            DB::rollBack();
            throw new Exception($exception->getMessage());
        }
        return Response::json([
            'user' => $user,
            'student' => $student]);
    }
}
