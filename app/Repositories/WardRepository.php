<?php

namespace App\Repositories;

use App\Models\User;
use App\Repositories\Interfaces\UserRepositoryInterface;

/**
 * Class UserService
 * @package App\Services
 */
class UserRepository implements UserRepositoryInterface
{
    public function __construct()
    {
    }

    public function getAllPaginate()
    {
        return User::paginate(15);
    }
}
