<?php
namespace App\Http\Services;

use Illuminate\Http\Request;
use App\Common\Constant;
use App\Common\AppCommon;
use DB;
use App\Models\Category;

class CategoryService extends BaseService
{
    public function getList(){
        return $this->categoryLogic->getAll();
    }

    public function find($colorId){
        return $this->categoryLogic->find($colorId);
    }

    private function getCategoryInfo(Request $request, $category = null){
        if(!isset($category)){
            $category = new Category();
        }

        if(isset($request->name)){
            $category->name = $request->name;
        }
        return $category;
    }

    public function create(Request $request){
        $category = $this->getCategoryInfo($request);
        if(isset($category->name)){
            try{
                DB::beginTransaction();
                $category = $this->categoryLogic->save($category);
                DB::commit();

            }catch (\Exception $ex){
                DB::rollBack();
            }
        }
        return $category;
    }

    public function update($categoryId, $request){
        $categoryDB = $this->categoryLogic->find($categoryId);
        if(isset($categoryDB)){
            $category = $this->getCategoryInfo($request,$categoryDB);
            $this->categoryLogic->save($category);
        }
    }

    public function delete($categoryId){
        $category = $this->categoryLogic->find($categoryId);
        if(isset($category)){
            $category->delete_flg = Constant::$DELETE_FLG_ON;
            $this->categoryLogic->save($category);
        }
    }
}
