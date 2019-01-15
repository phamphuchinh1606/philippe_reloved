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

        if(isset($request->title)){
            $item->title = $request->title;
        }
        if(isset($request->description)){
            $item->description = $request->description;
        }
        if(isset($request->model)){
            $item->model = $request->model;
        }
        if(isset($request->bought_price)){
            $item->bought_price = $request->bought_price;
        }
        if(isset($request->brand_id)){
            $item->brand_id = $request->brand_id;
        }
        if(isset($request->user_id)){
            $item->user_id = $request->user_id;
        }
        if(isset($request->status_id)){
            $item->status_id = $request->status_id;
        }
        if(isset($request->color_id)){
            $item->color_id = $request->color_id;
        }
        if(isset($request->category_id)){
            $item->category_id = $request->category_id;
        }
        if(isset($request->product_id)){
            $item->product_id = $request->product_id;
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
                dd($ex);
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
