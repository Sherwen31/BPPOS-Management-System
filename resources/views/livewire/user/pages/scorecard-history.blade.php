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
                                                    href="/users/my-scorecard/{{ $item->start_date }}/{{ $item->end_date }}"
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
                                                href="/users/my-evaluation-score/{{ $evaluation->last_rating }}/{{ auth()->user()->last_name }}/{{ auth()->user()->first_name }}/{{ auth()->user()->police_id }}/{{ auth()->user()->id }}"
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
    </style>
</div>
