<?php
namespace App\Http\Services;

use App\Http\Logics\{UserLogic, BrandLogic};

class BaseService
{
    protected $userLogic;

    protected $brandLogic;

    public function __construct(UserLogic $userLogic, BrandLogic $brandLogic)
    {
        $this->userLogic = $userLogic;
        $this->brandLogic = $brandLogic;
    }
}
