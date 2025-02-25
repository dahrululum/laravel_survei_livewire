<?php

namespace App\Livewire;

use Livewire\Component;

class Datepicker extends Component
{
    public $tglinput;

    public function updatedDate($value)
    {
        // If you need to format or process the date, do it here
        $this->tglinput = $value;
    }
    public function render()
    {
        return view('livewire.datepicker');
    }
}
