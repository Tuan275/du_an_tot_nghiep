<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="info">
                @auth
                <a class="text-gray-300 hover:text-white rounded-md px-3 py-2 text-sm font-medium flex w-50">
                    <img src="../../{{auth()->user()->image}}" alt="" class="rounded-full">
                    <span class="text-uppercase">{{ auth()->user()->name }}</span>
                </a>
                <form class="inline" method="POST" action="{{ route('user.logout') }}">
                    @csrf
                    @method('get')
                    <button type="submit" class="btn btn-info">
                        <a href="{{ route('user.logout') }}" class="hover:text-white rounded-md px-3 py-2">
                            <i class="fa-solid fa-door-closed"></i>
                        </a>
                    </button>
                </form>
                @endauth
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item">
                    <a href="{{ route('admin.dashboard.home') }}" class="nav-link">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>Dashboard </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('admin.user.list') }}" class="nav-link">
                        <i class="nav-icon fa-solid fa-user"></i>
                        <p>User <i class="right fas fa-angle-left"></i></p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('admin.user.list') }}" class="nav-link">
                                <i class="fas fa-caret-right nav-icon"></i>
                                <p>List User</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.user.create') }}" class="nav-link">
                                <i class="fas fa-caret-right nav-icon"></i>
                                <p>Create User</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item">
                    <a href="{{ route('admin.products.list') }}" class="nav-link">
                        <i class="nav-icon fa-solid far fa-image"></i>
                        <p>Product <i class="right fas fa-angle-left"></i></p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('admin.products.list') }}" class="nav-link">
                                <i class="fas fa-caret-right nav-icon"></i>
                                <p>List Product</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.products.create') }}" class="nav-link">
                                <i class="fas fa-caret-right nav-icon"></i>
                                <p>Create Product</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item">
                    <a href="{{ route('admin.categories.list') }}" class="nav-link">
                        <i class="nav-icon fa-solid fa-list"></i>
                        <p>Category <i class="right fas fa-angle-left"></i></p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('admin.categories.list') }}" class="nav-link">
                                <i class="fas fa-caret-right nav-icon"></i>
                                <p>List Categories</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.categories.create') }}" class="nav-link">
                                <i class="fas fa-caret-right nav-icon"></i>
                                <p>Create Categories</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item">
                    <a href="{{ route('admin.photographer.list') }}" class="nav-link">
                        <i class="nav-icon fa-solid fa-address-book"></i>
                        <p>Photographer <i class="right fas fa-angle-left"></i></p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('admin.photographer.list') }}" class="nav-link">
                                <i class="fas fa-caret-right nav-icon"></i>
                                <p>List Photographer</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.photographer.create') }}" class="nav-link">
                                <i class="fas fa-caret-right nav-icon"></i>
                                <p>Create Photographer</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item">
                    <a href="{{ route('admin.service.list') }}" class="nav-link">
                        <i class="nav-icon fa-solid fa-camera-retro"></i>
                        <p>Service <i class="right fas fa-angle-left"></i></p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('admin.service.list') }}" class="nav-link">
                                <i class="fas fa-caret-right nav-icon"></i>
                                <p>List Service</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.service.create') }}" class="nav-link">
                                <i class="fas fa-caret-right nav-icon"></i>
                                <p>Create Service</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item">
                    <a href="{{ route('admin.appointment.list') }}" class="nav-link">
                        <i class="nav-icon fa-solid fa fa-calendar"></i>
                        <p>Appointment <i class="right fas fa-angle-left"></i></p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('admin.appointment.list') }}" class="nav-link">
                                <i class="fas fa-caret-right nav-icon"></i>
                                <p>List Appointment</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item">
                    <a href="" class="nav-link">
                        <i class="nav-icon fa-solid fa fa-pencil-square"></i>
                        <p>Studio<i class="right fas fa-angle-left"></i></p>

                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('admin.about.list') }}" class="nav-link">
                                <i class="fas fa-caret-right nav-icon"></i>
                                <p>List Title</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.about.create') }}" class="nav-link">
                                <i class="fas fa-caret-right nav-icon"></i>
                                <p>Create Title</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item">
                    <a href="" class="nav-link">
                        <i class="nav-icon fa-solid fa fa-commenting"></i>
                        <p>Review <i class="right fas fa-angle-left"></i></p>

                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('admin.review.list') }}" class="nav-link">
                                <i class="fas fa-caret-right nav-icon"></i>
                                <p>List Review</p>
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </nav>
    </div>
    <!-- /.sidebar -->
</aside>