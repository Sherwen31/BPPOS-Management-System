<div>
    <div class="modal show" id="alwaysOpenModal" tabindex="-1" aria-labelledby="alwaysOpenModal" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="alwaysOpenModal"><i class="far fa-lightbulb"></i> Reminder</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="alert alert-warning d-flex align-items-center gap-2" role="alert">
                        <i class="far fa-triangle-exclamation"></i>
                        <div>
                            <strong>Take note!</strong> You can print this page by pressing <strong>Ctrl</strong> + <strong>P</strong> on your keyboard.
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <table class="table text-center" style="font-size: 10px;">
        <thead class="table-dark">
            <tr>
                <th scope="col">Name</th>
                <th scope="col">Position</th>
                <th scope="col">Rank</th>
                <th scope="col">Position Duration</th>
                <th scope="col">Total Weight Score</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($users as $user)
            <tr>
                <td>
                    @if ($user->last_name)
                    {{ $user->last_name }},
                    @endif {{ $user->first_name }} {{ $user->middle_name }}
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
                        <strong>No data found.</strong>
                    </p>

                </td>
            </tr>
            @endforelse
        </tbody>
    </table>


    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var myModal = new bootstrap.Modal(document.getElementById('alwaysOpenModal'), {
                backdrop: 'static',
                keyboard: false
            });
            myModal.show();
        });
    </script>
</div>
