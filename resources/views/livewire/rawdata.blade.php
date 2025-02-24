<div>
    <div class="card card-info card-solid">
        <div class="card-header ">
            <div class="row">
                <div class="col-md-9 ">
                    <h5 class="w-75 p-0 m-0">Daftar Masuk SKM (RAWS)</h5>
                </div>
                <div class="col-md-3 ">
                    <input type="text" class="form-control float-right " placeholder="Searching..." wire:model.live="katakunci">
                     
                </div>
            </div>

            
             
        </div>    
        <div class="card-body table-responsive p-1" >
            
           
            <table class="table table-bordered table-sm" id="tablena">
                <thead>
                    <tr class="text-center table-primary">
                        <th>No.</th>
                        <th> Nama Survei</th>
                        <th> Instansi</th>
                        <th width="100"> Tanggal</th>
                        <th width="100"> Jumlah Responden </th>
                        <th width="80"> Proses </th>
                    </tr>
                </thead>
                <tbody class="table-group-divider">
                    <?php $no=0;?>
                    @foreach ($ms as $pd)
                    <tr class="table-light">
                        <td class="small text-center">{{ $ms->firstItem() + $loop->index }}.</td>
                        <td class="small">{{ $pd->nama }} <span class="badge badge-dark">{{ $pd->alias }}</span></td>
                        <td class="small">{{ $pd->getSKPD->namaskpd }}</td>
                        <td class="small">{{ $pd->tglsurvei }}</td>
                        <td class="small">
                            <div class="text-primary "> <b>{{ count($pd->getJWBRES) }}</b>  Peserta</div> 
                        </td>
                        <td class="text-center">
                            <a wire:click="view({{$pd->id}})"   class="btn btn-success btn-sm">View</a>
                            {{-- <a wire:click="deleted({{$pd->id}})" wire:confirm="Apakah anda yakin akan menghapus data {{ $pd->nama }} ini?"  class="btn btn-danger btn-sm ">Del</a> --}}
                        </td>
                    </tr>
                     

                    @endforeach
                </tbody>
            </table>
            {{ $ms->links() }}
        </div>
        
        
    
    </div>
    @if ($viewDetail)
    <div class="flex justify-content-center my-3" wire:loading.flex> 
        <span class="spinner-border spinner-border-sm mx-4"></span> 
        <span class="text-primary">loading page, please wait...</span> </div>
    <div class="card mt-2" >
        <div class="card-header">
            <div class="card-title"> <span class="text-primary">Detail Survei: </span>  <b> {{ $this->namasurvei }} </b> <span class="small text-gray">[{{ $this->idsurvei }}]</span>  </div>
        </div>
        <div class="card-body table-responsive p-2">
            <table class="table table-bordered table-sm  " id="tablena">
                <thead>
                    <tr class="text-center table-dark small">
                        <th class="col-1">Proses</th>
                        <th>No.</th>
                        <th> Tanggal</th> 
                        <th> Email</th>
                        <th> Umur</th>
                        <th> Jenis Kelamin</th>
                        <th> Pendidikan</th>
                        <th> Pekerjaan</th>
                        <th> Jenis Layanan</th>
                        
                            
                        @for($i=1; $i<=9; $i++) 
                        <th width="150"> Soal {{ $i }} </th>
                        @endfor
                        <th class="bg-warning"> Skor</th>
                    </tr>
                </thead>
                <tbody class="small">
                    <?php $no=0;?>
                    @foreach ($detail->chunk(10) as $chunk)
                       
                    @foreach($chunk as $det)
                    <?php 
                    //dd($pd);
                    $no++;
                    ?>
                    <tr>
                        <td>  
                            <button @click="$dispatch('edit-mode', {id: {{ $det->id }}})" type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#editRawmodal">
                               Edit
                            </button>
                             <livewire:edit-rawdata>
                            
                            {{-- <a  href="#"  class="btn btn-info btn-sm " data-bs-toggle="modal" data-bs-target="#editRawmodal" data-whatever="@mdo">edit</a>
                            <livewire:edit-rawdata> --}}
                            <a wire:click="deleted({{$det->id}})" wire:confirm="Apakah anda yakin akan menghapus data {{ $det->nama }} ini?"  class="btn btn-danger btn-sm ">Del</a></td>
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
                    @endforeach
                </tbody>
            </table>
            
        </div> 
             
      
    </div>
      @endif    
</div>
