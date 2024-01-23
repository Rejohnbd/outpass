 <div class="sticky">
     <div class="main-menu main-sidebar main-sidebar-sticky side-menu">
         <div class="main-sidebar-header main-container-1 active">
             <div class="sidemenu-logo">
                 <a class="main-logo" href="@if(auth()->user()->user_type == 'admin'){{ route('admin-dashboard') }}  @elseif(auth()->user()->user_type == 'incharge'){{ route('incharge-dashboard') }} @else{{ route('dashboard') }}@endif">
                     <img src="{{ asset('assets/img/brand/logo-light.png') }}" class="header-brand-img desktop-logo-dark" alt="logo">
                     <img src="{{ asset('assets/img/brand/icon-light.png') }}" class="header-brand-img icon-logo-dark" alt="logo">
                     <img src="{{ asset('assets/img/brand/logo.png') }}" class="header-brand-img desktop-logo" alt="logo">
                     <img src="{{ asset('assets/img/brand/icon.png') }}" class="header-brand-img icon-logo" alt="logo">
                 </a>
             </div>
             @if(auth()->user()->user_type == 'admin')
             @include('components.sidebar-admin')
             @elseif(auth()->user()->user_type == 'incharge')
             @include('components.sidebar-incharge')
             @else
             @include('components.sidebar-client')
             @endif
         </div>
     </div>
 </div>