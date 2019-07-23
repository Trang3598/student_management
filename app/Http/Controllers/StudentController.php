<?php

namespace App\Http\Controllers;

use App\Http\Requests\StudentRequest;
use App\Models\Student;
use App\Repositories\Student\StudentRepository;
use App\Repositories\ClassRepository\ClassRepository;

class StudentController extends Controller
{
    /**
     * @var StudentRepositoryInterface|\App\Repositories\Repository
     */
    protected $classRepository;
    protected $studentRepository;

    public function __construct(ClassRepository $classRepository, StudentRepository $studentRepository)
    {
        $this->classRepository = $classRepository;
        $this->studentRepository = $studentRepository;
    }

    /**
     * Show all post
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $students = $this->studentRepository->getList();
        return view('admin.students.index', compact('students'));
    }

    /**
     * Create single post
     *
     */
    public function create()
    {
        $classes = $this->classRepository->getClasses();
        return view('admin.students.create', compact('classes'));
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

    public function store(StudentRequest $request)
    {

        $data = $request->all();
        if ($request->hasFile('image')) {
            $file = $request->image;
            $image = time() . $file->getClientOriginalName();
            $file->move('img', $image);
            $data['image'] = $image;
        }
        $this->studentRepository->store($data);
        return redirect(route('students.index'))->with(['success' => 'create success']);
    }

    public function edit($id)
    {
        $students = $this->studentRepository->getListById($id);

        $classes = $this->studentRepository->getClasses();

        return view('admin.students.edit', compact('students','classes'));
    }

    /**
     * Update single post
     *
     * @param $request \Illuminate\Http\Request
     * @param $id int Post ID
     * @return \Illuminate\Http\Response
     */
    public function update($id, StudentRequest $request)
    {
        $this->studentRepository->update($id, $request->all());
        return redirect(route('students.index'))->with(['success' => 'updated']);
    }

    /**
     * Delete single post
     *
     * @param $id int Post ID
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->studentRepository->destroy($id);
        return back()->with('success', 'Delete-success !');
    }
}

