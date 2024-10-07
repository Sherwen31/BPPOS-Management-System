<div>
    <div class="header">
        <div class="header-title">
            <h3>POLICE SCORECARD MANAGEMENT SYSTEM</h3>
        </div>
        @guest
        <div class="header-auth">
            <a href="/login" class="btn btn-success btn-sm" wire:navigate>Log In</a>
        </div>
        @else
        @role('admin')
        <div class="header-auth">
            <a href="/admin/dashboard" class="btn btn-success btn-sm" wire:navigate>Dashboard</a>
        </div>
        @endrole
        @role('super_admin')
        <div class="header-auth">
            <a href="/super-admin/dashboard" class="btn btn-success btn-sm" wire:navigate>Dashboard</a>
        </div>
        @endrole
        @role('user')
        <div class="header-auth">
            <a href="/users/home" class="btn btn-success btn-sm" wire:navigate>Home</a>
        </div>
        @endrole
        @endguest
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
