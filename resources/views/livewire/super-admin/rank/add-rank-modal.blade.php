<div wire:ignore.self class="modal fade" id="manageRank" tabindex="-1" aria-labelledby="manageRankLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <form action="#" id='addRank' wire:submit.prevent="createRank">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="manageRankLabel">Create Rank Name</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3 form-floating">
                        <input wire:model='rank_name' type="text" style="min-width: 400px;" class="form-control"
                            id="rank" name="rank" placeholder="Middle Name">
                        @error('rank_name')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                        <label for="rank_name" class="form-label">Enter Rank Name</label>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary btn-sm" id="createRankBtn">
                        <span wire:loading.remove wire:target='createRank'>Add rank name</span>
                        <span wire:loading wire:target='createRank'>Adding...</span>
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
