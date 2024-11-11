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
                                    {{ $user->evaluationRatings->sum('weight_score') }}
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
