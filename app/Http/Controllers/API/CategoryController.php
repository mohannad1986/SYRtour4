<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class CategoryController extends Controller
{


    use ApiResponseTrait;



    public function index ()
    {

      $Category= Category::get();

      return $this->apiresponse( $Category,'تم جلب الفئات بنجاح',200);

    }


    // ____________________________________________________________________________

    public function store(request $request)
    {

      $validator = Validator::make($request->all(), [
          'name_en' => 'required|unique:categories,name->en|max:255',
          'name_ar' => 'required|unique:categories,name->ar|max:255',
      ]);
      if ($validator->fails()) {
          return $this->apiresponse(null,$validator->errors(),400);
      }

        try{

         $Category=Category::create([

          'name'=>['en' => $request->name_en, 'ar' => $request->name_ar]
         ]);

         if($Category){

          return $this->apiresponse($Category,'تم ادراج الفئة بنجاح',201);
         }
      //    الباد رسكوست 400
         return $this->apiresponse(null,' لم يتم ادراج الفئة',400);
        }
        catch (\Exception $e) {
          return redirect()->back()->with(['error' => $e->getMessage()]);
             }

    }
    // ____________________________________________________________________________



    public function update (Request $request,$id)
    {

        $validator = Validator::make($request->all(), [
            'name_en' => 'required|unique:categories,name->en|max:255',
            'name_ar' => 'required|unique:categories,name->ar|max:255',
        ]);
        if ($validator->fails()) {

            return $this->apiresponse(null,$validator->errors(),400);

        }

         try{


            $Category =Category::findorFail($id);

            $Category->name=['en' => $request->name_en, 'ar' => $request->name_ar];

            $Category->save();

                if($Category){

                    return $this->apiresponse(null,'تم تحديث الفئة بنجاح',201);
                   }
                //    الباد رسكوست 400
                   return $this->apiresponse(null,' لم يتم تحديث الفئة',400);

         }
         catch (\Exception $e)
         {
            return redirect()->back()->with(['error' => $e->getMessage()]);
        }


     }





    //   _______________________________________________________________________




    public function destroy($id)
    {

        $Category= Category::find($id);

        if($Category){

            Category::destroy($id);

            return $this->apiresponse(null,'تم حذف الفئة بنجاح',200);
        }

        return $this->apiresponse(null,'لم يتم حذف الفئة',404);
    }



}

