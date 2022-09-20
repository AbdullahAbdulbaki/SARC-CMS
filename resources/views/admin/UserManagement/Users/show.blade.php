<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SARC CMS | Show User Info</title>
    @include('admin.layouts.css')
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">

        <!-- Preloader -->
        <div class="preloader flex-column justify-content-center align-items-center">
            <img class="animation__shake" src="{{ asset('/img/sarc.png') }}" alt="AdminLTELogo" height="60"
                width="60">
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
                            <h3 class="card-title"> User Details</h3>
                            <a href="{{ url('/users/all') }}" class="btn btn-danger" style="float: right;">back</a>
                        </div>
                        <div class="card-body">
                            <table id="example2" class="table table-bordered table-hover ">
                                <tr>
                                    <td style="background-color:#808080;font-weight:bold">ID</td>
                                    <td>{{ $users->id }}</td>
                                </tr>
                                <tr>
                                    <td style="background-color:#808080;font-weight:bold">Name</td>
                                    <td>{{ $users->name }}</td>
                                </tr>
                                <tr>
                                    <td style="background-color:#808080;font-weight:bold">Email</td>
                                    <td>{{ $users->email }}</td>
                                </tr>
                                <tr>
                                    <td style="background-color:#808080;font-weight:bold;width:200px">Role</td>
                                    <td>{{ $users->role->name }}</td>
                                </tr>
                                <tr>
                                    <td style="background-color:#808080;font-weight:bold;width:200px">Medical Point</td>
                                    <td>@if($users->mp_id != Null){{ $users->medicalpoint->en_name }} @else{{ Null }}@endif</td>
                                </tr>
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
