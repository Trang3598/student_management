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
        return view('admin.student_subject.create',compact('students'),compact('subjects'));
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
    public function edit(StudentSubjectModel $studentSubject)
    {
        $students = StudentModel::all();
        $subjects = SubjectModel::all();
        return view('admin.student_subject.edit',['studentsubject' => $studentSubject],compact('students'),compact('subjects'));
    }
    public function delete(StudentSubjectModel $studentSubject)
    {
       $studentSubject->delete();
        return redirect(route('studentsubject.list'))->with('message','Delete successfully');
    }
}
