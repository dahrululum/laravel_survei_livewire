<?php

namespace App\Livewire;

use App\Models\Jwb_skm;
use Livewire\Component;
use App\Models\Mastersurvei;
use Livewire\WithPagination;
 

class Viewrawdata extends Component
{
    use WithPagination;
     
    protected $paginationTheme = 'bootstrap';
    public  $idsurvei;
    public $namasurvei = '';
    public $detms =[];
    
    public function mount($id)
    {
        $this->idsurvei = $id;
        
        $this->namasurvei = Mastersurvei::find($id)->nama;
        // $this->detms =  Jwb_skm::with('getDetail')
        //             ->where('id_survei',$this->idsurvei)
        //             ->orderby('tglinput','desc')
        //             ->paginate(10);
        //dd($this->idsurvei);
    }
    public function render()
    {
        
        
           
       
             //       dd($this->msDetail);

        
        return view('livewire.viewrawdata',[
            'idsurvei'  => $this->idsurvei,
            'detail'    => Jwb_skm::with('getDetail')
                            ->where('id_survei',$this->idsurvei)
                            ->orderby('tglinput','desc')
                            ->paginate(10),
        ]);
    }
}
