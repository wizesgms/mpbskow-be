<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <div class="app-brand demo">
        <a href="{{ route('dashboard') }}" class="app-brand-link">
            <span class="app-brand-logo demo">
                <img src="{{ asset('assets/img/cropped-LOGO-PNG-1.png') }}" alt="" width="170">
            </span>
        </a>

        <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto">
            <svg width="22" height="22" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path
                    d="M11.4854 4.88844C11.0081 4.41121 10.2344 4.41121 9.75715 4.88844L4.51028 10.1353C4.03297 10.6126 4.03297 11.3865 4.51028 11.8638L9.75715 17.1107C10.2344 17.5879 11.0081 17.5879 11.4854 17.1107C11.9626 16.6334 11.9626 15.8597 11.4854 15.3824L7.96672 11.8638C7.48942 11.3865 7.48942 10.6126 7.96672 10.1353L11.4854 6.61667C11.9626 6.13943 11.9626 5.36568 11.4854 4.88844Z"
                    fill="currentColor" fill-opacity="0.6" />
                <path
                    d="M15.8683 4.88844L10.6214 10.1353C10.1441 10.6126 10.1441 11.3865 10.6214 11.8638L15.8683 17.1107C16.3455 17.5879 17.1192 17.5879 17.5965 17.1107C18.0737 16.6334 18.0737 15.8597 17.5965 15.3824L14.0778 11.8638C13.6005 11.3865 13.6005 10.6126 14.0778 10.1353L17.5965 6.61667C18.0737 6.13943 18.0737 5.36568 17.5965 4.88844C17.1192 4.41121 16.3455 4.41121 15.8683 4.88844Z"
                    fill="currentColor" fill-opacity="0.38" />
            </svg>
        </a>
    </div>

    <div class="menu-inner-shadow"></div>

    <ul class="menu-inner py-1">
        <!-- Dashboards -->
        <li class="menu-item {{ request()->routeIs('dashboard*') ? 'active ' : '' }}">
            <a href="{{ route('dashboard') }}" class="menu-link">
                <i class="menu-icon tf-icons mdi mdi-home-outline"></i>
                <div data-i18n="Dashboard">Dashboard</div>
            </a>
        </li>

        <li class="menu-item {{ request()->routeIs('members*') ? 'active open' : '' }}">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons mdi mdi mdi-account-group"></i>
                <div data-i18n="Members">Members</div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item {{ request()->routeIs('members.list*') ? 'active ' : '' }}">
                    <a href="{{ route('members.list') }}" class="menu-link">
                        <div data-i18n="Lists">Lists</div>
                    </a>
                </li>
                <li class="menu-item {{ request()->routeIs('members.balance*') ? 'active ' : '' }}">
                    <a href="{{ route('members.balance') }}" class="menu-link">
                        <div data-i18n="Balance">Balance</div>
                    </a>
                </li>
            </ul>
        </li>

        <li class="menu-item {{ request()->routeIs('deposits*') ? 'active open' : '' }}">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons mdi mdi-wallet-plus"></i>
                <div data-i18n="Deposits">Deposits</div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item {{ request()->routeIs('deposits.pending*') ? 'active ' : '' }}">
                    <a href="{{ route('deposits.pending') }}" class="menu-link">
                        <div data-i18n="Pending">Pending</div>
                    </a>
                </li>
                <li class="menu-item {{ request()->routeIs('deposits.list*') ? 'active ' : '' }}">
                    <a href="{{ route('deposits.list') }}" class="menu-link">
                        <div data-i18n="All">All</div>
                    </a>
                </li>
            </ul>
        </li>

        <li class="menu-item {{ request()->routeIs('withdrawal*') ? 'active open' : '' }}">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons mdi mdi-cash-multiple"></i>
                <div data-i18n="Withdrawal">Withdrawal</div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item {{ request()->routeIs('withdrawal.pending*') ? 'active ' : '' }}">
                    <a href="{{ route('withdrawal.pending') }}" class="menu-link">
                        <div data-i18n="Pending">Pending</div>
                    </a>
                </li>
                <li class="menu-item {{ request()->routeIs('withdrawal.list*') ? 'active ' : '' }}">
                    <a href="{{ route('withdrawal.list') }}" class="menu-link">
                        <div data-i18n="All">All</div>
                    </a>
                </li>
            </ul>
        </li>

        @if(auth()->guard('admin')->user()->level == 'master')
        <li class="menu-item {{ request()->routeIs('bank*') ? 'active ' : '' }}">
            <a href="{{ route('bank.list') }}" class="menu-link">
                <i class="menu-icon tf-icons mdi mdi-bank"></i>
                <div data-i18n="Banks">Banks</div>
            </a>
        </li>
        <li class="menu-item {{ request()->routeIs('website.promotion*') ? 'active ' : '' }}">
            <a href="{{ route('website.promotion') }}" class="menu-link">
                <i class="menu-icon tf-icons mdi mdi-gift"></i>
                <div data-i18n="Promotion">Promotion</div>
            </a>
        </li>
        <li class="menu-item {{ request()->routeIs('website.deposit*') ? 'active ' : '' }}">
            <a href="{{ route('website.deposit') }}" class="menu-link">
                <i class="menu-icon tf-icons mdi mdi-account-cash"></i>
                <div data-i18n="Deposit Promotion">Deposit Promotion</div>
            </a>
        </li>
        <li class="menu-item {{ request()->routeIs('website.banner*') ? 'active ' : '' }}">
            <a href="{{ route('website.banner') }}" class="menu-link">
                <i class="menu-icon tf-icons mdi mdi-play-box-outline"></i>
                <div data-i18n="Banner">Banner</div>
            </a>
        </li>
        <li class="menu-item {{ request()->routeIs('website.floating*') ? 'active ' : '' }}">
            <a href="{{ route('website.floating') }}" class="menu-link">
                <i class="menu-icon tf-icons mdi mdi-ghost"></i>
                <div data-i18n="Floatings">Floatings</div>
            </a>
        </li>
        <li class="menu-item {{ request()->routeIs('website.api*') ? 'active ' : '' }}">
            <a href="{{ route('website.api') }}" class="menu-link">
                <i class="menu-icon tf-icons mdi mdi-slot-machine"></i>
                <div data-i18n="API Setting">API Setting</div>
            </a>
        </li>
        <li class="menu-item {{ request()->routeIs('admin.list*') ? 'active ' : '' }}">
            <a href="{{ route('admin.list') }}" class="menu-link">
                <i class="menu-icon tf-icons mdi mdi-account-lock"></i>
                <div data-i18n="Admin">Admin</div>
            </a>
        </li>
        <li class="menu-item {{ request()->routeIs('settings*') ? 'active ' : '' }}">
            <a href="{{ route('settings') }}" class="menu-link">
                <i class="menu-icon tf-icons mdi mdi-web-sync"></i>
                <div data-i18n="Settings">Settings</div>
            </a>
        </li>
        @endif

    </ul>
</aside>
