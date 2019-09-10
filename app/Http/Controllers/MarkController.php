<?php

namespace App\Http\Controllers;

use App\Http\Requests\MarkRequest;
use App\Repositories\Mark\MarkRepository;
use App\Repositories\Student\StudentRepository;
use App\Repositories\Subject\SubjectRepository;
use http\Env\Request;

class MarkController extends Controller
{
    /**
     * @var MarkRepositoryInterface|\App\Repositories\Repository
     */
    protected $markRepository;
    protected $studentRepository;
    protected $subjectRepository;

    public function __construct(MarkRepository $markRepository, StudentRepository $studentRepository, SubjectRepository $subjectRepository)
    {
        $this->markRepository = $markRepository;
        $this->studentRepository = $studentRepository;
        $this->subjectRepository = $subjectRepository;
    }

    /**
     * Show all post
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $students = $this->studentRepository->getList();
        return view('admin.marks.index', compact('students'));
    }

    /**
     * Create single post
     *
     */
    public function create()
    {
        $students = $this->studentRepository->getList();

        $subjects = $this->subjectRepository->getList();

        return view('admin.marks.create', compact('students', 'subjects'));
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

    public function store(MarkRequest $request)
    {
        $this->markRepository->store($request->all());
        return redirect(route('marks.index'))->with(['success' => 'create success']);
    }

    public function edit($id)
    {
        $marks = $this->markRepository->getListById($id);

        return view('admin.marks.edit', compact('marks'));
    }

    /**
     * Update single post
     *
     * @param $request \Illuminate\Http\Request
     * @param $id int Post ID
     * @return \Illuminate\Http\Response
     */
    public function update($id, MarkRequest $request)
    {
        $this->markRepository->update($id, $request->all());

        return redirect(route('marks.index'))->with(['success' => 'updated']);
    }

    /**
     * Delete single post
     *
     * @param $id int Post ID
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->markRepository->destroy($id);

        return back()->with('success', 'Delete-success !');
    }
}
