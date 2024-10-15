<div>
    <div class="forgot-password-card shadow-sm mt-5">
        <div class="text-center mb-4">
            <i class="fas fa-lock fa-3x text-primary"></i>
        </div>
        <h3 class="form-title">Forgot Password</h3>
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
        <form wire:submit.prevent='forgotPassword' id="forgotPasswordForm">
            <div class="mb-3">
                <label for="email" class="form-label">Email Address</label>
                <div class="input-group">
                    <span class="input-group-text">
                        <i class="fas fa-envelope"></i>
                    </span>
                    <input type="email" wire:model='email' class="form-control" id="email"
                        placeholder="Enter your email" required>
                </div>
                @error('email')
                <span class="text-sm text-danger">{{ $message }}</span>
                @enderror
                <div class="form-text">We'll send a password reset link to your email.</div>
            </div>
            <div class="d-grid gap-2">
                <button type="submit" class="btn btn-custom">
                    <span wire:loading.remove wire:target='forgotPassword'>Send Reset Link</span>
                    <div wire:loading wire:target='forgotPassword'>
                        <span class="spinner-grow spinner-grow-sm"></span>
                        <span class="spinner-grow spinner-grow-sm"></span>
                        <span class="spinner-grow spinner-grow-sm"></span>
                    </div>
                </button>
            </div>
            <div class="form-footer mt-3">
                <a href="/login" wire:navigate class="text-dark"><i class="fas fa-arrow-left"></i> Back to login</a>
            </div>
        </form>
    </div>


    <style>
        body {
            background-color: #f8f9fa;
        }

        .forgot-password-card {
            max-width: 400px;
            margin: 50px auto;
            padding: 30px;
            background: white;
            box-shadow: 0px 0px 15px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }

        .forgot-password-card .form-title {
            font-size: 1.5rem;
            font-weight: 600;
            text-align: center;
            margin-bottom: 20px;
        }

        .forgot-password-card .btn-custom {
            background-color: #2c2e31;
            border: none;
            color: white;
            padding: 10px 20px;
            border-radius: 5px;
            font-size: 1rem;
        }

        .forgot-password-card .btn-custom:hover {
            background-color: #36393b;
        }

        .forgot-password-card .form-footer {
            margin-top: 15px;
            text-align: center;
        }

        .forgot-password-card .form-footer a {
            color: #007bff;
            text-decoration: none;
        }

        .forgot-password-card .form-footer a:hover {
            text-decoration: underline;
        }
    </style>
</div>
