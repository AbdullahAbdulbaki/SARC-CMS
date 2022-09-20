<!DOCTYPE html>
<html lang="en">

<head>


  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>SARC CMS | Patient file</title>
  @include('admin.layouts.css')
</head>

<body class="hold-transition sidebar-mini layout-fixed">
  <div class="wrapper">

    <!-- Preloader -->
    <div class="preloader flex-column justify-content-center align-items-center">
      <img class="animation__shake" src="{{ asset('/img/sarc.png') }}" alt="AdminLTELogo" height="60" width="60">
    </div>
    <!--navbar-->
    @include('Health_system.layouts.navbar')
    <!--End navbar-->
    <!--Sidebar-->
    @include('Health_system.layouts.sidebar')
    <!--End Sidebar-->
    <nav class="main-header navbar navbar-expand" style="background-color: #e3f2fd,color:black">
        <!-- Left navbar links -->
        <ul class="navbar-nav">

          <li class="nav-item d-none d-sm-inline-block">
            <a href="index3.html" class="nav-link">Personal Information</a>
          </li>
          <li class="nav-item d-none d-sm-inline-block">
            <a href="#" class="nav-link">Medical Information</a>
          </li>

        </ul>
    </nav>

    <!-- jQuery -->
    @include('admin.layouts.script')
</body>

</html>
