<nav class="sidebarMod collapsed">
    <span class="logo">
        <img src="/images/logo.png" alt="">
        <span class="nav-item">PSMS</span>
    </span>
    <ul>
        <li>
            <a wire:navigate href="/super-admin/dashboard" class="{{ 'dashboard' === request()->path() ? 'active' : '' }}">
                <i class="fas fa-home"></i>
                <span class="nav-item">Dashboard</span>
                <span class="sideNavToolTip">Dashboard</span>
            </a>
        </li>
        <li>
            <a wire:navigate href="/super-admin/user-account-management"
                class="{{ 'super-admin/user-account-management' === request()->path() ? 'active' : '' }}">
                <i class="fas fa-users"></i>
                <span class="nav-item">User Account Management</span>
                <span class="sideNavToolTip">User Account Management</span>
            </a>
        </li>
        <li>
            <a wire:navigate href="/super-admin/user-evaluation"
                class="{{ 'super-admin/user-evaluation' === request()->path() ? 'active' : '' }}">
                <i class="fa-duotone fa-solid fa-users"></i>
                <span class="nav-item">User Evaluation Management</span>
                <span class="sideNavToolTip">User Evaluation Management</span>
            </a>
        </li>
        <li>
            <a wire:navigate href="/super-admin/rating" class="{{ 'super-admin/rating' === request()->path() ? 'active' : '' }}">
                <i class="fa-sharp-duotone fa-solid fa-star-sharp-half"></i>
                <span class="nav-item">Rating Indicator</span>
                <span class="sideNavToolTip">Rating Indicator</span>
            </a>
        </li>
        <li>
            <a wire:navigate href="/super-admin/performance-report"
                class="{{ 'super-admin/performance-report' === request()->path() ? 'active' : '' }}">
                <i class="fas fa-tasks"></i>
                <span class="nav-item">Performance Report</span>
                <span class="sideNavToolTip">Performance Report</span>
            </a>
        </li>
        <li>
            <a wire:navigate href="/super-admin/history" class="{{ 'super-admin/history' === request()->path() ? 'active' : '' }}">
                <i class="fas fa-cog"></i>
                <span class="nav-item">History</span>
                <span class="sideNavToolTip">History</span>
            </a>
        </li>
        <li>
            <a wire:navigate href="/super-admin/account-management"
                class="{{ 'super-admin/account-management' === request()->path() ? 'active' : '' }}">
                <i class="fas fa-cog"></i>
                <span class="nav-item">Account Management</span>
                <span class="sideNavToolTip">Account Management</span>
            </a>
        </li>
        <li>
            <a wire:navigate href="#" class="logout" wire:click='logout'>
                <i class="fas fa-sign-out-alt"></i>
                <span class="nav-item">Log out</span>
                <span class="sideNavToolTip">Log out</span>
            </a>
        </li>
    </ul>
</nav>
