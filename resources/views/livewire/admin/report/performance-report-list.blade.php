<div>
    <div class="containerMod">
        @livewire('components.layouts.sidebar')
        <section class="mainMod">
            <button id="toggle-button">
                <i class="fas fa-bars"></i>
            </button>
            <div class="mainMod-top">
                <h1>Performance Report</h1>
            </div>
            <div class="d-flex justify-content-between">
                <div>
                    <input type="search" wire:model.live.debounce.200ms="search" class="form-control"
                        placeholder="Search...">
                </div>
                <div>
                    <a href="#" class="btn btn-primary btn-sm" data-bs-toggle="modal"
                        data-bs-target="#performanceReportModal">
                        <i class="far fa-file-plus"></i> Create Performance Report
                    </a>
                </div>
            </div>
            <div class="mainMod-skills">
                <div class="w-100">
                    <table class="table">
                        <thead class="table-dark">
                            <tr>
                                {{-- <th scope="col">ID</th> --}}
                                <th scope="col">Name</th>
                                <th scope="col">Position</th>
                                <th scope="col">Unit Assigned</th>
                                <th scope="col">Current Rank</th>
                                <th scope="col">Position Duration</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($users as $user)
                            <tr>
                                {{-- <th scope="row">
                                    {{ $user->id }}
                                </th> --}}
                                <td>
                                    @if ($user->last_name)
                                    {{ $user->last_name }},
                                    @endif {{ $user->first_name }} {{ $user->middle_name }}
                                    <br>
                                    <strong style="font-size: 12px;"><span
                                            class="text-muted fst-italic">Username:</span> {{
                                        $user->username }}</strong>
                                </td>

                                <td>
                                    {{ $user->position?->position_name }}
                                </td>
                                <td>
                                    {{ $user->unit?->unit_assignment }}
                                </td>
                                <td>
                                    {{ $user->rank }}
                                </td>
                                <td>
                                    @php
                                    $startDate = \Carbon\Carbon::parse($user->year_attended);
                                    $endDate = \Carbon\Carbon::now();

                                    $diff = $startDate->diff($endDate);

                                    $years = $diff->y;
                                    $months = $diff->m;
                                    $formattedDifference = $years !== 0 ? "{$years} years and {$months} months" :
                                    "{$months}
                                    months";
                                    @endphp
                                    {{ $formattedDifference }}
                                </td>

                                <td>
                                    @php
                                    $hasPerformanceReport = \App\Models\PerformanceReportRating::where('user_id',
                                    $user->id)
                                    ->whereBetween('created_at', [now()->startOfWeek(Illuminate\Support\Carbon::MONDAY),
                                    now()->endOfWeek(Illuminate\Support\Carbon::SUNDAY)])
                                    ->exists();
                                    @endphp
                                    <a wire:navigate @if ($hasPerformanceReport) wire:click='hasPerformanceReportData'
                                        @else
                                        href="/admin/performance-report/{{ $user->id }}/{{ $user->police_id }}"
                                        @endif
                                        class="btn btn-sm btn-primary manage-btn {{ $hasPerformanceReport ? 'bg-primary-subtle' : 'btn-primary' }}">
                                        <i class="fad fa-chart-simple"></i> Report
                                    </a>

                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="6" class="text-center">
                                    <p class="text-center mt-2"><strong>{{ $search ? 'No "' . $search . '" users found' : 'No users yet' }}</strong></p>
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>

                    {{ $users->links() }}
                </div>
            </div>
        </section>
    </div>

    <div wire:ignore.self class="modal fade" id="performanceReportModal" tabindex="-1"
        aria-labelledby="performanceReportModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
                <form wire:submit.prevent='save'>
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="performanceReportModalLabel">Add Performance Report</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3 form-floating col-12">
                            <input type="text" class="form-control" id="activity" wire:model="activity"
                                placeholder="Activity">
                            <label for="activity" class="form-label">Activity</label>
                            @error('activity')
                            <span class="text-danger text-sm">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3 form-floating">
                            <input type="text" class="form-control" id="measures" wire:model="measures"
                                placeholder="Measures">
                            <label for="measures" class="form-label">Measures</label>
                            @error('measures')
                            <span class="text-danger text-sm">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3 form-floating">
                            <input type="text" class="form-control" id="targets" wire:model="targets"
                                placeholder="Targets">
                            <label for="targets" class="form-label">Targets</label>
                            @error('targets')
                            <span class="text-danger text-sm">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3 form-floating">
                            <input type="text" class="form-control" id="remarks" wire:model="remarks"
                                placeholder="Remarks">
                            <label for="remarks" class="form-label">Remarks</label>
                            @error('remarks')
                            <span class="text-danger text-sm">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">
                            <span wire:loading.remove wire:target='save'>Save</span>
                            <span wire:loading wire:target='save'><span class="spinner-border spinner-border-sm"></span>
                                Saving...</span>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('livewire:navigated', ()=>{

            @this.on('toastr', (event) => {
                const data=event
                toastr[data[0].type](data[0].message, '', {
                closeButton: true,
                "progressBar": true,
                timeOut: 5000,
                });
            })
        })
    </script>
</div>
