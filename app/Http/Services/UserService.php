<?php
namespace App\Http\Services;

use App\User;
use Illuminate\Http\Request;
use App\Common\Constant;
use App\Common\AppCommon;
use App\Models\SocialAccount;
use DB;

class UserService extends BaseService
{
    public function getList(){
        return $this->userLogic->getAll();
    }

    public function find($userId){
        return $this->userLogic->find($userId);
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

    public function update($userId, $request){
        $userDB = $this->find($userId);
        if(isset($userDB)){
            $user = $this->getUserInfo($request,$userDB);
            $avatar = $request->file('avatar');
            if(isset($avatar)){
                AppCommon::deleteImage($userDB->avatar);
                $imageName = AppCommon::moveImage($avatar, Constant::$PATH_FOLDER_UPLOAD_USER.'/'.$userDB->id);
                $user->avatar = $imageName;
            }
            $this->userLogic->save($user);
        }
    }

    public function delete($brandId){
        $user = $this->userLogic->find($brandId);
        if(isset($user)){
            $user->delete_flg = Constant::$DELETE_FLG_ON;
            $this->userLogic->save($user);
        }
    }

    public function findSocialAccount($provider, $providerUserId){
        $account = $this->socialAccountLogic->findSocialAccount($provider, $providerUserId);
        if ($account) {
            return $account->user;
        }
        return null;
    }

    public function findUserByEmail($email){
        return $this->userLogic->findByEmail($email);
    }

    public function createUserFromSocial(Request $request){
        $provider = $request->provider;
        $providerUserId = $request->provider_user_id;
        $accessToken = $request->access_token;
        $account = $this->socialAccountLogic->findSocialAccount($provider, $providerUserId);
        if ($account) {
           return $account->user;
        }else{
            try {
                DB::beginTransaction();
                $account = new SocialAccount([
                    'provider_user_id' => $providerUserId,
                    'provider' => $provider,
                    'access_token' => $accessToken
                ]);
                $email = $request->email;
                if(isset($email)){
                    $user = User::whereEmail($email)->first();
                }
                if(!isset($user)){
                    $user = new User();
                    $user->is_active = Constant::$ACTIVE_FLG_ON;
                    $user->email = $email;
                    $user->full_name = $request->full_name;
                    $user->city = $request->city;
                    $user->password = bcrypt("pass_app_relove");
                    $user = $this->userLogic->save($user);
                }
                //Save social
                $account->user()->associate($user);
                $this->socialAccountLogic->save($account);

                DB::commit();
                return $user;
            }catch (\Exception $ex){
                DB::rollBack();
                throw $ex;
            }
        }
    }
}
