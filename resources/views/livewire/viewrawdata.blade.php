 
<div >
    {{-- Care about people's approval and you will be their prisoner. --}}
    @include('livewire.rawdataModal')
    @if(session()->has('message'))
    <div class="alert alert-success my-3">
        {{ session('message') }}
    </div>
    @endif
         
    <div class="card mt-2" >
        <div class="card-header">
            <div class="card-title"> <span class="text-primary">Detail Survei: </span>  <b> {{ $this->namasurvei }} </b> <span class="small text-gray">[{{ $this->idsurvei }}]</span>  </div>
        </div>
        <div class="card-body table-responsive p-2">
            <button type="button" class="btn btn-primary btn-sm mb-2" data-bs-toggle="modal" data-bs-target="#createRawdataModal">
                Tambah Raw data
              </button>
            <table class="table table-bordered table-sm  " id="tablena">
                <thead>
                    <tr class="text-center table-dark small">
                        <th class=" " width="500">Proses</th>
                        <th>No.</th>
                        <th> Tanggal</th> 
                        <th> Email</th>
                        <th> Umur</th>
                        <th> Jenis Kelamin</th>
                        <th> Pendidikan</th>
                        <th> Pekerjaan</th>
                        <th> Jenis Layanan</th>
                        
                            
                        @for($i=1; $i<=9; $i++) 
                        <th width="150" class="thsoal"> Soal {{ $i }} </th>
                        @endfor
                        <th class="bg-warning"> Skor</th>
                    </tr>
                </thead>
                <tbody class="small">
                    <?php $no=0;?>
                    @foreach ($detail as $det)
                       
                    
                    <?php 
                    //dd($pd);
                    $no++;
                    ?>
                    <tr wire:key="{{ $det->id }}">
                        <td>  
                            {{-- <button @click="$dispatch('edit-mode', {id: {{ $det->id }}})" type="button" class="btn btn-primary btn-sm my-1" data-bs-toggle="modal" data-bs-target="#editRawmodal">
                               Edit
                            </button> --}}
                             {{-- <livewire:edit-rawdata> --}}
                            
                             <button type="button" wire:click="editRawdata({{ $det->id }})" class="btn btn-sm btn-info my-1" data-bs-toggle="modal" data-bs-target="#editRawdataModal">Edit</button>
                            
                            <a wire:click="deleted({{$det->id}})" wire:confirm="Apakah anda yakin akan menghapus data {{ $det->nama }} ini?"  class="btn btn-danger btn-sm my-1">Del</a></td>
                        <td>{{ $no }}</td>
                        <td>{{ $det->tglinput }}</td>
                        <td>{{ $det->email }} </td>
                        <td>{{ $det->umur }}</td>
                        <td>{{ $det->jenkel }}</td>
                        <td>{{ $det->pendidikan }}</td>
                        <td>{{ $det->pekerjaan }}</td>
                        <td>asdasd</td>
                        <?php $totjaw=0; $avgjaw=0;   ?>
                            @for($j=1; $j<=9; $j++) 
                            <?php 
                            $jmlsoal=9;

                            $arrjwb=$det->getDetail->unique('no_soal')->where('no_soal',$j);
                            //echo $arrjwb;
                            ?>
                            
                            {{-- <td width="150" class="bg-white">{{ $jawabna }} </td> --}}
                            <td style="width: 100px;" class="bg-white col-sm-1">
                            @php
                             foreach ($arrjwb as $key ) {
                                # code...
                                if(!empty($key->jawaban)){
                                    $jawabna = $key->jawaban;
                                    $totjaw=$totjaw+$jawabna;
                                    $avgjaw=$totjaw/$jmlsoal;
                                }else{
                                    $jawabna=0;
                                    $totjaw=0;
                                    $avgjaw=0;
                                }
                                // echo $arrjwb;
                                // echo "<br>"; echo "<br>"; echo "<br>";
                                echo $jawabna;

                             }   
                            @endphp    
                            </td>
                            @endfor
                            <td style="width: 100px;" class="bg-light col-sm-1">{{ number_format($avgjaw,2) }} </td>

                    </tr>
                     
                    @endforeach
                </tbody>
            </table>
            {{ $detail->links() }}
        </div> 
             
      
    </div>
</div>
