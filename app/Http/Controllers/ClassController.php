<?php

namespace App\Http\Controllers;

use App\Http\Requests\ClassRequest;
use App\Models\ClassModel;
use App\Models\Faculty;
use Illuminate\Http\Request;


class ClassController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        {
            $class = new ClassModel();
            $classes = $class->getListClass();
            return view('admin.classes.index', compact('classes'));
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $faculty = Faculty::all();
        return view('admin.classes.create', ['faculties' => $faculty]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(ClassRequest $request)
    {
        $class = new ClassModel();

        $class->create($request->all());

        return redirect(route('classes.index'))->with('success', 'CREATE-SUCCESS');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        return view('admin.classes.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit(ClassModel $class)
    {
        return view('admin.classes.edit', ['cs' => $class]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param ClassModel $class
     * @return \Illuminate\Http\Response
     */
    public function update(ClassRequest $request, ClassModel $class)
    {
        $class->update($request->all());
        return redirect(route('classes.index'))->with('success', 'EDIT-SUCCESS');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(ClassModel $class)
    {
        $class->delete();
        return redirect(route('classes.index'))->with('delete', 'DELETE-SUCCESS');
    }
}
