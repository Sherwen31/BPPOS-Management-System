<div>
    <div class="containerMod">
        @livewire('components.layouts.sidebar')
        @include('livewire.super-admin.unit-and-position.add-position-modal')
        @include('livewire.super-admin.unit-and-position.add-unit-modal')
        @include('livewire.super-admin.unit-and-position.edit-position-modal')
        @include('livewire.super-admin.unit-and-position.edit-unit-modal')
        <section class="mainMod">
            <button id="toggle-button">
                <i class="fas fa-bars"></i>
            </button>
            <div class="mainMod-top">
                <h1>Unit and Position Management</h1>
            </div>
            <div class="mainMod-skills">
                <div class="container-fluid">
                    <div class="d-flex gap-2">
                        <div class="col-md-6 col-sm-12">
                            <div class="table-responsive" style="height: 480px;">
                                <div class="manageUnit float-end">
                                    <button class="btn mb-2 btn-dark rounded btn-sm" data-bs-toggle="modal"
                                        data-bs-target="#manageUnit"><i class="far fa-plus"></i>
                                        Add</button>
                                </div>
                                <table class="table table-hover">
                                    <thead class="table-dark">
                                        <tr>
                                            <th scope="col">ID</th>
                                            <th scope="col">Unit assignments</th>
                                            <th scope="col">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($units as $unit)
                                        <tr wire:key="{{$unit->id}}">
                                            <td>{{ $unit->id }}</td>
                                            <td>{{ $unit->unit_assignment }}</td>
                                            <td>
                                                <div class="d-flex gap-1">
                                                    <button class="btn btn-primary btn-sm" data-bs-toggle="modal"
                                                        data-bs-target="#editUnit"
                                                        wire:click='editUnit({{ $unit->id }})'><i
                                                            class="far fa-pen-to-square"></i></button>
                                                    <button class="btn btn-danger btn-sm"
                                                        wire:click="deleteUnit({{ $unit->id }})"
                                                        wire:confirm="Are you sure you want to delete this unit assignment?">
                                                        <span class="spinner-border spinner-border-sm"
                                                            wire:target='deleteUnit({{ $unit->id }})'
                                                            wire:loading></span>
                                                        <i class="far fa-trash"
                                                            wire:target='deleteUnit({{ $unit->id }})'
                                                            wire:loading.remove></i>
                                                    </button>
                                                </div>
                                            </td>
                                        </tr>
                                        @empty
                                        <tr>
                                            <td colspan="3" class="text-center">No unit assignment found</td>
                                        </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                            {{ $units->links('', ['pageName' => 'unitPage']) }}
                        </div>
                        <div class="col-md-6 col-sm-12">
                            <div class="table-responsive" style="height: 480px;">
                                <div class="managePosition float-end"><button class="btn mb-2 btn-dark rounded btn-sm"
                                        data-bs-toggle="modal" data-bs-target="#managePosition"><i
                                            class="far fa-plus"></i>
                                        Add</button></div>
                                <table class="table table-hover">
                                    <thead class="table-dark">
                                        <tr>
                                            <th scope="col">ID</th>
                                            <th scope="col">Position name</th>
                                            <th scope="col">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($positions as $position)
                                        <tr wire:key="{{$position->id}}">
                                            <td>{{ $position->id }}</td>
                                            <td>{{ $position->position_name }}</td>
                                            <td>
                                                <div class="d-flex gap-1">
                                                    <button class="btn btn-primary btn-sm" data-bs-toggle="modal"
                                                        data-bs-target="#editPosition"
                                                        wire:click='editPosition({{ $position->id }})'><i
                                                            class="far fa-pen-to-square"></i></button>
                                                    <button class="btn btn-danger btn-sm"
                                                        wire:click="deletePosition({{ $position->id }})"
                                                        wire:confirm="Are you sure you want to delete this position name?">
                                                        <span class="spinner-border spinner-border-sm"
                                                            wire:target='deletePosition({{ $position->id }})'
                                                            wire:loading></span>
                                                        <i class="far fa-trash"
                                                            wire:target='deletePosition({{ $position->id }})'
                                                            wire:loading.remove></i>
                                                    </button>
                                                </div>
                                            </td>
                                        </tr>
                                        @empty
                                        <tr>
                                            <td colspan="3" class="text-center">No position name found</td>
                                        </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                            {{ $positions->links('', ['pageName' => 'positionPage']) }}
                        </div>
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
                $('#managePosition').modal('hide');
                $('#manageUnit').modal('hide');
                $('#editUnit').modal('hide');
                $('#editPosition').modal('hide');

                document.getElementById('managePosition').classList.remove('show');
                document.getElementById('manageUnit').classList.remove('show');
                document.getElementById('editUnit').classList.remove('show');
                document.getElementById('editPosition').classList.remove('show');
            });

            $('#editPosition').on('hidden.bs.modal', function () {
                @this.dispatch('resetData');
            });

            $('#editUnit').on('hidden.bs.modal', function () {
                @this.dispatch('resetData');
            });
        });
    </script>

</div>
