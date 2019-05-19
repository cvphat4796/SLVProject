<?php
namespace App\Http\Controllers;

use App\Models\MessageResponse;
use App\Utils\Helper;

class BaseController extends Controller {

    protected $request;

    private function createResponse($status, $data) {
        return response()->json($data, $status);
    }

    public function createOkResponse($data, $paging = null, $query = null){
        $message = new MessageResponse();
        $message->apiVersion = '1.0';
        $message->apiRoute = $this->request->path();

        $message->data =  Helper::convertModelResponse($data);
        if($paging != null){
            $message->pagingInfo = $paging;
        }
        if($query  != null){
            $message->query = $query;
        }

        return $this->createResponse(200,  $message);
    }

    public function createErrorResponse($error){
        $message = new MessageResponse();
        $message->apiVersion = '1.0';
        $message->apiRoute =  $this->request->path();

        $message->error = $error;

        return $this->createResponse(200,  $message);
    }
}