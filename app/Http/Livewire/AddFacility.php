<?php

namespace App\Http\Livewire;

use App\Models\Town;
use App\Models\City;
use App\Models\Category;
use App\Models\Facility;

use Spatie\Translatable\HasTranslations;

use Illuminate\Support\Facades\Storage;




use App\Models\Image;

use Livewire\WithPagination;



use Livewire\WithFileUploads;


use Livewire\Component;

class AddFacility extends Component
{

    use WithFileUploads;

    public $successMessage = '';

    public $catchError,$updateMode = false,$photos,$show_table = true,$Parent_id;

    public $currentStep = 1,




        // Father_INPUTS
       $name_en,$name_ar;

        // Mother_INPUTS

        // ++ متحولا ت السلكت

        // public $selectedValue=0;
        // public $secondSelectOptions=0;
        // public $thirdSelectOptions;

        public $facility_id;



        public $selectedClass = null;

        public  $towns = null;
        public $selectedTown = null;

        // السلكت التاني
        public   $chosencity;

        public  $cateees;

        public   $selectedcategoryy ;

        // public $selectedSection = null;
        // public $towns = null;






      // ++++
      public function updated($propertyName)
    {
        $this->validateOnly($propertyName, [
            'name_en' => 'required|string|min:3|max:10',
            'name_ar' => 'required|string|min:3|max:10',








        ]);

    }

    public static function rules()
    {
        return [
            'name_en'=> 'required',
            'name_ar'=> 'required',
            'selectedTown'=> 'required',
            'selectedcategoryy'=> 'required',

             // 'selectedValue' => 'equired',

            // 'secondSelectOptions' => 'required',

        ];
    }



    //   +++ بداية تواع السلكت +++

    public function mount()
    {
        // Set the initial options for the second select element
        // $this->towns =collect();
    }

    // public function setSecondSelectOptions()
    // {
    //     // Run a query based on the selected value of the first select element
    //     // and set the options for the second select element
    //     $options = Town::where('city_id', $this->selectedValue)->pluck('name', 'id');


    //     $this->secondSelectOptions = $options;
    // }

    // public function secondSelectOptions(){

    //     $this->validate([
    //         'secondSelectOptions' => 'required',
    //     ]);

    // }




    public function showformadd(){
        $this->show_table = false;
    }



    //firstStepSubmit
    public function firstStepSubmit()
    {
        $this->validate([
            'name_en' => 'required|string|min:3|max:10',
            'name_ar' => 'required|string|min:3|max:10',
        ]);

        $this->currentStep = 2;
    }

    //secondStepSubmit
    public function secondStepSubmit()
    {
        $this->validate([
            // 'selectedValue' => 'required',
            // 'secondSelectOptions' => 'required',

            'selectedTown'=> 'required',
            'selectedcategoryy'=> 'required',


        ]);
         $this->currentStep = 3;
    }



    // +++++
    public function render()
    {
        if(auth('owner')->check()){

           $this->show_table=false;
        }

        return view('livewire.add-facility',[
            'cites' => City::all(),
            // 'town'=>Town::all(),
            // 'category'=>Category::all(),
            'facilites' =>Facility::all(),
        ]);
    }


    public function  updatedSelectedClass($class_id)
    {

            $this->towns = Town::where('city_id',$class_id)->get();

            $this->chosencity= City::find($class_id);

            $this->cateees= $this->chosencity->categories;







    }


    public function clearForm()
    {
        $this->name_en = '';
        $this->name_ar = '';


    }


    //back
    public function back($step)
    {
        $this->currentStep = $step;
    }

    public function submitForm(){

        try{


            $facility = new Facility();
            $facility->name = ['en' => $this->name_en, 'ar' => $this->name_ar];

            $facility->town_id=$this->selectedTown;
            $facility->category_id=$this->selectedcategoryy;
            if(auth('owner')->check())
            {
                $owner_id= auth()->guard('owner')->user()->id;

                $facility->owner_id=$owner_id;
            }

            $facility->save();

            // ++++ اضافةالصورة ++++
            if (!empty($this->photos)){
                foreach ($this->photos as $photo) {
                    // $myfaciid=  Facility::latest()->first()->id;
                    //
                    $photo->storeAs('facility_pho/'.Facility::latest()->first()->id, $photo->getClientOriginalName(),$disk ='facility_photos');
                    Image::create([
                        'filename' => $photo->getClientOriginalName(),
                        'imageable_id' => Facility::latest()->first()->id,
                        'imageable_type' =>'App\models\Facility'
                    ]);
                }
            }


            // +++ نهاية اضافة الصور +++

            $this->successMessage = trans('messages.success');
            $this->clearForm();
            $this->currentStep = 1;



        }
        catch (\Exception $e) {
            $this->catchError = $e->getMessage();
        };
    }




    public function edit($id)
    {
        $this->show_table = false;
        $this->updateMode = true;
        $My_Parent = Facility::where('id',$id)->first();
        $this->facility_id = $id;
        $this->name_ar= $My_Parent->getTranslation('name', 'ar');
        $this->name_en=$My_Parent->getTranslation('name', 'en');
        $this->selectedTown=$My_Parent->town_id;
        $this->selectedcategoryy=$My_Parent->category_id;


    }

    public function firstStepSubmit_edit()
    {
        $this->updateMode = true;
        $this->currentStep = 2;

    }

    //secondStepSubmit_edit
    public function secondStepSubmit_edit()
    {
        $this->updateMode = true;
        $this->currentStep = 3;

    }

    public function submitForm_edit(){

        if ($this->facility_id){
            $facilitedit = Facility::find($this->facility_id);
            $facilitedit->name=['en' => $this->name_en, 'ar' => $this->name_ar];
            $facilitedit->town_id=$this->selectedTown;
            $facilitedit->category_id=$this->selectedcategoryy;
            $facilitedit->save();
            if (!empty($this->photos)){
                foreach ($this->photos as $photo) {
                    $photo->storeAs('facility_photos/'.$this->name_en, $photo->getClientOriginalName(),'facility_photos');
                    Image::create([
                        'filename' => $photo->getClientOriginalName(),
                        'imageable_id' => Facility::latest()->first()->id,
                        'imageable_type' =>'App\models\Facility'
                    ]);
                }
            }

        }

        return redirect()->to('/livewire');
    }


    public function delete($id){

        $targetfac= Facility::findOrFail($id);

        Storage::disk('facility_photos')->deleteDirectory($targetfac->id);
        // storage::delet




        Facility::findOrFail($id)->delete();

        return redirect()->to('/livewire');
    }


}
