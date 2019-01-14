<?php
namespace App\Http\Services;

use Illuminate\Http\Request;
use App\Common\Constant;
use App\Common\AppCommon;
use DB;
use App\Models\Item;

class ItemService extends BaseService
{
    public function getList($params = []){
        return $this->itemLogic->getAll($params);
    }

    public function find($itemId){
        return $this->itemLogic->find($itemId);
    }

    private function getItemInfo(Request $request, $item = null){
        if(!isset($item)){
            $item = new Item();
        }

        if(isset($request->name)){
            $item->name = $request->name;
        }
        if(isset($request->level)){
            $item->level = $request->level;
        }
        if(isset($request->parent_id)){
            $item->parent_id = $request->parent_id;
        }
        return $item;
    }

    public function create(Request $request){
        $item = $this->getItemInfo($request);
        if(isset($item->title)){
            try{
                DB::beginTransaction();
                $item = $this->itemLogic->save($item);
                DB::commit();
            }catch (\Exception $ex){
                DB::rollBack();
            }
        }
        return $item;
    }

    public function update($itemId, $request){
        $itemDB = $this->itemLogic->find($itemId);
        if(isset($itemDB)){
            $item = $this->getItemInfo($request,$itemDB);
            $this->itemLogic->save($item);
        }
    }

    public function delete($itemId){
        $item = $this->itemLogic->find($itemId);
        if(isset($item)){
            $item->delete_flg = Constant::$DELETE_FLG_ON;
            $this->itemLogic->save($item);
        }
    }
}
