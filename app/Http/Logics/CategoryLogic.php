<?php
namespace App\Http\Logics;

use App\Common\Constant;
use App\Models\Category;

class CategoryLogic extends BaseLogic
{
    public function getAll(){
        return Category::where('delete_flg',Constant::$DELETE_FLG_OFF)->orderBy('created_at','desc')->get();
    }

    public function find($id){
        return Category::find($id);
    }

    public function save(Category $category){
        if(isset($category)){
            $category->save();
            return $category;
        }
        return null;
    }
}
