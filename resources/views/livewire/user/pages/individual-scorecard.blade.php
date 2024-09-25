<div>
    <div class="containerMod">
        @livewire('components.layouts.user-sidebar')
        <div class="mainMod" style="padding: 0;">
            <div class="sec">
                <div class="btn-toggle">
                    <button id="toggle-button">
                        <i class="fas fa-bars"></i>
                    </button>
                    <div class="header-title">
                        <h4><strong>BPPO-Police Scorecard Management System</strong></h4>
                    </div>
                </div>
                <div class="scorecard">
                    <div class="scorecard-title">
                        <h1><strong>INDIVIDUAL SCORECARD</strong></h1>
                    </div>
                    <div class="scorecard-header" id="scorecard-header">
                        <span>Rank/Name: <strong>{{ auth()->user()->rank }} {{ auth()->user()->first_name }} {{
                                auth()->user()->middle_name }} {{ auth()->user()->last_name }} {{
                                auth()->user()->police_id }}</strong></span>
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
        body {
            background: #dfe9f5;
        }
    </style>
</div>
