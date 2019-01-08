<?php
namespace App\Http\Services;

use App\Http\Logics\{UserLogic, BrandLogic, ModelLogic};

class BaseService
{
    protected $userLogic;

    protected $brandLogic;

    protected $modelLogic;

    public function __construct(UserLogic $userLogic, BrandLogic $brandLogic, ModelLogic $modelLogic)
    {
        $this->userLogic = $userLogic;
        $this->brandLogic = $brandLogic;
        $this->modelLogic = $modelLogic;
    }
}
