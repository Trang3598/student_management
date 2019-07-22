<?php

namespace App\Http\Controllers;

use App\Http\Requests\MarkRequest;
use App\Models\ClassModel;
use App\Models\Mark;
use App\Models\Student;
use App\Models\Subject;
use Illuminate\Http\Request;

class MarkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $student = Student::all();
        return view('admin.marks.index',['students'=>$student]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $student = Student::all();
        $subject = Subject::all();
        return view('admin.marks.create',['students'=>$student,'subjects'=>$subject]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MarkRequest $request)
    {
        $mark = new Mark();

        $mark->create($request->all());

        return redirect(route('marks.index'))->with('success', 'CREATE-SUCCESS');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $mark = Mark::all();
        return view('admin.marks.show',['marks'=>$mark]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Mark $mark)
    {
        return view('admin.marks.edit',['mark'=>$mark]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(MarkRequest $request,Mark $mark)
    {
        $mark->update($request->all());
        return redirect(route('marks.index'))->with('success', 'EDIT-SUCCESS');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Mark $mark)
    {
        $mark->delete();
        return redirect(route('marks.index'))->with('delete','DELETE-SUCCESS');
    }
}
