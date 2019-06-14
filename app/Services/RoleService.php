<?php

namespace App\Services;

use App\Services\Interfaces\IRoleService;
use App\Repositories\Interfaces\IRoleRepository;
use App\Models\MessageResponse;
use App\Models\Role;
use Illuminate\Support\Facades\DB;


class RoleService implements IRoleService {

    protected $roleRepo;
    public function __construct(IRoleRepository $roleRepo){
        $this->roleRepo =  $roleRepo;
    }

    public function getAllRole(){
        $result = new MessageResponse();
        try
        {
            
            $roles = $this->roleRepo->all();
            $result->success = true;
            $result->result = $roles;
        }
        catch(\Exception $e)
        {
            $result->success = false;
            $result->error = $e->getMessage();
        }
        
        
        return $result; 
    }

   
}