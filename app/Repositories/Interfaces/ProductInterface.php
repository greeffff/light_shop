<?php


namespace App\Repositories\Interfaces;


interface ProductInterface
{

    public function all();
    public function store($request);
}
