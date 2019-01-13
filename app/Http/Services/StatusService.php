<?php
namespace App\Http\Services;

use Illuminate\Http\Request;
use App\Common\Constant;
use App\Common\AppCommon;
use DB;
use App\Models\Status;

class StatusService extends BaseService
{
    public function getList(){
        return $this->statusLogic->getAll();
    }

    public function find($statusId){
        return $this->statusLogic->find($statusId);
    }

    private function getStatusInfo(Request $request, $status = null){
        if(!isset($status)){
            $status = new Status();
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
                $status = $this->statusLogic->save($status);
                DB::commit();

            }catch (\Exception $ex){
                DB::rollBack();
            }
        }
        return $status;
    }

    public function update($statusId, $request){
        $statusDB = $this->statusLogic->find($statusId);
        if(isset($statusDB)){
            $status = $this->getStatusInfo($request,$statusDB);
            $this->statusLogic->save($status);
        }
    }

    public function delete($statusId){
        $status = $this->statusLogic->find($statusId);
        if(isset($status)){
            $status->delete_flg = Constant::$DELETE_FLG_ON;
            $this->statusLogic->save($status);
        }
    }
}
