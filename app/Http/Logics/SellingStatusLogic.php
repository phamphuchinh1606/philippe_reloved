<?php
namespace App\Http\Logics;

use App\Common\Constant;
use App\Models\SellingStatus;

class SellingStatusLogic extends BaseLogic
{
    public function getAll(){
        return SellingStatus::where('delete_flg',Constant::$DELETE_FLG_OFF)->orderBy('created_at','desc')->paginate();
    }

    public function find($id){
        return SellingStatus::find($id);
    }

    public function save(SellingStatus $status){
        if(isset($status)){
            $status->save();
            return $status;
        }
        return null;
    }
}
