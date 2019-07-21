<?php

namespace App\Http\Controllers;

use App\ClassModel;
use App\FacultyModel;
use App\Http\Requests\ClassRequest;
use Illuminate\Http\Request;

class ClassController extends Controller
{
    //
    public function create()
    {
        $faculties = FacultyModel::all();
        return view('admin.Class.create', compact('faculties'));
    }

    public function postFormClass(ClassRequest $request, ClassModel $class)
    {
        $class->create($request->all());
        return redirect(route('class.list'))->with('message', "Add successfully");
    }

    public function list()
    {
        $classes = ClassModel::all();
        return view('admin.Class.list',compact('classes'));
    }

    public function edit($id)
    {
        $faculties = FacultyModel::all();
        $class = ClassModel::find($id);
        return view('admin.Class.edit', compact('faculties','class'));
    }

    public function postEditFormClass(ClassRequest $request, ClassModel $class)
    {
        $class->faculty_id = $request->Faculty;
        $class->name = $request->name;
        $class->save();
        return redirect(route('class.list'))->with('message', 'Edit successfully');
    }

    public function delete($id)
    {
        $class = ClassModel::find($id);
        $class->delete();

        return redirect('admin/class/list')->with('message', 'Delete successfully');
    }
}
