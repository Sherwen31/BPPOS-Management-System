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
                <div class="mainScorecard">
                    <div class="history">
                        <div class="flex d-flex">
                            <div class="history-scorecard">
                                <h1><strong>HISTORY OF SCORECARD</strong></h1>
                                <table id="historyTable">
                                    <thead>
                                        <tr>
                                            <th>Period Covered</th>
                                            <th class="action-btn">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($groupedPerformanceReports as $item)
                                        <tr>
                                            <td scope="row">{{ $item->start_date->format('F j') }} -
                                                {{ $item->end_date->format('j, Y') }}</td>
                                            <td>
                                                <a wire:navigate
                                                    href="/admin/my-scorecard/{{ $item->start_date }}/{{ $item->end_date }}"
                                                    class="btn btn-primary manage-btn btn-sm">
                                                    <i class="far fa-eye"></i> View my Score
                                                </a>
                                            </td>
                                        </tr>
                                        @empty
                                        <tr>
                                            <td colspan="2" class="text-center">
                                                <p>You have not input your performance report yet.</p>
                                            </td>
                                        </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                                {{ $groupedPerformanceReports->links('', ['pageName' => 'performancePage']) }}
                            </div>
                            {{-- <div class="history-promotion">
                                <h1><strong>CURRENT RANK</strong></h1>
                                <div class="divider">
                                    <img src="/assets/police-badge-police-svgrepo-com.svg" alt="Badge" width="50px"
                                        height="50px">
                                </div>
                                <div class="promotion-content" id="promotionItems">
                                    <ul>
                                    </ul>
                                </div>
                            </div> --}}
                        </div>
                        <div class="history-scorecard mt-5">
                            <h1><strong>HISTORY OF EVALUATION</strong></h1>
                            <table id="historyTable">
                                <thead>
                                    <tr>
                                        <th>Period Covered</th>
                                        <th class="action-btn">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($groupedEvaluations as $evaluation)
                                    <tr>
                                        <td scope="row">
                                            {{ $evaluation->period }} {{ $evaluation->year }}
                                        </td>
                                        <td>
                                            <a target="_blank"
                                                href="/admin/my-evaluation-score/{{ $evaluation->last_rating }}/{{ auth()->user()->last_name }}/{{ auth()->user()->first_name }}/{{ auth()->user()->police_id }}/{{ auth()->user()->id }}"
                                                class="btn btn-primary manage-btn btn-sm">
                                                <i class="far fa-eye"></i> View Evaluation Score
                                            </a>
                                        </td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td colspan="2" class="text-center">
                                            <p>You're not evaluated yet.</p>
                                        </td>
                                    </tr>
                                    @endforelse
                                </tbody>

                            </table>
                            {{ $groupedEvaluations->links('', ['pageName' => 'evaluationPage']) }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <style>
        body {
            background: #dfe9f5;
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
            margin-top: 10px;
            justify-content: center;
        }

        .history {
            display: flex;
            flex-direction: column;
            background-color: aliceblue;
            height: fit-content;
            width: fit-content;
            padding: 80px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .history-scorecard table {
            border-collapse: collapse;
            border: #2f343d 1px solid;
            width: 500px;
            margin-top: 10px;
        }

        .history-scorecard th,
        td {
            border-collapse: collapse;
            border: #2f343d 1px solid;
            text-align: center;
            padding: 5px;
        }

        .history-scorecard th {
            background-color: #333;
            color: whitesmoke;
        }

        .history-promotion {
            padding-left: 100px;
        }

        tbody {
            border: black 1px solid;
        }
    </style>
</div>
