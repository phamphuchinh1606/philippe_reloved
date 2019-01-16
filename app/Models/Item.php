<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    public function brand(){
        return $this->belongsTo('App\Models\Brand','brand_id');
    }
    public function category(){
        return $this->belongsTo('App\Models\Category','category_id');
    }
    public function color(){
        return $this->belongsTo('App\Models\Color','color_id');
    }
    public function product(){
        return $this->belongsTo('App\Models\Product','product_id');
    }
    public function status(){
        return $this->belongsTo('App\Models\Status','status_id');
    }

    public function photos(){
        return $this->hasMany('App\Models\ItemPhoto','item_id');
    }
}
