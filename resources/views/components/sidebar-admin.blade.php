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
        <li class="nav-item @if(Request::is('incharges*')) active show @endif">
            <a class="nav-link with-sub" href="{{ route('incharges.index') }}">
                <svg class="sidemenu-icon menu-icon" xmlns="http://www.w3.org/2000/svg" enable-background="new 0 0 24 24" viewBox="0 0 24 24">
                    <path d="M15,13.5H8.9994507C8.7234497,13.5001831,8.4998169,13.723999,8.5,14c0.0023193,1.9320068,1.5679932,3.4976807,3.5,3.5c1.9320068-0.0023193,3.4976807-1.5679932,3.5-3.5v-0.0006104C15.4998169,13.7234497,15.276001,13.4998169,15,13.5z M12.5008545,16.4493408C11.147644,16.7259521,9.826416,15.8532104,9.5498047,14.5h4.9003906C14.2495728,15.4815674,13.4824219,16.2486572,12.5008545,16.4493408z M10.5,10c0-0.8284302-0.6715698-1.5-1.5-1.5S7.5,9.1715698,7.5,10s0.6715698,1.5,1.5,1.5C9.828064,11.4990845,10.4990845,10.828064,10.5,10z M8.5,10c0-0.276123,0.223877-0.5,0.5-0.5C9.2759399,9.5005493,9.4994507,9.7240601,9.5,10c0,0.276123-0.223877,0.5-0.5,0.5S8.5,10.276123,8.5,10z M15,8.5c-0.8284302,0-1.5,0.6715698-1.5,1.5s0.6715698,1.5,1.5,1.5c0.828064-0.0009155,1.4990845-0.671936,1.5-1.5C16.5,9.1715698,15.8284302,8.5,15,8.5z M15,10.5c-0.276123,0-0.5-0.223877-0.5-0.5s0.223877-0.5,0.5-0.5c0.2759399,0.0005493,0.4994507,0.2240601,0.5,0.5C15.5,10.276123,15.276123,10.5,15,10.5z M12,2C6.4771729,2,2,6.4771729,2,12s4.4771729,10,10,10c5.5201416-0.0064697,9.9935303-4.4798584,10-10C22,6.4771729,17.5228271,2,12,2z M12,21c-4.9705811,0-9-4.0294189-9-9s4.0294189-9,9-9c4.9683228,0.0054321,8.9945679,4.0316772,9,9C21,16.9705811,16.9705811,21,12,21z"></path>
                </svg>
                <span class="sidemenu-label">Incharge</span>
            </a>
        </li>

        <li class="nav-item @if(Request::is('client-list')) active show @endif">
            <a class="nav-link with-sub" href="{{ route('client-list') }}">
                <i class="sidemenu-icon menu-icon mdi mdi-account-multiple-outline text-white"></i>
                <span class="sidemenu-label">Client List</span>
            </a>
        </li>
    </ul>
    <div class="slide-right" id="slide-right">
        <svg xmlns="http://www.w3.org/2000/svg" fill="#c9bebe" width="24" height="24" viewBox="0 0 24 24">
            <path d="M10.707 17.707 16.414 12l-5.707-5.707-1.414 1.414L13.586 12l-4.293 4.293z" />
        </svg>
    </div>
</div>