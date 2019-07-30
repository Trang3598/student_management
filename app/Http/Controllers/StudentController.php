<?php

namespace App\Http\Controllers;

use App\Http\Requests\StudentRequest;
use App\Http\Requests\StudentRequestEdit;
use App\Models\Students;
use App\Repositories\Student\StudentRepository;
use App\Repositories\ClassRepository\ClassRepository;
use App\Repositories\Mark\MarkRepository;
use App\Repositories\Subject\SubjectRepository;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * @var StudentRepositoryInterface|\App\Repositories\Repository
     */
    protected $classRepository;
    protected $studentRepository;
    protected $markRepository;
    protected $subjectRepository;

    public function __construct(ClassRepository $classRepository, StudentRepository $studentRepository, MarkRepository $markRepository,SubjectRepository $subjectRepository)
    {
        $this->classRepository = $classRepository;
        $this->studentRepository = $studentRepository;
        $this->markRepository = $markRepository;
        $this->subjectRepository = $subjectRepository;
    }

    /**
     * Show all post
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $students = $this->studentRepository->searchStudent(request()->all());

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
    public function show($id)
    {
        $students = $this->studentRepository->getStudents($id);

        $marks = $this->markRepository->getMarks($id)->get();

        return view('admin.marks.show', compact('marks'), compact('students'));
    }

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

        $classes = $this->classRepository->getClasses();

        return view('admin.students.edit', compact('students', 'classes'));
    }

    /**
     * Update single post
     *
     * @param $request \Illuminate\Http\Request
     * @param $id int Post ID
     * @return \Illuminate\Http\Response
     */
    public function update($id, StudentRequestEdit $request)
    {
        $data = $request->all();

        if ($request->hasFile('image')) {
            $file = $request->image;
            $image = time() . $file->getClientOriginalName();
            $file->move('img', $image);
            $data['image'] = $image;
        }

        $this->studentRepository->update($id, $data);
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
    /**
     * Fillter post
     *
     */
    public function search(Request $request) {
        $students = $this->studentRepository->searchStudent($request->all());
        return view('admin.students.index',compact('students'));
    }
    public function more($id){

        $marks = $this->markRepository->getMarks($id)->get();

        $subjects =$this->subjectRepository->getSubject();

        return View('admin.marks.more')

            ->with(compact('marks'))

            ->with(compact('subjects'));
    }

}

