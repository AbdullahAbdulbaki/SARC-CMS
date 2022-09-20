<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SARC CMS | Show Nationality Info</title>
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
                            <h3 class="card-title"> Nationality Details</h3>
                            <a href="{{ url('/nationalities/all')}}" class="btn btn-danger"  style="float: right;">back</a>
                        </div>
                        <div class="card-body">
                            <table id="example2" class="table table-bordered table-hover ">
                                <tr>
                                    <td style="background-color:#808080;font-weight:bold">Nationality ID</td>
                                    <td>{{ $nationalities->id }}</td></tr>
                                <tr>
                                    <td style="background-color:#808080;font-weight:bold">Nationality English Name</td>
                                    <td>{{ $nationalities->en_name }}</td></tr>
                                <tr><td style="background-color:#808080;font-weight:bold">Nationality Arabic Name</td><td>{{ $nationalities->ar_name}}</td></tr>
                                <tr>
                                    <td style="background-color:#808080;font-weight:bold;width:200px">Nationality Code</td><td>{{ $nationalities->code }}</td></tr>
                                    <tr>
                                        <td style="background-color:#808080;font-weight:bold;width:200px">Nationality Has UNHCR</td><td>{{ $nationalities->hasUNHCR }}</td></tr>
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
