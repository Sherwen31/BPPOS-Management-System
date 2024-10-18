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
                                        <img src="/images/police-512.png" alt="Profile Photo" id="profileImg">
                                    </div>
                                    {{-- <label class="change-photo-label" for="fileInput">
                                        Change Photo
                                        <input type="file" id="fileInput" accept="image/*" style="display: none;"
                                            onchange="previewImage(event)">
                                    </label> --}}
                                </div>
                                <div class="account-inputs">
                                    <div class="input-readonly">
                                        <label for="name"><strong>Name</strong></label>
                                        <input id="name" name="name" class="read-only" type="text"
                                            value="{{ Auth::user()->first_name }} {{ Auth::user()->last_name }}, {{ Auth::user()->middle_name }}"
                                            style="margin-bottom: 10px;" readonly>
                                        <label for="position"><strong>Position</strong></label>
                                        <input id="position" name="position" class="read-only" type="text"
                                            value="{{ Auth::user()->position->position_name }}"
                                            style="margin-bottom: 10px;" readonly>
                                        <label for="rank"><strong>Rank</strong></label>
                                        <input id="rank" name="rank" class="read-only" type="text"
                                            value="{{ Auth::user()->rank }}" style="margin-bottom: 10px;" readonly>
                                        <label for="years"><strong>Years</strong></label>

                                        @php
                                        $startDate = \Carbon\Carbon::parse(Auth::user()->year_attended);
                                        $endDate = \Carbon\Carbon::now();

                                        $diff = $startDate->diff($endDate);

                                        $years = $diff->y;
                                        $months = $diff->m;
                                        $formattedDifference = $years !== 0 ? "{$years} years and {$months} months" :
                                        "{$months}
                                        months";
                                        @endphp
                                        <input id="years" name="years" class="read-only" type="text"
                                            value="{{ $formattedDifference }}" style="margin-bottom: 10px;" readonly>
                                    </div>
                                    <div class="input-enter">
                                        <label for="username"><strong>Username</strong></label>
                                        <input id="username" name="username" type="text"
                                            value="{{ Auth::user()->username }}" class="read-only"
                                            style="margin-bottom: 10px;" readonly>
                                        <label for="email"><strong>Email</strong></label>
                                        <input id="email" name="email" type="email" value="{{ Auth::user()->email }}"
                                            class="read-only" style="margin-bottom: 10px;" readonly>
                                        <label for="password"><strong>New Password</strong></label>
                                        <input wire:model='new_password' id="password" name="password" type="password"
                                            placeholder="New Password" style="margin-bottom: 10px;">
                                        <label for="cpassword"><strong>Confirm Password</strong></label>
                                        <input wire:model='new_password_confirmation' id="cpassword" name="cpassword"
                                            type="password" placeholder="Confirm New Password"
                                            style="margin-bottom: 10px;">
                                    </div>
                                </div>
                                @error('new_password')
                                <span class="text-danger">{{ $message }}</span>
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
