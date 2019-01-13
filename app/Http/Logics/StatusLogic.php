<?php
namespace App\Http\Logics;

use App\Common\Constant;
use App\Models\Status;

class StatusLogic extends BaseLogic
{
    public function getAll(){
        return Status::where('delete_flg',Constant::$DELETE_FLG_OFF)->orderBy('created_at','desc')->paginate();
    }

    public function find($id){
        return Status::find($id);
    }

    public function save(Status $status){
        if(isset($status)){
            $status->save();
            return $status;
        }
        return null;
    }
}
