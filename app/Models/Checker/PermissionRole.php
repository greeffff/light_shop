<?php

namespace App\Models\Checker;

use Illuminate\Database\Eloquent\Model;

class PermissionRole extends Model
{
    protected $guarded = [];
    public $timestamps = false;

    public function permission(){
        return $this->belongsTo(Permission::class,'permission_id');
    }
}
