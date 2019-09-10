<?php

namespace App\Repositories\Permission;

use App\Models\Permission;
use App\Repositories\Base\BaseRepository;

class PermissionRepository extends BaseRepository
{

    public function __construct(Permission $permission)
    {
        parent::__construct($permission);
    }
    public function roleHasPermissions($id){
        return $this->model->whereIn('id', $id)->get();
    }
    public function roleHasNotPermissions($id)
    {
        return $this->model->whereNotIn('id', $id)->get();
    }
}
