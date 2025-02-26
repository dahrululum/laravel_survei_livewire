<!-- Modal -->
<div wire:ignore.self class="modal fade" id="editRawmodal" tabindex="-1" aria-labelledby="editRawmodalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="editRawmodalLabel">{{ $formtitle }}  ::  </h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form action="">
          <div class="modal-body">
            <div class="card-body  bg-dark text-white">
              <div class="mb-3 row">
                <label for="nama" class="col-sm-2 col-form-label">Instansi</label>
                <div class="col-sm-10"> 
                    <input type="text" class="form-control form-control-sm" wire:model="namainstansi" readonly>
                </div>
              </div>
              <div class="mb-3 row">
                  <label for="email" class="col-sm-2 col-form-label">ID & Jenis Survei</label>
                  <div class="col-sm-4">
                      <input type="text" class="form-control form-control-sm" wire:model="idsurvei" readonly>
                  </div>
                  <div class="col-sm-6">
                    <input type="text" class="form-control form-control-sm" wire:model="jenissurvei" readonly>
                </div>
              </div>
              <div class="mb-3 row">
                  <label for="alamat" class="col-sm-2 col-form-label">Nama Survei</label>
                  <div class="col-sm-10">
                      <input type="text" class="form-control form-control-sm" wire:model="namasurvei" readonly>
                  </div>
              </div>
            </div>
            <div class="card-body bg-light border border-dark">
              <h6 class="border-bottom border-1 border-dark w-25 mb-4"> <b>Profil Responden</b> </h6> 
              <div class="row mb-2">
                <label for="inputName" class="col-sm-2 col-form-label text-danger">Tanggal Input  </label>
                <div class="col-sm-4">  
                   {{-- @livewire('datepicker',['tglinput' => 123 ]) --}}
                   <div class="input-group date" id="datepicker-container">
                    {{-- <input type="text" id="datepicker" class="form-control form-control-sm" wire:model="date" placeholder="Pilih tanggal"> --}}
                    <input 
                        wire:model="tglinput"
                        type="text" class="form-control form-control-sm datepicker" placeholder="Pilih Tanggal" autocomplete="off"
                        data-provide="datepicker" data-date-autoclose="true" 
                        data-date-format="yyyy-mm-dd" data-date-today-highlight="true"                        
                        onchange="this.dispatchEvent(new InputEvent('input'))"
                    >
                    <span class="input-group-text"><i class="bi bi-calendar"></i></span>
                </div>
                </div>
              </div>
              <div class="mb-3 row ">
                <div class="col-md-6   ">
                  <div class="card text-left">
                    <div class="card-body">
                      <div class="mb-3 row">
                        <label for="alamat" class="col-sm-4 col-form-label">1. Email  </label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control form-control-sm" wire:model="emailresponden"  >
                        </div>
                      </div>
                      <div class="mb-3 row">
                        <label for="alamat" class="col-sm-4 col-form-label">2. Umur  </label>
                          <div class="col-sm-8">
                              {{-- {{ print_r($refumur) }} --}}
                                <select class="form-control form-control-sm" wire:model="umurresponden"  >
                                  <option value="">Pilih Umur </option>
                                  @foreach (App\Models\Refumum::listRef('umur') as $um)
                                    <option value="{{ $um->kode }}" @if($um->kode==$umurresponden) selected @endif>{{ $um->kode }}. {{ $um->nama }}</option>
                                  @endforeach
                                </select>
                          </div>
                      </div>
                      <div class="mb-3 row">
                        <label for="alamat" class="col-sm-4 col-form-label">3. Jenis Kelamin</label>
                        <div class="col-sm-8">
                          <select class="form-control form-control-sm" wire:model="jenkelresponden"  >
                            <option value="">Pilih Jenis Kelamin </option>
                            @foreach (App\Models\Refumum::listRef('jenkel') as $jk)
                              <option value="{{ $jk->kode }}" @if($jk->kode==$jenkelresponden) selected @endif>{{ $jk->kode }}. {{ $jk->nama }}</option>
                            
                            @endforeach
                            
                          </select>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-md-6  ">
                  <div class="card text-left">
                    <div class="card-body">
                      <div class="mb-3 row">
                        <label for="pendidikan" class="col-sm-4 col-form-label">4. Pendidikan  </label>
                          <div class="col-sm-8">
                              {{-- {{ print_r($refumur) }} --}}
                                <select class="form-control form-control-sm" wire:model="pendresponden"  >
                                  <option value="">Pilih Pendidikan </option>
                                  @foreach (App\Models\Refumum::listRef('tingkat_pendidikan') as $pend)
                                  <option value="{{ $pend->kode }}" @if($pendresponden==$pend->kode) selected @endif>{{ $pend->kode }}. {{ $pend->nama }}</option>
                                  @endforeach
                                </select>
                          </div>
                      </div>
                      <div class="mb-3 row">
                        <label for="pendidikan" class="col-sm-4 col-form-label">5. Pekerjaan  </label>
                          <div class="col-sm-8">
                              {{-- {{ print_r($refumur) }} --}}
                                <select class="form-control form-control-sm" wire:model="jobresponden"  >
                                  <option value="">Pilih Pekerjaan </option>
                                  @foreach (App\Models\Refumum::listRef('pekerjaan') as $job)
                                  <option value="{{ $job->kode }}" @if($jobresponden==$job->kode) selected @endif>{{ $job->kode }}. {{ $job->nama }}</option>
                                  @endforeach
                                </select>
                          </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              
            </div>
            <div class="card-body border border-dark mt-1">
              <h6 class="border-bottom border-1 border-dark w-25 mb-4"> <b>Pertanyaan dan Jawaban Responden</b> </h6> 
               
              @foreach($soalsurvei as $ss)
                <li>{{ $ss->no_soal }}. {{ $ss->nama_soal }}</li>
              @endforeach
              {{-- @foreach ($detailskm as $js )
              <?php 
                $soal = App\Models\Soalsurvei::Where([
                                    ['id_survei','=',$js->id_survei],
                                    ['no_soal','=',$js->no_soal],
                                ])->first();
                            
              ?>
                <div class="form-group row border-bottom mb-1 p-2">
                  <label for="inputName" class="col-sm-7 col-form-label">
                       {{ $js->no_soal }}. {{ $soal->nama_soal }}
                       <input type="hidden" class="form-control  form-control-sm" id="idjwb{{ $js->id }}" name="idjwb{{ $js->id }}" value="{{ $js->id }}" readonly>
                  </label>
                  <div class="col-sm-1">
                      <input type="hidden" class="form-control  form-control-sm" id="nosoal{{ $js->no_soal }}" name="nosoal{{ $js->no_soal }}" value="{{ $js->no_soal }}" readonly>
                      <input type="number" class="form-control  form-control-sm" id="oldpil{{ $js->no_soal }}" name="oldpil{{ $js->no_soal }}" value="{{ $js->jawaban }}" readonly>
                  </div>
                  <div class="col-sm-3">
                    
                      <select class="form-control form-control-sm" name="newpil{{ $js->no_soal }}" id="newpil{{ $js->no_soal }}" required>
                          <option value="">Pilih Jawaban </option>
                            @foreach ($soal->getPILIHAN as $sk)  
                              <option value="{{ $sk->no_jawaban }}" @if($js->jawaban==$sk->no_jawaban) selected @endif>{{ $sk->no_jawaban }}. {{ $sk->nama_jawaban }}</option>
                          
                            @endforeach
                          
                        </select>
                     
                  
                  </div>
              </div>

                
              @endforeach --}}
            </div>

            
            

          </div>

          <div class="modal-footer">
            @if($editform)
              <button  type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
              <button wire:click="update" type="button" class="btn btn-primary">Update</button>
            @else
              <button  type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
              <button wire:click="save" type="button" class="btn btn-primary">Save </button>
            @endif
            
          </div>
        </form>
      </div>
    </div>
</div>