<?php

namespace App\Livewire;

use Livewire\Component;

class EditRawdata extends Component
{
    public $formtitle = 'Edit Raw Data';
    
    protected $listeners = ['editRaw' => 'editRawdata'];

    public function editRawdata($id)
    {
        $this->formtitle = 'Edit Raw Data ID: '.$id;
    }
    public function render()
    {
        return view('livewire.edit-rawdata');
    }
}
