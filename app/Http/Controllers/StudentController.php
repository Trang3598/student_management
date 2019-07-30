<?php

namespace App\Http\Controllers;

use App\ClassModel;
use App\Http\Requests\StudentRequest;
use App\Repositories\StudentEloquentRepository;
use App\Repositories\StudentSubjectEloquentRepository;
use App\StudentModel;
use App\SubjectModel;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StudentController extends Controller
{
    protected $studentRepository;
    protected $resultRepository;

    public function __construct(StudentEloquentRepository $studentRepository, StudentSubjectEloquentRepository $resultRepository)
    {
        $this->studentRepository = $studentRepository;
        $this->resultRepository = $resultRepository;
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
        return view('admin.Student.list', compact('students', 'subjects'));

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
        return view('admin.Student.create', compact('classes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(StudentRequest $request, StudentModel $student)
    {
        //
        $data = $request->all();
        if ($request->hasFile('image')) {
            $file = $request->image;
            $image = time() . $file->getClientOriginalName();
            $file->move('images', $image);
            $data['image'] = $image;
        }
        $this->studentRepository->store($data);
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
        return view('admin.student_subject.list', compact('studentsubjects'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $classes = ClassModel::all();
        $student = $this->studentRepository->find($id);
        return view('admin.Student.edit', compact('classes', 'student'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $data = $request->all();
        if ($request->hasFile('image')) {
            $file = $request->image;
            $image = time() . $file->getClientOriginalName();
            $file->move('images', $image);
            $data['image'] = $image;
        }
        $this->studentRepository->update($id, $data);
        return redirect(route('student.index'))->with('message', 'Edit successfully');

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
}
