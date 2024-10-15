<div>
    <div class="container mt-5">
        <div class="mb-5">
            <a href="/super-admin/history/{{ $user->id }}/{{ $user->police_id }}" wire:navigate class="btn text-dark btn-default mt-3 btn-sm bg-dark-subtle"><i class="far fa-arrow-left"></i> Back</a>
        </div>

        <div class="card mb-5">
            <div class="card-body">
                <h2 class="text-center">Scorecard History</h2>
                <form>
                    <div class="container mb-5">
                        <h5>Period Covered</h5>
                        <div>
                            <p>{{ $dateCovered->start_date->format('F j') }} -
                                {{ $dateCovered->end_date->format('j, Y') }}</p>
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
                            @foreach ($performanceItems as $item)
                            <tr>
                                <td>{{ $item->activity }}
                                </td>
                                <td>{{ $item->measures }}</td>
                                <td>{{ $item->targets }}</td>
                                @foreach ($item->performanceReportRatings as $rating)
                                <td>{{ $rating->monday }}</td>
                                <td>{{ $rating->tuesday }}</td>
                                <td>{{ $rating->wednesday }}</td>
                                <td>{{ $rating->thursday }}</td>
                                <td>{{ $rating->friday }}</td>
                                <td>{{ $rating->saturday }}</td>
                                <td>{{ $rating->sunday }}</td>
                                <td>{{ $rating->total }}</td>
                                <td>{{ $rating->cost }}</td>
                                @endforeach
                                <td class="text-center">{{ $item->remarks }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
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
</div>
