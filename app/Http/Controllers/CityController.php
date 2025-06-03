<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Town;
use Illuminate\Http\Request;

use App\Repository\CityRepositoryInterface;
use App\Http\Requests\StoreCity;

use Illuminate\Http\UploadedFile;
use App\Document;

use Illuminate\Support\Facades\Storage;


use App\Models\Image;
use PhpParser\Node\Stmt\Return_;

class CityController extends Controller
{


protected $city;

public function __construct(CityRepositoryInterface $city)
    {
        $this->middleware('auth:web');
        $this->city =$city;
     }
  public function index()
  {
    //  return'ass';
    return $this->city->index();

  }


  public function create(Request $request)
  {

  }


  public function store(StoreCity $request)
  {


      $validated = $request->validated();
       return $this->city->store($request);

  }


  public function show($id)
  {

  }


  public function edit($id)
  {
  }


  public function update(StoreCity $request,$u)
  {
    $validated = $request->validated();

    return $this->city->update($request);


  }


  public function destroy(Request $request)
  {
    return $this->city->destroy($request);

  }





}

?>
