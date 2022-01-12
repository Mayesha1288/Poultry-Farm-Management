<nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur" navbar-scroll="true">
      <div class="container-fluid py-1 px-3">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
            <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">My lovely Farm</a></li>
            <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Dashboard</li>
          </ol>
          <h6 class="font-weight-bolder mb-0">Dashboard </h6>
        </nav>
        <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
          <div class="ms-md-auto pe-md-3 d-flex align-items-center">
            <div class="input-group input-group-outline">
              <label class="form-label">Search here...</label>
              <input type="text" class="form-control">
            </div>
          </div>
          <ul class="navbar-nav  justify-content-end">
            <li class="nav-item d-flex align-items-center">
              <!-- <a href="{{route('admin.logout')}}" class="nav-link text-body font-weight-bold px-0"> -->
              <a class="nav-link px-3" href="{{route('admin.logout')}}"> ({{auth()->user()->role}}) ||LOGOUT</a>
                
                <!-- <span class="d-sm-inline d-none">LOGOUT</span> -->
              </a>
            </li>

             <li class="nav-item dropdown pe-2 d-flex align-items-center">
              <a href="{{route('admin.profile')}}" >
              <i class="fa fa-user me-sm-1"></i>
              </a>
             
            </li>
          </ul>
        </div>
      </div>
    </nav>