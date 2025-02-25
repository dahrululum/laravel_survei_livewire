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
              <h6 class="border-bottom border-1 border-dark w-25 mb-4">Profil Responden</h6> 
              <div class="form-group row mb-2">
                <label for="inputName" class="col-sm-2 col-form-label text-danger">Tanggal Input</label>
                <div class="col-sm-4">  
                   @livewire('datepicker')

                </div>
              </div>
              
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