<?php
namespace App\Http\Logics;

use App\Common\Constant;
use App\Models\Color;

class ColorLogic extends BaseLogic
{
    public function getAll(){
        return Color::where('delete_flg',Constant::$DELETE_FLG_OFF)->orderBy('created_at','desc')->paginate();
    }

    public function find($id){
        return Color::find($id);
    }

    public function save(Color $color){
        if(isset($color)){
            $color->save();
            return $color;
        }
        return null;
    }
}
