<?php

namespace App\Http\Controllers;

use App\Http\Requests\FacultyRequest;
use Illuminate\Http\Request;
use App\Repositories\Faculty\FacultyRepository;

class FacultyController extends Controller
{
    /**
     * @var FacultyRepositoryInterface|\App\Repositories\Repository
     */
    protected $facultyRepository;

    public function __construct(FacultyRepository $facultyRepository)
    {
        $this->facultyRepository = $facultyRepository;
    }

    /**
     * Show all post
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $faculties = $this->facultyRepository->getList();
        return view('admin.faculties.index', compact('faculties'));
    }

    /**
     * Create single post
     *
     */
    public function create()
    {
        return view('admin.faculties.create');
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

    public function store(FacultyRequest $request)
    {
        $this->facultyRepository->store($request->all());

        return redirect(route('faculties.index'))->with(['success' => 'create success']);
    }

    public function edit($id)
    {
        $faculties = $this->facultyRepository->getListById($id);

        return view('admin.faculties.edit', compact('faculties'));
    }

    /**
     * Update single post
     *
     * @param $request \Illuminate\Http\Request
     * @param $id int Post ID
     * @return \Illuminate\Http\Response
     */
    public function update($id, FacultyRequest $request)
    {
        $this->facultyRepository->update($id, $request->all());

        return redirect(route('faculties.index'))->with(['success' => 'updated']);
    }

    /**
     * Delete single post
     *
     * @param $id int Post ID
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->facultyRepository->destroy($id);

        return redirect(route('faculties.index'))->with('success', 'Delete-success!');
    }
}
