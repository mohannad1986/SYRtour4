<?php

namespace App\Repository;
use App\Models\City;
use Illuminate\Support\Facades\Storage;

use Illuminate\Http\Request;

use App\Http\Requests\StoreCity;

use Illuminate\Http\UploadedFile;
use App\Document;

// use Illuminate\Support\Facades\Storage;




use App\Models\Image;



class cityRepository implements CityRepositoryInterface
{

    public function index()
    {
        $cities =City::get();
        return view('admin.city',compact('cities'));
    }


    public function create()
    {

    }

    public function store($request)
    {


    try {

            $city = new city;
            $city->name = ['en' => $request->name_en, 'ar' => $request->name_ar];

            $city->save();

            if ($request->hasFile('file')){

                // return $request;

                $image = $request->file('file');
                $file_name = $image->getClientOriginalName();

                $request->file->storeAs('city/', $file_name,$disk ='city_photos');
                Image::create([
                    'filename' => $file_name ,
                    'imageable_id' => City::latest()->first()->id,
                    'imageable_type' =>'App\models\City'
                ]);

            }
                        return response()->json([
                            'status' => true,

                        ]);

              } catch (\Exception $e) {
                     return redirect()->back()->with(['error' => $e->getMessage()]);
                        }

        }

            // ++++++++++++++++++++++++





    public function edit($id)
    {
    }

    public function update($request)
    {



        try {
            $city =City::findorFail($request->id);

            $city->name=['en' => $request->name_en, 'ar' => $request->name_ar];

            $city->save();

            return response()->json([
                'status' => true,
                'id' =>$request->id,


            ]);

        } catch (\Exception $e) {
            return redirect()->back()->with(['error' => $e->getMessage()]);
        }
    }

    public function destroy($request)
    {



        try {
            $city=  City::findOrFail($request->id);

        //    if($city){

        //    Storage::disk('city_photos')->delete('city/'.$city->images->filename);


        //    $city->images->delete();

            City::destroy($request->id);

            return response()->json([
                'status' => true,
                'id' =>$request->id,

            ]);

        //   }

        }
        catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }

    }
}
