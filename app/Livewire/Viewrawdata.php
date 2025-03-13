<?php

namespace App\Livewire;

use App\Models\Jwb_skm;
use App\Models\Jwb_skm_detail;
use Livewire\Component;
use App\Models\Soalsurvei;
use App\Models\Mastersurvei;
use Livewire\WithPagination;
use Livewire\Attributes\Validate;
 

class Viewrawdata extends Component
{
    use WithPagination;
     
    protected $paginationTheme = 'bootstrap';
    
    public $raw_id;
    public $updateData = false;
    public $idskm, $namainstansi, $namajenissurvei, $jmlsoal; 
    public $soalsurvei=[];
    

    #[Validate('required')] 
    public  $idsurvei, $idinstansi, $jenissurvei, $namasurvei, $tglinput, $idresponden, $emailresponden, $umurresponden, $jenkelresponden, $pendresponden, $jobresponden, $newpil1, $newpil2, $newpil3, $newpil4, $newpil5, $newpil6, $newpil7, $newpil8, $newpil9 ;
    
    //#[Validate('required')] 
     
    public function mount($id)
    {
        $aliasresponden = 'SKM'.date('Ymd').'-'.date('ymdhis');
        $this->idsurvei = $id;
        $this->namasurvei = Mastersurvei::find($id)->nama;
        $this->idresponden = $aliasresponden;

        $ms =  Mastersurvei::where('id',$this->idsurvei)->first();
        $this->idinstansi = $ms->getSKPD->id;
        $this->namainstansi = $ms->getSKPD->namaskpd;
        $this->jmlsoal = $ms->jml_soal;
        //soalsurvei
        $this->soalsurvei = Soalsurvei::where('id_survei',$this->idsurvei)->get();
        
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
        Jwb_skm::create($validatedData);
        //detail jawaban soal skm
        for($i=1; $i<=$this->jmlsoal; $i++){
            $nosoal=substr_replace('newpil'.$i,'','0',6);
            //
            Jwb_skm_detail::create([
                'id_survei'         => $this->idsurvei,
                'jenis_survei'      => $this->jenissurvei,
                'id_responden'      => $this->idresponden,
                
                'no_soal'           => $nosoal,
                'jawaban'           => $this->{'newpil'.$i},
                'status'            => 1,
                
                
            ]);
           

        }
       
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
            //detail jawaban soal skm
            $detskm = Jwb_skm_detail::where('id_responden',$jwbskm->id_responden)
                                    ->where('id_survei',$jwbskm->id_survei)
                                    ->get();
            foreach($detskm as $det){
                $this->{'newpil'.$det->no_soal} = $det->jawaban;
            }
            $this->updateData = true;
        }else{
            return redirect()->to('/rawdata');
        }
    }
    public function updateRawdata(){
       // $validatedData = $this->validate();
        dd($this->raw_id);
       //dd("kampret");
        // Jwb_skm::where('id',$this->raw_id)->update(
        //     [
        //         'email' => $validatedData['emailresponden'],
        //         'umur' => $validatedData['umurresponden'],
        //         'jenkel' => $validatedData['jenkelresponden'],
        //         'pendidikan' => $validatedData['pendresponden'],
        //         'pekerjaan' => $validatedData['jobresponden'],
        //         'tglinput' => $validatedData['tglinput'],
        //         'status'    =>1,
        //         'ket'       =>'',
        //         'saran'       =>'',
        //         'status_saran'     =>0,
        //         'jenis_layanan'    =>'',
                
        //     ]
      
        
        // );
        //detail jawaban skm
        // $jws = Jwb_skm_detail::Where('id_responden',$this->idresponden)
        //                     ->where('id_survei',$this->idsurvei)
        //                     ->get();
        // foreach($jws as $jw){
        //     Jwb_skm_detail::where('id',$jw->id)->update([
        //         'jawaban' => $this->{'newpil'.$jw->no_soal},
        //     ]);
        // }

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
