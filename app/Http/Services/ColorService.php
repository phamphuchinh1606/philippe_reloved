<?php
namespace App\Http\Services;

use Illuminate\Http\Request;
use App\Common\Constant;
use App\Common\AppCommon;
use DB;
use App\Models\Color;

class ColorService extends BaseService
{
    public function getList(){
        return $this->colorLogic->getAll();
    }

    public function find($colorId){
        return $this->colorLogic->find($colorId);
    }

    private function getColorInfo(Request $request, $color = null){
        if(!isset($color)){
            $color = new Color();
        }

        if(isset($request->name)){
            $color->name = $request->name;
        }
        return $color;
    }

    public function create(Request $request){
        $color = $this->getColorInfo($request);
        if(isset($color->name)){
            try{
                DB::beginTransaction();
                $color = $this->colorLogic->save($color);
                DB::commit();

            }catch (\Exception $ex){
                DB::rollBack();
            }
        }
        return $color;
    }

    public function update($colorId, $request){
        $colorDB = $this->colorLogic->find($colorId);
        if(isset($colorDB)){
            $color = $this->getColorInfo($request,$colorDB);
            $this->colorLogic->save($color);
        }
    }

    public function delete($colorId){
        $color = $this->colorLogic->find($colorId);
        if(isset($color)){
            $color->delete_flg = Constant::$DELETE_FLG_ON;
            $this->colorLogic->save($color);
        }
    }
}
