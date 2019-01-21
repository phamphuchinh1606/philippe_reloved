<?php
namespace App\Http\Logics;

use App\Common\Constant;
use App\Models\Item;

class ItemLogic extends BaseLogic
{
    public function getAll($searchForm = [], $limitPage = null){
        $query = Item::Where('delete_flg',Constant::$PUBLIC_FLG_OFF);
        if(count($searchForm) > 0){
            if(isset($searchForm['status_id'])){
                $query->whereStatusId($searchForm['status_id']);
            }
            if(isset($searchForm['brand_id'])){
                $query->whereBrandId($searchForm['brand_id']);
            }
            if(isset($searchForm['category_id'])){
                $query->whereCategoryId($searchForm['category_id']);
            }
            if(isset($searchForm['product_id'])){
                $query->whereProductId($searchForm['product_id']);
            }
        }
        if(isset($limitPage)){
            return $query->orderBy('created_at','desc')->paginate($limitPage);
        }
        return $query->orderBy('created_at','desc')->get();
    }

    public function find($id){
        return Item::find($id);
    }

    public function save(Item $item){
        if(isset($item)){
            $item->save();
            return $item;
        }
        return null;
    }
}
