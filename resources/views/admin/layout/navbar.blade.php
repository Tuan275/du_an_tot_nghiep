    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        /* CSS cho thanh điều khiển sidebar */
        .control-sidebar {
            position: fixed;
            top: 0;
            right: -250px; /* Ban đầu trượt ra ngoài màn hình */
            width: 250px;
            height: 100%;
            background: #343a40;
            transition: right 0.3s;
            color: white;
            padding: 20px;
        }

        
        /* CSS cho thanh điều khiển pushmenu */
        .pushmenu {
            position: fixed;
            top: 0;
            left: -250px; /* Ban đầu trượt ra ngoài màn hình */
            width: 250px;
            height: 100%;
            background: #343a40;
            transition: left 0.3s;
            color: white;
            padding: 20px;
        }

       
    </style>
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
            </li>
            <li class="nav-item d-none d-sm-inline-block">
                <a href="{{route('client.home')}}" class="nav-link">Home</a>
            </li>
        </ul>

        <!-- Right navbar links -->
        <ul class="navbar-nav ml-auto">
            <!-- Navbar Search -->

            <li class="nav-item">
                <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                    <i class="fas fa-expand-arrows-alt"></i>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-widget="control-sidebar" data-controlsidebar-slide="true" href="#" role="button">
                    <i class="fas fa-th-large"></i>
                </a>
            </li>

            <li class="nav-item dropdown">
                <a class="nav-link" data-toggle="dropdown" href="#">
                    <i class="far fa-bell"></i>
                    <span class="badge badge-warning navbar-badge" id="notification-count">0</span>
                </a>
                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right" id="notification-menu">
                    <span class="dropdown-item dropdown-header" id="notification-header">0 Notifications</span>
                    <div class="dropdown-divider"></div>
                </div>
            </li>
        </ul>
    </nav>

    <aside class="control-sidebar">
        <!-- Nội dung sidebar ở đây -->
        <h2>Control Sidebar</h2>
        <p>Nội dung của thanh điều khiển.</p>
    </aside>

    <aside class="pushmenu">
        <!-- Nội dung menu ở đây -->
        <h2>Push Menu</h2>
        <p>Nội dung của thanh điều khiển.</p>
    </aside>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        // JavaScript cho chức năng mở rộng toàn màn hình
        document.querySelector('[data-widget="fullscreen"]').addEventListener('click', function(event) {
            event.preventDefault();
            if (!document.fullscreenElement) {
                document.documentElement.requestFullscreen();
            } else {
                if (document.exitFullscreen) {
                    document.exitFullscreen();
                }
            }
        });

        // JavaScript cho chức năng mở thanh điều khiển sidebar
        document.querySelector('[data-widget="control-sidebar"]').addEventListener('click', function(event) {
            event.preventDefault();
            document.querySelector('.control-sidebar').classList.toggle('control-sidebar-open');
        });

        // JavaScript cho chức năng mở thanh điều khiển pushmenu
        document.querySelector('[data-widget="pushmenu"]').addEventListener('click', function(event) {
            event.preventDefault();
            document.querySelector('.pushmenu').classList.toggle('pushmenu-open');
        });





        


    </script>

