<?php

namespace App\Models\Checker;

use Illuminate\Cache\TaggableStore;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Config;

class Role extends Model
{
    protected $guarded = [];

    public function permissions(){
        return $this->belongsToMany(Permission::class,'permission_roles','role_id','permission_id');
    }
    public function perm_roles(){
        return $this->hasMany(PermissionRole::class,'role_id');
    }
    public function cachedPermissions()
    {
        $rolePrimaryKey = $this->primaryKey;
        $cacheKey = 'checker_permissions_for_role_' . $this->$rolePrimaryKey;
        if (Cache::getStore() instanceof TaggableStore) {
            return Cache::tags(Config::get('checker.permission_role_table'))->remember($cacheKey, Config::get('cache.ttl', 60), function () {
                return $this->permissions()->get();
            });
        } else return $this->permissions()->get();
    }
}
