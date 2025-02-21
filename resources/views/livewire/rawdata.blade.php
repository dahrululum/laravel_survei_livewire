<div>
    <div class="card card-info card-solid">
        <div class="card-header ">
            <h3 class="card-title">Daftar Masuk SKM (RAWS)</h3>
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
        
        @if ($viewDetail)
        
        <div class="card-body">
            <table class="table table-bordered table-sm" id="tablena">
                <thead>
                    <tr class="text-center table-info">
                        <th>No.</th>
                        <th> Nama Survei</th>
                        <th> Instansi</th>
                        <th width="100"> Tanggal</th>
                        <th width="100"> Jumlah Responden </th>
                        <th width="80"> Proses </th>
                    </tr>
                </thead>
                
            </table>
            
        </div> 
             
        @endif
    
    </div>
</div>
