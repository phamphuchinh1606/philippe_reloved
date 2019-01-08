<?php
namespace App\Http\Services;

use App\Http\Logics\UserLogic;

class BaseService
{
    protected $userLogic;

    public function __construct(UserLogic $userLogic)
    {
        $this->userLogic = $userLogic;
    }
}
