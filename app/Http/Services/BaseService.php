<?php
namespace App\Http\Services;

use App\Http\Logics\{UserLogic, BrandLogic, ModelLogic, StatusLogic, ColorLogic, CategoryLogic, ProductLogic, ItemLogic};

class BaseService
{
    protected $userLogic;

    protected $brandLogic;

    protected $modelLogic;

    protected $statusLogic;

    protected $colorLogic;

    protected $categoryLogic;

    protected $productLogic;

    protected $itemLogic;

    public function __construct(UserLogic $userLogic, BrandLogic $brandLogic, ModelLogic $modelLogic, StatusLogic $statusLogic,
            ColorLogic $colorLogic, CategoryLogic $categoryLogic, ProductLogic $productLogic, ItemLogic $itemLogic)
    {
        $this->userLogic = $userLogic;
        $this->brandLogic = $brandLogic;
        $this->modelLogic = $modelLogic;
        $this->statusLogic = $statusLogic;
        $this->colorLogic = $colorLogic;
        $this->categoryLogic = $categoryLogic;
        $this->productLogic = $productLogic;
        $this->itemLogic = $itemLogic;
    }
}
