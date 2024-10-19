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
                        <span>Rank/Name: <strong>{{ auth()->user()->rank }} {{ auth()->user()->first_name }}
                                {{ auth()->user()->middle_name }} {{ auth()->user()->last_name }}
                                {{ auth()->user()->police_id }}</strong></span>
                        <br>
                        <span>Position: <strong>{{ auth()->user()->position->position_name }}</strong></span>
                        <br>
                        <span>Date Covered: <strong>{{ $dateCovered?->start_date->format('F j') }} -
                                {{ $dateCovered?->end_date->format('j, Y') }}</strong></span>
                    </div>
                    <div class="scorecard-table">
                        <table>
                            <thead class="table-dark">
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
                                @forelse ($performanceItems as $item)
                                    <tr>
                                        <td>{{ $item->activity }}
                                        </td>
                                        <td>{{ $item->measures }}</td>
                                        <td class="text-center">{{ $item->targets }}</td>
                                        @forelse ($item->performanceReportRatings as $rating)
                                            <td class="text-center">{{ $rating->monday }}</td>
                                            <td class="text-center">{{ $rating->tuesday }}</td>
                                            <td class="text-center">{{ $rating->wednesday }}</td>
                                            <td class="text-center">{{ $rating->thursday }}</td>
                                            <td class="text-center">{{ $rating->friday }}</td>
                                            <td class="text-center">{{ $rating->saturday }}</td>
                                            <td class="text-center">{{ $rating->sunday }}</td>
                                            <td class="text-center">{{ $rating->total }}</td>
                                            <td class="text-center">{{ $rating->cost }}</td>
                                            @empty
                                            <td class="text-center" colspan="9">No ratings added yet</td>
                                        @endforelse
                                        <td class="text-center">{{ $item->remarks }}</td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="13">
                                            <p class="text-center">No performance data added yet.</p>
                                        </td>
                                    </tr>
                                @endforelse
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
            padding: 0px 70px;
            margin-top: 10px;
            overflow-x: auto;
            padding-bottom: 20px;
        }

        .scorecard-header {
            margin-top: 20px;
        }

        .scorecard-table table {
            border: 1px solid black;
            border-collapse: collapse;
            width: 95%;
            margin-top: 20px;
        }

        .scorecard-table th,
        td {
            border: 1px solid rgb(108, 108, 108);
            padding: 8px;
            text-align: left;
        }

        .scorecard-table th {
            background-color: #212529;
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
