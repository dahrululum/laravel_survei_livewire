<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Mastersurvei;
use App\Models\Jwb_skm;
use Livewire\WithPagination;    

use Illuminate\Support\Facades\Auth;

class Rawdata extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $id_instansi = '';
    public $username = '';
    public $leveluser = '';
    public $katakunci;
    public $viewDetail = false;
    public $idsurvei = '';
    public $namasurvei = '';
    public $msDetail = [];

    
    public function render()
    {
        $this->id_instansi = Auth::user()->id_instansi;
        $this->username = Auth::user()->email;
        $this->leveluser = Auth::user()->level;

        if($this->leveluser == 1){
            if($this->katakunci != null){ 
                $ms = Mastersurvei::with('getSKPD','getJWBRES')
                ->where('jenis_survei',1)
                ->where('nama','like','%'.$this->katakunci.'%')
                ->orderby('id','desc')
                ->paginate(5);

                //dd($ms);
            }else{
                $ms = Mastersurvei::with('getSKPD','getJWBRES')
                ->where('jenis_survei',1)
                ->orderby('id','desc')  
                ->paginate(5);
            }
           
        }else{
            if($this->katakunci != null){ 
                $ms = Mastersurvei::with('getSKPD','getJWBRES')
                ->where(
                    [
                        'id_instansi' => $this->id_instansi, 
                        'jenis_survei' => 1,
                    ])
                        ->where('nama','like','%'.$this->katakunci.'%')
                        ->orderby('id','desc')
                        ->paginate(5);
            }else{
                $ms = Mastersurvei::with('getSKPD','getJWBRES')
                ->where(
                    [
                        'id_instansi' => $this->id_instansi, 
                        'jenis_survei' => 1,
                    ])->paginate(5);
            }   
           
        }   

        if($this->viewDetail == true){
            $id = $this->idsurvei;
            $msDetail =  Jwb_skm::with('getDetail')
                    ->where('id_survei',$id)
                    ->orderby('tglinput','desc')
                    ->get();   
        }else{
            $msDetail = [];
        }
        return view('livewire.rawdata',[
            'ms'        => $ms,
            'detail'    => $msDetail,
        ]);
    }
    public function view($id){
        $this->id_instansi = Auth::user()->id_instansi;
        $this->username = Auth::user()->email;
        $this->leveluser = Auth::user()->level;


        $this->viewDetail = true;
        if($this->leveluser == 1){
            $ms = Mastersurvei::where('jenis_survei',1)->get();
        }else{
            $ms = Mastersurvei::where(
                [
                    'id_instansi' => $this->id_instansi, 
                    'jenis_survei' => 1,
                ])->get();
        }   

        $this->idsurvei=$id;
        $this->namasurvei = Mastersurvei::find($id)->nama;
        $msDetail =  Jwb_skm::with('getDetail')
                    ->where('id_survei',$this->idsurvei)
                    ->orderby('tglinput','desc')
                    ->get();   
            
        //dd($this->idsurvei);

        return view('livewire.rawdata',[
            'ms'        => $ms,
            'detail'    => $msDetail,
        
        ]);

        
    }
}
