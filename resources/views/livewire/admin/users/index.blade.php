<div>
    <div class="containerMod">
        @livewire('components.layouts.sidebar')
        <section class="mainMod">
            <button id="toggle-button">
                <i class="fas fa-bars"></i>
            </button>
            <div class="mainMod-top">
                <h1>User Account Management</h1>
            </div>
            <div class="d-flex justify-content-between">
                <div>
                    <input type="search" wire:model.live.debounce.200ms="search" class="form-control"
                        placeholder="Search...">
                </div>
                <div>
                    <button wire:click='resetData' class="btn mb-2 btn-sm btn-dark" data-bs-toggle="modal"
                        data-bs-target="#createUserModal"><i class="far fa-user-plus"></i> Create User</button>
                </div>
            </div>
            <div class="mainMod-skills">
                <table class="table">
                    <thead class="table-dark">
                        <tr>
                            <th scope="col">Name</th>
                            <th scope="col">Position</th>
                            <th scope="col">Unit Assigned</th>
                            <th scope="col">Rank</th>
                            <th scope="col">Position Duration</th>
                            <th scope="col">Role</th>
                            <th scope="col">Status</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($users as $user)
                        <tr>
                            <td>
                                @if ($user->last_name)
                                {{ $user->last_name }},
                                @endif {{ $user->first_name }} {{ $user->middle_name }}
                                <br>
                                <strong style="font-size: 12px;"><span class="text-muted fst-italic">Username:</span> {{
                                    $user->username }}</strong>
                            </td>
                            <td>
                                {{ $user->position?->position_name }}
                            </td>
                            <td>
                                {{ $user->unit?->unit_assignment }}
                            </td>
                            <td>
                                {{ $user->rank->rank_name }}
                            </td>
                            <td>
                                @php
                                $startDate = \Carbon\Carbon::parse($user->year_attended);
                                $endDate = \Carbon\Carbon::now();

                                $diff = $startDate->diff($endDate);

                                $years = $diff->y;
                                $months = $diff->m;
                                $formattedDifference = $years !== 0 ? "{$years} years and {$months} months" : "{$months}
                                months";
                                @endphp
                                {{ $formattedDifference }}
                            </td>
                            <td>
                                @foreach ($user->roles as $role)
                                @if ($role->name === 'super_admin')
                                <span class="badge bg-primary">Super Admin</span>
                                @elseif ($role->name === 'admin')
                                <span class="badge bg-dark">Admin</span>
                                @else
                                <span class="badge bg-secondary">User</span>
                                @endif
                                @endforeach
                            </td>
                            <td>
                                @if ($user->email_verified_at === null)
                                <span class="badge bg-danger">Unverified</span>
                                @else
                                <span class="badge bg-primary">Verified</span>
                                @endif
                            </td>
                            <td>
                                <div class="d-flex gap-1 flex-wrap">
                                    <button wire:click='manageUser({{ $user->id }})' type="button"
                                        class="btn btn-primary manage-btn btn-sm" data-bs-toggle="modal"
                                        data-bs-target="#manageUserModal{{ $user->id }}">
                                        <i class="far fa-gears"></i> Manage
                                    </button>
                                    <button class="btn btn-danger btn-sm"
                                        wire:confirm='Are you sure you want to delete this user?'
                                        wire:click='deleteUser({{ $user->id }})'><i class="far fa-trash"></i>
                                        Delete</button>
                                    @if ($user->email_verified_at === null)
                                    <button class="btn btn-warning btn-sm"
                                        wire:confirm='Are you sure you want to verify this user?'
                                        wire:click='verified({{ $user->id }})'><i class="far fa-check"></i>
                                        Verify</button>
                                    @endif
                                </div>
                                {{-- Manage Modal --}}
                                <div wire:ignore.self class="modal fade" id="manageUserModal{{ $user->id }}"
                                    tabindex="-1" aria-labelledby="manageUserModal{{ $user->id }}Label"
                                    aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                                        <form wire:confirm="Are you sure you want to update?" id='addUser'
                                            wire:submit.prevent="updateUser">
                                            <div class="modal-content" style="max-height: 500px; overflow: auto;">
                                                <div class="modal-header">
                                                    <h1 class="modal-title fs-5"
                                                        id="manageUserModal{{ $user->id }}Label">Updating {{
                                                        $user->first_name }}'s details
                                                    </h1>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    @if ($userData)
                                                    <div class="d-flex gap-2 align-items-center">
                                                        <div class="mb-3 form-floating">
                                                            <input wire:model='first_name' type="text"
                                                                class="form-control" id="fnameInput"
                                                                placeholder="First Name">
                                                            @error('first_name')
                                                            <small class="text-danger">{{ $message }}</small>
                                                            @enderror
                                                            <label for="fnameInput" class="form-label">First
                                                                Name</label>
                                                        </div>
                                                        <div class="mb-3 form-floating">
                                                            <input wire:model='last_name' type="text"
                                                                class="form-control" id="lnameInput" name="lnameInput"
                                                                placeholder="Last Name">
                                                            @error('last_name')
                                                            <small class="text-danger">{{ $message }}</small>
                                                            @enderror
                                                            <label for="lnameInput" class="form-label">Last Name</label>
                                                        </div>
                                                    </div>
                                                    <div class="mb-3 form-floating">
                                                        <input wire:model='middle_name' type="text" class="form-control"
                                                            id="mnameInput" name="mnameInput" placeholder="Middle Name">
                                                        @error('middle_name')
                                                        <small class="text-danger">{{ $message }}</small>
                                                        @enderror
                                                        <label for="lnameInput" class="form-label">Middle Name
                                                            (Optional)</label>
                                                    </div>
                                                    <div class="mb-3 form-floating">
                                                        <select wire:model='rank_id' class="form-select"
                                                            aria-label="Default select example" name="rank">
                                                            <option selected hidden>Select rank</option>
                                                            <option disabled>Select rank</option>
                                                            @forelse ($ranks as $rank)
                                                            <option value="{{ $rank->id }}">{{ $rank->rank_name }}
                                                            </option>
                                                            @empty
                                                            <option>No ranks founded</option>
                                                            @endforelse
                                                        </select>
                                                        @error('rank_id')
                                                        <small class="text-danger">{{ $message }}</small>
                                                        @enderror
                                                        <label for="formGroupExampleInput" class="form-label">Enter
                                                            Current Rank</label>
                                                    </div>
                                                    <div class="mb-3 form-floating">
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
                                                        <label for="formGroupExampleInput" class="form-label">Enter
                                                            Position *</label>
                                                    </div>
                                                    <div class="mb-3 form-floating">
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
                                                        <label for="formGroupExampleInput" class="form-label">Unit
                                                            Assigned</label>
                                                    </div>
                                                    <div class="mb-3 form-floating">
                                                        <input wire:model='year_attended' type="date"
                                                            class="form-control" id="dateHired" name="dateHired" />
                                                        @error('year_attended')
                                                        <small class="text-danger">{{ $message }}</small>
                                                        @enderror
                                                        <label for="dateHired" class="form-label">Date Hired *</label>
                                                    </div>
                                                    <div class="d-flex gap-2 align-items-center">
                                                        <div class="mb-3 form-floating">
                                                            <input wire:model='police_id' type="text"
                                                                class="form-control" id="police_idInput"
                                                                placeholder="Enter Police id" name="police_idInput">
                                                            @error('police_id')
                                                            <small class="text-danger">{{ $message }}</small>
                                                            @enderror
                                                            <label for="usernameInput" class="form-label">Enter Police
                                                                ID *</label>
                                                        </div>
                                                        <div class="mb-3 form-floating">
                                                            <input wire:model='email' type="email" class="form-control"
                                                                id="emailInput" placeholder="Enter Police id"
                                                                name="emailInput">
                                                            @error('email')
                                                            <small class="text-danger">{{ $message }}</small>
                                                            @enderror
                                                            <label for="usernameInput" class="form-label">Enter Email
                                                                *</label>
                                                        </div>
                                                    </div>
                                                    <div class="d-flex gap-2 align-items-center">
                                                        <div class="mb-3 form-floating">
                                                            <input wire:model='contact_number' type="number"
                                                                class="form-control" id="cnumInput"
                                                                placeholder="Contact Number">
                                                            @error('contact_number')
                                                            <small class="text-danger">{{ $message }}</small>
                                                            @enderror
                                                            <label for="cnumInput" class="form-label">Contact
                                                                Number</label>
                                                        </div>
                                                        <div class="mb-3 form-floating">
                                                            <input wire:model='age' type="number" class="form-control"
                                                                id="lnameInput" name="ageInput" placeholder="Age">
                                                            @error('age')
                                                            <small class="text-danger">{{ $message }}</small>
                                                            @enderror
                                                            <label for="ageInput" class="form-label">Age</label>
                                                        </div>
                                                    </div>
                                                    <div class="d-flex gap-2 align-items-center">
                                                        <div class="mb-3 form-floating">
                                                            <input wire:model='nationality' type="text"
                                                                class="form-control" id="NaInput"
                                                                placeholder="Nationality">
                                                            @error('nationality')
                                                            <small class="text-danger">{{ $message }}</small>
                                                            @enderror
                                                            <label for="NaInput" class="form-label">Nationality</label>
                                                        </div>
                                                        <div class="mb-3 form-floating">
                                                            <input wire:model='religion' type="text"
                                                                class="form-control" id="lnameInput" name="rInput"
                                                                placeholder="Religion">
                                                            @error('religion')
                                                            <small class="text-danger">{{ $message }}</small>
                                                            @enderror
                                                            <label for="rInput" class="form-label">Religion</label>
                                                        </div>
                                                    </div>
                                                    <div class="d-flex gap-2 align-items-center">
                                                        <div class="mb-3 col-6 form-floating">
                                                            <input wire:model='address' type="text" class="form-control"
                                                                id="" placeholder="Address">
                                                            @error('address')
                                                            <small class="text-danger">{{ $message }}</small>
                                                            @enderror
                                                            <label for="" class="form-label">Address</label>
                                                        </div>
                                                        <div class="mb-3 col-6 form-floating">
                                                            <input wire:model='date_of_birth' type="date"
                                                                class="form-control" id="lnameInput" name="rInput"
                                                                placeholder="Date of Birth">
                                                            @error('date_of_birth')
                                                            <small class="text-danger">{{ $message }}</small>
                                                            @enderror
                                                            <label for="rInput" class="form-label">Date of Birth</label>
                                                        </div>
                                                    </div>
                                                    <div class="d-flex gap-2 align-items-center">
                                                        <div class="mb-3 col-6 form-floating">
                                                            <select wire:model='civil_status' class="form-select"
                                                                aria-label="Default select example" name="">
                                                                <option selected hidden>Select Civil Status</option>
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
                                                            <label for="formGroupExampleInput" class="form-label">Select
                                                                Civil Status</label>
                                                        </div>
                                                        <div class="mb-3 col-6 form-floating">
                                                            <select wire:model='gender' class="form-select"
                                                                aria-label="Default select example" name="">
                                                                <option selected hidden>Select Gender</option>
                                                                <option disabled>Select Gender</option>
                                                                <option value="Male">Male</option>
                                                                <option value="Female">Female</option>
                                                                <option value="Not selected">Rather not to say</option>
                                                            </select>
                                                            @error('gender')
                                                            <small class="text-danger">{{ $message }}</small>
                                                            @enderror
                                                            <label for="formGroupExampleInput" class="form-label">Select
                                                                Gender</label>
                                                        </div>
                                                    </div>
                                                    <div class="d-flex gap-2 align-items-center">
                                                        <div class="mb-3 col-6 form-floating">
                                                            <input wire:model='username' type="text"
                                                                class="form-control" id="usernameInput"
                                                                placeholder="Enter Username" name="usernameInput">
                                                            @error('username')
                                                            <small class="text-danger">{{ $message }}</small>
                                                            @enderror
                                                            <label for="usernameInput" class="form-label">Enter Username
                                                                *</label>
                                                        </div>
                                                        <div wire class="mb-3 col-6 form-floating">
                                                            <input wire:model='password' type="password"
                                                                class="form-control" id="passwordInput"
                                                                placeholder="Enter Password" name="passwordInput">
                                                            @error('password')
                                                            <small class="text-danger">{{ $message }}</small>
                                                            @enderror
                                                            <label for="passwordInput" class="form-label">Enter Password
                                                                *</label>
                                                        </div>
                                                    </div>
                                                    @else
                                                    <p class="placeholder-glow" style="width: 460px;">
                                                        <span class="placeholder col-12"></span>
                                                        <span class="placeholder col-4"></span>
                                                        <span class="placeholder col-8"></span>
                                                        <span class="placeholder col-12"></span>
                                                        <span class="placeholder col-13"></span>
                                                        <span class="placeholder col-12"></span>
                                                        <span class="placeholder col-4"></span>
                                                        <span class="placeholder col-8"></span>
                                                        <span class="placeholder col-12"></span>
                                                        <span class="placeholder col-13"></span>
                                                        <span class="placeholder col-12"></span>
                                                        <span class="placeholder col-4"></span>
                                                        <span class="placeholder col-8"></span>
                                                        <span class="placeholder col-12"></span>
                                                        <span class="placeholder col-13"></span>
                                                    </p>
                                                    @endif
                                                </div>
                                                <div class="modal-footer">
                                                    <button wire:click='resetData' class="btn btn-warning btn-sm"
                                                        type="button">Reset</button>
                                                    <button type="button" class="btn btn-secondary btn-sm"
                                                        data-bs-dismiss="modal" wire:click='resetData'>Close</button>
                                                    <button type="submit" class="btn btn-primary btn-sm"
                                                        id="updateUserBtn">
                                                        <span wire:loading.remove wire:target='updateUser'>Update
                                                            user</span>
                                                        <span wire:loading wire:target='updateUser'>Updating...</span>
                                                    </button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </td>

                        </tr>
                        @empty

                        <tr>
                            <td colspan="8">
                                <p class="text-center mt-2"><strong>{{ $search ? 'No "' . $search . '" users found' :
                                        'No users yet' }}</strong></p>
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            {{ $users->links() }}
        </section>
    </div>

    {{-- Create User Modal --}}
    <div wire:ignore.self class="modal fade" id="createUserModal" tabindex="-1" aria-labelledby="createUserModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
            <form action="#" id='addUser' wire:submit.prevent="createUser">
                <div class="modal-content" style="max-height: 500px; overflow: auto;">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="createUserModalLabel">Create User</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="d-flex gap-2 align-items-center">
                            <div class="mb-3 form-floating">
                                <input wire:model='first_name' type="text" class="form-control" id="fnameInput"
                                    placeholder="First Name">
                                @error('first_name')
                                <small class="text-danger">{{ $message }}</small>
                                @enderror
                                <label for="fnameInput" class="form-label">First Name</label>
                            </div>
                            <div class="mb-3 form-floating">
                                <input wire:model='last_name' type="text" class="form-control" id="lnameInput"
                                    name="lnameInput" placeholder="Last Name">
                                @error('last_name')
                                <small class="text-danger">{{ $message }}</small>
                                @enderror
                                <label for="lnameInput" class="form-label">Last Name</label>
                            </div>
                        </div>
                        <div class="mb-3 form-floating">
                            <input wire:model='middle_name' type="text" class="form-control" id="mnameInput"
                                name="mnameInput" placeholder="Middle Name">
                            @error('middle_name')
                            <small class="text-danger">{{ $message }}</small>
                            @enderror
                            <label for="lnameInput" class="form-label">Middle Name (Optional)</label>
                        </div>
                        <div class="mb-3 form-floating">
                            <select wire:model='rank_id' class="form-select" aria-label="Default select example"
                                name="rank">
                                <option selected hidden>Select rank</option>
                                <option disabled>Select rank</option>
                                @forelse ($ranks as $rank)
                                <option value="{{ $rank->id }}">{{ $rank->rank_name }}
                                </option>
                                @empty
                                <option>No ranks founded</option>
                                @endforelse
                            </select>
                            @error('rank_id')
                            <small class="text-danger">{{ $message }}</small>
                            @enderror
                            <label for="formGroupExampleInput" class="form-label">Enter Current Rank</label>
                        </div>
                        <div class="mb-3 form-floating">
                            <select wire:model='position_id' class="form-select" aria-label="Default select example"
                                name="position">
                                <option selected hidden>Select position</option>
                                <option disabled>Select position</option>
                                @forelse ($positions as $position)
                                <option value="{{ $position->id }}">{{ $position->position_name }}</option>
                                @empty
                                <option>No positions founded</option>
                                @endforelse
                            </select>
                            @error('position_id')
                            <small class="text-danger">{{ $message }}</small>
                            @enderror
                            <label for="formGroupExampleInput" class="form-label">Enter Position *</label>
                        </div>
                        <div class="mb-3 form-floating">
                            <select wire:model='unit_id' class="form-select" aria-label="Default select example"
                                name="unit">
                                <option selected hidden>Select unit</option>
                                <option disabled>Select unit</option>
                                @forelse ($units as $unit)
                                <option value="{{ $unit->id }}">{{ $unit->unit_assignment }}</option>
                                @empty
                                <option>No units founded</option>
                                @endforelse
                            </select>
                            @error('unit_id')
                            <small class="text-danger">{{ $message }}</small>
                            @enderror
                            <label for="formGroupExampleInput" class="form-label">Unit Assigned</label>
                        </div>
                        <div class="mb-3 form-floating">
                            <input wire:model='year_attended' type="date" class="form-control" id="dateHired"
                                name="dateHired" />
                            @error('year_attended')
                            <small class="text-danger">{{ $message }}</small>
                            @enderror
                            <label for="dateHired" class="form-label">Date Hired *</label>
                        </div>
                        <div class="d-flex gap-2 align-items-center">
                            <div class="mb-3 form-floating">
                                <input wire:model='police_id' type="text" class="form-control" id="police_idInput"
                                    placeholder="Enter Police id" name="police_idInput">
                                @error('police_id')
                                <small class="text-danger">{{ $message }}</small>
                                @enderror
                                <label for="usernameInput" class="form-label">Enter Police ID *</label>
                            </div>
                            <div class="mb-3 form-floating">
                                <input wire:model='email' type="email" class="form-control" id="emailInput"
                                    placeholder="Enter Police id" name="emailInput">
                                @error('email')
                                <small class="text-danger">{{ $message }}</small>
                                @enderror
                                <label for="usernameInput" class="form-label">Enter Email *</label>
                            </div>
                        </div>
                        <div class="d-flex gap-2 align-items-center">
                            <div class="mb-3 form-floating">
                                <input wire:model='contact_number' type="number" class="form-control" id="cnumInput"
                                    placeholder="Contact Number">
                                @error('contact_number')
                                <small class="text-danger">{{ $message }}</small>
                                @enderror
                                <label for="cnumInput" class="form-label">Contact Number</label>
                            </div>
                            <div class="mb-3 form-floating">
                                <input wire:model='age' type="number" class="form-control" id="ageInput"
                                    name="ageInput" placeholder="Age">
                                @error('age')
                                <small class="text-danger">{{ $message }}</small>
                                @enderror
                                <label for="ageInput" class="form-label">Age</label>
                            </div>
                        </div>
                        <div class="d-flex gap-2 align-items-center">
                            <div class="mb-3 col-6 form-floating">
                                <input wire:model='nationality' type="text" class="form-control" id="NaInput"
                                    placeholder="Nationality">
                                @error('nationality')
                                <small class="text-danger">{{ $message }}</small>
                                @enderror
                                <label for="NaInput" class="form-label">Nationality</label>
                            </div>
                            <div class="mb-3 col-6 form-floating">
                                <input wire:model='religion' type="text" class="form-control" id="rInput"
                                    name="rInput" placeholder="Religion">
                                @error('religion')
                                <small class="text-danger">{{ $message }}</small>
                                @enderror
                                <label for="rInput" class="form-label">Religion</label>
                            </div>
                        </div>
                        <div class="d-flex gap-2 align-items-center">
                            <div class="mb-3 col-6 form-floating">
                                <input wire:model='address' type="text" class="form-control" id="Add"
                                    placeholder="Address">
                                @error('address')
                                <small class="text-danger">{{ $message }}</small>
                                @enderror
                                <label for="Add" class="form-label">Address</label>
                            </div>
                            <div class="mb-3 col-6 form-floating">
                                <input wire:model='date_of_birth' type="date" class="form-control" id="dateInPut"
                                    name="dateInPut" placeholder="Date of Birth">
                                @error('date_of_birth')
                                <small class="text-danger">{{ $message }}</small>
                                @enderror
                                <label for="dateInPut" class="form-label">Date of Birth</label>
                            </div>
                        </div>
                        <div class="d-flex gap-2 align-items-center">
                            <div class="mb-3 col-6 form-floating">
                                <select wire:model='civil_status' class="form-select"
                                    aria-label="Default select example" name="">
                                    <option selected hidden>Select Civil Status</option>
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
                                <label for="formGroupExampleInput" class="form-label">Select Civil Status</label>
                            </div>
                            <div class="mb-3 col-6 form-floating">
                                <select wire:model='gender' class="form-select" aria-label="Default select example"
                                    name="">
                                    <option selected hidden>Select Gender</option>
                                    <option disabled>Select Gender</option>
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                    <option value="Not selected">Rather not to say</option>
                                </select>
                                @error('gender')
                                <small class="text-danger">{{ $message }}</small>
                                @enderror
                                <label for="formGroupExampleInput" class="form-label">Select Gender</label>
                            </div>
                        </div>
                        <div class="d-flex gap-2 align-items-center">
                            <div class="mb-3 col-6 form-floating">
                                <input wire:model='username' type="text" class="form-control" id="usernameInput"
                                    placeholder="Enter Username" name="usernameInput">
                                @error('username')
                                <small class="text-danger">{{ $message }}</small>
                                @enderror
                                <label for="usernameInput" class="form-label">Enter Username *</label>
                            </div>
                            <div wire class="mb-3 col-6 form-floating">
                                <input wire:model='password' disabled readonly type="password" class="form-control" id="passwordInput"
                                    placeholder="Enter Password" name="passwordInput">
                                @error('password')
                                <small class="text-danger">{{ $message }}</small>
                                @enderror
                                <label for="passwordInput" class="form-label">Enter Password *</label>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button wire:click='resetData' class="btn btn-warning btn-sm" type="button">Reset</button>
                        <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal"
                            wire:click='resetData'>Close</button>
                        <button type="submit" class="btn btn-primary btn-sm" id="createUserBtn">
                            <span wire:loading.remove wire:target='createUser'>Add user</span>
                            <span wire:loading wire:target='createUser'>Adding...</span>
                        </button>
                    </div>
                </div>
            </form>
        </div>
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
            @this.on('closeModal', (data) => {
                const eventData = Array.isArray(data) ? data[0] : data;
                $('#createUserModal').modal('hide');
                $(`#manageUserModal${eventData.userId}`).modal('hide');

                document.getElementById('createUserModal').classList.remove('show');
                document.getElementById(`#manageUserModal${eventData.userId}`).classList.remove('show');
            });
        });
    </script>
</div>
