<?php


namespace App\Repositories\Checker;


use App\Models\Checker\RoleUser;
use App\Repositories\Interfaces\Checker\UserInterface;
use App\User;
use Illuminate\Support\Facades\Hash;

class UserRepository implements UserInterface
{

    public function all()
    {
        return User::query();
        // TODO: Implement all() method.
    }
    public function store($request)
    {
        $user = new User();
        $user->fill($request->all());
        $user->password = Hash::make($request->password);
        $user->save();
        foreach ($request->roles as $role){
            RoleUser::create([
               'user_id'=>$user->id,
               'role_id'=>$role,
            ]);
        }
        return 'Польщователь добавлен';
        // TODO: Implement store() method.
    }
    public function update(User $user, $request)
    {
        $roles = $request->roles;
        $user->fill($request->except(['password','roles']));
        $user->password = isset($request->password) ? Hash::make($request->password) : $user->password;
        $user->save();
        $user->roles()->sync($roles);
        return 'Пользователь изменен';
        // TODO: Implement update() method.
    }
    public function delete(User $user)
    {
        // TODO: Implement delete() method.
    }
}
