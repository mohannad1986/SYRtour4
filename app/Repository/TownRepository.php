<?php
namespace App\Repository;
use App\Models\City;
use App\Models\Town;

class TownRepository  implements TownRepositoryInterface
{

    public function index()
    {
        $cities =City::get();
        $towns =Town::get();
        return view('admin.town',compact('cities','towns'));

    }

    public function create()
    {

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



}
