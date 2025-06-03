<?php

namespace App\Http\Controllers;

use App\models\Owner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;


class OwnerController extends Controller
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
    $owners= Owner::get();

    return view('admin.owners',compact('owners'));


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


    try {
        $owner = new Owner();
        $owner ->name =  $request->name;
        $owner ->email = $request->email;
        $owner ->password = Hash::make($request->password);
        $owner ->save();
        toastr()->success(trans('messages.success'));
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
      return  $request ;
  }

}

?>
