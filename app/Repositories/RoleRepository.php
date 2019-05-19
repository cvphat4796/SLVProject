<?php

namespace App\Repositories;

use App\Repositories\Infrastructures\BaseRepository;
use App\Repositories\Interfaces\IRoleRepository;

class RoleRepository extends BaseRepository implements IRoleRepository {

    /**
     * Specify Model class name
     *
     * @return string
     */
    function model()
    {
        return "App\\Models\\Role";
    }
}