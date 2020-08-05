<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Repositories\Interfaces\CategoryInterface;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    protected $category;
    public function __construct(CategoryInterface $category)
    {
        $this->category = $category;
    }
    public function index(){
        return view('admin.categories.index');
    }
    public function dtData(){
        return datatables()->of($this->category->all())
            ->addColumn('edit',function ($model){
//                return view('admin.checker.users.btn',compact('model'));
            })
            ->editColumn('parent_id',function ($model){
                if(!is_null($model->parent)) {
                    return $model->parent->name;
                }
            })
//            ->rawColumns(['roles'])
            ->make(true);
    }
    public function store(Request $request){
        return redirect()->route('admin.categories.index')
            ->with(['success'=>$this->category->store($request)]);
    }
}
