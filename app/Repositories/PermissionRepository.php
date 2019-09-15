<?php
/**
 * Created by PhpStorm.
 * User: kieutrang
 * Date: 8/29/2019
 * Time: 10:26 AM
 */

namespace App\Repositories;


use App\Permission;

class PermissionRepository extends EloquentRepository
{
    protected $permission;

    public function __construct(Permission $permission)
    {
        parent::__construct($permission);
    }
}