<?php


namespace App\Repositories\User;

use App\Repositories\Base\BaseRepository;
use App\User;

class UserRepository extends BaseRepository
{
    public function __construct(User $user)
    {
        parent::__construct($user);
    }
    public function getUser($id){
        return $this->model->where('id', $id);
    }
    public function email(){
        return $this->model->getAll();
    }
}
