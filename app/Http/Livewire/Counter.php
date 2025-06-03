<?php
namespace App\Http\Livewire;
use Livewire\Component;

class Counter extends Component
{
    public $counta = 5;

    public function increment()
    {
       $this->counta++;
    }

    public function render()
    {
        return view('livewire.counter');
    }
}


