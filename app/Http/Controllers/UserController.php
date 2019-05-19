<?php

namespace App\Http\Controllers;

use App\Services\Interfaces\IUserService;

use Illuminate\Http\Request;

class UserController extends BaseController
{

    protected $userService;

    public function __construct(Request $request, IUserService $userService){
        $this->request = $request;
        $this->userService = $userService;
    }

    public function getAllUser(){
        $user = $this->userService->getAllUser();
        if($user->success)
        {
            return $this->createOkResponse($user->result);
        }
        return $this->createErrorResponse($user->error);
    }

    public function createUser(){
        $user = json_decode($this->request->getContent(), true);
        $result = $this->userService->createUser($user);
        if($result->success)
        {
            return $this->createOkResponse($result->result);
        }
        return $this->createErrorResponse($result->error);
    }
}