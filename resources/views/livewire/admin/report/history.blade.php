<div>
    <div class="containerMod">
        @livewire('components.layouts.sidebar')
        <section class="mainMod">
            <button id="toggle-button">
                <i class="fas fa-bars"></i>
            </button>
            <div class="mb-3">
                <a href="/admin/history" wire:navigate class="btn btn-default bg-dark-subtle btn-sm text-dark"><i
                        class="far fa-arrow-left"></i> Back to
                    history</a>
            </div>
            <div class="mainMod-top">
                <h1>
                    {{ $user->first_name }}
                    {{ $user->last_name }}
                </h1>
            </div>
            <div class="mainMod-skills">
                <table class="table w-50">
                    <thead class="table-dark">
                        <tr>
                            <th scope="col">Period Covered</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($groupedPerformanceReports as $item)
                        <tr>
                            <td scope="row">{{ $item->start_date->format('F j') }} -
                                {{ $item->end_date->format('j, Y') }}</td>
                            <td>
                                <a wire:navigate
                                    href="/admin/user-scorecard/{{ $user->id }}/{{ $user->police_id }}/{{ $item->start_date }}/{{ $item->end_date }}"
                                    class="btn btn-primary manage-btn btn-sm">
                                    <i class="far fa-eye"></i> View Scorecard
                                </a>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="2" class="text-center">
                                <p>This user is no performance data added yet.</p>
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </section>
    </div>
</div>
