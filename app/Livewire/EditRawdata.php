<?php

namespace App\Livewire;

use App\Models\Jwb_skm;
use App\Models\Jwb_skm_detail;
use App\Models\Refumum;
use Livewire\Component;
use Livewire\Attributes\On;
use App\Models\Mastersurvei;

class EditRawdata extends Component
{
    public $formtitle = 'Raw Data';
    public $editform=false;
    public $idskm, $idsurvei, $aliassurvei, $namainstansi, $jenissurvei, $namasurvei; 
    public $tglinput, $idresponden, $emailresponden, $umurresponden, $jenkelresponden, $pendresponden, $jobresponden  ;
    public $refumur=[];
    public $refjenkel=[];
    public $refpendidikan=[];
    public $refpekerjaan=[];
    public $detailskm=[];
    
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
        $this->idresponden = $data->id_responden;
        $this->idsurvei = $data->id_survei;
        $ms =  Mastersurvei::where('id',$this->idsurvei)->first();
        $this->detailskm =  Jwb_skm_detail::where('id_responden',$this->idresponden)->get();
        //ref umum
        $this->refumur = Refumum::where('jenis','umur')->get();
        $this->refjenkel = Refumum::where('jenis','jenkel')->get();
        $this->refpendidikan = Refumum::where('jenis','tingkat_pendidikan')->get();
        $this->refpekerjaan = Refumum::where('jenis','pekerjaan')->get();


        $this->namainstansi = $ms->getSKPD->namaskpd;
        if($ms->jenis_survei==1){
            $this->jenissurvei = 'SKM';
        }else{
            $this->jenissurvei = 'Non SKM';
        }
        
        $this->aliassurvei = $ms->alias;
        $this->namasurvei = $ms->nama;
        $this->emailresponden = $data->email;
        $this->umurresponden = $data->umur;
        $this->jenkelresponden = $data->jenkel;
        $this->pendresponden = $data->pendidikan;
        $this->jobresponden = $data->pekerjaan;
        $this->tglinput = $data->tglinput;


       // dd($id);
    }
    public function update(){
        dd(123);
    }

}
