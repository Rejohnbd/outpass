<div class="main-sidebar-body main-body-1">
    <div class="slide-left disabled" id="slide-left"><svg xmlns="http://www.w3.org/2000/svg" fill="#c9bebe" width="24" height="24" viewBox="0 0 24 24">
            <path d="M13.293 6.293 7.586 12l5.707 5.707 1.414-1.414L10.414 12l4.293-4.293z" />
        </svg></div>
    <ul class="menu-nav nav">
        <li class="nav-item @if(Request::is('admin-dashboard') || Request::is('approval-outpass/*')) active show @endif">
            <a class="nav-link with-sub" href="{{ route('admin-dashboard') }}">
                <svg class="sidemenu-icon menu-icon" xmlns="http://www.w3.org/2000/svg" enable-background="new 0 0 24 24" viewBox="0 0 24 24">
                    <path d="M10.5,13h-7C3.2,13,3,13.2,3,13.5v7C3,20.8,3.2,21,3.5,21h7c0.3,0,0.5-0.2,0.5-0.5v-7C11,13.2,10.8,13,10.5,13z M10,20H4v-6h6V20z M10.5,3h-7C3.2,3,3,3.2,3,3.5v7C3,10.8,3.2,11,3.5,11h7c0.3,0,0.5-0.2,0.5-0.5v-7C11,3.2,10.8,3,10.5,3z M10,10H4V4h6V10z M20.5,3h-7C13.2,3,13,3.2,13,3.5v7c0,0.3,0.2,0.5,0.5,0.5h7c0.3,0,0.5-0.2,0.5-0.5v-7C21,3.2,20.8,3,20.5,3z M20,10h-6V4h6V10z M20.5,16.5h-3v-3c0-0.3-0.2-0.5-0.5-0.5s-0.5,0.2-0.5,0.5v3h-3c-0.3,0-0.5,0.2-0.5,0.5s0.2,0.5,0.5,0.5h3v3c0,0.3,0.2,0.5,0.5,0.5h0c0.3,0,0.5-0.2,0.5-0.5v-3h3c0.3,0,0.5-0.2,0.5-0.5S20.8,16.5,20.5,16.5z" />
                </svg>
                <span class="sidemenu-label">Dashboards</span>
            </a>
        </li>
        {{--<li class="nav-header"><span class="nav-label">Outpass</span></li>
        <li class="nav-item @if(Request::is('out-pass*')) active show @endif">
            <a class="nav-link with-sub @if(Request::is('out-pass*')) active @endif" href="javascript:;">
                <svg class="sidemenu-icon menu-icon" xmlns="http://www.w3.org/2000/svg" enable-background="new 0 0 24 24" viewBox="0 0 24 24">
                    <path d="M6.5,11h5c0.276123,0,0.5-0.223877,0.5-0.5S11.776123,10,11.5,10h-5C6.223877,10,6,10.223877,6,10.5S6.223877,11,6.5,11z M6,14.5C6,14.776123,6.223877,15,6.5,15h11c0.276123,0,0.5-0.223877,0.5-0.5S17.776123,14,17.5,14h-11C6.223877,14,6,14.223877,6,14.5z M21.8535156,10.1464844l-6-6C15.7597656,4.0526733,15.6326294,4,15.5,4H5C3.3438721,4.0018311,2.0018311,5.3438721,2,7v10c0.0018311,1.6561279,1.3438721,2.9981689,3,3h14c1.6561279-0.0018311,2.9981689-1.3438721,3-3v-6.5C22,10.3673706,21.9473267,10.2402344,21.8535156,10.1464844z M16,5.7069702L20.2930298,10h-2.960022C16.5970459,9.9993896,16.0006104,9.4029541,16,8.6669922V5.7069702z M21,17c-0.0014038,1.1040039-0.8959961,1.9985962-2,2H5c-1.1040039-0.0014038-1.9985962-0.8959961-2-2V7c0.0014038-1.1040039,0.8959961-1.9985962,2-2h10v3.6669922C15.0016479,9.9547729,16.0452271,10.9983521,17.3330078,11H21V17z"></path>
                </svg>
                <span class="sidemenu-label">Outpass</span>
                <i class="angle fe fe-chevron-right"></i>
            </a>
            <ul class="nav-sub">
                <li class="side-menu-label1"><a href="javascript:;">Out Pass</a></li>
                <li class="nav-sub-item">
                    <a class="nav-sub-link" href="{{ route('out-pass.index') }} ">All Outpass</a>
        </li>
    </ul>
    </li> --}}
    </ul>
    <div class="slide-right" id="slide-right">
        <svg xmlns="http://www.w3.org/2000/svg" fill="#c9bebe" width="24" height="24" viewBox="0 0 24 24">
            <path d="M10.707 17.707 16.414 12l-5.707-5.707-1.414 1.414L13.586 12l-4.293 4.293z" />
        </svg>
    </div>
</div>