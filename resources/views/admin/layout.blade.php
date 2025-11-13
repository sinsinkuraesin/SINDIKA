<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>SINDIKA</title>

    <!-- plugins:css -->
    <link rel="stylesheet" href="{{ asset('') }}assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="{{ asset('') }}assets/vendors/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="{{ asset('') }}assets/vendors/css/vendor.bundle.base.css">

    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="{{ asset('') }}assets/vendors/jquery-bar-rating/css-stars.css" />
    <link rel="stylesheet" href="{{ asset('') }}assets/vendors/font-awesome/css/font-awesome.min.css" />

    <!-- Layout styles -->
    <link rel="stylesheet" href="{{ asset('') }}assets/css/demo_1/style.css" />
    <link rel="shortcut icon" href="{{ asset('') }}assets/images/web.png" />

    <!-- ✅ Custom CSS untuk perbaikan posisi dropdown notifikasi -->
    <style>
      /* Pastikan lonceng menjadi acuan posisi */
      #notificationDropdown {
        position: relative;
      }

      /* Dropdown muncul tepat di bawah lonceng */
      #notificationDropdown + .dropdown-menu {
        position: absolute !important;
        top: 120% !important;
        left: 50% !important;
        transform: translateX(-50%) !important;
        right: auto !important;
        margin-top: 5px;
        z-index: 1050 !important;
      }

      /* Opsional: panah kecil di atas dropdown */
      #notificationDropdown + .dropdown-menu::before {
        content: "";
        position: absolute;
        top: -8px;
        left: 50%;
        transform: translateX(-50%);
        border-width: 0 8px 8px 8px;
        border-style: solid;
        border-color: transparent transparent #ffffff transparent;
      }
    </style>
  </head>
  <body>
    <div class="container-scroller">
      <!-- Sidebar -->
      <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
          <li class="nav-item nav-profile border-bottom">
            <a href="#" class="nav-link flex-column">
              <div class="nav-profile-image">
                <img src="{{ asset('') }}assets/images/faces/face1.jpg" alt="profile" />
              </div>
              <div class="nav-profile-text d-flex ml-0 mb-3 flex-column">
                <span class="font-weight-semibold mb-1 mt-2 text-center">Lukman Hakim., S.Sos., M.Si</span>
                <span class="text-secondary icon-sm text-center" style="font-size: 0.85em;">NIP: 197503032008011017</span>
              </div>
            </a>
          </li>

          <li class="nav-item text-center" style="margin: 15px 0;">
            <span class="nav-item-head d-block" style="padding: 10px;">SINDIKA</span>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="{{ url('/beranda-admin') }}">
              <i class="mdi mdi-compass-outline menu-icon"></i>
              <span class="menu-title">Dashboard</span>
            </a>
          </li>

          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#master-ikm" aria-controls="master-ikm">
              <i class="mdi mdi-contacts menu-icon"></i>
              <span class="menu-title">Data Master IKM</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="master-ikm">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"><a class="nav-link" href="">Data IKM</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('industri.index') }}">Data Industri</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('usaha.index') }}">Data Badan Usaha</a></li>
              </ul>
            </div>
          </li>

          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#klasifikasi-ikm" aria-controls="klasifikasi-ikm">
              <i class="mdi mdi-format-list-bulleted menu-icon"></i>
              <span class="menu-title">Data Klasifikasi IKM</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="klasifikasi-ikm">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"><a class="nav-link" href="#">Skala/Badan Usaha IKM</a></li>
                <li class="nav-item"><a class="nav-link" href="#">Kategori Jenis Industri</a></li>
                <li class="nav-item"><a class="nav-link" href="#">Wilayah Penyebaran IKM</a></li>
              </ul>
            </div>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="#">
              <i class="mdi mdi-logout menu-icon"></i>
              <span class="menu-title">Logout</span>
            </a>
          </li>
        </ul>
      </nav>

      <!-- Navbar -->
      <div class="container-fluid page-body-wrapper">
        <nav class="navbar default-layout-navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
          <div class="navbar-menu-wrapper d-flex align-items-stretch">
            <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
              <span class="mdi mdi-chevron-double-left"></span>
            </button>

            <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
              <a class="navbar-brand brand-logo-mini" href="#"><img src="{{ asset('') }}assets/images/logo-mini.svg" alt="logo" /></a>
            </div>

            <ul class="navbar-nav navbar-nav-right">
              <li class="nav-item dropdown ml-3">
                <a class="nav-link" id="notificationDropdown" href="#" data-toggle="dropdown">
                  <i class="mdi mdi-bell-outline"></i>
                </a>

                <div class="dropdown-menu navbar-dropdown-end preview-list dropdown-menu-lg" aria-labelledby="notificationDropdown">
                  <h6 class="px-3 py-3 font-weight-semibold mb-0">Notifications</h6>
                  <div class="dropdown-divider"></div>

                  <a class="dropdown-item preview-item">
                    <div class="preview-thumbnail">
                      <div class="preview-icon bg-success"><i class="mdi mdi-calendar"></i></div>
                    </div>
                    <div class="preview-item-content d-flex align-items-start flex-column justify-content-center">
                      <h6 class="preview-subject font-weight-normal mb-0">New order received</h6>
                      <p class="text-gray ellipsis mb-0">45 sec ago</p>
                    </div>
                  </a>

                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item preview-item">
                    <div class="preview-thumbnail">
                      <div class="preview-icon bg-warning"><i class="mdi mdi-settings"></i></div>
                    </div>
                    <div class="preview-item-content d-flex align-items-start flex-column justify-content-center">
                      <h6 class="preview-subject font-weight-normal mb-0">Server limit reached</h6>
                      <p class="text-gray ellipsis mb-0">55 sec ago</p>
                    </div>
                  </a>

                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item preview-item">
                    <div class="preview-thumbnail">
                      <div class="preview-icon bg-info"><i class="mdi mdi-link-variant"></i></div>
                    </div>
                    <div class="preview-item-content d-flex align-items-start flex-column justify-content-center">
                      <h6 class="preview-subject font-weight-normal mb-0">Kevin Karvelle</h6>
                      <p class="text-gray ellipsis mb-0">11:09 PM</p>
                    </div>
                  </a>

                  <div class="dropdown-divider"></div>
                  <h6 class="p-3 font-13 mb-0 text-primary text-center">View all notifications</h6>
                </div>
              </li>
            </ul>

            <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
              <span class="mdi mdi-menu"></span>
            </button>
          </div>
        </nav>

        <!-- Main content -->
        @yield('content')
      </div>
    </div>

    <!-- plugins:js -->
    <script src="{{ asset('') }}assets/vendors/js/vendor.bundle.base.js"></script>
    <!-- Plugin js for this page -->
    <script src="{{ asset('') }}assets/vendors/jquery-bar-rating/jquery.barrating.min.js"></script>
    <script src="{{ asset('') }}assets/vendors/chart.js/Chart.min.js"></script>
    <script src="{{ asset('') }}assets/vendors/flot/jquery.flot.js"></script>
    <script src="{{ asset('') }}assets/vendors/flot/jquery.flot.resize.js"></script>
    <script src="{{ asset('') }}assets/vendors/flot/jquery.flot.categories.js"></script>
    <script src="{{ asset('') }}assets/vendors/flot/jquery.flot.fillbetween.js"></script>
    <script src="{{ asset('') }}assets/vendors/flot/jquery.flot.stack.js"></script>

    <!-- inject:js -->
    <script src="{{ asset('') }}assets/js/off-canvas.js"></script>
    <script src="{{ asset('') }}assets/js/hoverable-collapse.js"></script>
    <script src="{{ asset('') }}assets/js/misc.js"></script>
    <script src="{{ asset('') }}assets/js/settings.js"></script>
    <script src="{{ asset('') }}assets/js/todolist.js"></script>
    <!-- Custom js for this page -->
    <script src="{{ asset('') }}assets/js/dashboard.js"></script>
  </body>
</html>
