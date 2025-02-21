<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Mastersurvei;
use Livewire\WithPagination;    

use Illuminate\Support\Facades\Auth;

class Rawdata extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $id_instansi = '';
    public $username = '';
    public $leveluser = '';

    public $viewDetail = false;
    public $msDetail = [];

    
    public function render()
    {
        $this->id_instansi = Auth::user()->id_instansi;
        $this->username = Auth::user()->email;
        $this->leveluser = Auth::user()->level;

        if($this->leveluser == 1){
            $ms = Mastersurvei::where('jenis_survei',1)->paginate(10);
        }else{
            $ms = Mastersurvei::where(
                [
                    'id_instansi' => $this->id_instansi, 
                    'jenis_survei' => 1,
                ])->paginate(10);
        }   

        return view('livewire.rawdata',['ms'=>$ms]);
    }
    public function view($id){
        $this->id_instansi = Auth::user()->id_instansi;
        $this->username = Auth::user()->email;
        $this->leveluser = Auth::user()->level;


        $this->viewDetail = true;
        if($this->leveluser == 1){
            $ms = Mastersurvei::where('jenis_survei',1)->paginate(10);
        }else{
            $ms = Mastersurvei::where(
                [
                    'id_instansi' => $this->id_instansi, 
                    'jenis_survei' => 1,
                ])->paginate(10);
        }   

        $this->msDetail = Mastersurvei::find($id);
        
       

        return view('livewire.rawdata',[
            'ms'        => $ms,
            'detail'    => $this->msDetail,
        
        ]);

        
    }
}
