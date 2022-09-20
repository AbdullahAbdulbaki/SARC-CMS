<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>SARC CMS | Dashboard</title>
@include('admin.layouts.css')
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Preloader -->
  <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="{{ asset('/img/sarc.png') }}" alt="AdminLTELogo" height="60" width="60">
  </div>
  <!--navbar-->
  @include('admin.layouts.navbar')
 <!--End navbar-->
 <!--Sidebar-->
  @include('admin.layouts.sidebar')
  <!--End Sidebar-->
<!--Content-->
 @include('admin.layouts.body')
<!-- End Content-->

<!-- jQuery -->
@include('admin.layouts.script')
</body>
</html>
