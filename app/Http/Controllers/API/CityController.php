<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\City;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

use App\Http\Requests\StoreCity;

class CityController extends Controller
{
   use ApiResponseTrait;
//    لاداعي لاستيراد التريت فوق لانك بنفس المسار حاطو

  public function index ()

  {

    $city= City::get();

    return $this->apiresponse($city,'تم جلب المدن بنجاح',200);

  }

  public function store(request $request)
  {

    $validator = Validator::make($request->all(), [
        'name_en' => 'required|unique:citys,name->en|max:255',
        'name_ar' => 'required|unique:citys,name->ar|max:255',
    ]);
    if ($validator->fails()) {

        return $this->apiresponse(null,$validator->errors(),400);



    }


      try{

       $city=City::create([

        'name'=>['en' => $request->name_en, 'ar' => $request->name_ar]
       ]);

       if($city){

        return $this->apiresponse($city,'تم ادراج المدينة بنجاح',201);
       }
    //    الباد رسكوست 400
       return $this->apiresponse(null,' لم يتم ادراج المدينة',400);







      }
      catch (\Exception $e) {
        return redirect()->back()->with(['error' => $e->getMessage()]);
           }

  }


  public function update (Request $request,$id){

    $validator = Validator::make($request->all(), [
        'name_en' => 'required|unique:citys,name->en|max:255',
        'name_ar' => 'required|unique:citys,name->ar|max:255',
    ]);
    if ($validator->fails()) {

        return $this->apiresponse(null,$validator->errors(),400);

    }

     try{


        $city =City::findorFail($id);

            $city->name=['en' => $request->name_en, 'ar' => $request->name_ar];

            $city->save();

            if($city){

                return $this->apiresponse(null,'تم تحديث المدينة بنجاح',201);
               }
            //    الباد رسكوست 400
               return $this->apiresponse(null,' لم يتم تحديث المدينة',400);

     }

    catch (\Exception $e) {
        return redirect()->back()->with(['error' => $e->getMessage()]);
           }

  }


  public function destroy($id){

    $city= City::find($id);

    if($city){

        City::destroy($id);

        return $this->apiresponse(null,'تم حذف المدينة بنجاح',200);
    }

    return $this->apiresponse(null,' لم يتم حذف المدينة',404);




  }


}
