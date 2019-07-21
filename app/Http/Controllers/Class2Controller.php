<?php

namespace App\Http\Controllers;

use App\ClassModel;
use App\FacultyModel;
use App\Http\Requests\ClassRequest;
use App\Repositories\ClassEloquentRepository;
use Illuminate\Http\Request;

class Class2Controller extends Controller
{
    protected $classRepository;
    public function __construct(ClassEloquentRepository $classRepository)
    {
        $this->classRepository = $classRepository;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $classes = $this->classRepository->getAll();
        return view('admin.Class.list',compact('classes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $faculties = FacultyModel::all();
        return view('admin.Class.create', compact('faculties'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ClassRequest $request, ClassModel $classes)
    {
        //
        $classes = $this->classRepository->create($request->all());
        return redirect(route('class.index'))->with('message', "Add successfully");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $faculties = FacultyModel::all();
        $class = $this->classRepository->find($id);
        return view('admin.Class.edit', compact('faculties','class'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $this->classRepository->update($id,  $request->all());
        return redirect(route('class.index'))->with('message', 'Edit successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $this->classRepository->delete($id);
        return redirect()->route('class.index')->with('message','Delete successfully');
    }
}
