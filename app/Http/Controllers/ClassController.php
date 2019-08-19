<?php

namespace App\Http\Controllers;

use App\ClassModel;
use App\FacultyModel;
use App\Http\Requests\ClassRequest;
use App\Repositories\ClassEloquentRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class ClassController extends Controller
{
    protected $classRepository;
    public function __construct(ClassEloquentRepository $classRepository)
    {
        $this->classRepository = $classRepository;
        parent::__construct();
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
        return view('admin.class.list',compact('classes'));
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
        $fls = $faculties->pluck('name','id')->all();
        return view('admin.class.create', compact('faculties','fls'));
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
        $students = $this->classRepository->showStudents($id);
        return view('admin.student.list',compact('students'));
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
        $fls = $faculties->pluck('name','id')->all();
        return view('admin.class.edit', compact('faculties','class','fls'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ClassRequest $request, $id)
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
        if (Gate::allows('level')) {
            $this->classRepository->delete($id);
            return redirect(route('class.index'))->with('message', 'Delete successfully');
        }
        return redirect(route('class.index'))->with('error', 'You have no permission to perform this action !');
    }
}
