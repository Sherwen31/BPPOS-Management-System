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
                                                <p>This user is no performance data added yet.</p>
                                            </td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                            {{ $groupedPerformanceReports->links() }}
                        </div>
                        <div class="history-promotion">
                            <h1><strong>RECENT PROMOTIONS</strong></h1>
                            <div class="divider">
                                <img src="/assets/police-badge-police-svgrepo-com.svg" alt="Badge" width="50px"
                                    height="50px">
                            </div>
                            <div class="promotion-content" id="promotionItems">
                                <ul>
                                    <!-- Promotion items will be dynamically inserted here -->
                                </ul>
                            </div>
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
