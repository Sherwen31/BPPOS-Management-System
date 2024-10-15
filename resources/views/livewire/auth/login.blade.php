<div>
    <div class="signup">
        <div class="signup-header">
            <a href="/" wire:navigate class="text-decoration-none text-dark">
                <h3><strong>PSMS</strong></h3>
            </a>
            <h4>Log In</h4>
        </div>
        <form wire:submit='login'>

            <div class="signup-form">
                <div class="form-group">
                    <label for="username">Username</label>
                    <div class="input-group">
                        <span class="input-group-text" id="basic-addon1"><i class="far fa-users"></i></span>
                        <input type="text" class="form-control" id="username" placeholder="Enter Username"
                            wire:model='username_or_email_or_police_id'>
                    </div>
                    @error('username_or_email_or_police_id')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <div class="input-group">
                        <span class="input-group-text" id="basic-addon1"><i class="far fa-key"></i></span>
                        <input type="password" class="form-control" id="password" placeholder="Enter Password"
                            wire:model='password'>
                    </div>

                    @error('password')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <button type="submit" class="btn btn-dark">
                    <span wire:loading.remove>Login</span>
                    <div wire:loading>
                        <span class="spinner-grow spinner-grow-sm"></span>
                        <span class="spinner-grow spinner-grow-sm"></span>
                        <span class="spinner-grow spinner-grow-sm"></span>
                    </div>
                </button>
                <a wire:navigate href="/forgot-password">Forgot Password?</a>
                <hr>
                <p class="text-center">
                    Don't have an account?
                    <a href="/sign-up" class="" wire:navigate> Sign Up
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
            overflow: hidden;
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

        .signup-form a {
            text-decoration: none;
            color: black;
            text-align: center;
            margin-top: 5px;
            font-family: 'Montserrat', sans-serif;
        }

        .signup-form a:hover {
            text-decoration: underline;
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
