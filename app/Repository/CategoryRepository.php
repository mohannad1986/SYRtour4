<?php
namespace App\Repository;
use App\Models\Category;
use App\Models\Town;
use App\Models\City;


class CategoryRepository  implements CategoryRepositoryInterface
{

    public function index()
    {
        $Categories =Category::get();
        // $cities =City::get();
        return view('admin.category',compact('Categories'));

    }

    public function create()
    {

    }

    public function store($request)
    {
        try {

            $Category = new Category();
            $Category->name=['en' => $request->name_en, 'ar' => $request->name_ar];
            $Category ->save();


            toastr()->success(trans('category.category inserted successfully'));
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
            $Category =Category::findorFail($request->id);
            $Category->name=['en' => $request->name_en, 'ar' => $request->name_ar];
            $Category->save();
            toastr()->success(trans('category.category updated successfully'));
            return redirect()->back();
        } catch (\Exception $e) {
            return redirect()->back()->with(['error' => $e->getMessage()]);
        }


    }

    public function destroy($request)
    {
        try {
            // +++++++++++++++++++++++++
            Category::destroy($request->id);
            toastr()->error(trans('category.category deleted successfully'));

            return redirect()->back();
            // ++++++++++++++++++++++++++++++++



            // $cat = Category::findOrFail($request->categoryid);
            // $cat->Cities()->detach($request->cityid);
            // Category::destroy($request->categoryid);



            // Town::destroy($request->id);

            // return redirect()->back();

        }
        catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }

    }



    public function cits_categories_index()
    {
        $Categories =Category::get();
        $cities =City::get();
        return view('admin.city_category',compact('Categories','cities'));
    }

    public function cits_categories_create($request)

    {
        try {
        $City =City::findorFail($request->city_id);
        $City->categories()->attach($request->Categories_id);
        toastr()->success(trans('city_category.categories inserted successfully'));

        return redirect()->back();
        }

        catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }

    }

    public function cits_categories_update($request) {

        try{

        $City =City::findorFail($request->city_id);
        $City->categories()->sync($request->Categories_id);
        toastr()->success(trans('city_category.categories updated successfully'));

        return redirect()->back();
    } catch (\Exception $e) {
        return redirect()->back()->withErrors(['error' => $e->getMessage()]);
    }

    }

    public function cits_categories_delete($request)
    {
        try{
        $City =City::findorFail($request->cityid);
        $City->categories()->detach($request->categoryid);
        toastr()->error(trans('city_category.category deleted successfully'));


        return redirect()->back();
    }catch (\Exception $e) {
        return redirect()->back()->withErrors(['error' => $e->getMessage()]);
    }


    }

}
