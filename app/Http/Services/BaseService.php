<?php
namespace App\Http\Services;

use App\Http\Logics\{UserLogic, BrandLogic, ModelLogic, StatusLogic};

class BaseService
{
    protected $userLogic;

    protected $brandLogic;

    protected $modelLogic;

    protected $statusLogic;

    public function __construct(UserLogic $userLogic, BrandLogic $brandLogic, ModelLogic $modelLogic, StatusLogic $statusLogic)
    {
        $this->userLogic = $userLogic;
        $this->brandLogic = $brandLogic;
        $this->modelLogic = $modelLogic;
        $this->statusLogic = $statusLogic;
    }
}
