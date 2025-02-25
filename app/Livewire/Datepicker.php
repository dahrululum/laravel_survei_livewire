<?php

namespace App\Livewire;

use Livewire\Component;

class Datepicker extends Component
{
    public $date;

    public function updatedDate($value)
    {
        // If you need to format or process the date, do it here
        $this->date = $value;
    }
    public function render()
    {
        return view('livewire.datepicker');
    }
}
