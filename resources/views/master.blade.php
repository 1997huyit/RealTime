<!DOCTYPE html>
<html lang="en">

@include('layout.header')
<body>
  <div class="container-scroller">
    <!-- partial:partials/_navbar.html -->
    @include('layout.topnav')
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial:partials/_settings-panel.html -->
      <div class="theme-setting-wrapper">
        <div id="settings-trigger"><i class="mdi mdi-settings"></i></div>
        <div id="theme-settings" class="settings-panel">
          <i class="settings-close mdi mdi-close"></i>
          <p class="settings-heading">SIDEBAR SKINS</p>
          <div class="sidebar-bg-options" id="sidebar-light-theme"><div class="img-ss rounded-circle bg-light border mr-3"></div>Light</div>
          <div class="sidebar-bg-options selected" id="sidebar-dark-theme"><div class="img-ss rounded-circle bg-primary border mr-3"></div>Dark</div>
          <p class="settings-heading mt-2">HEADER SKINS</p>
          <div class="color-tiles mx-0 px-4">
            <div class="tiles light"></div>
            <div class="tiles dark"></div>
            <div class="tiles default"></div>
          </div>
        </div>
      </div>
      @include('layout.rightsidebar')
      <!-- partial -->
      <!-- partial:partials/_sidebar.html -->
      @include('layout.leftsidebar')
      <!-- partial -->
      <div class="main-panel">

        <div class="content-wrapper">
        @yield('content')
        </div>
        <!-- content-wrapper ends -->
        <!-- partial:partials/_footer.html -->
        @include('layout.footer')
        <!-- partial -->
      </div>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->

  <!-- plugins:js -->
  @include('layout.script')
  <!-- End custom js for this page-->
</body>

</html>
