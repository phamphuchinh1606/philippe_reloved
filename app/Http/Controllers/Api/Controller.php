<?php

namespace App\Http\Controllers\Api;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use App\Http\Services\{UserService};
use App\Services\Socials\FacebookService;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    protected $userService;

    protected $facebookService;

    public function __construct(UserService $userService, FacebookService $facebookService)
    {
        $this->userService = $userService;
        $this->facebookService = $facebookService;
    }

    protected function json($data){
        return response()->json($data);
    }

    protected function jsonSuccess($message = 'Success'){
        return $this->json([
            'status'=> '0',
            'message'=> $message
        ]);
    }

    protected function jsonError($errors, $message){
        return $this->json([
            'status'=> '1',
            'error'=> $errors,
            'message'=>'Error! '.$message
        ]);
    }
}
