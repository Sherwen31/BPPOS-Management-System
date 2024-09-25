<div wire:ignore.self class="modal fade" id="managePosition" tabindex="-1" aria-labelledby="managePositionLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <form action="#" id='addPosition' wire:submit.prevent="createPosition">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="managePositionLabel">Create Position Name</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3 form-floating">
                        <input wire:model='position_name' type="text" style="min-width: 400px;" class="form-control"
                            id="position" name="position" placeholder="Middle Name">
                        @error('position_name')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                        <label for="position_name" class="form-label">Enter Position Name</label>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary btn-sm" id="createPositionBtn">
                        <span wire:loading.remove wire:target='createPosition'>Add position name</span>
                        <span wire:loading wire:target='createPosition'>Adding...</span>
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
