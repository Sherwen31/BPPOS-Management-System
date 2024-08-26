<div>
    <div class="signup">
        <div class="signup-header">
            <h3><strong>PSMS</strong></h3>
            <h4>Admin Sign Up</h4>
        </div>
        <form wire:submit='register'>
            <div class="signup-form">
                <div class="d-flex gap-1">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" id="name" placeholder="Enter Name" wire:model='name'>
                        @error('name')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" class="form-control" id="username" placeholder="Enter Username"
                            wire:model='username'>
                        @error('username')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="d-flex gap-1">
                    <div class="form-group">
                        <label for="police_id">Police Id</label>
                        <input type="text" class="form-control" id="police_id" placeholder="Enter Polic Id"
                            wire:model='police_id'>
                        @error('police_id')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="contact_number">Contact Number</label>
                        <input type="number" class="form-control" id="contact_number" placeholder="Enter Contact Number"
                            wire:model='contact_number'>
                        @error('contact_number')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="d-flex gap-1">
                    <div class="form-group">
                        <label for="address">Address</label>
                        <input type="text" class="form-control" id="address" placeholder="Enter Address"
                            wire:model='address'>
                        @error('address')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="email" placeholder="Enter Email"
                            wire:model='email'>
                        @error('email')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="d-flex gap-1">
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" id="password" placeholder="Create Password"
                            wire:model='password'>
                        @error('password')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="cpassword">Confirm Password</label>
                        <input type="password" class="form-control" id="cpassword" placeholder="Confirm Password"
                            wire:model='password_confirmation'>
                        @error('password_confirmation')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <button type="submit" class="btn btn-dark mb-5">Submit</button>

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
            const data=event
            swal.fire({
                icon:data[0]['icon'],
                title:data[0]['title'],
                text:data[0]['text'],
                html: "You will redirected to Login page <br>Thank you!",
            }).then(function () {
                Livewire.navigate('/login');
        });
        })
    })
    </script>
</div>
