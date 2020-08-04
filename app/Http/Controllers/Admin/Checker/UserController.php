<?php

namespace App\Http\Controllers\Admin\Checker;

use App\Http\Controllers\Controller;
use App\Repositories\Interfaces\Checker\UserInterface;
use Illuminate\Http\Request;
use Yajra\DataTables\Contracts\DataTable;
use App\User;
class UserController extends Controller
{
    protected $user;

    public function __construct(UserInterface $user)
    {
        $this->user = $user;
    }

    public function index(){
        return view('admin.checker.users.index');
    }

    public function create(){
        return view('admin.checker.users.add');
    }

    public function edit(User $user){
        return view('admin.checker.users.edit',compact('user'));
    }

    public function store(Request $request){
        return redirect()->route('admin.checker.users.index')
            ->with(['success'=>$this->user->store($request)]);
    }

    public function update(User $user,Request $request){
        return redirect()->route('admin.checker.users.index')
            ->with(['success'=>$this->user->update($user,$request)]);
    }

    public function delete(Request $request){
        return response()->json(['success'=> $this->user->delete($request->id)]);
    }

    public function dtData(){
        return datatables()->of($this->user->all())
            ->addColumn('roles',function ($model){
                $result = '';
                foreach ($model->role_list as $list){
                    $result .='<spam class="badge badge-secondary">'. $list->roles->display_name.'</spam>';
                }
                return $result;
            })
            ->addColumn('edit',function ($model){
                return view('admin.checker.users.btn',compact('model'));
            })
            ->rawColumns(['roles'])
            ->make(true);
    }
}
