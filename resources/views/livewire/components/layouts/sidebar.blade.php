<div class="sidebarModd">
    <nav class="sidebarMod collapsed" style="height: auto;">
        <span class="logo">
            <img src="/images/logo.png" alt="">
            <span class="nav-item">PSMS</span>
        </span>
        <ul>
            <li>
                <a wire:navigate href="/super-admin/dashboard"
                    class="{{ 'super-admin/dashboard' === request()->path() ? 'active_sidebar' : '' }}">
                    <i class="fas fa-home"></i>
                    <span class="nav-item">Dashboard</span>
                    <span class="sideNavToolTip">Dashboard</span>
                </a>
            </li>
            <li>
                <a wire:navigate href="/super-admin/user-account-management"
                    class="{{ 'super-admin/user-account-management' === request()->path() ? 'active_sidebar' : '' }}">
                    <i class="fas fa-users"></i>
                    <span class="nav-item">User Account Management</span>
                    <span class="sideNavToolTip">User Account Management</span>
                </a>
            </li>
            <li>
                <a wire:navigate href="/super-admin/evaluation/user-evaluation"
                    class="{{ 'super-admin/evaluation/user-evaluation' === request()->path() ? 'active_sidebar' : '' }}">
                    <i class="fa-duotone fa-solid fa-users"></i>
                    <span class="nav-item">User Evaluation Management</span>
                    <span class="sideNavToolTip">User Evaluation Management</span>
                </a>
            </li>
            <li>
                <a wire:navigate href="/super-admin/evaluation/rating-indicator"
                    class="{{ 'super-admin/evaluation/rating-indicator' === request()->path() ? 'active_sidebar' : '' }}">
                    <i class="fa-sharp-duotone fa-solid fa-star-sharp-half"></i>
                    <span class="nav-item">Rating Indicator</span>
                    <span class="sideNavToolTip">Rating Indicator</span>
                </a>
            </li>
            <li>
                <a wire:navigate href="/super-admin/performance-report"
                    class="{{ 'super-admin/performance-report' === request()->path() ? 'active_sidebar' : '' }}">
                    <i class="fas fa-tasks"></i>
                    <span class="nav-item">Performance Report</span>
                    <span class="sideNavToolTip">Performance Report</span>
                </a>
            </li>
            <li>
                <a wire:navigate href="/super-admin/history"
                    class="{{ 'super-admin/history' === request()->path() ? 'active_sidebar' : '' }}">
                    <i class="fas fa-clock-rotate-left"></i>
                    <span class="nav-item">History</span>
                    <span class="sideNavToolTip">History</span>
                </a>
            </li>
            <li>
                <a wire:navigate href="/super-admin/account-management"
                    class="{{ 'super-admin/account-management' === request()->path() ? 'active_sidebar' : '' }}">
                    <i class="fas fa-cog"></i>
                    <span class="nav-item">Account Management</span>
                    <span class="sideNavToolTip">Account Management</span>
                </a>
            </li>
            <li>
                <a href="#" class="logout" wire:click='logout'>
                    <i class="fas fa-sign-out-alt"></i>
                    <span class="nav-item">Log out</span>
                    <span class="sideNavToolTip">Log out</span>
                </a>
            </li>
        </ul>
    </nav>

</div>
