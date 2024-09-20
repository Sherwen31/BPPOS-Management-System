<div>
    <div class="containerModed">
        @livewire('components.layouts.user-sidebar')
        <div class="sec">
            <div class="btn-toggle">
                <button id="toggle-button">
                    <i class="fas fa-bars"></i>
                </button>
                <div class="header-titleModed">
                    <h4><strong>BPPO-Police Scorecard Management System</strong></h4>
                </div>
            </div>
            <div class="mainModed">

                <div class="welcome-pageModed">
                    <div class="welcome-pageModed-svg">
                        <img src="/assets/police-officer-male-svgrepo-com.svg" alt="Police" width="100"
                            height="100">
                    </div>
                    <div class="welcome-pageModed-content">
                        <!-- Need data for the Name -->
                        <h4><strong>Welcome to your Scorecard Portal, SPO3 John Doe!</strong></h4> <br>
                        <p>Access and review your performance scores with ease.
                            Track your progress, set new goals, and stay on top of your achievements.
                            Thank you for your service!</p>
                        <div class="wpc-btn">
                            <button onclick="window.location.href='IndividualScorecard.html';">View your scorecard <i
                                    class="fas fa-angle-double-right"></i></button>
                        </div>
                    </div>
                    <div class="welcome-pageModed-svg">
                        <img src="/assets/police-officer-female-svgrepo-com.svg" alt="Police" width="100"
                            height="100">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <style>
        body {
            background: #dfe9f5;
        }

        .containerModed {
            display: flex;
        }

        .containerModed ul li {
            list-style-type: none;
            margin-left: -30px;
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

        .logoModed {
            text-align: center;
            display: flex;
            margin: 10px 0 0 10px;
        }

        .logoModed img {
            width: 50px;
            height: 50px;
            cursor: pointer;
        }

        .logoModed span {
            font-weight: bold;
            font-size: 18px;
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

        .sidebarModed {
            position: relative;
            top: 0;
            bottom: 0;
            height: 100vh;
            left: 0;
            background: #2f343d;
            width: 280px;
            box-shadow: 0 20px 35px rgba(0, 0, 0, 0.1);
            transition: width 0.3s ease;
        }

        .sidebarModed.collapsed {
            width: 90px;
        }

        .sidebarModed .nav-itemModed {
            display: inline-block;
            transition: opacity 0.3s ease;
        }

        .logoModed {
            margin-right: 20px;
            margin-left: 10px;
        }

        .logoModed .title {
            font-size: 50px;
        }

        .sidebarModed.collapsed .nav-itemModed {
            opacity: 0;
        }

        .sidebarModed .fas {
            width: 70px;
            height: 40px;
            font-size: 20px;
            text-align: center;
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

        .sidebarModed ul li {
            position: relative;
            overflow: visible;
        }

        .sidebarModed ul li a {
            display: flex;
            align-items: center;
        }

        .sidebarModed ul li i {
            display: flex;
            align-items: center;
            justify-content: space-around;
        }

        .sidebarModed .logoModed {
            color: whitesmoke;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 60px;
            margin-bottom: 10px;
        }

        /* Remove background on hover when not collapsed */
        .sidebarModed:not(.collapsed) ul li:hover a {
            background: whitesmoke;
            color: #2f343d;
        }

        /* Default hover background when collapsed */
        .sidebarModed.collapsed ul li:hover a {
            background: whitesmoke;
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
            /* Ensure it stays above other elements */
        }

        .sidebarModed.collapsed ul.li:hover .tooltipModed {
            opacity: 1;
            visibility: visible;
            margin-left: 5px;
        }

        .sidebarModed.collapsed .logoModed {
            visibility: hidden;
            margin-left: 114px;
        }

        .sidebarModed.collapsed .logoModed img {
            visibility: visible;
        }

        /* MainModed Section */
        .mainModed {
            flex: 1;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .sec {
            display: flex;
            flex-direction: column;
            flex: 1;
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

        .wpc-btn button {
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
