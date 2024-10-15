<div>
    <div class="containerMod">
        @livewire('components.layouts.sidebar')
        <div class="mainMod">
            <button id="toggle-button">
                <i class="fas fa-bars"></i>
            </button>
            <div class="container-fluid">
                <div class="tab-content row" id="nav-tabContent">
                    <div class="tab-pane fade show active col-md-7" id="account" role="tabpanel">
                        <h2>Manage Account Details</h2>
                        <div class="card mt-3">
                            <div class="card-header d-flex justify-content-between align-items-center">
                                <h5 class="card-title mb-0 fw-bold">Private info</h5>
                                <div>
                                    <i class="fas fa-shield-check text-primary"></i>
                                </div>
                            </div>
                            <div class="card-body">
                                <form>
                                    <div class="row g-3 mb-2">
                                        <div class="col-md-6">
                                            <label for="last_name" class="form-label">Last name</label>
                                            <input type="text" class="form-control" wire:model='last_name'
                                                id="last_name" placeholder="Last name">
                                            @error('last_name')
                                            <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                        <div class="col-md-6">
                                            <label for="first_name" class="form-label">First name</label>
                                            <input type="text" class="form-control" wire:model='first_name'
                                                id="first_name" placeholder="First name">
                                            @error('first_name')
                                            <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="row g-3 mb-2">
                                        <div class="col-md-6">
                                            <label for="middle_name" class="form-label">Middle name
                                                (optional)</label>
                                            <input type="text" class="form-control" wire:model='middle_name'
                                                id="middle_name" placeholder="Middle name (optional)">
                                            @error('middle_name')
                                            <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                        <div class="col-md-6">
                                            <label for="address" class="form-label">Address</label>
                                            <input type="text" class="form-control" id="address" wire:model='address'
                                                placeholder="Address">
                                            @error('address')
                                            <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="row g-3 mb-2">
                                        <div class="col-md-6">
                                            <label for="year_attended" class="form-label">Year Attended</label>
                                            <input type="date" class="form-control" id="year_attended"
                                                wire:model='year_attended'>
                                            @error('year_attended')
                                            <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                        <div class="col-md-6">
                                            <label for="date_of_birth" class="form-label">Date of birth</label>
                                            <input type="date" class="form-control" id="date_of_birth"
                                                wire:model='date_of_birth'>
                                            @error('date_of_birth')
                                            <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="row g-3 mb-2">
                                        <div class="col-md-6">
                                            <label for="police_id" class="form-label">Police ID</label>
                                            <input type="text" class="form-control" wire:model='police_id'
                                                id="police_id" placeholder="Police ID">
                                            @error('police_id')
                                            <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                        <div class="col-md-6">
                                            <label for="contact_number" class="form-label">Contact number</label>
                                            <input type="number" class="form-control" id="contact_number"
                                                wire:model='contact_number' placeholder="Contact number">
                                            @error('contact_number')
                                            <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="row g-3 mb-2">
                                        <div class="col-md-6">
                                            <label for="rank" class="form-label">Rank</label>
                                            <select wire:model='rank' class="form-select"
                                                aria-label="Default select example" name="rank">
                                                <option selected hidden>Select rank</option>
                                                <option disabled>Select rank</option>
                                                <option value="Constable">Constable</option>
                                                <option value="Police Executive Master Sergeant">Police
                                                    Executive Master Sergeant</option>
                                                <option value="Police Executive Major">Police Executive
                                                    Major</option>
                                                <option value="Director-General">Director-General</option>
                                                <option value="Police Officer">Police Officer</option>
                                                <option value="Sergeant">Sergeant</option>
                                                <option value="Lieutenant">Lieutenant</option>
                                                <option value="Captain">Captain</option>
                                                <option value="Major">Major</option>
                                                <option value="Colonel">Colonel</option>
                                                <option value="Assistant Chief">Assistant Chief</option>
                                                <option value="Deputy Chief">Deputy Chief</option>
                                                <option value="Chief">Chief</option>
                                                <option value="Commissioner">Commissioner</option>
                                                <option value="Superintendent">Superintendent</option>
                                                <option value="Inspector">Inspector</option>
                                                <option value="Chief Superintendent">Chief Superintendent
                                                </option>
                                                <option value="Director">Director</option>
                                                <option value="Assistant Commissioner">Assistant
                                                    Commissioner</option>
                                                <option value="Deputy Commissioner">Deputy Commissioner
                                                </option>
                                                <option value="Chief Commissioner">Chief Commissioner
                                                </option>
                                                <option value="Chief Constable">Chief Constable</option>
                                                <option value="Chief of Police">Chief of Police</option>
                                            </select>
                                            @error('rank')
                                            <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                        <div class="col-md-6">
                                            <label for="position" class="form-label">Position</label>
                                            <select wire:model='position_id' class="form-select"
                                                aria-label="Default select example" name="position">
                                                <option selected hidden>Select position</option>
                                                <option disabled>Select position</option>
                                                @forelse ($positions as $position)
                                                <option value="{{ $position->id }}">{{
                                                    $position->position_name }}</option>
                                                @empty
                                                <option>No positions founded</option>
                                                @endforelse
                                            </select>
                                            @error('position_id')
                                            <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="row g-3 mb-2">
                                        <div class="col-md-6">
                                            <label for="unit_id" class="form-label">Unit</label>
                                            <select wire:model='unit_id' class="form-select"
                                                aria-label="Default select example" name="unit">
                                                <option selected hidden>Select unit</option>
                                                <option disabled>Select unit</option>
                                                @forelse ($units as $unit)
                                                <option value="{{ $unit->id }}">{{ $unit->unit_assignment }}
                                                </option>
                                                @empty
                                                <option>No units founded</option>
                                                @endforelse
                                            </select>
                                            @error('unit_id')
                                            <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                        <div class="col-md-6">
                                            <label for="gender" class="form-label">Gender</label>
                                            <select wire:model='gender' class="form-select">
                                                <option hidden selected>Select gender</option>
                                                <option disabled>Select gender</option>
                                                <option value="Male">Male</option>
                                                <option value="Female">Female</option>
                                                <option value="Not selected">Rather not to say</option>
                                            </select>
                                            @error('gender')
                                            <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="row g-3 mb-2">
                                        <div class="col-md-6">
                                            <label for="username" class="form-label">Username</label>
                                            <input type="text" class="form-control" wire:model='username' id="username"
                                                placeholder="Username">
                                            @error('username')
                                            <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                        <div class="col-md-6">
                                            <label for="email" class="form-label">Email</label>
                                            <input type="email" class="form-control" id="email" wire:model='email'
                                                placeholder="Email">
                                            @error('email')
                                            <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>
                                    <button type="button" wire:loading.attr='disabled' wire:click='updateProfile'
                                        class="btn btn-sm btn-primary mt-3">
                                        <span wire:loading wire:target='updateProfile'><span class="spinner-border-sm spinner-border"></span> Saving...</span>
                                        <span wire:loading.remove wire:target='updateProfile'><i class="far fa-save"></i> Save</span>
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade show active col-md-5" id="password" role="tabpanel">
                        <h2>Manage Password</h2>
                        <div class="card mt-3">
                            <div class="card-header d-flex justify-content-between align-items-center">
                                <h5 class="card-title mb-0 fw-bold">Password</h5>
                                <i class="fas fa-lock-keyhole text-primary"></i>
                            </div>
                            <div class="card-body">
                                <div class="mb-3">
                                    <label for="current_password" class="form-label">Current password</label>
                                    <input type="password" class="form-control" id="current_password"
                                        wire:model='current_password'>
                                    {{-- <small><a href="#">Forgot your password?</a></small> --}}
                                    @error('current_password')
                                    <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="new_password" class="form-label">New password</label>
                                    <input type="password" class="form-control" id="new_password"
                                        wire:model='new_password'>
                                    @error('new_password')
                                    <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="new_password_confirmation" class="form-label">Verify
                                        password</label>
                                    <input type="password" class="form-control" id="new_password_confirmation"
                                        wire:model='new_password_confirmation'>
                                    @error('new_password_confirmation')
                                    <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <button type="button" wire:click.prevent='passwordChange' wire:loading.attr='disabled'
                                    class="btn btn-sm btn-primary">
                                    <span wire:loading wire:target='passwordChange'><span class="spinner-border-sm spinner-border"></span> Saving...</span>
                                    <span wire:loading.remove wire:target='passwordChange'><i class="far fa-save"></i> Save</span>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <style>
        /* Style the active list group item */
        .list-group-item.active {
            background-color: #434b57 !important;
            color: #fff;
            border-color: white !important;
        }
    </style>

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
</div>
