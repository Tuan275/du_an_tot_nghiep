<!DOCTYPE html>
<html lang="en">
@include('admin.layout.head')

<body class="hold-transition sidebar-mini layout-fixed">
  <div class="wrapper">
    <!-- Navbar -->
    @include('admin.layout.navbar')
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    @include('admin.layout.sidebar')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0">
                @yield('content_title')
              </h1>
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
      <!-- /.content-header -->

      <!-- Main content -->
      <section class="content">

        @yield('content')

      </section>
      <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    @include('admin.layout.footer')

  </div>
  <!-- ./wrapper -->

  <!-- Script -->
  @include('admin.layout.script')

  <script>
    //xử lý lưu lại hoạt động 
    // Lưu trạng thái vào cookie
    document.cookie = `scrollPosition=${window.scrollY}; path=/`;

    // Lấy trạng thái từ cookie
    function getCookie(name) {
      const value = `; ${document.cookie}`;
      const parts = value.split(`; ${name}=`);
      if (parts.length === 2) return parts.pop().split(';').shift();
    }

    window.onload = () => {
      const scrollPosition = getCookie('scrollPosition');
      if (scrollPosition) {
        window.scrollTo(0, parseInt(scrollPosition, 10));
      }
    };
  </script>
</body>

</html>