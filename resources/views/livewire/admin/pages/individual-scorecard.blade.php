<div>
    <div class="containerMod">
        @livewire('components.layouts.sidebar')
        <div class="mainMod" style="padding: 0;">
            <div class="sec">
                <div class="btn-toggle">
                    <button id="toggle-button">
                        <i class="fas fa-bars"></i>
                    </button>
                </div>
                <div class="scorecard">
                    <div class="scorecard-title">
                        <h1><strong>INDIVIDUAL SCORECARD</strong></h1>
                    </div>
                    <div class="scorecard-header" id="scorecard-header">
                        <span>Rank/Name: <strong>{{ auth()->user()->rank }} {{ auth()->user()->first_name }} {{ auth()->user()->middle_name }} {{ auth()->user()->last_name }} {{ auth()->user()->police_id }}</strong></span>
                        <br>
                        <span>Position: <strong>{{ auth()->user()->position->position_name }}</strong></span>
                    </div>
                    <div class="scorecard-table">
                        <table>
                            <thead>
                                <tr>
                                    <th rowspan="2">
                                        SUB-ACTIVITY<br />&lpar;Enabling Actions&rpar;
                                    </th>
                                    <th rowspan="2">Measures</th>
                                    <th rowspan="2">TARGETS</th>
                                    <th colspan="7">ACCOMPLISHMENT</th>
                                    <th rowspan="2">TOTAL</th>
                                    <th rowspan="2">COST</th>
                                    <th rowspan="2">REMARKS</th>
                                </tr>
                                <tr>
                                    <th>Mon</th>
                                    <th>Tue</th>
                                    <th>Wed</th>
                                    <th>Thurs</th>
                                    <th>Fri</th>
                                    <th>Sat</th>
                                    <th>Sun</th>
                                </tr>
                            </thead>
                            <tbody id="scorecard-body">
                                <!-- Dynamic rows will be injected here -->
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <style>

        .sec {
            display: flex;
            flex-direction: column;
            flex: 1;
        }

        .scorecard {
            margin-left: 100px;
            margin-top: 30px;
        }

        .scorecard-header {
            margin-top: 20px;
        }

        .scorecard-table table {
            border: 1px solid black;
            border-collapse: collapse;
            width: 90%;
            margin-top: 20px;
        }

        .scorecard-table th,
        td {
            border: 1px solid black;
            padding: 8px;
            text-align: left;
        }

        .scorecard-table th {
            background-color: #2f343d;
            text-align: center;
            color: whitesmoke;
        }

        .mainScorecard {
            flex: 1;
            display: flex;
            margin-top: 80px;
            justify-content: center;
        }
    </style>
</div>
