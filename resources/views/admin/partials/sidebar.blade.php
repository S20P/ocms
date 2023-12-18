
  <aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <a class="nav-link " href="{{route('admin.dashboard')}}">
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
      </li><!-- End Dashboard Nav -->
    
      <li class="nav-item">
        <a class="nav-link collapsed" href="{{route('admin.categories.index')}}">
         <i class="bi bi-tags-fill"></i>
          <span>Brands</span>
        </a>
      </li>
      
       <li class="nav-item">
        <a class="nav-link collapsed" href="{{route('admin.coupon.index')}}">
         <i class="bi bi-list-nested"></i>
          <span>Coupons</span>
        </a>
      </li>

       <li class="nav-item">
        <a class="nav-link collapsed" href="{{route('admin.denomination.index')}}">
         <i class="bi bi-people"></i>
          <span>Denominations</span>
        </a>
      </li>

    </ul>

  </aside><!-- End Sidebar-->