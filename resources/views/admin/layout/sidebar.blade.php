<div class="sidebar pe-4 pb-3">
    <nav class="navbar bg-secondary navbar-dark">
        <a href="" class="navbar-brand mx-4 mb-3">
            <h3 class="text-primary"><i class="fa fa-user-edit me-2"></i>ADMIN </h3>
        </a>
        <div class="d-flex align-items-center ms-4 mb-4">
            <div class="position-relative">
                <img class="rounded-circle" src="admin/img/user.jpg" alt="" style="width: 40px; height: 40px;">
                <div class="bg-success rounded-circle border border-2 border-white position-absolute end-0 bottom-0 p-1"></div>
            </div>
            <div class="ms-3">
                <h6 class="mb-0">{{ Auth::user()->name }}</h6>
                <span>Admin</span>
            </div>
        </div>
        <div class="navbar-nav w-100" id="myDIV">
    <ul class="navbar-nav">
      <li><a href="{{ url('dashboard') }}" class="nav-item nav-link "><i class="fa fa-tachometer-alt me-2"></i>Dashboard</a></li>
      <li><a href="{{ url('addproductpage') }}" class="nav-item nav-link "><i class="fa fa-envelope-open-text"></i>Add Product</a></li>
      <li><a href="{{ url('showproduct') }}" class="nav-item nav-link "><i class="fa fa-keyboard me-2"></i>Show Product</a></li>
      <li><a href="{{ url('addblogpage') }}" class="nav-item nav-link "><i class="fa fa-keyboard me-2"></i>Add Blog</a></li>   
      <li><a href="{{ url('showblog') }}" class="nav-item nav-link "><i class="fa fa-keyboard me-2"></i>Show Blog</a> </li>          
      <li><a href="{{ url('addteam') }}" class="nav-item nav-link "><i class="fa fa-keyboard me-2"></i>Add Team</a> </li>          
      <li><a href="{{ url('showteam') }}" class="nav-item nav-link "><i class="fa fa-keyboard me-2"></i>Show Team</a> </li>          
    </ul>
    </div>
    </nav>
</div>