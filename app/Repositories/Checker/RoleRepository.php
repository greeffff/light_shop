<?php


namespace App\Repositories\Checker;


use App\Models\Checker\PermissionRole;
use App\Models\Checker\Role;
use App\Repositories\Interfaces\Checker\RoleInterface;
use Illuminate\Support\Facades\Hash;

class RoleRepository implements RoleInterface
{
    public function all()
    {
        return Role::query();
        // TODO: Implement all() method.
    }
    public function store($request)
    {
        $role = new Role();
        $role->fill($request->except(['permissions']));
        $role->save();
        foreach ($request->permissions as $perm){
            PermissionRole::create([
               'permission_id'=>$perm,
               'role_id' => $role->id,
            ]);
        }
        return 'Роль добавлена';
        // TODO: Implement store() method.
    }
    public function update(Role $role, $request)
    {
        $permissions = $request->permissions;
        $role->fill($request->except(['permissions']));
        $role->save();
        $role->permissions()->sync($permissions);
        return 'Роль изменена';
        // TODO: Implement update() method.
    }
    public function delete($id)
    {
        Role::destroy($id);
        return 'Роль удалено';
        // TODO: Implement delete() method.
    }
}
