<div>
    <div class="container mt-5">
        <div class="mb-5">
            <a href="/admin/performance-report" class="btn btn-sm btn-default mt-3 text-dark bg-dark-subtle"
                wire:navigate><i class="far fa-arrow-left"></i> Back to performance report</a>
        </div>

        <div class="card mb-5">
            <div class="card-body">
                <h2 class="text-center"><strong>Performance Report</strong></h2>
                <form wire:submit.prevent='save'>
                    <div class="container mb-5">
                        <h6><strong>Rank:</strong>
                            {{ $user->rank }}
                        </h6>
                        <h6><strong>Name:</strong>
                            {{ $user->first_name }}
                            {{ $user->last_name }}
                        </h6>
                        <h6><strong>Position:</strong>
                            {{ $user->position?->position_name ?: 'Not added yet' }}
                        </h6>
                    </div>
                    {{-- <div class="container mb-5">
                        <h5>Select Period Covered</h5>
                        <div class="form-group">
                            <label for="start_data">Start Date:</label>
                            <input type="text" class="form-control" id="start_data" wire:model="start_data">
                        </div>
                        <div class="form-group">
                            <label for="end_date">End Date:</label>
                            <input type="text" class="form-control" id="end_date" wire:model="end_date">
                        </div>
                    </div> --}}
                    <div class="container mb-5">
                        <h5>Select Period Covered</h5>
                        <span class="mt-3">
                            <span class="placeholder col-3" wire:loading wire:target='start_date, end_date'></span>
                            <span wire:loading.remove wire:target='start_date, end_date'>@if($start_date &&
                                $end_date)Selected Range: {{ $start_date }} to {{ $end_date }} @endif</span>
                        </span>
                        <div class="form-group">
                            <label for="dateRange">Date Range:</label>
                            <input type="text" class="form-control w-25" id="dateRange" wire:model="dateRange"
                                placeholder="Select date range" />
                            @error('start_date')
                            <span class="text-sm text-danger">Select date first before saving</span>
                            @enderror
                        </div>
                    </div>
                    <table class="table table-bordered table-hover">
                        <thead class="table-dark">
                            <tr>
                                <th class="text-center" rowspan="2">SUB-ACTIVITY<br>(Enabling Actions)</th>
                                <th rowspan="2">Measures</th>
                                <th rowspan="2">TARGETS</th>
                                <th colspan="7">ACCOMPISHMENTS</th>
                                <th rowspan="2">TOTAL</th>
                                <th rowspan="2" style="width: 150px;">COST</th>
                                <th rowspan="2">REMARKS</th>
                            </tr>
                            <tr>
                                <th class="text-center">Mon</th>
                                <th class="text-center">Tue</th>
                                <th class="text-center">Wed</th>
                                <th class="text-center">Thu</th>
                                <th class="text-center">Fri</th>
                                <th class="text-center">Sat</th>
                                <th class="text-center">Sun</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($performance_report_items as $item)
                            <tr>
                                <td>{{ $item->activity }}
                                </td>
                                <td>{{ $item->measures }}</td>
                                <td>{{ $item->targets }}</td>
                                <td><input type="number" wire:model.live.debounce.200ms='monday.{{ $item->id }}'
                                        class="form-control text-center" min="0"></td>
                                <td><input type="number" wire:model.live.debounce.200ms='tuesday.{{ $item->id }}'
                                        class="form-control text-center" min="0"></td>
                                <td><input type="number" wire:model.live.debounce.200ms='wednesday.{{ $item->id }}'
                                        class="form-control text-center" min="0"></td>
                                <td><input type="number" wire:model.live.debounce.200ms='thursday.{{ $item->id }}'
                                        class="form-control text-center" min="0"></td>
                                <td><input type="number" wire:model.live.debounce.200ms='friday.{{ $item->id }}'
                                        class="form-control text-center" min="0"></td>
                                <td><input type="number" wire:model.live.debounce.200ms='saturday.{{ $item->id }}'
                                        class="form-control text-center" min="0"></td>
                                <td><input type="number" wire:model.live.debounce.200ms='sunday.{{ $item->id }}'
                                        class="form-control text-center" min="0"></td>
                                <td id="total1">
                                    <span wire:loading.remove
                                        wire:target='monday.{{ $item->id }}, tuesday.{{ $item->id }}, wednesday.{{ $item->id }}, thursday.{{ $item->id }}, friday.{{ $item->id }}, saturday.{{ $item->id }}, sunday.{{ $item->id }}'>
                                        {{
                                        (int)($monday[$item->id] ?? 0) +
                                        (int)($tuesday[$item->id] ?? 0) +
                                        (int)($wednesday[$item->id] ?? 0) +
                                        (int)($thursday[$item->id] ?? 0) +
                                        (int)($friday[$item->id] ?? 0) +
                                        (int)($saturday[$item->id] ?? 0) +
                                        (int)($sunday[$item->id] ?? 0)
                                        }}
                                    </span>
                                    <span wire:loading
                                        wire:target='monday.{{ $item->id }}, tuesday.{{ $item->id }}, wednesday.{{ $item->id }}, thursday.{{ $item->id }}, friday.{{ $item->id }}, saturday.{{ $item->id }}, sunday.{{ $item->id }}'>
                                        <span class="spinner-grow spinner-grow-sm"></span>
                                    </span>
                                </td>

                                <td><textarea wire:model='cost.{{ $item->id }}' class="form-control" id="cost"
                                        rows="1"></textarea></td>
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
                    <div class="d-flex justify-content-end">
                        <button class="btn btn-sm btn-primary">
                            <span wire:loading.remove wire:target='save'><i class="far fa-save"></i> Save</span>
                            <span wire:loading wire:target='save'><span class="spinner-border spinner-border-sm"></span>
                                Saving...</span>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <style>
        /* Center text horizontally and vertically in all cells */
        table td,
        table th {
            text-align: center;
            vertical-align: middle;
        }

        /* Exclude the first td in the thead from centering */
        thead td:first-child,
        thead th:first-child {
            text-align: left;
            /* or any other alignment */
            /* vertical-align: top; */
            /* or any other alignment */
        }

        tbody td:first-child,
        tbody th:first-child {
            text-align: left;
            /* or any other alignment */
            vertical-align: top;
            /* or any other alignment */
        }
    </style>

    <script>
        $(document).ready(function() {
            $('#start').datepicker({
                format: 'mm/dd/yyyy',
                autoclose: true
            }).on('changeDate', function(e) {
                $('#end').datepicker('setStartDate', e.date);
            });

            $('#end').datepicker({
                format: 'mm/dd/yyyy',
                autoclose: true
            }).on('changeDate', function(e) {
                $('#start').datepicker('setEndDate', e.date);
            });
        });
    </script>

    <script>
        $(function() {
            $('#dateRange').daterangepicker({
                opens: 'left',
                locale: {
                    format: 'YYYY-MM-DD'
                },
                startDate: moment().day(1),
                endDate: moment().day(7),
                isInvalidDate: function(date) {
                    return date.day() !== 1;
                }
            }, function(start, end) {
                @this.set('start_date', start.format('YYYY-MM-DD'));
                @this.set('end_date', end.format('YYYY-MM-DD'));
            });

            $('#dateRange').on('apply.daterangepicker', function(ev, picker) {
                const newEndDate = moment(picker.startDate).add(6, 'days');
                picker.setEndDate(newEndDate);
                @this.set('end_date', newEndDate.format('YYYY-MM-DD'));
            });

            $('#dateRange').on('show.daterangepicker', function(ev, picker) {
                picker.setEndDate(moment(picker.startDate).add(6, 'days'));
            });
        });
    </script>


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
