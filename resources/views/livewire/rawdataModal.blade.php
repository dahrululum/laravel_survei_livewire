<!-- Modal -->
<div wire:ignore.self class="modal fade" id="createRawdataModal" tabindex="-1" aria-labelledby="createRawdataModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="createRawdataModalLabel"> Form Raw Data :: {{ $idsurvei }} </h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form wire:submit.prevent="saveRawdata">
          <div class="modal-body">
            <div class="card">
                <div class="card-body  bg-dark text-white">
                    <div class="mb-3 row">
                      <label for="nama" class="col-sm-2 col-form-label">Instansi</label>
                      <div class="col-sm-10"> 
                        <input type="hidden" class="form-control " wire:model="idinstansi" readonly>
                          <input type="text" class="form-control form-control-sm" wire:model="namainstansi" readonly>
                      </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="email" class="col-sm-2 col-form-label">ID & Jenis Survei</label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control form-control-sm" wire:model="idsurvei" readonly>
                        </div>
                        <div class="col-sm-6">
                            <input type="hidden" class="form-control " wire:model="jenissurvei" readonly>
                          <input type="text" class="form-control form-control-sm" wire:model="namajenissurvei" readonly>
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
                    
                    <div class="mb-3 row ">
                      <div class="col-md-6   ">
                        <div class="card text-left">
                          <div class="card-body">
                            <div class="mb-3 bg-dark row p-2">
                                <label for="idrespondenlabel" class="col-sm-4 col-form-label text-primary">ID Responden  </label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control form-control-sm" wire:model="idresponden" readonly >
                                    @error('idresponden') 
                                    <span class="error text-danger">{{ $message }}</span> 
                                    @enderror
                                    
                                    
                                </div>
                            </div>
                             
                            <div class="mb-3 row">
                                <label for="inputName" class="col-sm-4 col-form-label text-danger">Tanggal Input  </label>
                                <div class="col-sm-8">  
                                    <div class="input-group date" id="datepicker-container">
                                        <input 
                                        wire:model="tglinput"
                                        type="text" class="form-control form-control-sm datepicker" placeholder="Pilih Tanggal" autocomplete="off"
                                        data-provide="datepicker" data-date-autoclose="true" 
                                        data-date-format="yyyy-mm-dd" data-date-today-highlight="true"                        
                                        onchange="this.dispatchEvent(new InputEvent('input'))"
                                        >
                                        <span class="input-group-text"><i class="bi bi-calendar"></i></span>
                                
                                    </div>
                                    @error('tglinput') 
                                    <span class="error text-danger">{{ $message }}</span> 
                                    @enderror
                                </div>
                            </div>
                            <div class="mb-3 row">
                              <label for="alamat" class="col-sm-4 col-form-label">1. Email  </label>
                              <div class="col-sm-8">
                                  <input type="text" class="form-control form-control-sm" wire:model="emailresponden"  >
                                  @error('emailresponden') 
                                    <span class="error text-danger">{{ $message }}</span> 
                                  @enderror
                                    
                                   
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
                                            @error('umurresponden') 
                                                <span class="error text-danger">{{ $message }}</span> 
                                            @enderror
                                    </div>
                            </div>
                            
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6  ">
                        <div class="card text-left">
                          <div class="card-body">
                            
                            <div class="mb-3 row">
                            <label for="alamat" class="col-sm-4 col-form-label">3. Jenis Kelamin</label>
                            <div class="col-sm-8">
                                <select class="form-control form-control-sm" wire:model="jenkelresponden"  >
                                <option value="">Pilih Jenis Kelamin </option>
                                @foreach (App\Models\Refumum::listRef('jenkel') as $jk)
                                    <option value="{{ $jk->kode }}" @if($jk->kode==$jenkelresponden) selected @endif>{{ $jk->kode }}. {{ $jk->nama }}</option>
                                
                                @endforeach
                                
                                </select>
                                @error('jenkelresponden') 
                                            <span class="error text-danger">{{ $message }}</span> 
                                        @enderror
                            </div>
                            </div>
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
                                       @error('pendresponden') 
                                            <span class="error text-danger">{{ $message }}</span> 
                                        @enderror
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
                                      @error('jobresponden') 
                                            <span class="error text-danger">{{ $message }}</span> 
                                        @enderror
                                </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    
                  </div>
                  
            </div>
           
            
            

          </div>

          <div class="modal-footer">
          
              <button  type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
              <button  type="submit" class="btn btn-primary">Save</button>
           
            
          </div>
        </form>
      </div>
    </div>
</div>