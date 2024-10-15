<div>
    <div class="signup">
        <div class="signup-header">
            <a href="/" wire:navigate class="text-decoration-none text-dark">
                <h3><strong>PSMS</strong></h3>
            </a>
            <h4>Sign Up</h4>
        </div>
        <form wire:submit='register'>
            <div class="signup-form">
                <div class="d-flex gap-1">
                    <div class="form-group">
                        <label for="first_name">First Name</label>
                        <div class="input-group">
                            <span class="input-group-text" id="basic-addon1"><i class="far fa-user"></i></span>
                            <input type="text" class="form-control" id="first_name" placeholder="Enter First Name"
                                wire:model='first_name'>
                        </div>
                        @error('first_name')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="last_name">Last Name</label>
                        <div class="input-group">
                            <span class="input-group-text" id="basic-addon1"><i class="far fa-user"></i></span>
                            <input type="text" class="form-control" id="last_name" placeholder="Enter Last Name"
                                wire:model='last_name'>
                        </div>
                        @error('last_name')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="d-flex gap-1">
                    <div class="form-group">
                        <label for="middle_name">Middle Name</label>
                        <div class="input-group">
                            <span class="input-group-text" id="basic-addon1"><i class="far fa-user"></i></span>
                            <input type="text" class="form-control" id="middle_name" placeholder="Enter Middle Name"
                                wire:model='middle_name'>
                        </div>
                        @error('middle_name')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="username">Username</label>
                        <div class="input-group">
                            <span class="input-group-text" id="basic-addon1"><i class="far fa-user"></i></span>
                            <input type="text" class="form-control" id="username" placeholder="Enter Username"
                                wire:model='username'>
                        </div>
                        @error('username')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="d-flex gap-1">
                    <div class="form-group">
                        <label for="police_id">Police Id</label>
                        <div class="input-group">
                            <span class="input-group-text" id="basic-addon1"><i class="far fa-user-police"></i></span>
                            <input type="text" class="form-control" id="police_id" placeholder="Enter Police Id"
                                wire:model='police_id'>
                        </div>
                        @error('police_id')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="contact_number">Contact Number</label>
                        <div class="input-group">
                            <span class="input-group-text" id="basic-addon1"><i class="far fa-phone"></i></span>
                            <input type="number" class="form-control" id="contact_number"
                                placeholder="Enter Contact Number" wire:model='contact_number'>
                        </div>
                        @error('contact_number')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="d-flex gap-1">
                    <div class="form-group">
                        <label for="address">Address</label>
                        <div class="input-group">
                            <span class="input-group-text" id="basic-addon1"><i class="far fa-location-dot"></i></span>
                            <input type="text" class="form-control" id="address" placeholder="Enter Address"
                                wire:model='address'>
                        </div>
                        @error('address')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <div class="input-group">
                            <span class="input-group-text" id="basic-addon1"><i class="far fa-envelope"></i></span>
                            <input type="email" class="form-control" id="email" placeholder="Enter Email"
                                wire:model='email'>
                        </div>
                        @error('email')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="d-flex gap-1">
                    <div class="form-group">
                        <label for="password">Password</label>
                        <div class="input-group">
                            <span class="input-group-text" id="basic-addon1"><i class="far fa-key"></i></span>
                            <input type="password" class="form-control" id="password" placeholder="Create Password"
                                wire:model='password'>
                        </div>
                        @error('password')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="cpassword">Confirm Password</label>
                        <div class="input-group">
                            <span class="input-group-text" id="basic-addon1"><i class="far fa-key"></i></span>
                            <input type="password" class="form-control" id="cpassword" placeholder="Confirm Password"
                                wire:model='password_confirmation'>
                        </div>
                        @error('password_confirmation')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <d class="d-flex justify-content-center">
                    <button type="submit" class="btn btn-dark mb-5" style="width: 50%">
                        <span wire:loading.remove>Submit</span>
                        <div wire:loading>
                            <span class="spinner-grow spinner-grow-sm"></span>
                            <span class="spinner-grow spinner-grow-sm"></span>
                            <span class="spinner-grow spinner-grow-sm"></span>
                        </div>
                    </button>
                </d>

                <p class="text-center">
                    Already have an account?
                    <a href="/login" class="text-dark" wire:navigate> Login
                    </a>
                </p>
            </div>
        </form>
        <div class="signup-footer">
            <p><strong>Police Scorecard Management System</strong><br>Bohol Provincial Polie Office</p>
        </div>
    </div>

    <style>
        body {
            display: flex;
            justify-content: center;
            height: 100vh;
            align-items: center;
        }

        .signup {
            background-color: aliceblue;
            padding: 30px;
            width: fit-content;
            border-radius: 10px;
            box-shadow: 0 8px 12px rgba(0, 0, 0, 0.3);
        }

        .signup-header {
            display: flex;
            justify-content: center;
            flex-direction: column;
        }

        .signup-header h3,
        h4 {
            text-align: center;
            font-family: 'Montserrat', sans-serif;
        }

        .form-group {
            width: 400px;
            margin-top: 5px;
        }

        .signup-form {
            display: flex;
            justify-content: center;
            flex-direction: column;
        }

        .signup-form button {
            margin-top: 15px;
        }

        .signup-footer {
            margin-top: 20px;
        }

        .signup-footer p {
            font-size: smaller;
            text-align: center;
            font-family: 'Montserrat', sans-serif;
        }

        .form-group label,
        input {
            font-family: 'Montserrat', sans-serif;
        }
    </style>

    <script>
        document.addEventListener('livewire:navigated', ()=>{

        @this.on('swal',(event)=>{
            const data = event
            swal.fire({
                icon: data[0]['icon'],
                title: data[0]['title'],
                html: `${data[0]['text']}<br>You will be redirected to the Login page.<br>Thank you!`,
            }).then(function () {
                Livewire.navigate('/login');
            });
        })
    })
    </script>
</div>
