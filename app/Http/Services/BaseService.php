<?php
namespace App\Http\Services;

use App\Http\Logics\{UserLogic, BrandLogic, ModelLogic, SellingStatusLogic};

class BaseService
{
    protected $userLogic;

    protected $brandLogic;

    protected $modelLogic;

    protected $sellingStatusLogic;

    public function __construct(UserLogic $userLogic, BrandLogic $brandLogic, ModelLogic $modelLogic, SellingStatusLogic $sellingStatusLogic)
    {
        $this->userLogic = $userLogic;
        $this->brandLogic = $brandLogic;
        $this->modelLogic = $modelLogic;
        $this->sellingStatusLogic = $sellingStatusLogic;
    }
}
