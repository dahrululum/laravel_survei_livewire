<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\Validate; 

class Home extends Component
{
    #[Validate('required')]
    public $title = '';
    #[Validate('required')] 
    public $content = '';
    
    public function save(){
        // dd('tes save');
        $this->validate(); 
    }
    public function render()
    {
        return view('livewire.home');
    }
   
}
