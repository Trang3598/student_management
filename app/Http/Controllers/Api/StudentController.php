<?php

namespace App\Http\Controllers\Api;

use App\Http\Resources\Student as StudentResource;
use App\Models\ClassModel;
use App\Models\Student;
use App\Repositories\ClassRepository\ClassRepository;
use App\Repositories\Mark\MarkRepository;
use App\Repositories\Student\StudentRepository;
use App\Repositories\Subject\SubjectRepository;
use App\Repositories\User\UserRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

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

    public function __construct(ClassRepository $classRepository, StudentRepository $studentRepository, MarkRepository $markRepository, SubjectRepository $subjectRepository, UserRepository $userRepository)
    {
        $this->classRepository = $classRepository;
        $this->studentRepository = $studentRepository;
        $this->markRepository = $markRepository;
        $this->subjectRepository = $subjectRepository;
        $this->userRepository = $userRepository;
    }
    /**
     * Display a listing of the resource.
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
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
