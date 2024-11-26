<div>
    <div>
        <div class="containerMod">
            @livewire('components.layouts.sidebar')
            <section class="mainMod">
                <button id="toggle-button">
                    <i class="fas fa-bars"></i>
                </button>
                <div class="mainMod-top mb-5">
                    <h1>Evaluation Score Management</h1>
                </div>
                <div class="accordion-item mb-3">
                    <h2 class="accordion-header d-grid justify-content-center">
                        <button class="accordion-button p-2 rounded collapsed bg-dark text-light" type="button"
                            data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false"
                            aria-controls="collapseTwo">
                            Display Rating Indicator
                        </button>
                    </h2>
                    <div id="collapseTwo" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            <div class="mb-5 d-flex justify-content-center w-100 mt-2">
                                <div class="col-md-8">
                                    <table class="table table-bordered table-hover">
                                        <thead class="table-dark">
                                            <tr>
                                                <th>Numerical Rating</th>
                                                <th>Number of Traits</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>5</td>
                                                <td>Nine (9) to Ten (10)</td>
                                            </tr>
                                            <tr>
                                                <td>4</td>
                                                <td>Seven (7) to Eight (8)</td>
                                            </tr>
                                            <tr>
                                                <td>3</td>
                                                <td>Five (5) to Six (6)</td>
                                            </tr>
                                            <tr>
                                                <td>2</td>
                                                <td>Three (3) to Four (4)</td>
                                            </tr>
                                            <tr>
                                                <td>1</td>
                                                <td>One (1) to Two (2)</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <form wire:submit.prevent='filter'>
                    <div class="d-flex gap-3">
                        <span class="text-center mt-2">
                            Filter by:
                        </span>
                        <div>
                            <div class="form-group">
                                <select wire:model="date_range" class="form-select">
                                    <option selected hidden>Select Date Range</option>
                                    <option disabled>Select Date Range</option>
                                    <option value="first_half">January - June</option>
                                    <option value="second_half">July - December
                                    </option>
                                </select>
                                @error('date_range')
                                <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div>
                            <div class="form-group">
                                <select wire:model='year' class="form-select">
                                    <option selected hidden>Select Year</option>
                                    <option disabled>Select Year</option>
                                    @foreach($years as $year)
                                    <option value="{{ $year }}">{{ $year }}</option>
                                    @endforeach
                                </select>
                                @error('year')
                                <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div>
                            <div class="d-flex justify-content-between gap-2 mt-1">
                                <button wire:click='resetDateRange' class="rounded btn btn-secondary btn-sm"
                                    type="button">Reset</button>
                                <button type="submit" class="rounded btn btn-primary btn-sm">
                                    <span wire:loading.remove wire:target='filter'>Filter</span>
                                    <span wire:loading wire:target='filter'>Filtering...</span>
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
                @if ($users)
                <div class="mt-3">
                    <strong>
                        <h4>
                            @if ($users->count() > 0)
                            {{ $users->count() > 1 ? $users->count() . " results founded" : $users->count() . " result
                            founded" }}
                            @endif
                        </h4>
                    </strong>
                </div>
                @endif
                <div class="mainMod-skills">
                    @if ($users)
                    <table class="table">
                        <thead class="table-dark">
                            <tr>
                                <th scope="col">Name</th>
                                <th scope="col">Position</th>
                                <th scope="col">Rank</th>
                                <th scope="col">Position Duration</th>
                                <th scope="col">Total Numerical Performance</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($users as $user)
                            <tr>
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
                                    {{ $user->position->position_name }}
                                </td>
                                <td>
                                    {{ $user->rank->rank_name }}
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

                                    $output_sub_title_points = null;
                                    $job_knowledge_sub_title_points = null;
                                    $work_management_sub_title_points = null;
                                    $interpersonal_relationship_sub_title_points = null;
                                    $concern_for_the_organization_sub_title_points = null;
                                    $personal_qualitites_sub_title_points = null;

                                    $output_sub_title = null;
                                    $job_knowledge_sub_title = null;
                                    $work_management_sub_title = null;
                                    $interpersonal_relationship_sub_title = null;
                                    $concern_for_the_organization_sub_title = null;
                                    $personal_qualitites_sub_title = null;

                                    $output_sub_title_total_points = null;
                                    $job_knowledge_sub_title_total_points = null;
                                    $work_management_sub_title_total_points = null;
                                    $interpersonal_relationship_sub_title_total_points = null;
                                    $concern_for_the_organization_sub_title_total_points = null;
                                    $personal_qualitites_sub_title_total_points = null;

                                    $max_points = 5;

                                    $average_output = null;
                                    $average_job_knowledge = null;
                                    $average_work_management = null;
                                    $average_interpersonal_relationship = null;
                                    $average_concern_for_the_organization = null;
                                    $average_personal_qualitites = null;

                                    $total_average = null;

                                    foreach (\App\Models\Evaluation::all() as $evaluation) {
                                        if ($evaluation->title === "Output") {

                                            $output_sub_title = $evaluation->sub_title;

                                            $output_sub_title_total_points = $evaluation->evaluationItems->sum('point_allocation') * $max_points;

                                            foreach ($evaluation->evaluationItems as $item) {

                                            $output_sub_title_points += $item->evaluationRatings->where('user_id', $user->id)->sum('weight_score');

                                            }

                                            $average_output = $output_sub_title_points / $output_sub_title_total_points * $output_sub_title;

                                        }
                                        if ($evaluation->title === "Job Knowledge") {

                                            $job_knowledge_sub_title = $evaluation->sub_title;

                                            $job_knowledge_sub_title_total_points = $evaluation->evaluationItems->sum('point_allocation') * $max_points;

                                            foreach ($evaluation->evaluationItems as $item) {

                                                $job_knowledge_sub_title_points += $item->evaluationRatings->where('user_id', $user->id)->sum('weight_score');

                                            }

                                            $average_job_knowledge = $job_knowledge_sub_title_points / $job_knowledge_sub_title_total_points * $job_knowledge_sub_title;
                                        }
                                        if ($evaluation->title === "Work Management") {

                                            $work_management_sub_title = $evaluation->sub_title;

                                            $work_management_sub_title_total_points = $evaluation->evaluationItems->sum('point_allocation') * $max_points;

                                            foreach ($evaluation->evaluationItems as $item) {

                                                $work_management_sub_title_points += $item->evaluationRatings->where('user_id', $user->id)->sum('weight_score');

                                            }

                                            $average_work_management = $work_management_sub_title_points / $work_management_sub_title_total_points * $work_management_sub_title;
                                        }
                                        if ($evaluation->title === "Interpersonal Relationship") {

                                            $interpersonal_relationship_sub_title = $evaluation->sub_title;

                                            $interpersonal_relationship_sub_title_total_points = $evaluation->evaluationItems->sum('point_allocation') * $max_points;

                                            foreach ($evaluation->evaluationItems as $item) {

                                                $interpersonal_relationship_sub_title_points += $item->evaluationRatings->where('user_id', $user->id)->sum('weight_score');

                                            }

                                            $average_interpersonal_relationship = $interpersonal_relationship_sub_title_points / $interpersonal_relationship_sub_title_total_points * $interpersonal_relationship_sub_title;

                                        }
                                        if ($evaluation->title === "Concern for the Organization") {

                                            $concern_for_the_organization_sub_title = $evaluation->sub_title;

                                            $concern_for_the_organization_sub_title_total_points = $evaluation->evaluationItems->sum('point_allocation') * $max_points;

                                            foreach ($evaluation->evaluationItems as $item) {

                                                $concern_for_the_organization_sub_title_points += $item->evaluationRatings->where('user_id', $user->id)->sum('weight_score');

                                            }

                                            $average_concern_for_the_organization = $concern_for_the_organization_sub_title_points / $concern_for_the_organization_sub_title_total_points * $concern_for_the_organization_sub_title;
                                        }
                                        if ($evaluation->title === "Personal Qualities") {

                                            $personal_qualitites_sub_title = $evaluation->sub_title;

                                            $personal_qualitites_sub_title_total_points = $evaluation->evaluationItems->sum('point_allocation') * $max_points;

                                            foreach ($evaluation->evaluationItems as $item) {

                                                $personal_qualitites_sub_title_points += $item->evaluationRatings->where('user_id', $user->id)->sum('weight_score');

                                            }

                                            $average_personal_qualitites = $personal_qualitites_sub_title_points / $personal_qualitites_sub_title_total_points * $personal_qualitites_sub_title;
                                        }
                                    }

                                    $total_average = $average_output + $average_job_knowledge + $average_work_management + $average_interpersonal_relationship + $average_concern_for_the_organization + $average_personal_qualitites;

                                    @endphp
                                    {{ number_format($total_average, 1) }} -
                                    <span class="fw-bold">
                                        @if ($total_average >= 91 && $total_average <= 100)
                                            OS
                                        @elseif ($total_average >= 81 && $total_average <= 90.99)
                                            VS
                                        @elseif ($total_average >= 71 && $total_average <= 80.99)
                                            SF
                                        @elseif ($total_average >= 0.01 &&$total_average <= 70.99)
                                            PR
                                        @else
                                            No rating yet
                                        @endif
                                    </span>
                                </td>

                            </tr>
                            @empty

                            <tr>
                                <td colspan="5">
                                    <p class="text-center mt-2">
                                        <strong>No data found for "{{ $date_range === "first_half" ? "January -
                                            June" :
                                            "July - December" }}, {{ $selected_year }}" filter.</strong>
                                    </p>

                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                    @else
                    <div class="container d-flex justify-content-center mt-5">
                        <div class="mt-5">
                            <h1 class="text-center" style="font-size: 60px;">
                                <p><i class="fas fa-filter icon text-danger"></i></p>
                            </h1>
                            <div class="notification">
                                <h3>Add filter first to see the data</h3>
                            </div>
                        </div>
                    </div>
                    @endif
                </div>

                @if($users)
                @if($users->count() > 0)
                <div class="d-flex justify-content-center">
                    @if (auth()->user()->hasRole('super_admin'))
                    <a target="_blank" href="/super-admin/print-evaluation-score/{{ $date_range }}/{{ $selected_year }}"
                        class="btn btn-sm text-dark btn-warning rounded">
                        <i class="far fa-print"></i> Print
                    </a>
                    @else
                    <a target="_blank" href="/admin/print-evaluation-score/{{ $date_range }}/{{ $selected_year }}"
                        class="btn btn-sm text-dark btn-warning rounded">
                        <i class="far fa-print"></i> Print
                    </a>
                    @endif
                </div>
                @endif
                @endif
            </section>
        </div>
    </div>

</div>
