<?php
namespace App\Http\Services;

use Illuminate\Http\Request;
use App\Common\Constant;
use App\Common\AppCommon;
use DB;
use App\Models\Brand;

class BrandService extends BaseService
{
    public function getList(){
        return $this->brandLogic->getAll();
    }

    public function find($userId){
        return $this->brandLogic->find($userId);
    }

    private function getBrandInfo(Request $request, $brand = null){
        if(!isset($user)){
            $brand = new Brand();
        }

        if(isset($request->name)){
            $brand->name = $request->name;
        }
        return $brand;
    }

    public function create(Request $request){
        $brand = $this->getBrandInfo($request);
        if(isset($brand->name)){
            try{
                DB::beginTransaction();
                $userDB = $this->brandLogic->save($brand);
                DB::commit();

            }catch (\Exception $ex){
                DB::rollBack();
            }
        }
        return $brand;
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
}
