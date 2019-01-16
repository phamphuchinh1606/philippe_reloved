<?php
namespace App\Http\Logics;

use App\Common\Constant;
use App\Models\Tag;

class TagLogic extends BaseLogic
{
    public function getAll(){
        return Tag::where('delete_flg',Constant::$DELETE_FLG_OFF)->orderBy('created_at','desc')->paginate();
    }

    public function find($id){
        return Tag::find($id);
    }

    public function save(Tag $item){
        if(isset($item)){
            $item->save();
            return $item;
        }
        return null;
    }
}
