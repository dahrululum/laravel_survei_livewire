<?php

namespace App\Livewire;

use App\Models\Jwb_skm;
use Livewire\Component;
use App\Models\Mastersurvei;
use Livewire\WithPagination;
use Livewire\Attributes\Validate;
 

class Viewrawdata extends Component
{
    use WithPagination;
     
    protected $paginationTheme = 'bootstrap';
    
    public $raw_id;
     
    public $idskm, $namainstansi, $namajenissurvei; 

    #[Validate('required')] 
    public  $idsurvei, $idinstansi, $jenissurvei, $namasurvei, $tglinput, $idresponden, $emailresponden, $umurresponden, $jenkelresponden, $pendresponden, $jobresponden  ;
    public function mount($id)
    {
        $aliasresponden = 'SKM'.date('Ymd').'-'.date('ymdhis');
        $this->idsurvei = $id;
        $this->namasurvei = Mastersurvei::find($id)->nama;
        $this->idresponden = $aliasresponden;

        $ms =  Mastersurvei::where('id',$this->idsurvei)->first();
        $this->idinstansi = $ms->getSKPD->id;
        $this->namainstansi = $ms->getSKPD->namaskpd;
        if($ms->jenis_survei==1){
            $this->jenissurvei=1;
            $this->namajenissurvei = 'SKM';
        }else{
            $this->jenissurvei=2;
            $this->namajenissurvei = 'Non SKM';
        }
       
    }
    public function updated($fields){
        $this->validateOnly($fields);
    }
    public function saveRawdata()
    {
        $validatedData = $this->validate();
        //dd($validatedData);
        Jwb_skm::create(
            [
                'id_survei' => $this->idsurvei,
                'alias'     => $this->idresponden,
                'jenis_survei' => $this->jenissurvei,
                'id_instansi' => $this->idinstansi,
                'id_responden' => $this->idresponden,
                'email' => $this->emailresponden,
                'umur' => $this->umurresponden,
                'jenkel' => $this->jenkelresponden,
                'pendidikan' => $this->pendresponden,
                'pekerjaan' => $this->jobresponden,
                'status'    =>1,
                'ket'       =>'',
                'saran'       =>'',
                'status_saran'     =>0,
                'jenis_layanan'    =>'',
                'tglinput' => $this->tglinput,
            ]
        );
        // Jwb_skm::create($validatedData);
         session()->flash('message', 'Data Berhasil Disimpan');
         $this->resetInput();
         $this->dispatch('close-modal'); 
        
    }
    public function editRawdata(int $raw_id){
        $jwbskm = Jwb_skm::find($raw_id);
        if($jwbskm){
            $this->raw_id = $jwbskm->id;
            $this->idsurvei = $jwbskm->id_survei;
            $this->idinstansi = $jwbskm->id_instansi;
            $this->jenissurvei = $jwbskm->jenis_survei;
            $this->namasurvei = $jwbskm->getMASTER->nama;
            $this->tglinput = $jwbskm->tglinput;
            $this->idresponden = $jwbskm->id_responden;
            $this->emailresponden = $jwbskm->email;
            $this->umurresponden = $jwbskm->umur;
            $this->jenkelresponden = $jwbskm->jenkel;
            $this->pendresponden = $jwbskm->pendidikan;
            $this->jobresponden = $jwbskm->pekerjaan;
        }else{
            return redirect()->to('/rawdata');
        }
    }
    public function updateRawdata(){
        $validatedData = $this->validate();
        dd($this->raw_id);
        Jwb_skm::where('id',$this->raw_id)->update(
            [
                'email' => $validatedData['emailresponden'],
                'umur' => $validatedData['umurresponden'],
                'jenkel' => $validatedData['jenkelresponden'],
                'pendidikan' => $validatedData['pendresponden'],
                'pekerjaan' => $validatedData['jobresponden'],
                'tglinput' => $validatedData['tglinput'],
                'status'    =>1,
                'ket'       =>'',
                'saran'       =>'',
                'status_saran'     =>0,
                'jenis_layanan'    =>'',
                
            ]
        );
        session()->flash('message', 'Data Berhasil Diupdate');
        $this->resetInput();
        $this->dispatch('close-modal');
        
    }
    public function closeModal(){
        $this->resetInput();
        
    }
   
    public function resetInput(){
        $aliasresponden = 'SKM'.date('Ymd').'-'.date('ymdhis');
        $this->idresponden = $aliasresponden;
        $this->tglinput = null;
        
        $this->emailresponden = null;
        $this->umurresponden = null;
        $this->jenkelresponden = null;
        $this->pendresponden = null;
        $this->jobresponden = null;
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
