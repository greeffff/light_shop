<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
class AjaxController extends Controller
{
    public function select(Request $request,$table)
    {
        if($table=='permissions' || $table=='roles'){
            $name_field = 'display_name';
        }else{
            $name_field = 'name';
        }
        $data = DB::table($table)
            ->select(
                [
                    'id',
                    $name_field,
                    DB::raw("CONCAT(". $name_field.") AS text")
                ]);
        if (isset($request->term)) {
            $data = $data->where($name_field, 'ILIKE', '%' . $request->term . '%');
        }
        $data = $data->get();
        return response()->json($data);
    }
    public function permissions(Request $request)
    {
        return self::select($request,'permissions');
    }
    public function roles(Request $request)
    {
        return self::select($request,'roles');
    }
    public function categories(Request $request)
    {
        return self::select($request,'categories');
    }
}
