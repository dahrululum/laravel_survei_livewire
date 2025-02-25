<?php

namespace App\Livewire;

use App\Models\Jwb_skm;
use Livewire\Component;
use Livewire\Attributes\On;
use App\Models\Mastersurvei;

class EditRawdata extends Component
{
    public $formtitle = 'Raw Data';
    public $editform=false;
    public $idskm, $idsurvei, $aliassurvei, $namainstansi,$jenissurvei,$namasurvei;
     
    
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
        $data = Jwb_skm::find($id);
        $this->idskm = $data->id;
        $this->idsurvei = $data->id_survei;
        $ms =  Mastersurvei::where('id',$this->idsurvei)->first();


        $this->namainstansi = $ms->getSKPD->namaskpd;
        if($ms->jenis_survei==1){
            $this->jenissurvei = 'SKM';
        }else{
            $this->jenissurvei = 'Non SKM';
        }
        $this->aliassurvei = $ms->alias;
        $this->namasurvei = $ms->nama;
       // dd($id);
    }

}
