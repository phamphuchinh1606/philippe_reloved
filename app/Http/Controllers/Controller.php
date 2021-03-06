<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use App\Http\Services\{UserService,BrandService,ModelService, StatusService, ColorService, CategoryService, ProductService, ItemService,
    ItemPhotoService, TagService};

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    protected $userService;

    protected $brandService;

    protected $modelService;

    protected $statusService;

    protected $colorService;

    protected $categoryService;

    protected $productService;

    protected $itemService;

    protected $itemPhotoService;

    protected $tagService;

    public function __construct(UserService $userService, BrandService $brandService, ModelService $modelService, StatusService $statusService,
                                ColorService $colorService, CategoryService $categoryService, ProductService $productService, ItemService $itemService,
                                ItemPhotoService $itemPhotoService, TagService $tagService)
    {
        $this->userService = $userService;
        $this->brandService = $brandService;
        $this->modelService = $modelService;
        $this->statusService = $statusService;
        $this->colorService = $colorService;
        $this->categoryService = $categoryService;
        $this->productService = $productService;
        $this->itemService = $itemService;
        $this->itemPhotoService = $itemPhotoService;
        $this->tagService = $tagService;
    }
}
