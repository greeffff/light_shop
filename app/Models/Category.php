<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $guarded = [];

    public function parent(){
        return $this->belongsTo(Category::class,'parent_id');
    }
}
