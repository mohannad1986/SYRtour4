<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestyController extends Controller
{
    public function triii()
  {
      try {

          $data='' ;

          return response()->json($data);
      } catch (\Exception $e) {
          return response()->json(['error' => $e->getMessage()], 500);
      }


  }

}
