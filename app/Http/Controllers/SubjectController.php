<?php

namespace App\Http\Controllers;

use App\Repositories\SubjectEloquentRepository;
use Illuminate\Http\Request;
use App\Http\Requests\SubjectRequest;
use App\SubjectModel;
use Illuminate\Routing\Route;
use Illuminate\Support\Facades\Gate;

class SubjectController extends Controller
{
    protected $subjectRepository;

    public function __construct(SubjectEloquentRepository $subjectRepository)
    {
        $this->subjectRepository = $subjectRepository;
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
        $subjects = $this->subjectRepository->getAll();
        return view('admin.subject.list', compact('subjects'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.subject.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(SubjectRequest $request)
    {
        //
        $subjects = $this->subjectRepository->create($request->all());
        $newPost = $subjects->replicate();
        return redirect(route('subject.index'))->with('message', "Add successfully");
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
    public function edit($slug)
    {
        //
        $slug = SubjectModel::where('slug',$slug)->firstOrFail();
        $subject = $this->subjectRepository->find($slug->id);
        return view('admin.subject.edit', compact('subject'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update($slug,SubjectRequest $request)
    {
        //
        $slug = SubjectModel::where('slug',$slug)->firstOrFail();
        $subject = $this->subjectRepository->update($slug->id, $request->all());
        $newPost = $subject->replicate();
        return redirect(route('subject.index'))->with('message', 'Edit successfully');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($slug)
    {
        //
        $slug = SubjectModel::where('slug',$slug)->firstOrFail();
        $this->subjectRepository->delete($slug->id);
        return redirect(route('subject.index'))->with('message', 'Delete successfully');
    }

    public function boot()
    {
        parent::boot();
        Route::model('subjects', SubjectModel::class);
    }
}
