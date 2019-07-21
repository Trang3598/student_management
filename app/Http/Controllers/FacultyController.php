<?php

namespace App\Http\Controllers;

use App\FacultyModel;
use App\Http\Requests\FacultyRequest;
use App\StudentModel;
use Illuminate\Http\Request;

class FacultyController extends Controller
{
    //
    public function create()
    {
        return view('admin.Faculty.create');
    }
    public function postFormFaculty(FacultyRequest $request,FacultyModel $faculty){
       $faculty->create($request->all());
       return redirect('admin/faculty/list')->with('message',"Add successfully");
    }
    public function list()
    {
        $faculty= FacultyModel::all();
        return view('admin.Faculty.list',['faculty' =>$faculty]);
    }
    public function edit($id)
    {
      $faculty = FacultyModel::find($id);
        return view('admin.Faculty.edit',['faculty' => $faculty]);
    }
    public function postEditFormFaculty(FacultyRequest $request, FacultyModel $faculty)
    {
        $faculty->name = $request->name;
        $faculty->save();
        return redirect('admin/faculty/list')->with('message','Edit successfully');
    }
    public function delete($id)
    {
        $faculty = FacultyModel::find($id);
        $faculty->delete();

      return redirect('admin/faculty/list')->with('message','Delete successfully');
    }
}
