<?php
namespace App\Http\Logics;

use App\Common\Constant;
use App\User;

class UserLogic extends BaseLogic
{
    public function getAll(){
        return User::where('delete_flg',Constant::$DELETE_FLG_OFF)->orderBy('created_at','desc')->get();
    }

    public function find($userId){
        return User::find($userId);
    }

    public function findByEmail($email){
        return User::whereEmail($email)->first();
    }

    public function save(User $user){
        if(isset($user)){
            $user->save();
            return $user;
        }
        return null;
    }
}
