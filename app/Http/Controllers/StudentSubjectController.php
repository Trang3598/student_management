<?php

namespace App\Http\Controllers;

use App\StudentSubjectModel;
use Illuminate\Http\Request;

class StudentSubjectController extends Controller
{
    //
    public function create()
    {
        return view('admin.StudentSubject.create');
    }
    public function list()
    {
        $studentSubject= StudentSubjectModel::all();
        return view('admin.StudentSubject.list',['studentsubject' =>$studentSubject]);
    }
    public function edit()
    {
        return view('admin.StudentSubject.edit');
    }
    public function delete()
    {

    }
}
