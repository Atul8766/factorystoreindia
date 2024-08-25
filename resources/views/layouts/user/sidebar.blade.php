  <aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3   bg-gradient-dark" id="sidenav-main">
    <div class="sidenav-header">
      <i class="fas fa-times p-3 cursor-pointer text-white opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
      <a class="navbar-brand m-0" href="{{ url('/') }}">
        <img src="{{ asset('public/assets/img/logo-ct.png')}}" class="navbar-brand-img h-100" alt="main_logo">
        <span class="ms-1 font-weight-bold text-white">User</span>
      </a>
    </div>
    <hr class="horizontal light mt-0 mb-2">
    <div class="collapse navbar-collapse  w-auto " id="sidenav-collapse-main">
      <ul class="navbar-nav">
        <li class="nav-item">
        
          <a class="nav-link text-white {{ request()->is('dashboard') ? 'active bg-gradient-primary' : '' }}"  href="{{ url('/') }}">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">dashboard</i>
            </div>
            <span class="nav-link-text ms-1">Dashboard</span>
          </a>
        </li>
       
     
        <li class="nav-item">
          <a class="nav-link text-white {{ request()->is('customers') ? 'active bg-gradient-primary' : '' }}"  href="{{ url('/customers') }}">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
             <i class="material-icons opacity-10">person</i>
            </div>
            <span class="nav-link-text ms-1">Customers</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white {{ request()->is('commission') ? 'active bg-gradient-primary' : '' }}"  href="{{ url('/commission') }}">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
             <i class="material-icons opacity-10">person</i>
            </div>
            <span class="nav-link-text ms-1">Commission</span>
          </a>
        </li>
      
        <li class="nav-item mt-3">
          <h6 class="ps-4 ms-2 text-uppercase text-xs text-white font-weight-bolder opacity-8">Account pages</h6>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white {{ request()->is('profile') ? 'active bg-gradient-primary' : '' }}"  href="{{ url('/profile') }}">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">person</i>
            </div>
            <span class="nav-link-text ms-1">Profile</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white {{ request()->is('/') ? 'active bg-gradient-primary' : '' }}"  href="{{ url('/logout') }}">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">login</i>
            </div>
            <span class="nav-link-text ms-1">Sign Out</span>
          </a>
        </li>
        
      </ul>
    </div>
    
    
  </aside>
 
