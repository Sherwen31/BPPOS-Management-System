<div>
    <div class="containerMod">
        @livewire('components.layouts.sidebar')
        <section class="mainMod">
            <button id="toggle-button">
                <i class="fas fa-bars"></i>
            </button>
            <div class="mainMod-top">
                <h1>Performance Reports History</h1>
            </div>
            <div class="d-flex justify-content-between">
                <div>
                    <input type="search" wire:model.live.debounce.200ms="search" class="form-control"
                        placeholder="Search...">
                </div>
            </div>
            <div class="mainMod-skills">
                <div class="w-100">
                    <table class="table">
                        <thead class="table-dark">
                            <tr>
                                <th scope="col">ID</th>
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
                                <th scope="row">
                                    {{ $user->id }}
                                </th>
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
                                    {{ $user->unit->unit_assignment }}
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
                                    <a wire:navigate href="/admin/history/{{ $user->id }}/{{ $user->police_id }}" class="btn btn-primary manage-btn btn-sm"
                                        >
                                        <i class="far fa-eye"></i> View Reports
                                    </a>

                                </td>

                            </tr>
                            @empty
                            <tr>
                                <td colspan="7" class="text-center">
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
</div>
