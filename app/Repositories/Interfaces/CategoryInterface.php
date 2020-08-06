<?php


namespace App\Repositories\Interfaces;


use App\Models\Category;

interface CategoryInterface
{

    public function all();
    public function store($request);
    public function update(Category $category, $request);
    public function delete($id);
}
