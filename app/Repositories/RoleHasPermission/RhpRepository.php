<?php


namespace App\Repositories\RoleHasPermission;

use App\Models\RoleHasPermissions;
use App\Repositories\Base\BaseRepository;
use App\Repositories\Role\RoleRepository;

class RhpRepository extends BaseRepository
{
    protected $role;
    protected $permission;
    public function __construct(RoleHasPermissions $roleHasPermission)
    {
        parent::__construct($roleHasPermission);
    }
    public function getPermission($id)
    {
        return $this->model->where('role_id', $id);
    }
}
