<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\On;

class EditRawdata extends Component
{
    public $formtitle = 'Raw Data';
    public $editform=false;
     
    
    public function render()
    {
        return view('livewire.edit-rawdata');
    }
    public function save(){
        dd(123);
    }
    #[On('edit-mode')]
    public function edit($id)
    {
       
        $this->editform=true;
        $this->formtitle = 'Edit Raw Data ID: '.$id;
       
       // dd($id);
    }

}
