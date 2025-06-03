<?php
namespace App\Repository;
use App\Models\City;
use App\Models\Town;
use App\Models\Facility;


class FacilityRepository  implements FacilityRepositoryInterface
{


    public function index()

    {

        return view('livewire.show_form');

    }


    public function show($id)

    {
        $fac= Facility::findOrFail($id);

        // return $fac->images ;

        // return view('tourist.the_facility',compact('fac'));

        return view('facility.the_facility',compact('fac'));
    }


    public function create()
    {

        return view('livewire.show-form');
    }

    public function store($request)
    {
        try {

            $Town = new Town();
            $Town->name=['en' => $request->name_en,'ar' => $request->name_ar];

            $Town->city_id= $request->city_id;
            $Town->save();
            toastr()->success(trans('town.town inserted successfully'));
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
            $Town =Town::findorFail($request->id);

            $Town->name=['en' => $request->name_en, 'ar' => $request->name_ar];

            if($request->city_id!==0){
            $Town->city_id = $request->city_id;}


            $Town->save();
            toastr()->success(trans('town.town updated successfully'));
            return redirect()->back();
        } catch (\Exception $e) {
            return redirect()->back()->with(['error' => $e->getMessage()]);
        }


    }

    public function destroy($request)
    {
        try {

            Town::destroy($request->id);
            toastr()->error(trans('town.town deleted successfully'));
            return redirect()->back();


        }
        catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }

    }


    public function descover_fac($city_id,$category_id)
    {


        $facilitiescity = City::with(['facilities' => function ($query) use($category_id) {
            $query->where('facilits.category_id',$category_id);
        }])
        ->where('citys.id',$city_id)->get();
        // return  $facilitiescity ;
        return view('tourist.facilities',compact('facilitiescity'));









        // Facility::whereHas('phone', function ($q) {
        //     $q->where('code', '02'); })->get();



    }



}
