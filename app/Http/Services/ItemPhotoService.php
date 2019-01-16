<?php
namespace App\Http\Services;

use App\Common\ImageCommon;
use Illuminate\Http\Request;
use App\Common\Constant;
use App\Common\AppCommon;
use DB;
use App\Models\ItemPhoto;

class ItemPhotoService extends BaseService
{
    public function getList($params = []){
        return $this->itemPhotoLogic->getAll($params);
    }

    public function find($itemPhotoId){
        return $this->itemPhotoLogic->find($itemPhotoId);
    }

    private function getItemPhotoInfo($itemId ,Request $request, $itemPhoto = null){
        if(!isset($itemPhoto)){
            $itemPhoto = new ItemPhoto();
        }

        if(isset($request->label)){
            $itemPhoto->label = $request->label;
        }
        if(isset($request->photo_src)){
            $imageName = ImageCommon::moveImageItemPhoto($request->photo_src, $itemId);
            $itemPhoto->photo_src = $imageName;
        }
        return $itemPhoto;
    }

    public function create($itemId, Request $request){
        $itemPhoto = $this->getItemPhotoInfo($itemId,$request);
        if(isset($itemPhoto->label)){
            try{
                DB::beginTransaction();
                $itemPhoto->item_id = $itemId;
                $itemPhoto = $this->itemPhotoLogic->save($itemPhoto);
                DB::commit();
            }catch (\Exception $ex){
                DB::rollBack();
            }
        }
        return $itemPhoto;
    }

    public function update($itemId,$itemPhotoId, $request){
        $itemPhotoDB = $this->itemPhotoLogic->find($itemPhotoId);
        if(isset($itemPhotoDB)){
            $itemPhoto = $this->getItemPhotoInfo($itemId,$request,$itemPhotoDB);
            $this->itemPhotoLogic->save($itemPhoto);
        }
    }

    public function delete($itemPhotoId){
        $itemPhoto = $this->itemPhotoLogic->find($itemPhotoId);
        if(isset($itemPhoto)){
            $itemPhoto->delete();
        }
    }
}
