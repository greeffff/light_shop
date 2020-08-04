<?php


namespace App\Repositories\Interfaces\Checker;


use App\Models\Checker\Permission;

interface PermissionInterface
{
    public function all();
    public function store($request);
    public function update($request);
    public function delete($id);
}
