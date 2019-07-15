<?php

namespace App\Http\Controllers;

use App\SubjectModel;
use Illuminate\Http\Request;

class SubjectController extends Controller
{
    //
    public function create()
    {
        return view('admin.Subject.create');
    }
    public function postFormSubject(Request $request)
    {
        $subject = new SubjectModel();
        $subject->name = $request->name;
        $subject->number = $request->number;
        $subject->save();
        return redirect('admin/subject/list')->with('message',"Add successfully");
    }
    public function list()
    {
        $subject = SubjectModel::all();
        return view('admin.Subject.list',['subject' =>$subject]);
    }
    public function edit($id)
    {
        $subject = SubjectModel::find($id);
        return view('admin.Subject.edit',['subject' => $subject]);
    }
    public function postEditFormSubject(Request $request, SubjectModel $subject)
    {
        $subject->name = $request->name;
        $subject->number = $request->number;
        $subject->save();
        return redirect('admin/subject/list')->with('message','Edit successfully');
    }
    public function delete($id)
    {
        $subject = SubjectModel::find($id);
        $subject->delete();
        return redirect('admin/subject/list')->with('message','Delete successfully');
    }
}
