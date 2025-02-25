<div>
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
