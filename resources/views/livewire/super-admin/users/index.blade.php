<div>
    <div class="containerMod">
        @livewire('components.layouts.sidebar')
        <section class="mainMod">
            <button id="toggle-button">
                <i class="fas fa-bars"></i>
            </button>
            <div class="mainMod-top">
                <h1>User Account Management</h1>
            </div>
            <div class="createUserBtn"><button class="btn" data-bs-toggle="modal"
                    data-bs-target="#createUserModal">Create User</button></div>
            <div class="mainMod-skills">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Name</th>
                            <th scope="col">Position</th>
                            <th scope="col">Unit Assigned</th>
                            <th scope="col">Current Position</th>
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
                                {{ $user->name }},
                                {{ $user->username }}
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
                                $startDate = Carbon::parse($user->year_attended);
                                $endDate = Carbon::now();

                                $diff = $startDate->diff($endDate);

                                $years = $diff->y;
                                $months = $diff->m;
                                $formattedDifference = "{$years} years and {$months} months";
                                @endphp
                                {{ $formattedDifference }}
                            </td>

                            <td>
                                <button type="button" class="btn btn-primary manage-btn" data-bs-toggle="modal"
                                    data-bs-target="#userListModal">
                                </button>

                            </td>

                        </tr>
                        @empty

                        @endforelse
                    </tbody>
                </table>
            </div>
        </section>
    </div>
</div>
