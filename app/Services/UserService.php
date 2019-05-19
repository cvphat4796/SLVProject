<?php

namespace App\Services;

use App\Services\Interfaces\IUserService;
use App\Services\Interfaces\IRoleService;

use App\Repositories\Interfaces\IUserRepository;

use App\Models\MessageResponse;

class UserService implements IUserService {

    protected $roleService;
    protected $userRepo;

    public function __construct(IRoleService $roleService, IUserRepository $userRepo){
       
        $this->roleService = $roleService;
        $this->userRepo = $userRepo;
    }

    public function getAllUser(){
        $result = new MessageResponse();

        try
        {
            $users = $this->userRepo->all();
            $result->success = true;
            $result->result = $users[0];
        }
        catch(\Exception $e)
        {
            $result->success = false;
            $result->error = $e->getMessage();
        }
        
        return  $result;
    }

    public function createUser($user) {
       
        $result = new MessageResponse();

        try
        {
            $u = $this->userRepo->create($user);
            $result->success = true;
            $result->result = ['userId' => $u->userId];
        }
        catch(\Exception $e)
        {
            $result->success = false;
            $result->error = $e->getMessage();
        }
        
        return  $result;
    }
}