<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="lib_user_dashboard.php">
        <div class="sidebar-brand-icon rotate-n-15">
          <i class="fas fa-book"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Library Management <sup>System</sup></div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item active">
        <a class="nav-link" href="lib_user_dashboard.php">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
        Personal
      </div>

      <!-- Nav Item - Pages Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
          <i class="fas fa-fw fa-user"></i>
          <span>Profile</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="lib_user_view_profile.php">View </a>
            <a class="collapse-item" href="lib_user_update_profile.php">Update</a>
          </div>
        </div>
      </li>

      

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
        Books
      </div>

      <!-- Nav Item - Pages Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true" aria-controls="collapsePages">
          <i class="fas fa-fw fa-folder"></i>
          <span>Book Categories</span>
        </a>
        <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Book Categories</h6>
            <a class="collapse-item" href="lib_user_view_arts_music_books.php">Arts | Music</a>
            <a class="collapse-item" href="lib_user_view_biography_books.php">Biographies</a>
            <a class="collapse-item" href="lib_user_view_business_books.php">Business</a>
            <a class="collapse-item" href="lib_user_view_comics_books.php">Comics</a>
            <a class="collapse-item" href="lib_user_view_comptech_books.php">Computer | Technology </a> 
            <a class="collapse-item" href="lib_user_view_fiction_books.php">Fiction</a>
            <a class="collapse-item" href="lib_user_view_sci_fiction_books.php">Science Fiction</a> 
            <div class="collapse-divider"></div>
            
          </div>
        </div>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="lib_user_view_borrowed_book.php">
          <i class="fas fa-fw fa-file"></i>
          <span>Borrowed Book</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="lib_user_return_book.php">
          <i class="fas fa-fw fa-eject"></i>
          <span>Return Book</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="lib_user_report_lost_book.php">
          <i class="fas fa-fw fa-power-off"></i>
          <span>Report Lost Book</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>