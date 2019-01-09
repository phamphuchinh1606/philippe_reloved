<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use App\Http\Services\{UserService,BrandService,ModelService, SellingStatusService};

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    protected $userService;

    protected $brandService;

    protected $modelService;

    protected $sellingStatusSevice;

    public function __construct(UserService $userService, BrandService $brandService, ModelService $modelService, SellingStatusService $sellingStatusService)
    {
        $this->userService = $userService;
        $this->brandService = $brandService;
        $this->modelService = $modelService;
        $this->sellingStatusSevice = $sellingStatusService;
    }
}
