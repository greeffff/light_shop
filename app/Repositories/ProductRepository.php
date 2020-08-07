<?php


namespace App\Repositories;


use App\Models\Product;
use App\Repositories\Interfaces\ProductInterface;
use Illuminate\Support\Facades\Auth;
class ProductRepository implements ProductInterface
{

    public function all()
    {
        return Product::query();
        // TODO: Implement all() method.
    }
    public function store($request)
    {
        $parameters = array();
        $product = new Product();
        $product->fill($request->except(['image_avatar','images_file','_token','parameter','value']));
        if(!is_null($request->parameter[0])){
            foreach ($request->parameter as $key=>$param){
                $parameters[$param] = $request->value[$key];
            }
            $product->parameters = json_encode($parameters);
        }
        $product->images = json_encode($this->file($request));
//        dd($product);
        $product->save();
        return $product;
        // TODO: Implement store() method.
    }
    public function file($request)
    {
        if($request->hasFile('image_avatar')){
            $file = $request->image_avatar;
            $md5name = hash('md5', $file->getClientOriginalName());
            $name = $md5name . '.' . $file->getClientOriginalExtension();
            $file->move(public_path() . '/images/' . Auth::user()->id, $name);
            $data['avatar'] = '/images/' . Auth::user()->id . '/' . $name;
        }
        if($request->hasFile('images_file')){
            foreach ($request->images_file as $key=>$image){
                $file = $image;
                $md5name = hash('md5', $file->getClientOriginalName());
                $name = $md5name . '.' . $file->getClientOriginalExtension();
                $file->move(public_path() . '/images/' . Auth::user()->id, $name);
                $data[$key] = '/images/' . Auth::user()->id . '/' . $name;
            }
            return $data;
        }else{
            return null;
        }
        // TODO: Implement file() method.
    }
}
