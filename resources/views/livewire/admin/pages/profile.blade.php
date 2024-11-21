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
                                            <select wire:model='rank_id' class="form-select"
                                                aria-label="Default select example" name="rank">
                                                <option selected hidden>Select rank</option>
                                                <option disabled>Select rank</option>
                                                @forelse ($ranks as $rank)
                                                <option value="{{ $rank->id }}">{{ $rank->rank_name }}</option>
                                                @empty
                                                <option>No ranks founded</option>
                                                @endforelse
                                            </select>
                                            @error('rank_id')
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
                                            <label for="age" class="form-label">Age</label>
                                            <input type="number" class="form-control" wire:model='age' id="age"
                                                placeholder="Age">
                                            @error('age')
                                            <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                        <div class="col-md-6">
                                            <label for="civil_status" class="form-label">Civil status</label>
                                            <select wire:model='civil_status' class="form-select">
                                                <option hidden selected>Select Civil Status</option>
                                                <option disabled>Select Civil Status</option>
                                                <option value="Married">Married</option>
                                                <option value="Single">Single</option>
                                                <option value="Widowed">Widowed</option>
                                                <option value="Divorced">Divorced</option>
                                                <option value="Separated">Separated</option>
                                                <option value="Engaged">Engaged</option>
                                                <option value="Not selected">Rather not to say</option>
                                            </select>
                                            @error('civil_status')
                                            <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="row g-3 mb-2">
                                        <div class="col-md-6">
                                            <label for="nationality" class="form-label">Nationality</label>
                                            <input type="text" class="form-control" wire:model='nationality'
                                                id="nationality" placeholder="Nationality">
                                            @error('nationality')
                                            <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                        <div class="col-md-6">
                                            <label for="religion" class="form-label">Religion</label>
                                            <input type="text" class="form-control" id="religion" wire:model='religion'
                                                placeholder="Religion">
                                            @error('religion')
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
                                        <span wire:loading wire:target='updateProfile'><span
                                                class="spinner-border-sm spinner-border"></span> Saving...</span>
                                        <span wire:loading.remove wire:target='updateProfile'><i
                                                class="far fa-save"></i> Save</span>
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-5">
                        <div class="tab-pane fade show active" id="password" role="tabpanel">
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
                                    <button type="button" wire:click.prevent='passwordChange'
                                        wire:loading.attr='disabled' class="btn btn-sm btn-primary">
                                        <span wire:loading wire:target='passwordChange'><span
                                                class="spinner-border-sm spinner-border"></span> Saving...</span>
                                        <span wire:loading.remove wire:target='passwordChange'><i
                                                class="far fa-save"></i> Save</span>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade show active" id="password" role="tabpanel">
                            <h2>Manage Profile Picture</h2>
                            <div class="card mt-3">
                                <div class="card-header d-flex justify-content-between align-items-center">
                                    <h5 class="card-title mb-0 fw-bold">Profile Picture</h5>
                                    <i class="fas fa-image text-primary"></i>
                                </div>
                                <div class="card-body">
                                    <div class="mb-3 d-flex flex-column align-items-center">
                                        <div class="d-flex flex-column align-items-center">
                                            <div class="mb-3 text-center">
                                                @if ($profile_picture)
                                                <img id="profileImagePreview"
                                                    src="{{ $profile_picture->temporaryUrl() }}" alt="Profile Picture"
                                                    class="img-fluid rounded-circle"
                                                    style="width: 150px; height: 150px; object-fit: cover;">
                                                @else
                                                @if (auth()->user()->profile_picture == null)
                                                <img id="profileImagePreview" src="/images/police-512.png"
                                                    alt="Profile Picture" class="img-fluid rounded-circle"
                                                    style="width: 150px; height: 150px; object-fit: cover;">
                                                @else
                                                <img id="profileImagePreview"
                                                    src="{{ Storage::url(auth()->user()->profile_picture) }}"
                                                    alt="Profile Picture" class="img-fluid rounded-circle"
                                                    style="width: 150px; height: 150px; object-fit: cover;">
                                                @endif
                                                @endif
                                            </div>

                                            <input type="file" id="profilePictureInput" style="display: none;"
                                                accept="image/*" wire:model="profile_picture"
                                                onchange="previewImage(event)">
                                            <button type="button" class="btn btn-sm btn-primary mt-2"
                                                onclick="document.getElementById('profilePictureInput').click();">
                                                <i class="fas fa-upload"></i> <span wire:loading.remove
                                                    wire:target='profile_picture'>Upload</span> <span wire:loading
                                                    wire:target='profile_picture'>Uploading...</span>
                                            </button>
                                            @error('profile_picture')
                                            <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>

                                    <button type="button" wire:click.prevent='profilePictureChange'
                                        wire:loading.attr='disabled' class="btn btn-sm btn-primary">
                                        <span wire:loading wire:target='profilePictureChange'><span
                                                class="spinner-border-sm spinner-border"></span> Saving...</span>
                                        <span wire:loading.remove wire:target='profilePictureChange'><i
                                                class="far fa-save"></i> Save</span>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="mb-3">Old Unit Assignments</h4>
                                <div class="d-flex gap-2 align-items-center flex-wrap">
                                    @forelse (auth()->user()->userOldUnits as $oldUnit)
                                    <div>
                                        <span class="badge text-bg-primary px-3 py-2 text-wrap">
                                            {{ $oldUnit->unit_assignment }}
                                        </span> <i class="far fa-arrow-right"></i>
                                    </div>
                                    @empty
                                    <div class="d-flex justify-content-center w-100 align-items-center flex-column">
                                        <p class="fw-bold mb-2"><i class="far fa-xmark-to-slot fs-2"></i></p>
                                        <p class="fw-bold">You don't have any old unit assignments yet.</p>
                                    </div>
                                    @endforelse
                                    @if (auth()->user()->userOldUnits->count() !== 0)
                                    <span class="badge text-bg-info text-white px-3 py-2 text-wrap">
                                        {{ $recentUnit }}
                                    </span>
                                    @endif
                                </div>
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
