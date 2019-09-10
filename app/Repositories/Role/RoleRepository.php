<?php


namespace App\Repositories\Role;


use App\Models\Role;
use App\Repositories\Base\BaseRepository;

class RoleRepository extends BaseRepository
{
    public function __construct(Role $role)
    {
        parent::__construct($role);
    }
}
