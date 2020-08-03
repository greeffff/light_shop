<?php

namespace App\Http\Controllers\Admin\Checker;

use App\Http\Controllers\Controller;
use App\Models\Checker\Permission;
use App\Models\Checker\Role;
use App\Repositories\Interfaces\Checker\PermissionInterface;
use App\Repositories\Interfaces\Checker\RoleInterface;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    protected $role,$permission;
    public function __construct(RoleInterface $role, PermissionInterface $permission)
    {
        $this->role = $role;
        $this->permission = $permission;
    }
    public function index(){
        $permissions = $this->permission->all()->get();
        return view('admin.checker.roles.index',compact('permissions'));
    }
    public function dtData(){
        return datatables()->of($this->role->all())
            ->addColumn('edit',function ($model){
                return view('admin.checker.roles.btn',compact('model'));
            })
            ->addColumn('permissions',function ($model){
                $result = '';
                foreach ($model->perm_roles as $perm){
                    $result .='<spam class="badge badge-secondary">'. $perm->permission->display_name.'</spam>';
                }
                return $result;
            })
            ->rawColumns(['permissions'])
            ->make(true);
    }
    public function store(Request $request){
        return redirect()->back()->with(['success'=>$this->role->store($request)]);
    }
    public function edit(Role $role){
        return view('admin.checker.roles.edit',compact('role'));
    }
    public function update(Role $role,Request $request){
        return redirect()->route('admin.checker.roles.index')->with(['success'=>$this->role->update($role,$request)]);
    }
}
