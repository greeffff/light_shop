<?php


namespace App\Repositories;


use App\Models\Category;
use App\Repositories\Interfaces\CategoryInterface;

class CategoryRepository implements CategoryInterface
{

    public function all()
    {
        return Category::query();
        // TODO: Implement all() method.
    }
    public function store($request)
    {
        $category = new Category();
        $category->fill($request->all());
        $category->save();
        return 'Категория добавлена';
//        dd($request);
        // TODO: Implement store() method.
    }

}
