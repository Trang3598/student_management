<?php

namespace App\Http\Controllers;

use App\ClassModel;
use App\FacultyModel;
use Illuminate\Http\Request;

class ClassController extends Controller
{
    //
    public function create()
    {
        $faculty = FacultyModel::all();
        return view('admin.Class.create',['faculty' => $faculty]);
    }
    public function postFormClass(Request $request){
        $class =  new ClassModel();
        $class->faculty_id = $request->Faculty;
        $class->name = $request->name;
        $class->save();
        return redirect('admin/class/list')->with('message',"Add successfully");
    }
    public function list()
    {
        $class= ClassModel::all();
        return view('admin.Class.list',['class' =>$class]);
    }
    public function edit($id)
    {
        $faculty = FacultyModel::all();
        $class = ClassModel::find($id);
        return view('admin.Class.edit',['class' => $class],['faculty' => $faculty]);
    }
    public function postEditFormClass(Request $request, ClassModel $class)
    {
        $class->faculty_id = $request->Faculty;
        $class->name = $request->name;
        $class->save();
        return redirect('admin//list')->with('message','Edit successfully');
    }
    public function delete($id)
    {
        $class = ClassModel::find($id);
        $class->delete();

        return redirect('admin/class/list')->with('message','Delete successfully');
    }
}
