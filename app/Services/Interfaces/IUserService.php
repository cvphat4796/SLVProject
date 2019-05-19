<?php

namespace App\Services\Interfaces;

interface IUserService {
    function getAllUser();

    function createUser($user);
}
