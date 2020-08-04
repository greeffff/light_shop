<?php

return [

    'role' => 'App\Models\Checker\Role',
    'roles_table' => 'roles',
    'permission' => 'App\Models\Checker\Permission',
    'permissions_table' => 'permissions',
    'permission_role_table' => 'permission_role',
    'role_user_table' => 'role_user',
    'user_foreign_key' => 'user_id',
    'role_foreign_key' => 'role_id',
    'permission_foreign_key' => 'permission_id',
];
