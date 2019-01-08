<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Models extends Model
{
    public function brand(){
        return $this->belongsTo('App\Models\Brand','brand_id');
    }
}
