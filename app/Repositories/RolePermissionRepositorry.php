<?php
/**
 * Created by PhpStorm.
 * User: kieutrang
 * Date: 8/29/2019
 * Time: 1:49 PM
 */

namespace App\Repositories;


use App\RoleHasPermission;

class RolePermissionRepositorry  extends EloquentRepository
{
    protected $role_permission;

    public function __construct(RoleHasPermission $role_permission)
    {
        parent::__construct($role_permission);
    }
}