<?php
namespace App\Http\Logics;

use App\Common\Constant;
use App\Models\Product;

class ProductLogic extends BaseLogic
{
    public function getAll($params = []){
        $query = Product::Where('delete_flg',Constant::$PUBLIC_FLG_OFF);
        if(isset($params['level'])){
            $query->where('level',$params['level']);
        }
        return $query->orderBy('created_at','desc')->paginate();
    }

    public function find($id){
        return Product::find($id);
    }

    public function save(Product $model){
        if(isset($model)){
            $model->save();
            return $model;
        }
        return null;
    }
}
