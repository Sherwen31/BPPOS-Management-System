<div>
    <div class="header">
        <div class="header-title">
            <h3>POLICE SCORECARD MANAGEMENT SYSTEM</h3>
        </div>
        <div class="header-auth">
            <a href="/sign-up" class="btn btn-success btn-sm" wire:navigate>Sign Up</a>
            <a href="login" class="btn btn-primary btn-sm" wire:navigate>Log In</a>
        </div>
    </div>
    <div class="body">
        <img src="images/bp_bg.jpg" alt="Background">
    </div>

    <style>
        body {
            overflow: hidden;
        }

        .body img {
            width: 100%;
            height: 100vh;
        }

        .header {
            display: flex;
            padding: 15px;
            background-color: #343334;
            flex-direction: row;
            justify-content: space-between;
        }

        .header-title {
            text-align: left;
            margin-left: 15px;
        }

        .header-title h3 {
            color: white;
            font-family: 'Montserrat', sans-serif;
            font-weight: 600;
        }

        .header-auth a {
            margin-left: 15px;
            font-family: 'Montserrat', sans-serif;
        }
    </style>
</div>
