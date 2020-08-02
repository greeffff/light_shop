<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
class AjaxController extends Controller
{
    public function select(Request $request,$table)
    {
        $data = DB::table($table)
            ->select(
                [
                    'id',
                    'display_name',
                    DB::raw("CONCAT(display_name) AS text")
                ]);
        if (isset($request->term)) {
            $data = $data->where('name', 'ILIKE', '%' . $request->term . '%');
        }
        $data = $data->get();
        return response()->json($data);
    }
    public function permissions(Request $request)
    {
        return self::select($request,'permissions');
    }
}
