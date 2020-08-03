<?php

namespace App\Http\Controllers\Admin\Checker;

use App\Http\Controllers\Controller;
use App\Models\Checker\Permission;
use App\Repositories\Interfaces\Checker\PermissionInterface;
use Illuminate\Http\Request;
use Yajra\DataTables\Contracts\DataTable;

class PermissionController extends Controller
{
    protected $permission;
    public function __construct(PermissionInterface $permission)
    {
        $this->permission = $permission;
    }

    public function index(){
        return view('admin.checker.permissions.index');
    }
    public function dtData(){
        return datatables()->of($this->permission->all())
            ->addColumn('edit',function ($model){
                return view('admin.checker.permissions.btn',compact('model'));
            })
            ->make(true);
    }
    public function store(Request $request){
        return redirect()->back()->with(['success'=>$this->permission->store($request)]);
    }
    public function update(Request $request){
        return redirect()->back()->with(['success'=> $this->permission->update($request)]);
    }
    public function delete(Request $request){
        dd($request);
        return redirect()->back()->with(['success'=> $this->permission->update($perm)]);
    }
}
