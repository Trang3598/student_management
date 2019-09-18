<?php

namespace App\Policies;

use App\Models\Student;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Support\Facades\Auth;

class PostPolicy
{
    use HandlesAuthorization;

    public function before(User $user)
    {
        if ($user->id == 1){
            return true;
        }
    }

    /**
     * Determine whether the user can view the post.
     *
     * @param \App\User $user
     * @param \App\Student $student
     * @return mixed
     */
    public function view(User $user, Student $student)
    {
        return $user->id === $student->user_id;
    }
    public function create(User $user)
    {
        if ($user->id == 1){
            return true;
        }
    }
    public function delete(User $user)
    {
        if ($user->id == 1){
            return true;
        }
    }
}
