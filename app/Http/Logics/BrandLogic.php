<?php
namespace App\Http\Logics;

use App\Common\Constant;
use App\Models\Brand;

class BrandLogic extends BaseLogic
{
    public function getAll(){
        return Brand::where('delete_flg',Constant::$DELETE_FLG_OFF)->orderBy('created_at','desc')->paginate();
    }

    public function find($brandId){
        return Brand::find($brandId);
    }

    public function save(Brand $brand){
        if(isset($brand)){
            $brand->save();
            return $brand;
        }
        return null;
    }
}
