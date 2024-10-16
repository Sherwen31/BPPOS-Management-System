<div>
    <div class="containerMod">
        @livewire('components.layouts.user-sidebar')
        <div class="mainMod" style="padding: 0;">
            <div class="btn-toggle">
                <button id="toggle-button">
                    <i class="fas fa-bars"></i>
                </button>
                <div class="header-title">
                    <h4><strong>BPPO-Police Scorecard Management System</strong></h4>
                </div>
            </div>
            <div class="d-flex justify-content-center align-items-center mt-5">
                <div class="welcome-pageModed mt-5">
                    <div class="welcome-pageModed-svg">
                        <img src="/assets/police-officer-male-svgrepo-com.svg" alt="Police" width="100" height="100">
                    </div>
                    <div class="welcome-pageModed-content">
                        <!-- Need data for the Name -->
                        <h4><strong>Welcome to your Scorecard Portal, {{ Auth::user()->rank }} {{ Auth::user()->first_name }} {{ Auth::user()->last_name }}!</strong></h4> <br>
                        <p>Access and review your performance scores with ease.
                            Track your progress, set new goals, and stay on top of your achievements.
                            Thank you for your service!</p>
                        <div class="wpc-btn">
                            <a href="/users/individual-scorecard" wire:navigate>View your scorecard <i
                                    class="fas fa-angle-double-right"></i></a>
                        </div>
                    </div>
                    <div class="welcome-pageModed-svg">
                        <img src="/assets/police-officer-female-svgrepo-com.svg" alt="Police" width="100" height="100">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <style>
        body {
            background: #dfe9f5;
        }

        nav {
            position: relative;
            top: 0;
            bottom: 0;
            height: 100vh;
            left: 0;
            background: #fff;
            width: 280px;
            box-shadow: 0 20px 35px rgba(0, 0, 0, 0.1);
        }

        a {
            position: relative;
            color: whitesmoke;
            font-size: 14px;
            display: table;
            width: 280px;
            padding: 10px;
            text-decoration: none;
        }

        a:hover {
            background: #ff0000;
        }

        #toggle-button {
            background: none;
            border: none;
            cursor: pointer;
            margin: 20px;
            font-size: 24px;
        }

        .btn-toggle {
            background-color: aliceblue;
            display: flex;
            justify-content: space-between;
        }

        .header-titleModed {
            display: flex;
            align-items: center;
            margin-right: 30px;
        }

        .header-titleModed h2 {
            color: #2f343d;
        }

        /* TooltipModed styling */
        .tooltipModed {
            position: absolute;
            left: 90px;
            /* Adjust this based on your collapsed sidebar width */
            top: 50%;
            transform: translateY(-50%);
            background-color: #333;
            color: #fff;
            padding: 5px 10px;
            border-radius: 5px;
            white-space: nowrap;
            opacity: 0;
            visibility: hidden;
            transition: opacity 0.3s ease;
            z-index: 10;
        }

        .welcome-pageModed {
            width: 800px;
            background-color: whitesmoke;
            padding: 50px;
            border-radius: 10px;
            box-shadow: 2px 2px 5px rgba(0, 0, 0, 0.3);
            display: flex;
        }

        .wpc-btn {
            text-align: center;
            margin-top: 10px;
        }

        .wpc-btn a {
            display: inline-block;
            cursor: pointer;
            background-color: #4D6A9B;
            color: whitesmoke;
            padding: 10px;
            border-radius: 20px;
        }

        .welcome-pageModed h4,
        p {
            text-align: center;
        }

        .html {
            color: rgb(25, 94, 54);
        }

        .css {
            color: rgb(104, 179, 35);
        }

        .js {
            color: rgb(28, 98, 179);
        }
    </style>
</div>
