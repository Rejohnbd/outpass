 <div class="sticky">
     <div class="main-menu main-sidebar main-sidebar-sticky side-menu">
         <div class="main-sidebar-header main-container-1 active">
             <div class="sidemenu-logo">
                 <a class="main-logo" href="{{ route('dashboard') }}">
                     <img src="{{ asset('assets/img/brand/logo-light.png') }}" class="header-brand-img desktop-logo-dark" alt="logo">
                     <img src="{{ asset('assets/img/brand/icon-light.png') }}" class="header-brand-img icon-logo-dark" alt="logo">
                     <img src="{{ asset('assets/img/brand/logo.png') }}" class="header-brand-img desktop-logo" alt="logo">
                     <img src="{{ asset('assets/img/brand/icon.png') }}" class="header-brand-img icon-logo" alt="logo">
                 </a>
             </div>
             <div class="main-sidebar-body main-body-1">
                 <div class="slide-left disabled" id="slide-left"><svg xmlns="http://www.w3.org/2000/svg" fill="#c9bebe" width="24" height="24" viewBox="0 0 24 24">
                         <path d="M13.293 6.293 7.586 12l5.707 5.707 1.414-1.414L10.414 12l4.293-4.293z" />
                     </svg></div>
                 <ul class="menu-nav nav">
                     <li class="nav-item @if(Request::is('dashboard')) active show @endif">
                         <a class="nav-link with-sub" href="{{ route('dashboard') }}">
                             <svg class="sidemenu-icon menu-icon" xmlns="http://www.w3.org/2000/svg" enable-background="new 0 0 24 24" viewBox="0 0 24 24">
                                 <path d="M10.5,13h-7C3.2,13,3,13.2,3,13.5v7C3,20.8,3.2,21,3.5,21h7c0.3,0,0.5-0.2,0.5-0.5v-7C11,13.2,10.8,13,10.5,13z M10,20H4v-6h6V20z M10.5,3h-7C3.2,3,3,3.2,3,3.5v7C3,10.8,3.2,11,3.5,11h7c0.3,0,0.5-0.2,0.5-0.5v-7C11,3.2,10.8,3,10.5,3z M10,10H4V4h6V10z M20.5,3h-7C13.2,3,13,3.2,13,3.5v7c0,0.3,0.2,0.5,0.5,0.5h7c0.3,0,0.5-0.2,0.5-0.5v-7C21,3.2,20.8,3,20.5,3z M20,10h-6V4h6V10z M20.5,16.5h-3v-3c0-0.3-0.2-0.5-0.5-0.5s-0.5,0.2-0.5,0.5v3h-3c-0.3,0-0.5,0.2-0.5,0.5s0.2,0.5,0.5,0.5h3v3c0,0.3,0.2,0.5,0.5,0.5h0c0.3,0,0.5-0.2,0.5-0.5v-3h3c0.3,0,0.5-0.2,0.5-0.5S20.8,16.5,20.5,16.5z" />
                             </svg>
                             <span class="sidemenu-label">Dashboards</span>
                         </a>
                     </li>
                     <li class="nav-header"><span class="nav-label">Components</span></li>
                     <li class="nav-item">
                         <a class="nav-link with-sub" href="javascript:;">
                             <svg class="sidemenu-icon menu-icon" xmlns="http://www.w3.org/2000/svg" enable-background="new 0 0 24 24" viewBox="0 0 24 24">
                                 <path d="M21.5,17h-15C5.6715698,17,5,16.3284302,5,15.5S5.6715698,14,6.5,14h10.9638672c1.2661133,0.0041504,2.3724365-0.8544312,2.6826172-2.0819702l1.8378906-7.2959595c0.0680542-0.2669678-0.0932617-0.5385742-0.3602905-0.6066284C21.5834961,4.005127,21.5418091,3.999939,21.5,4H6.3908691L6.3642578,3.8935547C6.0869751,2.7798462,5.0861816,1.9986572,3.9384766,2H2.5C2.223877,2,2,2.223877,2,2.5S2.223877,3,2.5,3h1.4384766C4.6269531,2.9990234,5.227356,3.4676514,5.3935547,4.1357422L7.609375,13H6.5C5.1192627,13,4,14.1192627,4,15.5S5.1192627,18,6.5,18h1.0124512C7.1818848,18.4303589,7.0018311,18.9573364,7,19.5C7,20.8807373,8.1192627,22,9.5,22s2.5-1.1192627,2.5-2.5c-0.0018311-0.5426636-0.1818848-1.0696411-0.5124512-1.5h4.0249023C15.1818848,18.4303589,15.0018311,18.9573364,15,19.5c0,1.3807373,1.1192627,2.5,2.5,2.5s2.5-1.1192627,2.5-2.5c-0.0018311-0.5426636-0.1818848-1.0696411-0.5124512-1.5H21.5c0.276123,0,0.5-0.223877,0.5-0.5S21.776123,17,21.5,17z M6.6416016,5h14.2167969l-1.6816406,6.6738281C18.9780884,12.4567871,18.2716675,13.0037842,17.4638672,13H8.65625L6.6416016,5z M9.5,21C8.6715698,21,8,20.3284302,8,19.5S8.6715698,18,9.5,18s1.5,0.6715698,1.5,1.5C10.9990845,20.328064,10.328064,20.9990845,9.5,21z M17.5,21c-0.8284302,0-1.5-0.6715698-1.5-1.5s0.6715698-1.5,1.5-1.5s1.5,0.6715698,1.5,1.5C18.9990845,20.328064,18.328064,20.9990845,17.5,21z" />
                             </svg>
                             <span class="sidemenu-label">ECommerce</span>
                             <i class="angle fe fe-chevron-right"></i>
                         </a>
                         <ul class="nav-sub">
                             <li class="side-menu-label1"><a href="javascript:;">ECommerce</a></li>
                             <li class="nav-sub-item">
                                 <a class="nav-sub-link" href="ecommerce-dashboard.html">Dashboard</a>
                             </li>
                             <li class="nav-sub-item">
                                 <a class="nav-sub-link" href="ecommerce-products.html">Shop</a>
                             </li>
                             <li class="nav-sub-item">
                                 <a class="nav-sub-link" href="ecommerce-product-details.html">Product Details</a>
                             </li>
                             <li class="nav-sub-item">
                                 <a class="nav-sub-link" href="ecommerce-add-product.html">Add Product</a>
                             </li>
                             <li class="nav-sub-item">
                                 <a class="nav-sub-link" href="ecommerce-wishlist.html">Wishlist</a>
                             </li>
                             <li class="nav-sub-item">
                                 <a class="nav-sub-link" href="ecommerce-checkout.html">Checkout</a>
                             </li>
                             <li class="nav-sub-item">
                                 <a class="nav-sub-link" href="ecommerce-cart.html">Cart</a>
                             </li>
                         </ul>
                     </li>
                 </ul>
             </div>
         </div>
     </div>
 </div>