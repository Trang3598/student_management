<?php

namespace App\Http\Controllers;

use App\Http\Requests\StudentRequest;
use App\Http\Requests\StudentSubjectRequest;
use App\StudentModel;
use App\StudentSubjectModel;
use App\SubjectModel;
use Illuminate\Http\Request;

class StudentSubjectController extends Controller
{
    //
    public function create()
    {
        $students = StudentModel::all();
        $subjects = SubjectModel::all();
        return view('admin.student_subject.create',compact('students','subjects'));
    }
    public function postFormResult(StudentSubjectRequest $request,StudentSubjectModel $studentSubject)
    {
        $studentSubject->create($request->all());
        return redirect(route('studentsubject.list'))->with('message',"Add successfully");
    }
    public function list()
    {
        $studentSubject= StudentSubjectModel::all();
        return view('admin.student_subject.list',['studentsubject' =>$studentSubject]);
    }
    public function edit($id)
    {
        $students = StudentModel::all();
        $subjects = SubjectModel::all();
        $studentsubject = StudentSubjectModel::find($id);
        $data = [];
        $data['studentsubject'] = $studentsubject;
        $data['students'] = $students;
        $data['subjects'] = $subjects;
         return view('admin.student_subject.edit',$data);
    }
    public function postEditFormResult(StudentSubjectRequest $request, StudentSubjectModel $studentsubject)
    {
       $studentsubject->update($request->all());
        return redirect(route('studentsubject.list'))->with('message','Edit successfully');
    }
    public function delete(StudentSubjectModel $studentSubject)
    {
       $studentSubject->delete();
        return redirect(route('studentsubject.list'))->with('message','Delete successfully');
    }
}
