<?php
namespace App\Http\Services;

use Illuminate\Http\Request;
use App\Common\Constant;
use App\Common\AppCommon;
use DB;
use App\Models\Product;

class ProductService extends BaseService
{
    public function getList($params = []){
        return $this->productLogic->getAll($params);
    }

    public function find($productId){
        return $this->productLogic->find($productId);
    }

    private function getProductInfo(Request $request, $product = null){
        if(!isset($product)){
            $product = new Product();
        }

        if(isset($request->name)){
            $product->name = $request->name;
        }
        if(isset($request->year)){
            $product->year = $request->year;
        }
        if(isset($request->description)){
            $product->description = $request->description;
        }
        if(isset($request->brand_id)){
            $product->brand_id = $request->brand_id;
        }
        return $product;
    }

    public function create(Request $request){
        $product = $this->getProductInfo($request);
        if(isset($product->name)){
            try{
                DB::beginTransaction();
                $product = $this->productLogic->save($product);
                DB::commit();

            }catch (\Exception $ex){
                DB::rollBack();
            }
        }
        return $product;
    }

    public function update($productId, $request){
        $productDB = $this->productLogic->find($productId);
        if(isset($productDB)){
            $product = $this->getProductInfo($request,$productDB);
            $this->productLogic->save($product);
        }
    }

    public function delete($productId){
        $product = $this->productLogic->find($productId);
        if(isset($product)){
            $product->delete();
        }
    }
}
