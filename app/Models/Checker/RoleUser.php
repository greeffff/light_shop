<?php

namespace App\Models\Checker;

use Illuminate\Database\Eloquent\Model;

class RoleUser extends Model
{
    protected $guarded = [];
    public $timestamps = false;
    public function roles(){
        return $this->belongsTo(Role::class,'role_id');
    }
}
