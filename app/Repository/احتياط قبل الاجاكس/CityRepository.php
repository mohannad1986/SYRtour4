<?php

namespace App\Repository;
use App\Models\City;
use Illuminate\Support\Facades\Storage;

use Illuminate\Http\Request;



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
            $City = new City();
            $City->name=['en' => $request->name_en, 'ar' => $request->name_ar];
            $City->save();

                // ++++ اضافةالصورة ++++
                if ($request->hasFile('city_pho')){

                        $image = $request->file('city_pho');
                        $file_name = $image->getClientOriginalName();

                        $request->city_pho->storeAs('city/', $file_name,$disk ='city_photos');
                        Image::create([
                            'filename' => $file_name ,
                            'imageable_id' => City::latest()->first()->id,
                            'imageable_type' =>'App\models\City'
                        ]);

                }


                // +++ نهاية اضافة الصور +++
            toastr()->success(trans('city.city inserted successfully'));
            return redirect()->back();
            }
        catch (\Exception $e) {
            return redirect()->back()->with(['error' => $e->getMessage()]);
        }
    }


    public function edit($id)
    {
    }

    public function update($request)
    {



        try {
            $city =City::findorFail($request->id);

            $city->name=['en' => $request->name_en, 'ar' => $request->name_ar];

            $city->save();
            toastr()->success(trans('city.city updated successfully'));
            return redirect()->back();
        } catch (\Exception $e) {
            return redirect()->back()->with(['error' => $e->getMessage()]);
        }
    }

    public function destroy($request)
    {



        try {

            City::destroy($request->id);
            toastr()->error(trans('city.city deleted successfully'));

            return redirect()->back();

        }
        catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }

    }
}
