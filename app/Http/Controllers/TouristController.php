<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use App\Models\Tourist;

use Illuminate\Http\Request;

class TouristController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:web', ['except' => ['store']]);
    }

  /**
   * Display a listing of the resource.
   *
   * @return Response
   */
  public function index()

  {
    $tourists= Tourist::get();

    return view('admin.tourists',compact('tourists'));

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
  public function store(Request $request)
  {

    // return $request;
    try {
        $tourist = new Tourist();
        $tourist ->name =  $request->name;
        $tourist ->email = $request->email;
        $tourist ->password = Hash::make($request->password);
        $tourist ->save();
        toastr()->success(trans('tourist.success'));
        return redirect()->route('reg');
    }
        catch (\Exception $e){

            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }

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
  public function update($id)
  {

  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return Response
   */
  public function destroy(Request $request)
  {
      return $request ;
  }

}

?>
