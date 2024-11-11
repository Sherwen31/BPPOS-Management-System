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
                    {{ $user->evaluationRatings->sum('weight_score') }}
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
