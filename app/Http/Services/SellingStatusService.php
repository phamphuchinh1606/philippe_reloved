<?php
namespace App\Http\Services;

use Illuminate\Http\Request;
use App\Common\Constant;
use App\Common\AppCommon;
use DB;
use App\Models\SellingStatus;

class SellingStatusService extends BaseService
{
    public function getList(){
        return $this->sellingStatusLogic->getAll();
    }

    public function find($statusId){
        return $this->sellingStatusLogic->find($statusId);
    }

    private function getStatusInfo(Request $request, $status = null){
        if(!isset($status)){
            $status = new SellingStatus();
        }

        if(isset($request->name)){
            $status->name = $request->name;
        }
        return $status;
    }

    public function create(Request $request){
        $status = $this->getStatusInfo($request);
        if(isset($status->name)){
            try{
                DB::beginTransaction();
                $status = $this->sellingStatusLogic->save($status);
                DB::commit();

            }catch (\Exception $ex){
                DB::rollBack();
            }
        }
        return $status;
    }

    public function update($statusId, $request){
        $statusDB = $this->sellingStatusLogic->find($statusId);
        if(isset($statusDB)){
            $status = $this->getStatusInfo($request,$statusDB);
            $this->sellingStatusLogic->save($status);
        }
    }

    public function delete($statusId){
        $status = $this->sellingStatusLogic->find($statusId);
        if(isset($status)){
            $status->delete_flg = Constant::$DELETE_FLG_ON;
            $this->sellingStatusLogic->save($status);
        }
    }
}
