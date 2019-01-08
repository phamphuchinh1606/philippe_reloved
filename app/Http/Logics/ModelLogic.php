<?php
namespace App\Http\Logics;

use App\Common\Constant;
use App\Models\Models;

class ModelLogic extends BaseLogic
{
    public function getAll(){
        return Models::orderBy('created_at','desc')->paginate();
    }

    public function find($modelId){
        return Models::find($modelId);
    }

    public function save(Models $model){
        if(isset($model)){
            $model->save();
            return $model;
        }
        return null;
    }
}
