<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Repositories\Interfaces\ProductInterface;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    protected $products;
    public function __construct(ProductInterface $products)
    {
        $this->products = $products;
    }
    public function index(){
        return view('admin.products.index');
    }

    public function dtData(){
        return datatables()->of($this->products->all())
            ->addColumn('edit',function ($model){
                return view('admin.products.btn',compact('model'));
            })
            ->make(true);
    }
    public function create(){
        return view('admin.products.add');
    }
    public function store(Request $request){
        return redirect()->route('admin.products.index')->with(['success'=>$this->products->store($request)]);
    }
}
