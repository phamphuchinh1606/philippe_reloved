<?php
namespace App\Http\Services;

use Illuminate\Http\Request;
use App\Common\Constant;
use App\Common\AppCommon;
use DB;
use App\Models\Models;

class ModelService extends BaseService
{
    public function getList(){
        return $this->modelLogic->getAll();
    }

    public function find($modelId){
        return $this->modelLogic->find($modelId);
    }

    private function getModelInfo(Request $request, $model = null){
        if(!isset($model)){
            $model = new Models();
        }

        if(isset($request->name)){
            $model->name = $request->name;
        }
        if(isset($request->year)){
            $model->year = $request->year;
        }
        if(isset($request->description)){
            $model->description = $request->description;
        }
        if(isset($request->brand_id)){
            $model->brand_id = $request->brand_id;
        }
        return $model;
    }

    public function create(Request $request){
        $model = $this->getModelInfo($request);
        if(isset($model->name)){
            try{
                DB::beginTransaction();
                $model = $this->modelLogic->save($model);
                DB::commit();

            }catch (\Exception $ex){
                DB::rollBack();
            }
        }
        return $model;
    }

    public function update($modelId, $request){
        $modelDB = $this->modelLogic->find($modelId);
        if(isset($modelDB)){
            $model = $this->getModelInfo($request,$modelDB);
            $this->modelLogic->save($model);
        }
    }

    public function delete($brandId){
        $brand = $this->brandLogic->find($brandId);
        if(isset($brand)){
            $brand->delete();
        }
    }
}
