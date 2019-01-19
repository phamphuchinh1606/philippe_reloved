<?php
namespace App\Http\Services;

use App\Http\Logics\{UserLogic, BrandLogic, ModelLogic, StatusLogic, ColorLogic, CategoryLogic, ProductLogic, ItemLogic,
        ItemPhotoLogic, TagLogic, SocialAccountLogic};

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

    protected $itemPhotoLogic;

    protected $tagLogic;

    protected $socialAccountLogic;

    public function __construct(UserLogic $userLogic, BrandLogic $brandLogic, ModelLogic $modelLogic, StatusLogic $statusLogic,
            ColorLogic $colorLogic, CategoryLogic $categoryLogic, ProductLogic $productLogic, ItemLogic $itemLogic,
            ItemPhotoLogic $itemPhotoLogic, TagLogic $tagLogic, SocialAccountLogic $socialAccountLogic)
    {
        $this->userLogic = $userLogic;
        $this->brandLogic = $brandLogic;
        $this->modelLogic = $modelLogic;
        $this->statusLogic = $statusLogic;
        $this->colorLogic = $colorLogic;
        $this->categoryLogic = $categoryLogic;
        $this->productLogic = $productLogic;
        $this->itemLogic = $itemLogic;
        $this->itemPhotoLogic = $itemPhotoLogic;
        $this->tagLogic = $tagLogic;
        $this->socialAccountLogic = $socialAccountLogic;
    }
}
