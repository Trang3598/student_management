<?php

namespace App\Http\Controllers;

use App\Http\Requests\MarkAddMoreRequest;
use App\Http\Requests\StudentRequest;
use App\Http\Requests\StudentRequestEdit;
use App\Mail\FailStudents;
use App\Models\Student;
use App\Users;
use App\Repositories\Student\StudentRepository;
use App\Repositories\ClassRepository\ClassRepository;
use App\Repositories\Mark\MarkRepository;
use App\Repositories\Subject\SubjectRepository;
use App\Repositories\User\UserRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class StudentController extends Controller
{
    /**
     * @var StudentRepositoryInterface|\App\Repositories\Repository
     */
    protected $classRepository;
    protected $studentRepository;
    protected $markRepository;
    protected $subjectRepository;
    protected $userRepository;

    public function __construct(ClassRepository $classRepository, StudentRepository $studentRepository, MarkRepository $markRepository, SubjectRepository $subjectRepository,UserRepository $userRepository)
    {
        $this->classRepository = $classRepository;
        $this->studentRepository = $studentRepository;
        $this->markRepository = $markRepository;
        $this->subjectRepository = $subjectRepository;
        $this->userRepository = $userRepository;
    }

    /**
     * Show all post
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $students = $this->studentRepository->searchStudent(request()->all());

        return view('admin.students.index', compact('students'));
    }

    /**
     * Create single post
     *
     */
    public function create()
    {
        $classes = $this->classRepository->getClasses();
        return view('admin.students.create', compact('classes'));
    }

    /**
     * Show single post
     *
     * @param $id int Post ID
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $students = $this->studentRepository->getStudents($id);

        $marks = $this->markRepository->getMarks($id)->get();

        return view('admin.marks.show', compact('marks'), compact('students'));
    }

    /**
     * Create single post
     *
     * @param $request \Illuminate\Http\Request
     * @return \Illuminate\Http\Response
     */

    public function store(StudentRequest $request)
    {
        $data = $request->all();
        if ($request->hasFile('image')) {
            $file = $request->image;
            $image = time() . $file->getClientOriginalName();
            $file->move('img', $image);
            $data['image'] = $image;
        }
        DB::beginTransaction();
        try{
            $user = $this->userRepository->store($data);
            $data['user_id']= $user->id;
            $this->studentRepository->store($data);
            DB::commit();
        }catch (Exception $e) {
            DB::rollBack();
            throw new Exception($e->getMessage());
        }

        return redirect(route('students.index'))->with(['success' => 'create success']);
    }

    public function edit($id)
    {
        $students = $this->studentRepository->getListById($id);

        $classes = $this->classRepository->getClasses();

        return view('admin.students.edit', compact('students', 'classes'));
    }

    /**
     * Update single post
     *
     * @param $request \Illuminate\Http\Request
     * @param $id int Post ID
     * @return \Illuminate\Http\Response
     */
    public function update($id, StudentRequestEdit $request)
    {
        $data = $request->all();

        if ($request->hasFile('image')) {
            $file = $request->image;
            $image = time() . $file->getClientOriginalName();
            $file->move('img', $image);
            $data['image'] = $image;
        }

        $this->studentRepository->update($id, $data);
        return redirect(route('students.index'))->with(['success' => 'updated']);
    }

    /**
     * Delete single post
     *
     * @param $id int Post ID
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->studentRepository->destroy($id);
        return back()->with('success', 'Delete-success !');
    }

    public function more($id)
    {
        $student = $this->studentRepository->getListById($id);

        $marks = $this->markRepository->getMarks($id)->get();

        $subjects = $this->subjectRepository->getSubject();

        return View('admin.marks.more')
            ->with(compact('student'))
            ->with(compact('marks'))
            ->with(compact('subjects'));
    }

    public function add($id, MarkAddMoreRequest $request)
    {
        $student = $this->studentRepository->getListById($id);
        $data = $request->all();
        $result = [];
        foreach ($data['subject_code'] as $key => $value) {
            $result[$value] = ['score' => $data['score'][$key]];
        }
        $student->subjects()->sync($result);
        return redirect(route('students.index'))->with(['success' => 'create success']);
    }

    public function mail(){
        $students = $this->studentRepository->failStudents();
        return view('admin.students.email', compact('students'));
    }

    public function send($id)
    {
        $students = Student::findOrFail($id);
        $users = $this->userRepository->getUser($students['user_id'])->get();
        foreach ($users as $user){
            $email = $user['email'];
        }
        Mail::to($email)->send(new FailStudents($user));
        return redirect()->back()->with(['success' => 'send success']);
    }
    public function sendAll()
    {
        $students = $this->studentRepository->failStudents(request()->all());
        foreach ($students as $student) {
            Mail::to($student->users->email)->send(new FailStudents($student->user));
        }
        return redirect()->back()->with(['success' => 'send success']);
    }



}

