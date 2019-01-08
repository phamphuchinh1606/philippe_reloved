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
        if(!isset($brand)){
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
                $brand = $this->brandLogic->save($brand);
                DB::commit();

            }catch (\Exception $ex){
                DB::rollBack();
            }
        }
        return $brand;
    }

    public function update($brandId, $request){
        $brandDB = $this->brandLogic->find($brandId);
        if(isset($brandDB)){
            $brand = $this->getBrandInfo($request,$brandDB);
            $this->brandLogic->save($brand);
        }
    }

    public function delete($brandId){
        $brand = $this->brandLogic->find($brandId);
        if(isset($brand)){
            $brand->delete_flg = Constant::$DELETE_FLG_ON;
            $this->brandLogic->save($brand);
        }
    }
}
