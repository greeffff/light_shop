<?php


namespace App\Repositories\Interfaces\Checker;


use App\Models\Checker\Role;

interface RoleInterface
{
    public function all();
    public function store($request);
    public function update(Role $role, $request);
    public function delete($id);
}
