<div>
    <div class="input-group date" id="datepicker-container">
        <input type="text" id="datepicker" class="form-control" wire:model="date" placeholder="Pilih tanggal">
        <span class="input-group-text"><i class="bi bi-calendar"></i></span>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            $('#datepicker').datepicker({
                format: 'yyyy-mm-dd',
                autoclose: true
            }).on('changeDate', function(e) {
                @this.set('date', e.format(0)); // Sync with Livewire
            });
        });
    </script>
</div>
