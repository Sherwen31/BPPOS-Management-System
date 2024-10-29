<div>
    <div class="containerMod">
        @livewire('components.layouts.sidebar')
        @include('livewire.super-admin.rank.add-rank-modal')
        @include('livewire.super-admin.rank.edit-rank-modal')
        <section class="mainMod">
            <button id="toggle-button">
                <i class="fas fa-bars"></i>
            </button>
            <div class="mainMod-top">
                <h1>Unit and Rank Management</h1>
            </div>
            <div class="mainMod-skills">
                <div class="container-fluid">
                    <div class="col-md-6 col-sm-12">
                        <div class="table-responsive" style="height: 480px;">
                            <div class="manageRank float-end"><button class="btn mb-2 btn-dark rounded btn-sm"
                                    data-bs-toggle="modal" data-bs-target="#manageRank"><i class="far fa-plus"></i>
                                    Add</button></div>
                            <table class="table table-hover">
                                <thead class="table-dark">
                                    <tr>
                                        <th scope="col">ID</th>
                                        <th scope="col">Rank name</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($ranks as $rank)
                                    <tr wire:key="{{$rank->id}}">
                                        <td>{{ $rank->id }}</td>
                                        <td>{{ $rank->rank_name }}</td>
                                        <td>
                                            <div class="d-flex gap-1">
                                                <button class="btn btn-primary btn-sm" data-bs-toggle="modal"
                                                    data-bs-target="#editRank" wire:click='editRank({{ $rank->id }})'><i
                                                        class="far fa-pen-to-square"></i></button>
                                                <button class="btn btn-danger btn-sm"
                                                    wire:click="deleteRank({{ $rank->id }})"
                                                    wire:confirm="Are you sure you want to delete this rank name?">
                                                    <span class="spinner-border spinner-border-sm"
                                                        wire:target='deleteRank({{ $rank->id }})' wire:loading></span>
                                                    <i class="far fa-trash" wire:target='deleteRank({{ $rank->id }})'
                                                        wire:loading.remove></i>
                                                </button>
                                            </div>
                                        </td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td colspan="3" class="text-center">No rank name found</td>
                                    </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                        {{ $ranks->links() }}
                    </div>
                </div>
            </div>
        </section>
    </div>

    <script>
        document.addEventListener('livewire:navigated', ()=>{

            @this.on('toastr', (event) => {
                const data=event
                toastr[data[0].type](data[0].message, '', {
                closeButton: true,
                "progressBar": true,
                });
            })
        })
    </script>

    <script>
        document.addEventListener('livewire:navigated', function () {
            @this.on('closeModal', () => {
                $('#manageRank').modal('hide');
                $('#editRank').modal('hide');

                document.getElementById('manageRank').classList.remove('show');
                document.getElementById('editRank').classList.remove('show');
            });

            $('#editRank').on('hidden.bs.modal', function () {
                @this.dispatch('resetData');
            });
        });
    </script>

</div>
