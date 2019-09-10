<?php

namespace App\Http\Controllers;

use App\Http\Requests\ClassRequest;
use App\Http\Requests\ClassRequestEdit;
use App\Repositories\Faculty\FacultyRepository;
use App\Repositories\ClassRepository\ClassRepository;

class ClassController extends Controller
{
    /**
     * @var ClassRepositoryInterface|\App\Repositories\Repository
     */
    protected $classRepository;
    protected $facultyRepository;

    public function __construct(ClassRepository $classRepository, FacultyRepository $facultyRepository)
    {
        $this->classRepository = $classRepository;
        $this->facultyRepository = $facultyRepository;
    }

    /**
     * Show all post
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $classes = $this->classRepository->getList();
        return view('admin.classes.index', compact('classes'));
    }

    /**
     * Create single post
     *
     */
    public function create()
    {
        $faculties = $this->facultyRepository->getFaculties();
        return view('admin.classes.create', compact('faculties'));
    }

    /**
     * Show single post
     *
     * @param $id int Post ID
     * @return \Illuminate\Http\Response
     */
    /*    public function show($id)
        {
            $faculties = $this->facultyRepository->find($id);

            return view('admin.faculties.show', compact('faculties'));
        }*/

    /**
     * Create single post
     *
     * @param $request \Illuminate\Http\Request
     * @return \Illuminate\Http\Response
     */

    public function store(ClassRequest $request)
    {
        $this->classRepository->store($request->all());
        return redirect(route('classes.index'))->with(['success' => 'create success']);
    }

    public function edit($id)
    {
        $classes = $this->classRepository->getListById($id);

        return view('admin.classes.edit', compact('classes'));
    }

    /**
     * Update single post
     *
     * @param $request \Illuminate\Http\Request
     * @param $id int Post ID
     * @return \Illuminate\Http\Response
     */
    public function update($id, ClassRequestEdit $request)
    {
        $classes = $this->classRepository->getListById($id);
        $name_edit = $classes->name;
        $name_update = $request->all()['name'];
        if ($name_edit == $name_update) {
            $this->classRepository->update($id, $request->all());

            return redirect(route('classes.index'))->with(['success' => 'Nothing update']);
        } else {
            $this->classRepository->update($id, $request->all());

            return redirect(route('classes.index'))->with(['success' => 'Update']);
        }
    }

    /**
     * Delete single post
     *
     * @param $id int Post ID
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->classRepository->destroy($id);
        return back()->with('success', 'Delete-success !');
    }
}
