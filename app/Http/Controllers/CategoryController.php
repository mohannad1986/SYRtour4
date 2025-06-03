<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repository\CategoryRepositoryInterface;
use App\Http\Requests\StoreCategory;


class CategoryController extends Controller
{
    protected $Category;

public function __construct(CategoryRepositoryInterface $Category)
    {
        $this->middleware('auth:web');
        $this-> Category=$Category;
     }

  /**
   * Display a listing of the resource.
   *
   * @return Response
   */
  public function index()
  {
    return $this->Category->index();



  }

  /**
   * Show the form for creating a new resource.
   *
   * @return Response
   */
  public function create()
  {

  }

  /**
   * Store a newly created resource in storage.
   *
   * @return Response
   */
  public function store(StoreCategory $request)
  {
    $validated = $request->validated();

    return $this->Category->store($request);
  }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return Response
   */
  public function show($id)
  {

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
  public function update(StoreCategory $request)
  {
    $validated = $request->validated();

    return $this->Category->update($request);

  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return Response
   */
  public function destroy(Request $request)
  {
    return $this->Category->destroy($request);
  }

  public function cits_categories_index()
  {
    return $this->Category->cits_categories_index();
  }
  public function cits_categories_create(Request $request)
  {


    return $this->Category->cits_categories_create($request);
  }

  public function cits_categories_update(Request $request)
  {


     return $this->Category->cits_categories_update($request);
  }

  public function cits_categories_delete(Request $request)
  {


     return $this->Category->cits_categories_delete($request);
  }




}

?>
