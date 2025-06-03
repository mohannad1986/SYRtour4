<?php

namespace App\Http\Livewire;

use App\models\Facility;
use App\models\Owner;
use Spatie\Translatable\HasTranslations;

use Livewire\Component;

class Searchf extends Component
{

     public $search='';
     public $fac;


    public function render()
    {

      if(empty($this->search)){
        $this->fac=Facility::where('name',$this->search)->get();
      }else{
        $this->fac=Facility::where('name','like','%'.$this->search.'%')->get();
        // $this->fac=owner::where('name',$this->search)->get();

      }

        return view('livewire.searchf');
    }
}
