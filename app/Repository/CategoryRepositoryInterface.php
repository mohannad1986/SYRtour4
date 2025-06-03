<?php


namespace App\Repository;
interface CategoryRepositoryInterface
{
    public function index();

    public function create();

    public function store($request);

    public function edit($id);

    public function update($request);

    public function destroy($request);


    public function cits_categories_index();

    public function cits_categories_create($request);
    public function cits_categories_update($request);
    public function cits_categories_delete($request);
}
