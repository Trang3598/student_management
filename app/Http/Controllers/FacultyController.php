<?php

namespace App\Http\Controllers;

use App\ClassModel;
use App\FacultyModel;
use App\Http\Requests\FacultyRequest;
use App\Repositories\FacultyEloquentRepository;
use Illuminate\Http\Request;

class FacultyController extends Controller
{
    protected $facultyRepository;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct(FacultyEloquentRepository $facultyRepository)
    {
        $this->facultyRepository = $facultyRepository;
        parent::__construct();
    }
    public function index()
    {
        $faculties = $this->facultyRepository->getAll();
        return view('admin.Faculty.list',compact('faculties'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.Faculty.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(FacultyRequest $request)
    {
        //... Validation here

        $faculties = $this->facultyRepository->create($request->all());
        return redirect(route('faculty.index'))->with('message','Add sucssesfully');
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
        $classes = $this->facultyRepository->showClasses($id);
        return view('admin.class.list',compact('classes'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $faculty = $this->facultyRepository->find($id);
        return view('admin.Faculty.edit',compact('faculty'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(FacultyRequest $request, $id)
    {
            $this->facultyRepository->update($id,$request->all());
            return redirect(route('faculty.index'))->with('message','Edit successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
//        Fal::where('in_black_list', true)->get()->delete();
        $this->facultyRepository->delete($id);
        return redirect()->route('faculty.index')->with('message','Delete successfully');
    }
}
