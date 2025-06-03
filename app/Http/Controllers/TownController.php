<?php

namespace App\Http\Controllers;
use App\Models\City;
use App\Models\Town;
use Illuminate\Http\Request;
use App\Repository\TownRepositoryInterface;

use App\Http\Requests\StoreTown;



class TownController extends Controller
{


    protected $town;

    public function __construct(TownRepositoryInterface $town)
    {
        $this->middleware('auth:web');

        $this->town =$town;
    }

  public function index()
  {
    return $this->town->index();



  }


  public function create()
  {

  }


  public function store(StoreTown $request)
  {
    $validated = $request->validated();

    return $this->town->store($request);

  }


  public function show($id)
  {

  }


  public function edit($id)
  {

  }


  public function update(StoreTown $request)
  {
    $validated = $request->validated();
    return $this->town->update($request);

   ;

  }


  public function destroy(request $request)
  {
    return $this->town->destroy($request);
  }

}

?>
