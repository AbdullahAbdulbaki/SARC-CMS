<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SARC CMS | Show Visits Info</title>
    @include('Health_system.layouts.css')
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
        <!--Content-->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="card card-info">
                        <div class="card-header">
                            <h3 class="card-title"> Visits Details</h3>
                            <a href="{{ url('/visits/all')}}" class="btn btn-danger"  style="float: right;">back</a>
                        </div>
                        <div class="card-body">
                            <table id="example2" class="table table-bordered table-hover ">
                                <tr>
                                    <td style="background-color:#808080;font-weight:bold">visit ID</td>
                                    <td>{{ $visits->id }}</td></tr>
                                <tr>
                                    <td style="background-color:#808080;font-weight:bold">visit Date</td>
                                    <td>{{ $visits->visit_date }}</td></tr>
                                <tr><td style="background-color:#808080;font-weight:bold">Patient</td><td>{{ $visits->patient->first_name}} {{ $visits->patient->last_name}}</td></tr>
                                <tr>
                                    <td style="background-color:#808080;font-weight:bold;width:200px">Clinic</td><td>{{ $visits->clinic->en_name }}</td></tr>
                                    <tr>
                                        <td style="background-color:#808080;font-weight:bold;width:200px">Doctor</td><td>{{ $visits->doctor->en_name }}</td>
                                    </tr>
                                    <tr>
                                        <td style="background-color:#808080;font-weight:bold;width:200px">Assistant</td><td>{{ $visits->assistant->en_name }}</td>
                                    </tr>
                                    <tr>
                                        <td style="background-color:#808080;font-weight:bold;width:200px">Diagnosis</td><td>{{ $visits->diagnosis->en_name}}</td>
                                    </tr>
                                    <tr>
                                        <td style="background-color:#808080;font-weight:bold;width:200px">Medical Services</td><td>{{ $visits->medical_services->en_name}}</td>
                                    </tr>
                                    <tr>
                                        <td style="background-color:#808080;font-weight:bold;width:200px">Lab Test</td><td>{{ $visits->labtest->en_name }}</td>
                                    </tr>
                                    <tr>
                                        <td style="background-color:#808080;font-weight:bold;width:200px">X-Ray</td><td>{{ $visits->xray->en_name }}</td>
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
    @include('Health_system.layouts.script')
</body>

</html>
