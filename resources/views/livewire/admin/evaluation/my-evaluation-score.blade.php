<div>
    <div class="container-fluid" style="font-size: 11px;">
        <center>
            <div>
                <span class="text-center text-uppercase"><strong>Police Non Commissioned Officer Performance Evaluation
                        Report</strong></span>
                <br>
                <span class="text-center"><strong>FOR {{ $rank }} To {{ $rank }} (1<sup>st</sup> Level)</strong></span>
                <br>
                <span class="text-center"><strong>Rating Period: @foreach($date_period as $period)
                    {{ $period }}
                    @endforeach</strong></span>
            </div>
        </center>

        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th colspan="8">1. Ratee's Name (Last Name, Given Name, Middle Name)<br>
                            <span class="p-2">{{ $last_name }}, {{ $first_name }} {{ $middle_name }}</span>
                        </th>
                        <th colspan="8">2. Rank:<br> <span style="margin-left: 20px;">{{ $rank }}</span></th>
                    </tr>
                    <tr>
                        <th colspan="8">
                            3. Position / Designation: <br>
                            <div class="p-2">{{ $position }}</div>
                        </th>

                        <th colspan="8">4. Unit Assignment / Station / District <br><span style="margin-left: 20px;">{{
                                $unit_assign }}</span></th>
                    </tr>
                    <tr>
                        <th colspan="16">
                            5. Years and Months in Current Position: <br>
                            <div class="p-2">
                                @php
                                $startDate = \Carbon\Carbon::parse($year_attended);
                                $endDate = \Carbon\Carbon::now();

                                $diff = $startDate->diff($endDate);

                                $years = $diff->y;
                                $months = $diff->m;
                                $formattedDifference = $years !== 0 ? "{$years} years and {$months} months" : "{$months} months";
                                @endphp
                                {{ $formattedDifference }}
                            </div>
                        </th>

                    </tr>
                    <tr class="table-light">
                        <th class="text-center" rowspan="2">Parts</th>
                        <th class="text-center" rowspan="2">Dimensions</th>
                        <th class="text-center" rowspan="2" colspan="4">Performance Indications</th>
                        <th class="text-center" rowspan="2" colspan="5">Uploaded Attachments</th>
                    </tr>
                    <tr class="table-light">
                        <th class="text-center">Point Allocation</th>
                        <th class="text-center"></th>
                        <th class="text-center">Numerical Rating</th>
                        <th class="text-center"></th>
                        <th class="text-center">Weighted Score</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Output (25 points) -->
                    @foreach ($evaluations->where('title', 'Output') as $evaluation)
                    <tr>
                        <td class="text-center" rowspan="4">I</td>
                        <td class="text-center" rowspan="4">{{ $evaluation->title }} ({{ $evaluation->sub_title }} points)</td>
                        @foreach ($evaluation->evaluationItems as $item)
                        <td colspan="4">{{ $item->performance_indications }}</td>
                        @php
                            $uploadedAttachment = $item->evaluationAttachments->where('evaluation_item_id', $item->id)->where('user_id', Auth::user()->id)->first();
                        @endphp
                        <td colspan="5" align="center">
                            @if ($uploadedAttachment && $uploadedAttachment->attachment !== null)
                            <a target="_blank" href="{{ Storage::url($uploadedAttachment->attachment) }}"><i class="far fa-eye"
                                class="btn btn-sm btn-primary"></i> View</a>
                            @else
                            No attachment
                            @endif
                        </td>
                        <td class="text-center">{{ $item->point_allocation }}</td>
                        <td class="text-center">x</td>
                        @forelse ($item->evaluationRatings->where('user_id', $user->id) as $rating)
                        <td class="text-center">{{ $rating->numerical_rating }}</td>
                        <td class="text-center">=</td>
                        <td class="text-center">{{ $rating->weight_score }}</td>
                        @empty
                        <td class="text-center">0</td>
                        <td class="text-center">=</td>
                        <td class="text-center">0</td>
                        @endforelse
                    </tr>
                    @endforeach
                    @endforeach
                    @foreach ($evaluations->where('title', 'Job Knowledge') as $evaluation)
                    <tr>
                        <td class="text-center" rowspan="22">II</td>
                        <td class="text-center" rowspan="8">{{ $evaluation->title }} ({{ $evaluation->sub_title }} points)</td>
                        @foreach ($evaluation->evaluationItems as $item)
                        <td colspan="4">{{ $item->performance_indications }}</td>
                        @php
                            $uploadedAttachment = $item->evaluationAttachments->where('evaluation_item_id', $item->id)->where('user_id', Auth::user()->id)->first();
                        @endphp
                        <td colspan="5" align="center">
                            @if ($uploadedAttachment && $uploadedAttachment->attachment !== null)
                            <a target="_blank" href="{{ Storage::url($uploadedAttachment->attachment) }}"><i class="far fa-eye"
                                class="btn btn-sm btn-primary"></i> View</a>
                            @else
                            No attachment
                            @endif
                        </td>
                        <td class="text-center">{{ $item->point_allocation }}</td>
                        <td class="text-center">x</td>
                        @forelse ($item->evaluationRatings->where('user_id', $user->id) as $rating)
                        <td class="text-center">{{ $rating->numerical_rating }}</td>
                        <td class="text-center">=</td>
                        <td class="text-center">{{ $rating->weight_score }}</td>
                        @empty
                        <td class="text-center">0</td>
                        <td class="text-center">=</td>
                        <td class="text-center">0</td>
                        @endforelse
                    </tr>
                    @endforeach
                    @endforeach
                    @foreach ($evaluations->where('title', 'Work Management') as $evaluation)
                    <tr>
                        <td class="text-center" rowspan="6">{{ $evaluation->title }} ({{ $evaluation->sub_title }} points)</td>
                        @foreach ($evaluation->evaluationItems as $item)
                        <td colspan="4">{{ $item->performance_indications }}</td>
                        @php
                            $uploadedAttachment = $item->evaluationAttachments->where('evaluation_item_id', $item->id)->where('user_id', Auth::user()->id)->first();
                        @endphp
                        <td colspan="5" align="center">
                            @if ($uploadedAttachment && $uploadedAttachment->attachment !== null)
                            <a target="_blank" href="{{ Storage::url($uploadedAttachment->attachment) }}"><i class="far fa-eye"
                                class="btn btn-sm btn-primary"></i> View</a>
                            @else
                            No attachment
                            @endif
                        </td>
                        <td class="text-center">{{ $item->point_allocation }}</td>
                        <td class="text-center">x</td>
                        @forelse ($item->evaluationRatings->where('user_id', $user->id) as $rating)
                        <td class="text-center">{{ $rating->numerical_rating }}</td>
                        <td class="text-center">=</td>
                        <td class="text-center">{{ $rating->weight_score }}</td>
                        @empty
                        <td class="text-center">0</td>
                        <td class="text-center">=</td>
                        <td class="text-center">0</td>
                        @endforelse
                    </tr>
                    @endforeach
                    @endforeach
                    @foreach ($evaluations->where('title', 'Interpersonal Relationship') as $evaluation)
                    <tr>
                        <td class="text-center" rowspan="5">{{ $evaluation->title }} ({{ $evaluation->sub_title }} points)</td>
                        @foreach ($evaluation->evaluationItems as $item)
                        <td colspan="4">{{ $item->performance_indications }}</td>
                        @php
                            $uploadedAttachment = $item->evaluationAttachments->where('evaluation_item_id', $item->id)->where('user_id', Auth::user()->id)->first();
                        @endphp
                        <td colspan="5" align="center">
                            @if ($uploadedAttachment && $uploadedAttachment->attachment !== null)
                            <a target="_blank" href="{{ Storage::url($uploadedAttachment->attachment) }}"><i class="far fa-eye"
                                class="btn btn-sm btn-primary"></i> View</a>
                            @else
                            No attachment
                            @endif
                        </td>
                        <td class="text-center">{{ $item->point_allocation }}</td>
                        <td class="text-center">x</td>
                        @forelse ($item->evaluationRatings->where('user_id', $user->id) as $rating)
                        <td class="text-center">{{ $rating->numerical_rating }}</td>
                        <td class="text-center">=</td>
                        <td class="text-center">{{ $rating->weight_score }}</td>
                        @empty
                        <td class="text-center">0</td>
                        <td class="text-center">=</td>
                        <td class="text-center">0</td>
                        @endforelse
                    </tr>
                    @endforeach
                    @endforeach
                    @foreach ($evaluations->where('title', 'Concern for the Organization') as $evaluation)
                    <tr>
                        <td class="text-center" rowspan="3">{{ $evaluation->title }} ({{ $evaluation->sub_title }} points)</td>
                        @foreach ($evaluation->evaluationItems as $item)
                        <td colspan="4">{{ $item->performance_indications }}</td>
                        @php
                            $uploadedAttachment = $item->evaluationAttachments->where('evaluation_item_id', $item->id)->where('user_id', Auth::user()->id)->first();
                        @endphp
                        <td colspan="5" align="center">
                            @if ($uploadedAttachment && $uploadedAttachment->attachment !== null)
                            <a target="_blank" href="{{ Storage::url($uploadedAttachment->attachment) }}"><i class="far fa-eye"
                                class="btn btn-sm btn-primary"></i> View</a>
                            @else
                            No attachment
                            @endif
                        </td>
                        <td class="text-center">{{ $item->point_allocation }}</td>
                        <td class="text-center">x</td>
                        @forelse ($item->evaluationRatings->where('user_id', $user->id) as $rating)
                        <td class="text-center">{{ $rating->numerical_rating }}</td>
                        <td class="text-center">=</td>
                        <td class="text-center">{{ $rating->weight_score }}</td>
                        @empty
                        <td class="text-center">0</td>
                        <td class="text-center">=</td>
                        <td class="text-center">0</td>
                        @endforelse
                    </tr>
                    @endforeach
                    @endforeach

                    @foreach ($evaluations->where('title', 'Personal Qualities') as $evaluation)
                    <tr>
                        <td class="text-center" rowspan="6">III</td>
                        <td class="text-center" rowspan="6">{{ $evaluation->title }} ({{ $evaluation->sub_title }} points)</td>
                        @foreach ($evaluation->evaluationItems as $item)
                        <td class="text-center"><strong>{{ $item->performance_indications }}</strong></td>
                        <td class="text-center"><strong>X</strong></td>
                        <td class="text-center"><strong>{{ $item->performance_indications }}</strong></td>
                        <td class="text-center"><strong>X</strong></td>d</td>
                        <td colspan="5" rowspan="6" class="text-center align-middle">
                            @php
                                $uploadedAttachment = $item->evaluationAttachments->where('evaluation_item_id', $item->id)->where('user_id', Auth::user()->id)->first();
                            @endphp
                            @if ($uploadedAttachment && $uploadedAttachment->attachment !== null)
                            <a target="_blank" href="{{ Storage::url($uploadedAttachment->attachment) }}"><i class="far fa-eye"
                                class="btn btn-sm btn-primary"></i> View</a>
                            @else
                            No attachment
                            @endif
                        </td>
                        <td rowspan="6" class="text-center align-middle">{{ $item->point_allocation }}</td>
                        <td rowspan="6" class="text-center align-middle">X</td>
                        @forelse ($item->evaluationRatings->where('user_id', $user->id) as $rating)
                        <td rowspan="6" class="text-center align-middle">{{ $rating->numerical_rating }}</td>
                        <td rowspan="6" class="text-center align-middle">=</td>
                        <td rowspan="6" class="text-center align-middle">{{ $rating->weight_score }}</td>
                        @empty
                        <td rowspan="6" class="text-center align-middle">0</td>
                        <td rowspan="6" class="text-center align-middle">=</td>
                        <td rowspan="6" class="text-center align-middle">0</td>
                        @endforelse
                        @endforeach
                    </tr>
                    <tr>
                        <td class="text-center">Morally Upright</td>
                        <td class="text-center">X</td>
                        <td class="text-center">Civic-Minded</td>
                        <td class="text-center">X</td>
                    </tr>
                    <tr>
                        <td class="text-center">Honest</td>
                        <td class="text-center">X</td>
                        <td class="text-center">Responsible</td>
                        <td class="text-center">X</td>
                    </tr>
                    <tr>
                        <td class="text-center">Well-groomed</td>
                        <td class="text-center">X</td>
                        <td class="text-center">Discipline</td>
                        <td class="text-center">X</td>
                    </tr>
                    <tr>
                        <td class="text-center">Fair and Just</td>
                        <td class="text-center">X</td>
                        <td class="text-center">Courteous/tactful</td>
                        <td class="text-center">X</td>
                    </tr>
                    <tr>
                        <td class="text-center">Loyal to the organization</td>
                        <td class="text-center">X</td>
                        <td class="text-center">Initiates Positive Action</td>
                        <td class="text-center">X</td>
                    </tr>
                    <tr>
                        <td colspan="10">
                            <div style="margin-left: 45%;">Nr of Traits with check marks</div>
                        </td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    @endforeach
                    <tr>
                        <td colspan="15">
                            <div style="margin-left: 24%;">TOTAL WEIGHTED SCORE (TWS)</div>
                        </td>
                        <td rowspan="3" colspan="2" class="vAlign">
                            {{ $total_weight_score }} <br> {{ number_format($user_total_points, 1) }}
                            <br>
                            <span>
                                @if ($user_total_points >= 91 && $user_total_points <= 100)
                            OS
                            @elseif ($user_total_points >= 81 && $user_total_points <= 90.99)
                            VS
                            @elseif ($user_total_points >= 71 && $user_total_points <= 80.99)
                            SF
                            @elseif ($user_total_points >= 0.01 &&$user_total_points <= 70.99)
                            PR
                            @else
                            No rating yet
                            @endif
                            </span>
                        </td>

                    </tr>
                    <tr>
                        <td colspan="15">
                            <div style="margin-left: 24%;">NUMERICAL PERFORMANCE RATING (NPR) = TWS / 5</div>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="15">
                            <div style="margin-left: 24%;">EQUIVALENT ADJECTIVAL PERFORMANCE RATING (APR) (Pls refer to
                                NPR-APR Table)</div>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="16">Rater's Assessment of Ratee: I certify that this report represents my best
                            judgment. [X] I DP : : I DO NOT recommend this personnel be granted (a) promotion (b)
                            designation to higher position (c) relief<br>
                            This personnel needs Improvements on the following:
                        </td>
                    </tr>
                    <tr>
                        <td colspan="16">Significant / Critical Incident(s)</td>
                    </tr>
                    <tr>
                        <td colspan="4" class="vAlign fw-bold">Acknowledged:
                            <br />
                            <br />
                            {{ $significant->userRater->rank->rank_name }}
                            <br />{{ $significant->userRater->position->position_name }} {{ $significant->userRater->unit->unit_assignment }}
                        </td>
                        <td class="vAlign fw-bold" colspan="7">Conformed:
                            <br />
                            <br />
                            {{ $significant->user->rank->rank_name }}
                            <br />{{ $significant->user->position->position_name }} / {{ $significant->user->unit->unit_assignment }}
                        </td>
                        <td class="vAlign fw-bold" colspan="5">Attested:
                            <br />
                            <br />
                            {{ $significant->userReviewer->rank->rank_name }}, {{ $significant->userReviewer->position->position_name }}
                            <br />
                        </td>
                    </tr>
                    <tr>
                        <td class="vAlign fw-bold" colspan="4">RATER</td>
                        <td class="vAlign fw-bold" colspan="7">RATEE</td>
                        <td class="vAlign fw-bold" colspan="5">REVIEWER</td>
                    </tr>
                </tbody>
            </table>
            <span style="margin-left: 30px; margin-top: -18px; position: absolute"><i>(IF REFERRED TO THE GRIEVANCE
                    COMMITTEE)</i></span>
            <span style="margin-left: 30px; margin-top: -4px; position: absolute">I certify that this report was
                referred to the Grievance Committee for review and evaluation.</span>
        </div>
        <br>

        <div class="mt-2 d-flex justify-content-between">
            <div class="text-center">
                <span><u>{{ $significant->created_at->format('F j, Y') }}</u></span>
                <br>
                <span>Date Accomplished</span>
            </div>
            <div class="text-center">
                <span><u></u></span>
                <br>
                <span>Signature</span>
                <br>
                <span>Head, Grievance Committee</span>
            </div>
        </div>

    </div>

    <style>
        table td,
        table th {
            padding: 0 !important;
            margin: 0 !important;
        }

        @media print {
            @page {
                margin: 0;
                /* Removes default margins */
            }

            body {
                margin: 0;
                padding: 0;
            }

            .container-fluid {
                margin-top: 0;
                margin-bottom: 0;
            }

            /* Optional: Hide non-print elements, if any */
            /* .non-printable { display: none; } */
        }

        .align-middle {
            vertical-align: middle;
            /* Aligns content to the middle */
        }

        .vAlign {
            vertical-align: middle;
            text-align: center;
        }
    </style>
</div>
