<?php

namespace App\Http\Controllers;

use App\Http\Requests\EditRoleRequest;
use App\Http\Requests\MarkAddMoreRequest;
use App\Http\Requests\Profile1Request;
use App\Http\Requests\ProfileRequest;
use App\Http\Requests\StudentRequest;
use App\Http\Requests\StudentRequestEdit;
use App\Jobs\SendEmail;
use App\Mail\FailStudents;
use App\Models\ClassModel;
use App\Models\Role;
use App\Models\Student;
use App\Repositories\Permission\PermissionRepository;
use App\Repositories\Role\RoleRepository;
use App\Repositories\RoleHasPermission\RhpRepository;
use App\Repositories\Student\StudentRepository;
use App\Repositories\ClassRepository\ClassRepository;
use App\Repositories\Mark\MarkRepository;
use App\Repositories\Subject\SubjectRepository;
use App\Repositories\User\UserRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Lang;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Response;

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

    public function __construct(ClassRepository $classRepository, StudentRepository $studentRepository, MarkRepository $markRepository, SubjectRepository $subjectRepository, UserRepository $userRepository,RoleRepository $roleRepository,PermissionRepository $permissionRepository,RhpRepository $rhpRepository)
    {
        $this->classRepository = $classRepository;
        $this->studentRepository = $studentRepository;
        $this->markRepository = $markRepository;
        $this->subjectRepository = $subjectRepository;
        $this->userRepository = $userRepository;
        $this->roleRepository = $roleRepository;
        $this->permissionRepository = $permissionRepository;
        $this->rhpRepository = $rhpRepository;
        $this->middleware('permission:student-list',['only' => 'index']);
        $this->middleware('permission:student-create', ['only' => ['add','more']]);
        $this->middleware('permission:student-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:student-delete', ['only' => ['destroy']]);
    }

    /**
     * Show all post
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if (empty($request->page)){
            $data = request()->all();
        }
        else{
            $data = request()->data;
            $data['page'] = $request->page;
        }
        if (empty($request->pagination)){
            $pagination = 10;
        }else{
            $pagination = $request->pagination;
        }
        $students = $this->studentRepository->searchStudent($data)->paginate($pagination);
        $classes = ClassModel::all();
        return view('admin.students.index', compact('students', 'classes','pagination','data'));
    }


    /**
     * Create single post
     *
     */
    public function create()
    {
        if(Auth::user()){
            $classes = $this->classRepository->getClasses();
            $roles = $this->roleRepository->getRoles();
            return view('admin.students.create', compact('classes','roles'));
        }else{
            $classes = $this->classRepository->getClasses();
            $roles = $this->roleRepository->getRoles();
            return view('layouts.create', compact('classes','roles'));
        }
    }

    /**
     * Show single post
     *
     * @param $id int Post ID
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $student_id = Student::findBySlug($id)['id'];
        $students = $this->studentRepository->getStudents($student_id);
        $marks = $this->markRepository->getMarks($student_id)->get();
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
        try {
            $data['password'] = Hash::make($data['password']);
            $user = $this->userRepository->store($data);
            $data['user_id'] = $user->id;
            $this->studentRepository->store($data);
            $user->assignRole($request->input('role_id'));
            DB::commit();
        } catch (Exception $e) {
            DB::rollBack();
            throw new Exception($e->getMessage());
        }

        return redirect(route('students.index'))->with(['success' => __('messages.addSuccess')]);
    }

    public function edit($id)
    {
        $where = array('id' => $id);
        $student = Student::where($where)->first();
        return Response::json($student);
    }

    /**
     * Update single post
     *
     * @param $request \Illuminate\Http\Request
     * @param $id int Post ID
     * @return \Illuminate\Http\Response
     */
    public function update(StudentRequestEdit $request)
    {
        $student_id = $request->student_id;
        $data = $request->all();
        if ($request->hasFile('image')) {
            $file = $request->image;
            $image = time() . $file->getClientOriginalName();
            $file->move('img', $image);
            $data['image'] = $image;
        }
        $this->studentRepository->update($student_id, $data);
        $student = $this->studentRepository->getListById($student_id);
        if ($request->ajax()) {
            if (!empty($student->image)) {
                $student->image = asset('img/' . $student->image);
            }
            return Response::json($student);
        }
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
        return back()->with(['success' => __('messages.deleteSuccess')]);
    }

    public function more($slug)
    {
        $student = $this->studentRepository->getStudentBySlug($slug);
        $marks = $this->markRepository->getMarks($student->id)->get();
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
        return redirect()->back()->with(['success' => __('messages.addSuccess')]);
    }

    public function account($id)
    {
        $student = $this->studentRepository->getListById($id);

        $user = $this->userRepository->getListById($student['user_id']);

        return view('admin.users.index', compact('student', 'user'));
    }

    public function mail()
    {
        $students = $this->studentRepository->failStudents();
        return view('admin.students.email', compact('students'));
    }

    public function send($id)
    {
        $students = Student::findOrFail($id);
        $users = $this->userRepository->getUser($students['user_id'])->get();
        foreach ($users as $user) {
            $email = $user['email'];
        }
        Mail::to($email)->send(new FailStudents($user));
        return redirect()->back()->with(['success' => __('messages.sendSuccess')]);
    }

    public function sendAll()
    {
        $students = $this->studentRepository->failStudents(request()->all());
        foreach ($students as $student) {
            dispatch(new SendEmail($student->user));
        }
        return redirect()->back()->with(['success' => __('messages.sendAllSuccess')]);
    }

    public function profile()
    {
        $student = Auth::user()->students;
        $classes = ClassModel::all()->pluck('name', 'id');
        $marks = $this->markRepository->getMarks(Auth::user()->students->id)->get();
        $subject_code = [];
        foreach ($marks as $key => $mark) {
           array_push(
               $subject_code,[$marks[$key]->subject_code]
           );
        }
        $role_id = Auth::user()->role_id;
        $rolehaspermissions_id = $this->rhpRepository->getPermission($role_id)->get();
        $permissions_id =[];
        foreach($rolehaspermissions_id as $key => $rolehaspermission_id){
            array_push(
                $permissions_id,$rolehaspermission_id['permission_id']
            );
        };
        $subjects = $this->subjectRepository->getSubjectNotScore($subject_code);
        return view('admin.students.edit', compact('student', 'classes','marks','subjects'));
    }

    public function newUpdate($id, ProfileRequest $request)
    {
        $data = $request->all();
        if ($request->hasFile('image')) {
            $file = $request->image;
            $image = time() . $file->getClientOriginalName();
            $file->move('img', $image);
            $data['image'] = $image;
        }
        $this->studentRepository->update($id, $data);
        return redirect()->back()->with(['success' => 'updated']);
    }
    public function newUpdate1($id, Profile1Request $request)
    {
        $student = $this->studentRepository->getListById($id);
        $data = $request->all();
        if ($request->checkbox) {
            $data['subject_code'] = $data['checkbox'];
        }
        if (empty($data['subject_code'])){
            return redirect()->back()->with(['success' => __('messages.fRegisterSuccess')]);
        }else{
            $result = [];
            foreach ($data['subject_code'] as $key => $value) {
                $result[$value] = ['score' => $data['score'][$key]];
            }
            $student->subjects()->attach($result);
            return redirect()->back()->with(['success' => __('messages.registerSuccess')]);
        }
    }
    public function roles($id){
        $roles = Role::all();
        $user_id = $this->studentRepository->getListById($id)['user_id'];
        $student = $this->studentRepository->getListById($id);
        $role_id = $this->userRepository->getListById($user_id)['role_id'];
        return view('admin.students.role',compact('roles','role_id','student'));
    }
    public function updaterole($id, EditRoleRequest $request){
        $user_id = $this->studentRepository->getListById($id)['user_id'];
        $data = $request->all();
        $data['username'] = $this->userRepository->getListById($user_id)['username'];
        $data['password'] = $this->userRepository->getListById($user_id)['password'];
        $user = $this->userRepository->update($user_id,$data);
        DB::table('model_has_roles')->where('model_id', $user_id)->update(['role_id'=>$request->role_id]);
        return redirect()->back()->with(['success' => __('messages.editSuccess')]);
    }
}

