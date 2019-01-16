<?php
namespace App\Http\Logics;

use App\Common\Constant;
use App\Models\ItemPhoto;

class ItemPhotoLogic extends BaseLogic
{
    public function getAll($params = []){
        return ItemPhoto::orderBy('created_at','desc')->paginate();
    }

    public function find($id){
        return ItemPhoto::find($id);
    }

    public function save(ItemPhoto $item){
        if(isset($item)){
            $item->save();
            return $item;
        }
        return null;
    }
}
