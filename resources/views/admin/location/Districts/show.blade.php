<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SARC CMS | Show District Info</title>
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
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="card card-info">
                        <div class="card-header">
                            <h3 class="card-title"> District Details</h3>
                            <a href="{{ url('/locations/districts/all')}}" class="btn btn-danger"  style="float: right;">back</a>
                        </div>
                        <div class="card-body">
                            <table id="example2" class="table table-bordered table-hover ">
                                <tr>
                                    <td style="background-color:#808080;font-weight:bold">District ID</td>
                                    <td>{{ $districts->id }}</td></tr>
                                <tr>
                                    <td style="background-color:#808080;font-weight:bold">District English Name</td>
                                    <td>{{ $districts->en_name }}</td></tr>
                                <tr><td style="background-color:#808080;font-weight:bold">District Arabic Name</td><td>{{ $districts->ar_name}}</td></tr>
                                <tr>
                                    <td style="background-color:#808080;font-weight:bold;width:200px">District Code</td><td>{{ $districts->code }}</td></tr>
                                    <tr>
                                        <td style="background-color:#808080;font-weight:bold;width:200px">District Reference Region </td><td>{{ $districts->region->en_name }}</td></tr>
                            </table>
                        </div>
                        <!-- /.card-body -->

                    </div>
                    <!-- /.card -->
                </div>


                <!-- Content Header (Page header) -->
            </section>
        </div>
    </div>

    <!-- End Content-->

    <!-- jQuery -->
    @include('admin.layouts.script')
</body>

</html>
