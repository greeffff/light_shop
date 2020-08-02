<?php


namespace App\Repositories\Interfaces\Checker;


interface RoleInterface
{
    public function all();
    public function store($request);
}
