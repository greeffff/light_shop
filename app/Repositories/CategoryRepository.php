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
    public function update(Category $category, $request)
    {
        $category->fill($request->all());
        $category->save();
        return 'Категория изменена';
        // TODO: Implement update() method.
    }
    public function delete($id)
    {
        Category::destroy($id);
        return 'Категория удалено';
        // TODO: Implement delete() method.
    }
}
