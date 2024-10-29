<div wire:ignore.self class="modal fade" id="editRank" tabindex="-1" aria-labelledby="editRankLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <form action="#" id='addRank' wire:submit.prevent="updateRank"
            wire:confirm='Are you sure you want to update this rank name?'>
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="editRankLabel">Updating Rank Name</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    @if ($rank)
                    <div class="mb-3 form-floating">
                        <input wire:model='rank_name' type="text" style="min-width: 400px;" class="form-control"
                            id="rank" name="rank" placeholder="Middle Name">
                        @error('rank_name')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                        <label for="rank_name" class="form-label">Enter Rank Name</label>
                    </div>
                    @else
                    <p class="placeholder-glow" style="min-width: 400px;">
                        <span class="placeholder col-12" style="height: 55px;"></span>
                    </p>
                    @endif
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary btn-sm" id="updateRankBtn">
                        <span wire:loading.remove wire:target='updateRank'>Update rank name</span>
                        <span wire:loading wire:target='updateRank'>Updating...</span>
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
