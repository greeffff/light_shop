<?php

namespace App\Models\Checker;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $guarded = [];

    public function perm_roles(){
        return $this->hasMany(PermissionRole::class,'role_id');
    }
}
