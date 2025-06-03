<?php


namespace App\Repository;
interface FacilityRepositoryInterface
{
    public function index();


    public function show($id);


    public function create();



    public function store($request);

    public function edit($id);

    public function update($request);

    public function destroy($request);

    public function descover_fac($city_id,$category_id);
}
