<?php

namespace App\Http\Controllers;

use App\ClassModel;
use App\Http\Requests\StudentRequest;
use App\Jobs\SendEmailJob;
use App\Repositories\StudentEloquentRepository;
use App\Repositories\UserEloquentRepository;
use App\StudentModel;
use App\SubjectModel;
use App\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Response;
use Mockery\Exception;

class StudentController extends Controller
{
    protected $studentRepository;
    protected $userRepository;

    public function __construct(StudentEloquentRepository $studentRepository, UserEloquentRepository $userEloquentRepository)
    {
        parent::__construct();
        $this->studentRepository = $studentRepository;
        $this->userRepository = $userEloquentRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $students = $this->studentRepository->searchStudent(request()->all());
        $subjects = SubjectModel::all();
        return view('admin.Student.list', compact('students', 'classes'));

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
            $this->studentRepository->store($data);
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
//        $cls = $classes->pluck('name', 'id')->all();
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
        //
        $student = $this->studentRepository->getListById($id);
        $data = $request->all();
        if ($request->hasFile('image')) {
            $file = $request->image;
            $image = time() . $file->getClientOriginalName();
            $file->move('images', $image);
            $data['image'] = $image;
        }
        $students = $this->studentRepository->update($id, $data);
        $students->class_code = $students->ClassM->name;
        if ($students->gender == 1) {
            $students->gender = "Male";
        }elseif ($students->gender == 2){
            $students->gender = "Female";
        }else{
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
        $this->studentRepository->delete($id);
        return redirect()->route('student.index')->with('message', 'Delete successfully');
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

}
