<?php

namespace App\Http\Controllers;

use App\Http\Requests\StudentSubjectRequest;
use App\Repositories\StudentEloquentRepository;
use App\Repositories\StudentSubjectEloquentRepository;
use App\StudentModel;
use App\StudentSubjectModel;
use App\SubjectModel;
//use Illuminate\Auth\Access\Gate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class StudentSubjectController extends Controller
{
    protected $studentsubjectRepository;
    protected $studentRepository;

    public function __construct(StudentSubjectEloquentRepository $studentsubjectRepository, StudentEloquentRepository $studentRepository)
    {
        $this->studentsubjectRepository = $studentsubjectRepository;
        $this->studentRepository = $studentRepository;
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
        $studentsubjects = $this->studentsubjectRepository->getAll();
        return view('admin.student_subject.list', compact('studentsubjects'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $students = StudentModel::all();
        $subjects = SubjectModel::all();
        $sts = $students->pluck('name', 'id')->all();
        $sjs = $subjects->pluck('name', 'id')->all();
        return view('admin.student_subject.create', compact('students', 'subjects', 'sts', 'sjs'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(StudentSubjectRequest $request, StudentSubjectModel $studentsubject)
    {
        //
        $studentsubject = $this->studentsubjectRepository->create($request->all());
        return redirect(route('studentsubject.index'))->with('message', "Add successfully");
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $students = StudentModel::all();
        $subjects = SubjectModel::all();
        $studentsubject = $this->studentsubjectRepository->find($id);
        return view('admin.student_subject.edit', compact('students', 'subjects', 'studentsubject'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(StudentSubjectRequest $request, $id)
    {
        //
        $this->studentsubjectRepository->update($id, $request->all());
        return redirect(route('studentsubject.index'))->with('message', 'Edit successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        if (Gate::allows('level')) {
            $this->studentsubjectRepository->delete($id);
            return redirect(route('studentsubject.index'))->with('message', 'Delete successfully');
        }
        return redirect(route('studentsubject.index'))->with('error', 'You have no permission to perform this action !');
    }

    public function addMore($id)
    {
        $student = $this->studentRepository->getListById($id);
        $studentsubjectss = $student->studentSubjects()->get();
        $subjects = SubjectModel::all();
        $sjs = $subjects->pluck('name', 'id')->all();
        return view('admin.student_subject.createMore', compact('subjects', 'student', 'studentsubjectss', 'sjs'));
    }

    public function addMoreAction(StudentSubjectRequest $request)
    {

        $data = [];
        if (!empty($request->student_code)) {
            foreach ($request->subject_code as $item => $value) {
                array_push($data, [
                    'subject_code' => $request->subject_code[$item],
                    'score' => $request->score[$item]
                ]);
            }
        }
        $student = $this->studentRepository->getListById($request->student_code);
        $scores = [];
        foreach ($data as $key => $value) {
            $scores[$value['subject_code']] = ['score' => $value['score']];
        }
        $student->subjects()->sync($scores);
        $studentsubjects = $this->studentsubjectRepository->getListById($request->student_code);
        return view('admin.student_subject.list', compact('studentsubjects'));
    }

    public function destroyMore($id)
    {
        $this->studentsubjectRepository->delete($id);
        return redirect()->back();
    }

    public function registerSubject($id)
    {

        $student = $this->studentRepository->findStudentThroughUser($id);
        if (!empty($student[0])) {
            $subjects = $this->studentsubjectRepository->getListUnregisteredSubject($student[0]->id);
        }
        return view('admin.student_subject.register_subject', compact('subjects', 'id', 'student'));
    }

    public function insertRegisteredSubjects(StudentSubjectRequest $request, $id)
    {

        $data = [];
        $student = $this->studentRepository->findStudentThroughUser($id);
        if (isset($request->all()['subject_code'])) {
            foreach ($request->subject_code as $item => $value) {
                array_push($data, [
                    'student_code' => $request->student_code,
                    'subject_code' => $request->subject_code[$item],
                    'score' => $request->score[$item]
                ]);
                $this->studentsubjectRepository->store($data[$item]);
            }
        }
        return redirect(route('studentsubject.index'))->with('message', "Register subjects successfully");
    }
}
