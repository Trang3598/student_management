<?php

namespace App\Repositories\Subject;

use App\Models\Faculty;
use App\Models\Mark;
use App\Models\Subject;
use App\Repositories\Base\BaseRepository;

class SubjectRepository extends BaseRepository implements SubjectRepositoryInterface
{
    protected $mark;
    protected $faculty;
    protected $subject;

    public function __construct(Subject $subject, Mark $mark, Faculty $faculty)
    {
        parent::__construct($subject);
        $this->mark = $mark;
        $this->faculty = $faculty;
        $this->subject = $subject;
    }

    public function showMarks($id)
    {
        return $this->mark->where('subject_id', $id)->paginate();
    }

    public function showFaculties()
    {
        return $this->faculty::all()->pluck('name', 'id');
    }
    public function getSubject()
    {
        return $this->subject::all();
    }
}
