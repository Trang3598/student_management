<?php

namespace App\Http\Controllers;

use App\ClassModel;
use App\Http\Requests\StudentRequest;
use App\Repositories\StudentEloquentRepository;
use App\StudentModel;
use Illuminate\Http\Request;

class Student2Controller extends Controller
{
    protected $studentRepository;

    public function __construct(StudentEloquentRepository $studentRepository)
    {
        $this->studentRepository = $studentRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $students = $this->studentRepository->getAll();
        return view('admin.Student.list',compact('students'));

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
        return view('admin.Student.create',compact('classes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(StudentRequest $request,StudentModel $student)
    {
        //
        if($request->hasFile('image')){
            $file = $request->image;
            $duoi = $file->getClientOriginalExtension();
            if($duoi != 'jpg' && $duoi != 'png && $duoi != jpeg'){
                return redirect('admin/student/create')->with('error',"Please choose file as a image");
            }
            $image =$file->getClientOriginalName();
            $file->move('images',$image);
            $student->image = $image;

        }else{
            $student->image = "";
        }
        $students = $this->studentRepository->create($request->all());
        return redirect(route('student.index'))->with('message',"Add successfully");
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
        return view('admin.Student.edit',compact('classes','student'));
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
        $student = StudentModel::all();
        if($request->hasFile('image')){
            $file = $request->image;
            $image =$file->getClientOriginalName();
            $file->move('images',$image);
            $student->image = $image;
        }

        $student->image = $request->image;
        $this->studentRepository->update($id,$request->all());
        return redirect(route('student.index'))->with('message','Edit successfully');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $this->studentRepository->delete($id);
        return redirect()->route('student.index')->with('message','Delete successfully');
    }
}
