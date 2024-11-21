<div>
    <div class="containerMod">
        @livewire('components.layouts.user-sidebar')
        <div class="mainMod" style="padding: 0;">
            <div class="sec">
                <div class="btn-toggle">
                    <button id="toggle-button">
                        <i class="fas fa-bars"></i>
                    </button>
                    <div class="header-title">
                        <h4><strong>BPPO-Police Scorecard Management System</strong></h4>
                    </div>
                </div>
                <div class="mainAccountManagement">
                    <div class="account">
                        <div class="account-title">
                            <h1 class="text-center"><strong>ACCOUNT MANAGEMENT</strong></h1>
                        </div>
                        <div class="account-form" style="width: 600px;">
                            <form action="" wire:submit.prevent='passwordChange'>
                                <div class="profile-container">
                                    <div class="profile-photo">
                                        @if ($profile_picture)
                                        <img src="{{ $profile_picture->temporaryUrl() }}" alt="Profile Photo"
                                            id="profileImg">
                                        @else
                                        @if (auth()->user()->profile_picture === null)
                                        <img src="/images/police-512.png" alt="Profile Photo" id="profileImg">
                                        @else
                                        <img src="{{ Storage::url(auth()->user()->profile_picture) }}"
                                            alt="Profile Photo" id="profileImg">
                                        @endif
                                        @endif
                                    </div>
                                    <label class="change-photo-label" for="fileInput">
                                        <span wire:loading.remove wire:target='profile_picture'>Change photo</span>
                                        <span wire:loading wire:target='profile_picture'>Changing...</span>
                                        <input wire:model='profile_picture' type="file" id="fileInput" accept="image/*"
                                            style="display: none;" onchange="previewImage(event)">
                                    </label>
                                    <br>
                                    @error('profile_picture')
                                    <span class="text-danger mb-2" style="margin-top: -10px;">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="account-inputs">
                                    <div class="input-readonly">
                                        <label for="first_name"><strong>First Name</strong></label>
                                        <input id="first_name" type="text" wire:model='first_name'
                                            style="margin-bottom: 10px;">
                                        @error('first_name')
                                        <span class="text-danger mb-2" style="margin-top: -10px;">{{ $message
                                            }}</span>
                                        @enderror
                                        <label for="middle_name"><strong>Middle Name</strong></label>
                                        <input id="middle_name" type="text" wire:model='middle_name'
                                            style="margin-bottom: 10px;">
                                        @error('middle_name')
                                        <span class="text-danger mb-2" style="margin-top: -10px;">{{ $message
                                            }}</span>
                                        @enderror
                                        <label for="nationality"><strong>Nationality</strong></label>
                                        <input id="nationality" type="text" wire:model='nationality'
                                            style="margin-bottom: 10px;">
                                        @error('nationality')
                                        <span class="text-danger mb-2" style="margin-top: -10px;">{{ $message
                                            }}</span>
                                        @enderror
                                        <label for="contact_number"><strong>Contact Number</strong></label>
                                        <input id="contact_number" type="number" wire:model='contact_number'
                                            style="margin-bottom: 10px;">
                                        @error('contact_number')
                                        <span class="text-danger mb-2" style="margin-top: -10px;">{{ $message
                                            }}</span>
                                        @enderror
                                        <label for="civil_status"><strong>Civil Status</strong></label>
                                        <select id="civil_status" wire:model='civil_status'
                                            style="margin-bottom: 10px;">
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
                                        <span class="text-danger mb-2" style="margin-top: -10px;">{{ $message
                                            }}</span>
                                        @enderror
                                        <label for="position"><strong>Position</strong></label>
                                        <input id="position" name="position" class="read-only" type="text"
                                            value="{{ Auth::user()->position->position_name }}"
                                            style="margin-bottom: 10px;" readonly>
                                        <label for="unit_assignment"><strong>Unit Assignment(<button
                                                    data-bs-toggle="modal" data-bs-target="#oldUnit" type="button"
                                                    class="btn btn-link btn-sm"><i class="far fa-eye"></i>
                                                    Old</button>)</strong></label>
                                        <input id="unit_assignment" name="unit_assignment" class="read-only" type="text"
                                            value="{{ Auth::user()->unit->unit_assignment }}"
                                            style="margin-bottom: 10px;" readonly>
                                        <label for="rank"><strong>Rank</strong></label>
                                        <input id="rank" name="rank" class="read-only" type="text"
                                            value="{{ Auth::user()->rank->rank_name }}" style="margin-bottom: 10px;"
                                            readonly>

                                        <label for="password"><strong>New Password</strong></label>
                                        <input wire:model='new_password' id="password" name="password" type="password"
                                            placeholder="New Password" style="margin-bottom: 10px;">

                                        @error('new_password')
                                        <span class="text-danger mb-2" style="margin-top: -10px;">{{ $message
                                            }}</span>
                                        @enderror
                                    </div>
                                    <div class="input-enter">
                                        <label for="last_name"><strong>Last Name</strong></label>
                                        <input id="last_name" type="text" wire:model='last_name'
                                            style="margin-bottom: 10px;">
                                        @error('last_name')
                                        <span class="text-danger mb-2" style="margin-top: -10px;">{{ $message
                                            }}</span>
                                        @enderror
                                        <label for="username"><strong>Username</strong></label>
                                        <input id="username" wire:model='username' name="username" type="text"
                                            style="margin-bottom: 10px;">
                                        @error('username')
                                        <span class="text-danger mb-2" style="margin-top: -10px;">{{ $message
                                            }}</span>
                                        @enderror
                                        <label for="religion"><strong>Religion</strong></label>
                                        <input id="religion" wire:model='religion' name="religion" type="text"
                                            style="margin-bottom: 10px;">
                                        @error('religion')
                                        <span class="text-danger mb-2" style="margin-top: -10px;">{{ $message
                                            }}</span>
                                        @enderror
                                        <label for="age"><strong>Age</strong></label>
                                        <input id="age" name="age" wire:model='age' type="number"
                                            style="margin-bottom: 10px;">
                                        @error('age')
                                        <span class="text-danger mb-2" style="margin-top: -10px;">{{ $message
                                            }}</span>
                                        @enderror
                                        <label for="gender"><strong>Civil Gender</strong></label>
                                        <select id="gender" wire:model='gender' style="margin-bottom: 10px;">
                                            <option selected hidden>Select Gender</option>
                                            <option disabled>Select Gender</option>
                                            <option value="Male">Male</option>
                                            <option value="Female">Female</option>
                                            <option value="Not selected">Rather not to say</option>
                                        </select>
                                        @error('gender')
                                        <span class="text-danger mb-2" style="margin-top: -10px;">{{ $message
                                            }}</span>
                                        @enderror <label for="email"><strong>Email</strong></label>
                                        <input id="email" wire:model='email' name="email" type="email"
                                            style="margin-bottom: 10px;">
                                        @error('email')
                                        <span class="text-danger mb-2" style="margin-top: -10px;">{{ $message
                                            }}</span>
                                        @enderror
                                        <label for="date_of_birth"><strong>Date of Birth</strong></label>
                                        <input id="date_of_birth" wire:model='date_of_birth' name="date_of_birth"
                                            type="date" style="margin-bottom: 10px;">
                                        @error('date_of_birth')
                                        <span class="text-danger mb-2" style="margin-top: -10px;">{{ $message
                                            }}</span>
                                        @enderror
                                        <label for="years"><strong>Years</strong></label>

                                        @php
                                        $startDate = \Carbon\Carbon::parse(Auth::user()->year_attended);
                                        $endDate = \Carbon\Carbon::now();

                                        $diff = $startDate->diff($endDate);

                                        $years = $diff->y;
                                        $months = $diff->m;
                                        $formattedDifference = $years !== 0 ? "{$years} years and {$months} months"
                                        :
                                        "{$months}
                                        months";
                                        @endphp
                                        <input id="years" name="years" class="read-only" type="text"
                                            value="{{ $formattedDifference }}" style="margin-bottom: 10px;" readonly>
                                        <label for="cpassword"><strong>Confirm Password</strong></label>
                                        <input wire:model='new_password_confirmation' id="cpassword" name="cpassword"
                                            type="password" placeholder="Confirm New Password"
                                            style="margin-bottom: 10px;">
                                    </div>
                                </div>
                                <label for="address"><strong>Address</strong></label>
                                <textarea name="" id="" wire:model='address' cols="30" rows="3"></textarea>
                                @error('address')
                                <span class="text-danger mb-2" style="margin-top: -10px;">{{ $message }}</span>
                                @enderror
                                <div class="account-btn">
                                    <button class="btn-cancel" wire:click='resetForm'>RESET</button>
                                    <button type="submit" class="btn-save">SAVE CHANGES</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="oldUnit" tabindex="-1" aria-labelledby="oldUnitLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="oldUnitLabel">Old Unit Assignments</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
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
                            {{ auth()->user()->unit->unit_assignment }}
                        </span>
                        @endif
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <style>
        body {
            background: #dfe9f5;
        }
    </style>
    <script>
        document.addEventListener('livewire:navigated', () => {

            @this.on('toastr', (event) => {
                const data = event
                toastr[data[0].type](data[0].message, '', {
                    closeButton: true,
                    "progressBar": true,
                });
            })
        })
    </script>
</div>
