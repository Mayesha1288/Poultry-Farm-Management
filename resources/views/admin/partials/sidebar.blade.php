



<aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3   bg-gradient-dark" id="sidenav-main">
    <div class="sidenav-header">
      <i class="fas fa-times p-3 cursor-pointer text-white opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
      <a class="navbar-brand m-0" href="" target="_blank">
       
        <span class="ms-1 font-weight-bold text-white">  POULTRY FARM </span>
      </a>
    </div>
    <hr class="horizontal light mt-0 mb-2">
    <div class="collapse navbar-collapse  w-auto  max-height-vh-100" id="sidenav-collapse-main" style="height:100vh;">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link text-white active bg-gradient-primary" href="{{route('admin.dashboard')}}">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">dashboard</i>
            </div>
            <span class="nav-link-text ms-1">Dashboard</span>
          </a>
          
        </li>
        <li>
          <a class="nav-link text-white active bg-gradient-primary" href="{{route('admin.itemtype')}}">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
            <i class="fas fa-poll"></i>
            </div>
            <span class="nav-link-text ms-1">ItemType</span>
          </a>
        </li>
        <li>
          <a class="nav-link text-white active bg-gradient-primary" href="{{route('admin.item')}}">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
            <i class="fas fa-shopping-basket"></i>
            </div>
            <span class="nav-link-text ms-1">Item</span>
          </a>
        </li>
        <!-- <li>
        <a class="nav-link text-white active bg-gradient-primary" href="{{route('admin.hens')}}">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
            

            <i class="fab fa-the-red-yeti"></i>
            </div>
            <span class="nav-link-text ms-1">Information about Hens</span>
          </a>
        </li>
        <li>
          <a class="nav-link text-white active bg-gradient-primary" href="">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
            
            <i class="fas fa-search"></i>
            </div>
            <span class="nav-link-text ms-1">Types of Hen and Egg</span>
          </a>
        <li>
          <a class="nav-link text-white active bg-gradient-primary" href="{{route('admin.eggs')}}">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
           
            <i class="fas fa-egg"></i>
            </div>
            <span class="nav-link-text ms-1">Information about  Eggs</span>
          </a>
        </li> -->
        <li>
        <a class="nav-link text-white active bg-gradient-primary" href="{{route('admin.stock')}}">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
            

            <i class="fas fa-cubes"></i>
            </div>
            <span class="nav-link-text ms-1">Stock</span>
          </a>
        </li>
        <li>
        <a class="nav-link text-white active bg-gradient-primary" href="{{route('admin.customer')}}">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">

            <i class="fas fa-users"></i>
            </div>
            <span class="nav-link-text ms-1">Customer</span>
          </a>
        </li>
        <li>
         <a class="nav-link text-white active bg-gradient-primary" href="{{route('admin.records')}}">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
            <!-- <i class="material-icons opacity-10">dashboard</i> -->

            <i class="fas fa-clipboard"></i>
            </div>
            <span class="nav-link-text ms-1">Daily Status</span>
          </a>
        </li>
        @if(auth()->user()->role=='admin')
        <!-- <li>
          <a class="nav-link text-white active bg-gradient-primary" href="{{route('admin.payment')}}">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
           
            <i class="fas fa-user-friends"></i>
            </div>
            <span class="nav-link-text ms-1">Payment</span>
          </a>
        </li> -->

        <li>
          <a class="nav-link text-white active bg-gradient-primary" href="{{route('admin.pos')}}">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
            <i class="fas fa-balance-scale-right"></i>
            </div>
            <span class="nav-link-text ms-1">POS</span>
          </a>
        </li>
        <li>
          <a class="nav-link text-white active bg-gradient-primary" href="{{route('admin.sale')}}">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
            <i class="fas fa-poll"></i>
            </div>
            <span class="nav-link-text ms-1">Sales</span>
          </a>
        </li>
        <li>
          <a class="nav-link text-white active bg-gradient-primary" href="{{route('admin.sale')}}">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
            <i class="fas fa-poll"></i>
            </div>
            <span class="nav-link-text ms-1">Report Generate</span>
          </a>
        </li>
       
        @endif

        
       
  </aside>