<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;

use App\Repository\FacilityRepositoryInterface;


class FacilityController extends Controller
{

    protected $facility;

    public function __construct(FacilityRepositoryInterface $facility)
        {
             $this->middleware('auth:owner,tourist,web');
             $this->middleware('auth:owner,web',['except' => ['descover_fac','show']]);

              $this->facility =$facility;
         }



     public function index()
        {
            return $this->facility->index();


        }

//   /**
//    * Show the form for creating a new resource.
//    *
//    * @return Response
//    */
//   public function create()
//   {
//     return $this->facility->create();
//   }

  /**
   * Store a newly created resource in storage.
   *
   * @return Response
   */
  public function store(Request $request)
  {

  }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return Response
   */
  public function show($id)
  {
     return $this->facility->show($id);
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return Response
   */
  public function edit($id)
  {

  }

  /**
   * Update the specified resource in storage.
   *
   * @param  int  $id
   * @return Response
   */
  public function update($id)
  {

  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return Response
   */
  public function destroy($id)
  {

  }

  public function descover_fac($city_id,$category_id)
  {
    return $this->facility->descover_fac($city_id,$category_id);
  }


}

?>
