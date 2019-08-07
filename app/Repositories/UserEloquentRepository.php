<?php
/**
 * Created by PhpStorm.
 * User: kieutrang
 * Date: 7/22/2019
 * Time: 11:39 AM
 */

namespace App\Repositories;


use App\User;

class UserEloquentRepository extends EloquentRepository
{
    public function __construct(User $userModel) {
        parent::__construct($userModel);
    }
}