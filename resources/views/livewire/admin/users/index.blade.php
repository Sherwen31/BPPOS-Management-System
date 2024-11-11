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
                                    <button wire:click='viewUser({{ $user->id }})' type="button"
                                        class="btn btn-info text-light manage-btn btn-sm" data-bs-toggle="modal"
                                        data-bs-target="#viewUserModal">
                                        <i class="far fa-eye"></i> View
                                    </button>
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
                                                    @if ($viewUserData)
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

    {{-- View User Modal --}}
    <div wire:ignore.self class="modal fade" id="viewUserModal" tabindex="-1" aria-labelledby="viewUserModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    @if ($viewUserData)
                    <h5 class="modal-title">{{ $viewUserData?->first_name }} {{ $viewUserData?->last_name }}&apos;s
                        informantion
                    </h5>
                    @else

                    <p class="placeholder-glow" style="width: 460px;">
                        <span class="placeholder col-12"></span>
                    </p>
                    @endif
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body p-0">
                    @if ($viewUserData)
                    <div class="container p-0" style="overflow-y: auto; overflow-x: hidden;">
                        <div class="row justify-content-center">
                            <div class="layout-top-spacing">
                                <!-- User Profile Card -->
                                <div class="card shadow-sm">
                                    <div class="card-body" style="overflow-y: auto; overflow-x: hidden;">

                                        <!-- Profile Picture and Name -->
                                        <div class="text-center mb-4">
                                            @if ($viewUserData?->profile_picture === null)
                                            <img src="/images/police-512.png" alt="Profile Photo" id="profileImg"
                                                class="img-fluid rounded-circle" style="max-width: 150px;">>
                                            @else
                                            <img src="{{ Storage::url($viewUserData?->profile_picture) }}"
                                                alt="Profile Photo" id="profileImg" class="img-fluid rounded-circle"
                                                style="max-width: 150px;">
                                            @endif
                                            <p class="mt-3 mb-0 h5">{{ $viewUserData?->first_name ?: 'N/A' }} {{
                                                $viewUserData?->last_name ?: 'N/A' }}@if ($viewUserData->middle_name !== null)
                                                , {{ $viewUserData->middle_name ?: 'N/A' }} @if ($viewUserData->email_verified_at
                                                !== null)
                                                <i class="fas fa-badge-check text-primary"></i>
                                                @endif
                                                @endif
                                            </p>
                                            <p><strong>
                                                    {{ $viewUserData?->username ?: 'N/A' }}
                                                </strong></p>
                                            <p><strong>
                                                    {{ $viewUserData?->police_id ?: 'N/A' }}
                                                </strong></p>
                                        </div>

                                        <!-- User Information List -->
                                        <div class="user-info-list">
                                            <ul class="list-unstyled">
                                                <li class="mb-3 d-flex align-items-center">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                        viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                        class="feather feather-coffee me-3">
                                                        <path d="M18 8h1a4 4 0 0 1 0 8h-1"></path>
                                                        <path d="M2 8h16v9a4 4 0 0 1-4 4H6a4 4 0 0 1-4-4V8z"></path>
                                                        <line x1="6" y1="1" x2="6" y2="4"></line>
                                                        <line x1="10" y1="1" x2="10" y2="4"></line>
                                                        <line x1="14" y1="1" x2="14" y2="4"></line>
                                                    </svg>
                                                    <span>
                                                        @foreach ($viewUserData?->roles as $role)
                                                        @if ($role?->name === 'super_admin')
                                                        <span class="badge bg-primary">Super Admin</span>
                                                        @elseif ($role?->name === 'admin')
                                                        <span class="badge bg-dark">Admin</span>
                                                        @else
                                                        <span class="badge bg-secondary">User</span>
                                                        @endif
                                                        @endforeach</span>
                                                </li>
                                                <!-- Date of Birth -->
                                                <li class="mb-3 d-flex align-items-center">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                        viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                        class="feather feather-calendar me-3">
                                                        <rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect>
                                                        <line x1="16" y1="2" x2="16" y2="6"></line>
                                                        <line x1="8" y1="2" x2="8" y2="6"></line>
                                                        <line x1="3" y1="10" x2="21" y2="10"></line>
                                                    </svg>
                                                    <span>{{
                                                        \Carbon\Carbon::parse($viewUserData?->date_of_birth)->format('F
                                                        j, Y') ?: 'N/A' }}</span>
                                                </li>
                                                <!-- Location -->
                                                <li class="mb-3 d-flex align-items-center">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                        viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                        class="feather feather-map-pin me-3">
                                                        <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path>
                                                        <circle cx="12" cy="10" r="3"></circle>
                                                    </svg>
                                                    <span>{{ $viewUserData?->address ?: 'N/A' }}</span>
                                                </li>
                                                <!-- Email -->
                                                <li class="mb-3 d-flex align-items-center">
                                                    <a href="mailto:{{ $viewUserData?->email }}"
                                                        class="text-decoration-none text-dark">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                            viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                            stroke-width="2" stroke-linecap="round"
                                                            stroke-linejoin="round" class="feather feather-mail me-3">
                                                            <path
                                                                d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z">
                                                            </path>
                                                            <polyline points="22,6 12,13 2,6"></polyline>
                                                        </svg>
                                                        <span>{{ $viewUserData?->email ?: 'N/A' }}</span>
                                                    </a>
                                                </li>
                                                <!-- Phone -->
                                                <li class="mb-3 d-flex align-items-center">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                        viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                        class="feather feather-phone me-3">
                                                        <path
                                                            d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z">
                                                        </path>
                                                    </svg>
                                                    <span>{{ $viewUserData?->contact_number ?: 'N/A' }}</span>
                                                </li>
                                                <!-- Age -->
                                                <li class="mb-3 d-flex align-items-center">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                        viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                        class="feather feather-calendar me-3">
                                                        <rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect>
                                                        <line x1="16" y1="2" x2="16" y2="6"></line>
                                                        <line x1="8" y1="2" x2="8" y2="6"></line>
                                                        <line x1="3" y1="10" x2="21" y2="10"></line>
                                                    </svg>
                                                    <span>
                                                        @if ($viewUserData?->age)
                                                        {{ $viewUserData?->age }} years old
                                                        @else
                                                        N/A
                                                        @endif
                                                    </span>
                                                </li>

                                                <!-- Position -->
                                                <li class="mb-3 d-flex align-items-center">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                        viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                        class="feather feather-briefcase me-3">
                                                        <path
                                                            d="M21 4h-2V2H5v2H3c-1.1 0-1.99.9-1.99 2L1 20c0 1.1.89 2 1.99 2H21c1.1 0 1.99-.9 1.99-2L23 6c0-1.1-.89-2-1.99-2zM5 4h14v2H5V4z">
                                                        </path>
                                                    </svg>
                                                    <span>{{ $viewUserData?->position?->position_name ?: 'N/A' }}</span>
                                                </li>

                                                <!-- Unit Assign -->
                                                <li class="mb-3 d-flex align-items-center">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                        viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                        class="feather feather-map-pin me-3">
                                                        <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path>
                                                        <circle cx="12" cy="10" r="3"></circle>
                                                    </svg>
                                                    <span>{{ $viewUserData?->unit?->unit_assignment ?: 'N/A' }}</span>
                                                </li>

                                                <!-- Rank -->
                                                <li class="mb-3 d-flex align-items-center">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                        viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                        class="feather feather-award me-3">
                                                        <circle cx="12" cy="8" r="4"></circle>
                                                        <path d="M12 12l3 3h-6z"></path>
                                                        <path d="M12 12v8"></path>
                                                    </svg>
                                                    <span>{{ $viewUserData?->rank?->rank_name ?: 'N/A' }}</span>
                                                </li>

                                                <!-- Year Attended -->
                                                <li class="mb-3 d-flex align-items-center">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                        viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                        class="feather feather-calendar me-3">
                                                        <rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect>
                                                        <line x1="16" y1="2" x2="16" y2="6"></line>
                                                        <line x1="8" y1="2" x2="8" y2="6"></line>
                                                        <line x1="3" y1="10" x2="21" y2="10"></line>
                                                    </svg>
                                                    <span>
                                                        @php
                                                        $startDate = \Carbon\Carbon::parse($user->year_attended);
                                                        $endDate = \Carbon\Carbon::now();

                                                        $diff = $startDate->diff($endDate);

                                                        $years = $diff->y;
                                                        $months = $diff->m;
                                                        $formattedDifference = $years !== 0 ? "{$years} years and
                                                        {$months} months" : "{$months}
                                                        months";
                                                        @endphp
                                                        {{ $formattedDifference }} - <strong>Position Duration</strong>
                                                    </span>
                                                </li>

                                                <!-- Nationality -->
                                                <li class="mb-3 d-flex align-items-center">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                        viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                        class="feather feather-globe me-3">
                                                        <circle cx="12" cy="12" r="10"></circle>
                                                        <line x1="2" y1="12" x2="22" y2="12"></line>
                                                        <line x1="12" y1="2" x2="12" y2="22"></line>
                                                    </svg>
                                                    <span>{{ $viewUserData?->nationality ?: 'N/A' }}</span>
                                                </li>

                                                <!-- Religion -->
                                                <li class="mb-3 d-flex align-items-center">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                        viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                        class="feather feather-heart me-3">
                                                        <path
                                                            d="M12 21.35l-1.45-1.32C5.4 15.36 2 12.28 2 8.5 2 5.42 4.42 3 7.5 3c1.74 0 3.41.81 4.5 2.09C13.09 3.81 14.76 3 16.5 3 19.58 3 22 5.42 22 8.5c0 3.78-3.4 6.86-8.55 11.54L12 21.35z">
                                                        </path>
                                                    </svg>
                                                    <span>{{ $viewUserData?->religion ?: 'N/A' }}</span>
                                                </li>

                                                <!-- Civil Status -->
                                                <li class="mb-3 d-flex align-items-center">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                        viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                        class="feather feather-users me-3">
                                                        <path
                                                            d="M5.2 5c0-1.1.9-2 2-2h9.6c1.1 0 2 .9 2 2v14c0 1.1-.9 2-2 2H7.2c-1.1 0-2-.9-2-2V5zm0 2v12h13V7H5.2z">
                                                        </path>
                                                    </svg>
                                                    <span>{{ $viewUserData?->civil_status ?: 'N/A' }}</span>
                                                </li>

                                                <!-- Gender -->
                                                <li class="mb-3 d-flex align-items-center">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                        viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                        class="feather feather-male me-3">
                                                        <circle cx="12" cy="12" r="10"></circle>
                                                        <line x1="12" y1="2" x2="12" y2="12"></line>
                                                        <line x1="12" y1="12" x2="16" y2="16"></line>
                                                    </svg>
                                                    <span>{{ $viewUserData?->gender ?: 'N/A' }}</span>
                                                </li>
                                            </ul>


                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @else
                    <p class="placeholder-glow m-3" style="width: 460px;">
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
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
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
                                <input wire:model='age' type="number" class="form-control" id="ageInput" name="ageInput"
                                    placeholder="Age">
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
                                <input wire:model='religion' type="text" class="form-control" id="rInput" name="rInput"
                                    placeholder="Religion">
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
                                <input wire:model='password' disabled readonly type="password" class="form-control"
                                    id="passwordInput" placeholder="Enter Password" name="passwordInput">
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
