<?php


namespace App\Repositories\Interfaces\Checker;


use App\User;

interface UserInterface
{

    public function all();
    public function store($request);
    public function update(User $user, $request);
    public function delete($id);
}
