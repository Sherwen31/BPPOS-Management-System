<div>
    <div class="containerMod">
        @livewire('components.layouts.sidebar')

        <section class="mainMod">
            <button id="toggle-button">
                <i class="fas fa-bars"></i>
            </button>
            <div class="mainMod-top">
                <h4>Dashboard</h4>
            </div>
            <div class="row">
                <div class="d-flex col-xxl-3 col-sm-6">
                    <div class="illustration flex-fill card">
                        <div class="p-0 d-flex flex-fill card-body">
                            <div class="g-0 w-100 row">
                                <div class="col-7">
                                    <div class="illustration-text p-3 m-1">
                                        <h4 class="illustration-text">Welcome back, {{ auth()->user()->first_name }} {{
                                            auth()->user()->last_name }}!</h4>
                                        <p class="mb-0">Bohol Provincial Police Office (BPPO)</p>
                                        <p class="mb-0">Management System</p>
                                    </div>
                                </div>
                                <div class="align-self-end text-end col-5 mb-2"><img src="/images/logo.png"
                                        alt="Customer Support" class="img-fluid illustration-img"
                                        style="height: 120px !important;"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="d-flex col-xxl-3 col-sm-6">
                    <div class="flex-fill card">
                        <div class=" py-4 card-body">
                            <div class="d-flex align-items-start">
                                <div class="flex-grow-1">
                                    <h3 class="mb-2">{{ $total_users_count }}</h3>
                                    <p class="mb-2">Total Users</p>
                                </div>
                                <div class="d-inline-block ms-3">
                                    <div class="stat"><i class="far fa-users text-primary"></i></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="d-flex col-xxl-3 col-sm-6">
                    <div class="flex-fill card">
                        <div class=" py-4 card-body">
                            <div class="d-flex align-items-start">
                                <div class="flex-grow-1">
                                    <h3 class="mb-2">{{ $total_evaluated_users }}</h3>
                                    <p class="mb-2">Total Evaluated User</p>
                                    <div class="mb-0"><span
                                            class="badge bg-success-subtle text-success me-2 badge">{{ number_format($evaluated_monthly_percentage, 2) }}%</span><span
                                            class="text-muted">This month</span></div>
                                </div>
                                <div class="d-inline-block ms-3">
                                    <div class="stat"><i class="far fa-file-circle-check text-success"></i></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="d-flex col-xxl-3 col-sm-6">
                    <div class="flex-fill card">
                        <div class=" py-4 card-body">
                            <div class="d-flex align-items-start">
                                <div class="flex-grow-1">
                                    <h3 class="mb-2">{{ $total_not_evaluated_users }}</h3>
                                    <p class="mb-2">Total Unevaluated User</p>
                                    <div class="mb-0"><span
                                            class="badge bg-success-subtle text-success me-2 badge">{{ number_format($not_evaluated_monthly_percentage, 2) }}%</span><span
                                            class="text-muted">This month</span></div>
                                </div>
                                <div class="d-inline-block ms-3">
                                    <div class="stat"><i class="far fa-file-circle-minus text-danger"></i></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>
