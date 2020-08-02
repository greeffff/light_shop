<?php


namespace App\Repositories\Checker;

use App\Repositories\Interfaces\Checker\PermissionInterface;
use App\Models\Checker\Permission;
class PermissionRepository implements PermissionInterface
{
    public function all()
    {
        return Permission::query();
        // TODO: Implement all() method.
    }
    public function store($request)
    {
        $permission = new Permission();
        $permission->fill($request->all());
        $permission->save();
        return 'Разрешение добавлено';
        // TODO: Implement store() method.
    }
    public function update($request)
    {
        $perm = Permission::findOrfail($request->id);
        $perm->fill($request->all());
        $perm->save();
        return 'Разрешение изменено';
        // TODO: Implement update() method.
    }
}
