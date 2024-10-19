<div>
    <div class="reset-password-card shadow-sm mt-5">
        <div class="text-center mb-4">
            <i class="fas fa-lock fa-3x text-primary"></i>
        </div>
        <h2 class="text-center mb-4">Reset Your Password</h2>
        <form wire:submit.prevent="resetPassword" class="p-4 rounded">
            @if ($errorMessage)
            <div class="alert alert-danger d-flex align-items-center">
                <i class="fas fa-exclamation-circle me-2"></i>{{ $errorMessage }}
            </div>
            @endif

            @if ($successMessage)
            <div class="alert alert-success d-flex align-items-center">
                <i class="fas fa-check-circle me-2"></i>{{ $successMessage }}
            </div>
            @endif

            <div class="form-group mb-3">
                <label for="password" class="form-label">New Password</label>
                <div class="input-group">
                    <span class="input-group-text">
                        <i class="fas fa-lock"></i>
                    </span>
                    <input type="password" class="form-control" id="password" wire:model="password"
                        placeholder="Enter new password" required>
                </div>
                @error('password')
                <span class="text-sm text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group mb-4">
                <label for="password_confirmation" class="form-label">Confirm New Password</label>
                <div class="input-group">
                    <span class="input-group-text">
                        <i class="fas fa-lock"></i>
                    </span>
                    <input type="password" class="form-control" id="password_confirmation"
                        wire:model="password_confirmation" placeholder="Confirm new password" required>
                </div>
                @error('password_confirmation')
                <span class="text-sm text-danger">{{ $message }}</span>
                @enderror
            </div>

            <button type="submit" class="btn btn-custom w-100">
                <span wire:loading.remove wire:target='resetPassword'>Reset Password</span>
                <div wire:loading wire:target='resetPassword'>
                    <span class="spinner-grow spinner-grow-sm"></span>
                    <span class="spinner-grow spinner-grow-sm"></span>
                    <span class="spinner-grow spinner-grow-sm"></span>
                </div>
            </button>

            <p class="mt-3 text-center">
                <a href="/login" wire:navigate class="text-decoration-none">Remembered your password? Go back to
                    login</a>
            </p>
        </form>
    </div>

    <style>
        body {
            background-color: #f8f9fa;
        }

        .reset-password-card {
            max-width: 400px;
            margin: 50px auto;
            padding: 30px;
            background: white;
            box-shadow: 0px 0px 15px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }

        .reset-password-card .form-title {
            font-size: 1.5rem;
            font-weight: 600;
            text-align: center;
            margin-bottom: 20px;
        }

        .reset-password-card .btn-custom {
            background-color: #2c2e31;
            border: none;
            color: white;
            padding: 10px 20px;
            border-radius: 5px;
            font-size: 1rem;
        }

        .reset-password-card .btn-custom:hover {
            background-color: #36393b;
        }

        .reset-password-card .form-footer {
            margin-top: 15px;
            text-align: center;
        }

        .reset-password-card .form-footer a {
            color: #007bff;
            text-decoration: none;
        }

        .reset-password-card .form-footer a:hover {
            text-decoration: underline;
        }
    </style>

    <script>
        document.addEventListener('livewire:navigated', ()=>{

        @this.on('swal',(event)=>{
            const data = event;
            swal.fire({
                icon: data[0].icon,
                title: data[0].title,
                html: `${data[0]['text']}<br>You will be redirected to the Login page.<br>Thank you!`,
            }).then(function () {
                Livewire.navigate('/login');
            });
        })
    })
    </script>
</div>
