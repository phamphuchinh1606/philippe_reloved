<?php
namespace App\Http\Logics;

use App\Common\Constant;
use App\Models\Item;

class ItemLogic extends BaseLogic
{
    public function getAll($params = []){
        $query = Item::Where('delete_flg',Constant::$PUBLIC_FLG_OFF);
        return $query->orderBy('created_at','desc')->paginate();
    }

    public function find($id){
        return Item::find($id);
    }

    public function save(Item $item){
        if(isset($item)){
            $item->save();
            return $item;
        }
        return null;
    }
}
