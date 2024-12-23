<div class="sidebarModd">
    <nav class="sidebarMod collapsed" style="height: auto;">
        <span class="logo">
            <img src="/images/logo.png" alt="">
            <span class="nav-item">PSMS</span>
        </span>
        @role('super_admin')
        <ul class="ul">
            <li class="li">
                <a wire:navigate href="/super-admin/dashboard"
                    class="{{ 'super-admin/dashboard' === request()->path() ? 'active_sidebar' : '' }}">
                    <i class="fas fa-home"></i>
                    <span class="nav-item">Dashboard</span>
                    <span class="sideNavToolTip">Dashboard</span>
                </a>
            </li>
            <li class="li">
                <a wire:navigate href="/super-admin/unit-and-position-management"
                    class="{{ 'super-admin/unit-and-position-management' === request()->path() ? 'active_sidebar' : '' }}">
                    <i class="fas fa-tools"></i>
                    <span class="nav-item">Unit and Position Management</span>
                    <span class="sideNavToolTip">Unit and Position Management</span>
                </a>
            </li>
            <li class="li">
                <a wire:navigate href="/super-admin/rank-management"
                    class="{{ 'super-admin/rank-management' === request()->path() ? 'active_sidebar' : '' }}">
                    <i class="fas fa-ranking-star"></i>
                    <span class="nav-item">Rank Management</span>
                    <span class="sideNavToolTip">Rank Management</span>
                </a>
            </li>
            <li class="li">
                <a wire:navigate href="/super-admin/user-account-management"
                    class="{{ 'super-admin/user-account-management' === request()->path() ? 'active_sidebar' : '' }}">
                    <i class="fas fa-users"></i>
                    <span class="nav-item">User and Personnel Profile</span>
                    <span class="sideNavToolTip">User and Personnel Profile</span>
                </a>
            </li>
            <li class="li">
                <a wire:navigate href="/super-admin/evaluation/user-evaluation"
                    class="{{ 'super-admin/evaluation/user-evaluation' === request()->path() ? 'active_sidebar' : '' }}">
                    <i class="fa-duotone fa-solid fa-users"></i>
                    <span class="nav-item">User Evaluation Management</span>
                    <span class="sideNavToolTip">User Evaluation Management</span>
                </a>
            </li>
            {{-- <li class="li">
                <a wire:navigate href="/super-admin/evaluation/rating-indicator"
                    class="{{ 'super-admin/evaluation/rating-indicator' === request()->path() ? 'active_sidebar' : '' }}">
                    <i class="fa-sharp-duotone fa-solid fa-star-sharp-half"></i>
                    <span class="nav-item">Rating Indicator</span>
                    <span class="sideNavToolTip">Rating Indicator</span>
                </a>
            </li> --}}
            <li class="li">
                <a wire:navigate href="/super-admin/performance-report"
                    class="{{ 'super-admin/performance-report' === request()->path() ? 'active_sidebar' : '' }}">
                    <i class="fas fa-tasks"></i>
                    <span class="nav-item">Performance Report</span>
                    <span class="sideNavToolTip">Performance Report</span>
                </a>
            </li>
            {{-- <li class="li">
                <a wire:navigate href="/super-admin/history"
                    class="{{ 'super-admin/history' === request()->path() ? 'active_sidebar' : '' }}">
                    <i class="fas fa-clock-rotate-left"></i>
                    <span class="nav-item">History</span>
                    <span class="sideNavToolTip">History</span>
                </a>
            </li> --}}
            <li class="li">
                <a wire:navigate href="/super-admin/manage-evaluation-score"
                    class="{{ 'super-admin/manage-evaluation-score' === request()->path() ? 'active_sidebar' : '' }}">
                    <i class="fas fa-file-check"></i>
                    <span class="nav-item">Manage Evaluation Score</span>
                    <span class="sideNavToolTip">Manage Evaluation Score</span>
                </a>
            </li>
            <li class="li">
                <a wire:navigate href="/super-admin/account-management"
                    class="{{ 'super-admin/account-management' === request()->path() ? 'active_sidebar' : '' }}">
                    <i class="fas fa-cog"></i>
                    <span class="nav-item">Account Management</span>
                    <span class="sideNavToolTip">Account Management</span>
                </a>
            </li>
            <li class="li">
                <a href="#" class="logout" wire:click='logout'>
                    <i class="fas fa-sign-out-alt"></i>
                    <span class="nav-item">Log out</span>
                    <span class="sideNavToolTip">Log out</span>
                </a>
            </li>
        </ul>
        @endrole

        @role('admin')
        <ul class="ul">
            <li class="li">
                <a wire:navigate href="/admin/dashboard"
                    class="{{ 'admin/dashboard' === request()->path() ? 'active_sidebar' : '' }}">
                    <i class="fas fa-home"></i>
                    <span class="nav-item">Dashboard</span>
                    <span class="sideNavToolTip">Dashboard</span>
                </a>
            </li>
            <li class="li">
                <a wire:navigate href="/admin/individual-scorecard"
                    class="{{ 'admin/individual-scorecard' === request()->path() ? 'active_sidebar' : '' }}">
                    <i class="fas fa-clipboard"></i>
                    <span class="nav-item">Individual Scorecard</span>
                    <span class="sideNavToolTip">Individual Scorecard</span>
                </a>
            </li>
            <li class="li"><a href="/admin/evaluation/send-attachment" wire:navigate
                    class="{{ 'admin/evaluation/send-attachment' === request()->path() ? 'active_sidebar' : '' }}">
                    <i class="fas fa-paperclip"></i>
                    <span class="nav-item">Send Evaluation Attachment</span>
                    <span class="sideNavToolTip">Send Evaluation Attachment</span>
                </a></li>
            <li class="li">
                <a wire:navigate href="/admin/user-account-management"
                    class="{{ 'admin/user-account-management' === request()->path() ? 'active_sidebar' : '' }}">
                    <i class="fas fa-users"></i>
                    <span class="nav-item">Personnel Profiles</span>
                    <span class="sideNavToolTip">Personnel Profiles</span>
                </a>
            </li>
            <li class="li">
                <a wire:navigate href="/admin/evaluation/user-evaluation"
                    class="{{ 'admin/evaluation/user-evaluation' === request()->path() ? 'active_sidebar' : '' }}">
                    <i class="fa-duotone fa-solid fa-users"></i>
                    <span class="nav-item">User Evaluation Management</span>
                    <span class="sideNavToolTip">User Evaluation Management</span>
                </a>
            </li>
            {{-- <li class="li">
                <a wire:navigate href="/admin/evaluation/rating-indicator"
                    class="{{ 'admin/evaluation/rating-indicator' === request()->path() ? 'active_sidebar' : '' }}">
                    <i class="fa-sharp-duotone fa-solid fa-star-sharp-half"></i>
                    <span class="nav-item">Rating Indicator</span>
                    <span class="sideNavToolTip">Rating Indicator</span>
                </a>
            </li> --}}
            <li class="li">
                <a wire:navigate href="/admin/performance-report"
                    class="{{ 'admin/performance-report' === request()->path() ? 'active_sidebar' : '' }}">
                    <i class="fas fa-tasks"></i>
                    <span class="nav-item">Performance Report</span>
                    <span class="sideNavToolTip">Performance Report</span>
                </a>
            </li>
            {{-- <li class="li">
                <a wire:navigate href="/admin/history"
                    class="{{ 'admin/history' === request()->path() ? 'active_sidebar' : '' }}">
                    <i class="fas fa-clock-rotate-left"></i>
                    <span class="nav-item">History</span>
                    <span class="sideNavToolTip">History</span>
                </a>
            </li> --}}
            <li class="li">
                <a wire:navigate href="/admin/my-score-history"
                    class="{{ 'admin/my-score-history' === request()->path() ? 'active_sidebar' : '' }}">
                    <i class="fas fa-hundred-points"></i>
                    <span class="nav-item">My Score History</span>
                    <span class="sideNavToolTip">My Score History</span>
                </a>
            </li>
            <li class="li">
                <a wire:navigate href="/admin/manage-evaluation-score"
                    class="{{ 'admin/manage-evaluation-score' === request()->path() ? 'active_sidebar' : '' }}">
                    <i class="fas fa-file-check"></i>
                    <span class="nav-item">Manage Evaluation Score</span>
                    <span class="sideNavToolTip">Manage Evaluation Score</span>
                </a>
            </li>
            <li class="li">
                <a wire:navigate href="/admin/account-management"
                    class="{{ 'admin/account-management' === request()->path() ? 'active_sidebar' : '' }}">
                    <i class="fas fa-cog"></i>
                    <span class="nav-item">Account Management</span>
                    <span class="sideNavToolTip">Account Management</span>
                </a>
            </li>
            <li class="li">
                <a href="#" class="logout" wire:click='logout'>
                    <i class="fas fa-sign-out-alt"></i>
                    <span class="nav-item">Log out</span>
                    <span class="sideNavToolTip">Log out</span>
                </a>
            </li>
        </ul>
        @endrole
    </nav>

</div>
