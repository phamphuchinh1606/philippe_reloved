<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public function parent(){
        return $this->belongsTo('App\Models\Product','parent_id');
    }
}
