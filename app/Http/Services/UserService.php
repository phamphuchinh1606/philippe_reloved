<?php
namespace App\Http\Services;

use App\User;
use Illuminate\Http\Request;
use App\Common\Constant;
use App\Common\AppCommon;
use DB;

class UserService extends BaseService
{
    public function getList(){
        return $this->userLogic->getAll();
    }

    private function getUserInfo(Request $request, $user = null){
        if(!isset($user)){
            $user = new User();
        }

        if(isset($request->full_name)){
            $user->full_name = $request->full_name;
        }
        if(isset($request->email)){
            $user->email = $request->email;
        }
        if(isset($request->city)){
            $user->city = $request->city;
        }
        if(isset($request->active)){
            $user->is_active = AppCommon::getIsPublic($request->is_active);
        }else if(null == $request->is_active){
            $user->is_active = AppCommon::getIsPublic($request->is_active);
        }
        if(!isset($user->id)){
            $user->password = bcrypt($request->password);
        }
        return $user;
    }

    public function create(Request $request){
        $user = $this->getUserInfo($request);
        if(isset($user->email)){
            try{
                DB::beginTransaction();
                $userDB = $this->userLogic->save($user);
                if(isset($userDB)){
                    $avatar = $request->file('avatar');
                    if(isset($avatar)){
                        $imageName = AppCommon::moveImage($avatar, Constant::$PATH_FOLDER_UPLOAD_USER.'/'.$userDB->id);
                        $userDB->avatar = $imageName;
                        $this->userLogic->save($userDB);
                    }
                }
                DB::commit();

            }catch (\Exception $ex){
                DB::rollBack();
            }
        }
        return $user;
    }
}
