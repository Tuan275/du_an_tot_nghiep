<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="info">
          @auth
                <a class="text-gray-300 hover:text-white rounded-md px-3 py-2 text-sm font-medium">
                    <span class="text-uppercase">
                        {{auth()->user()->name}}
                    </span>
                </a>
                  <form class="inline" method="POST" action="{{route('user.logout')}}">
                    @csrf
                    @method('get')
                    <button type="submit" class="btn btn-info">
                      <a href="{{route('user.logout')}}" class="hover:text-white rounded-md px-3 py-2">
                        <i class="fa-solid fa-door-closed"></i>
                        {{-- <span class="text-sm text-white font-medium"> Logout</span> --}}
                      </a>
                    </button>
                  </form>
            @endauth
        </div>
      </div>

      <!-- SidebarSearch Form -->
      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item menu-open">
            <a href="{{route('admin.user.list')}}" class="nav-link">
              <i class="nav-icon fa-solid fa-user"></i>
              <p>
                User
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('admin.user.list')}}" class="nav-link">
                  <i class="fas fa-caret-right nav-icon"></i>
                  <p>List User</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('admin.user.create')}}" class="nav-link">
                  <i class="fas fa-caret-right nav-icon"></i>
                  <p>Create User</p>
                </a>
              </li>
            </ul>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>