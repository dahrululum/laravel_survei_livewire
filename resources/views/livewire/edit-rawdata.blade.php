<!-- Modal -->
<div wire:ignore.self class="modal fade" id="editRawmodal" tabindex="-1" aria-labelledby="editRawmodalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="editRawmodalLabel">{{ $formtitle }}  ::  </h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form action="">
          
        </form>
        <div class="modal-body">
          ...
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
      </div>
    </div>
</div>