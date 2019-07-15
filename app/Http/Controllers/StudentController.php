<?php

namespace App\Http\Controllers;

use App\ClassModel;
use App\StudentModel;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    //
    public function create()
    {
        $class = ClassModel::all();
        return view('admin.Student.create',['class' => $class]);
    }
    public function postFormStudent(Request $request){
        $student = new StudentModel();
        $student->class_code = $request->Student;
        $student->name = $request->name;
        $student->gender = $request->gender;
        $student->birthday = $request->birthday;
        if($request->hasFile('image')){
           $file = $request->image;
           $duoi = $file->getClientOriginalExtension();
           if($duoi != 'jpg' && $duoi != 'png && $duoi != jpeg'){
               return redirect('admin/student/create')->with('error',"Please choose file as a image");
           }
           $image =$file->getClientOriginalName();

//           while (file_exists('admin_asset/upload'.$image)){
//               $image = "_";
//           }
            $file->move('images',$image);
            $student->image = $image;

        }else{
            $student->image = "";
        }
        $student->address = $request->address;
        $student->save();
        return redirect('admin/student/list')->with('message',"Add successfully");
    }
    public function list()
    {
        $student = StudentModel::all();
        return view('admin.Student.list',['student' =>$student]);
    }
    public function edit($id)
    {
        $class = ClassModel::all();
        $student = StudentModel::find($id);
        return view('admin.Student.edit',['student' => $student],['class'=>$class]);
    }
    public function postEditFormStudent(Request $request, StudentModel $student)
    {
        $student->class_code = $request->name;
        $student->name = $request->name;
        $student->gender = $request->gender;
        $student->birthday = $request->birthday;

        $student->save();
        return redirect('admin/student/list')->with('message','Edit successfully');
    }

    public function delete($id)
    {
        $student = StudentModel::find($id);
        $student->delete();

        return redirect('admin/student/list')->with('message','Delete successfully');
    }

}
