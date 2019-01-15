<nav class="sidebar sidebar-offcanvas" id="sidebar">
  <ul class="nav">
    @if(Auth::check())
    <li class="nav-item">
      <a class="nav-link" href="{{route('home')}}">
        <i class="mdi mdi-home menu-icon"></i>
        <span class="menu-title">Trang chủ</span>
      </a>
    </li>
    @endif
    <!-- MENU -->
    <!-- GIÁM ĐỐC -->
    @if(Auth::user()->user_type_id == '1')
    <li class="nav-item">
      <a class="nav-link" href="">
        <i class="mdi mdi-puzzle menu-icon"></i>
        <span class="menu-title">Dự toán dòng tiền </span>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="">
        <i class="mdi mdi-puzzle menu-icon"></i>
        <span class="menu-title">Công Nợ</span>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="">
        <i class="mdi mdi-puzzle menu-icon"></i>
        <span class="menu-title">Lương Nhân viên</span>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="">
        <i class="mdi mdi-puzzle menu-icon"></i>
        <span class="menu-title">Tiền mặt</span>
      </a>
    </li>
    <!-- ĐIỀU PHỐI -->
    @elseif(Auth::user()->user_type_id == '2')
    <li class="nav-item">
      <a class="nav-link" href="{{route('coordinator.order.list')}}">
        <i class="mdi mdi-puzzle menu-icon"></i>
        <span class="menu-title">Đơn Hàng</span>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="{{route('coordinator.truck.list')}}">
        <i class="mdi mdi-puzzle menu-icon"></i>
        <span class="menu-title">Xe tải</span>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="{{route('coordinator.customer')}}">
        <i class="mdi mdi-puzzle menu-icon"></i>
        <span class="menu-title">Khách hàng</span>
      </a>
    </li>
    
    
    
    
    <!-- KINH DOANH -->
    @elseif(Auth::user()->user_type_id == '3')
    <li class="nav-item">
      <a class="nav-link" href="{{route('seller.order.list')}}">
        <i class="mdi mdi-puzzle menu-icon"></i>
        <span class="menu-title">Đơn Hàng</span>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="#">
        <i class="mdi mdi-puzzle menu-icon"></i>
        <span class="menu-title">Đối tác</span>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="{{route('seller.customer')}}">
        <i class="mdi mdi-puzzle menu-icon"></i>
        <span class="menu-title">Khách hàng</span>
      </a>
    </li>
    <!-- NHÂN SỰ -->
    @elseif(Auth::user()->user_type_id == '4')
    <li class="nav-item">
      <a class="nav-link" href="">
        <i class="mdi mdi-puzzle menu-icon"></i>
        <span class="menu-title">Lương Nhân viên</span>
      </a>
    </li>
    <!-- KÊ TOÁN-->
    @elseif(Auth::user()->user_type_id == '5')
    <li class="nav-item">
      <a class="nav-link" href="">
        <i class="mdi mdi-puzzle menu-icon"></i>
        <span class="menu-title">Công Nợ</span>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="">
        <i class="mdi mdi-puzzle menu-icon"></i>
        <span class="menu-title">Tiền mặt</span>
      </a>
    </li>
    <!-- MANAGER -->
    @elseif(Auth::user()->user_type_id == '6')
    <li class="nav-item">
      <a class="nav-link" href="{{route('manager.accounts')}}">
        <i class="mdi mdi-puzzle menu-icon"></i>
        <span class="menu-title">Người dùng</span>
      </a>
    </li>
    @endif
  </ul>
</nav>
