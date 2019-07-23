<?php

namespace App\Http\Controllers;

use App\Http\Requests\SubjectRequest;
use Illuminate\Http\Request;
use App\Repositories\Subject\SubjectRepository;

class SubjectController extends Controller
{
    /**
     * @var SubjectRepositoryInterface|\App\Repositories\Repository
     */
    protected $subjectRepository;

    public function __construct(SubjectRepository $subjectRepository)
    {
        $this->subjectRepository = $subjectRepository;
    }

    /**
     * Show all post
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $subjects = $this->subjectRepository->getList();
        return view('admin.subjects.index', compact('subjects'));
    }

    /**
     * Create single post
     *
     */
    public function create()
    {
        return view('admin.subjects.create');
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

    public function store(SubjectRequest $request)
    {
        $this->subjectRepository->store($request->all());

        return redirect(route('subjects.index'))->with(['success' => 'create success']);
    }

    public function edit($id)
    {
        $subjects = $this->subjectRepository->getListById($id);

        return view('admin.subjects.edit', compact('subjects'));
    }

    /**
     * Update single post
     *
     * @param $request \Illuminate\Http\Request
     * @param $id int Post ID
     * @return \Illuminate\Http\Response
     */
    public function update($id, SubjectRequest $request)
    {
        $this->subjectRepository->update($id, $request->all());

        return redirect(route('subjects.index'))->with(['success' => 'updated']);
    }

    /**
     * Delete single post
     *
     * @param $id int Post ID
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->subjectRepository->destroy($id);

        return redirect(route('subjects.index'))->with('success', 'Delete-success!');
    }
}
