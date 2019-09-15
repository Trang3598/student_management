<?php
/**
 * Created by PhpStorm.
 * User: kieutrang
 * Date: 8/28/2019
 * Time: 3:20 PM
 */

namespace App\Repositories;


use App\Role;

class RoleEloquentRepository extends EloquentRepository
{
    protected $role;

    public function __construct(Role $role)
    {
        parent::__construct($role);
    }
}