<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SARC CMS | Show Patients Info</title>
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
                            <h3 class="card-title"> Patients Details</h3>
                            <a href="{{ url('/patients/all')}}" class="btn btn-danger"  style="float: right;">back</a>
                        </div>
                        <div class="card-body">
                            <table id="example2" class="table table-bordered table-hover ">
                                <tr>
                                    <td style="background-color:#808080;font-weight:bold">Patients ID</td>
                                    <td>{{ $Patients->id }}</td></tr>
                                <tr>
                                    <td style="background-color:#808080;font-weight:bold">Patients First Name</td>
                                    <td>{{ $Patients->first_name }}</td></tr>
                                <tr><td style="background-color:#808080;font-weight:bold">Patients Last Name</td><td>{{ $Patients->last_name}}</td></tr>
                                <tr>
                                    <td style="background-color:#808080;font-weight:bold;width:200px">Father Name</td><td>{{ $Patients->father_name }}</td></tr>
                                    <tr>
                                        <td style="background-color:#808080;font-weight:bold;width:200px">Mother Name</td><td>{{ $Patients->mother_name }}</td>
                                    </tr>
                                    <tr>
                                        <td style="background-color:#808080;font-weight:bold;width:200px">Registration Date</td><td>{{ $Patients->registration_date }}</td>
                                    </tr>
                                    <tr>
                                        <td style="background-color:#808080;font-weight:bold;width:200px">Nationality</td><td>{{ $Patients->nationality->en_name}}</td>
                                    </tr>
                                    <tr>
                                        <td style="background-color:#808080;font-weight:bold;width:200px">Phone</td><td>{{ $Patients->phone }}</td>
                                    </tr>
                                    <tr>
                                        <td style="background-color:#808080;font-weight:bold;width:200px">Mobile</td><td>{{ $Patients->mobile }}</td>
                                    </tr>
                                    <tr>
                                        <td style="background-color:#808080;font-weight:bold;width:200px">Birth Date</td><td>{{ $Patients->birth_date }}</td>
                                    </tr>
                                    <tr>
                                        <td style="background-color:#808080;font-weight:bold;width:200px">File No.</td><td>{{ $Patients->file_id }}</td>
                                    </tr>
                                    <tr>
                                        <td style="background-color:#808080;font-weight:bold;width:200px">Is Displaced</td><td>@if($Patients->is_displaced = 1) {{ "Displaced" }} @else {{ "Not Displaced" }} @endif</td>
                                    </tr>
                                    <tr>
                                        <td style="background-color:#808080;font-weight:bold;width:200px">Old City</td><td> @if ($Patients->old_city_id != Null) {{ $Patients->city->en_name }}  @endif</td>
                                    </tr>
                                    <tr>
                                        <td style="background-color:#808080;font-weight:bold;width:200px">Old Area</td><td> @if ($Patients->old_area_id != Null) {{ $Patients->area->en_name }} @endif</td>

                                    </tr>
                                    <tr>
                                        <td style="background-color:#808080;font-weight:bold;width:200px">New City</td><td> @if ($Patients->new_city_id != Null) {{ $Patients->city->en_name }} @endif</td>
                                    </tr>
                                    <tr>
                                        <td style="background-color:#808080;font-weight:bold;width:200px">New Area</td><td> @if ($Patients->new_area_id != Null) {{ $Patients->area->en_name }} @endif</td>
                                    </tr>
                                    <tr>
                                        <td style="background-color:#808080;font-weight:bold;width:200px">UNHCR No.</td><td>{{ $Patients->unhcr_number }}</td>
                                    </tr>
                                    <tr>
                                        <td style="background-color:#808080;font-weight:bold;width:200px">Document Type</td><td> @if ($Patients->document_type != Null) {{ $Patients->document->ar_name }} @endif</td>
                                    </tr>
                                    <tr>
                                        <td style="background-color:#808080;font-weight:bold;width:200px">Document No.</td><td>{{ $Patients->document_id }}</td>
                                    </tr>
                                    <tr>
                                        <td style="background-color:#808080;font-weight:bold;width:200px">Gender</td><td>@if($Patients->Gender = 1) {{ "Male" }} @else {{ "Female" }} @endif</td>
                                    </tr>
                                    <tr>
                                        <td style="background-color:#808080;font-weight:bold;width:200px">Is Disable</td><td>@if($Patients->is_disablity = 1) {{ "Disable" }} @else {{ "Not Disable" }} @endif</td>
                                    </tr>
                                    <tr>
                                        <td style="background-color:#808080;font-weight:bold;width:200px">Disablity Type</td><td> @if ($Patients->disablity_id != Null) {{ $Patients->disablity->en_name }} @endif</td>
                                    </tr>
                                    <tr>
                                        <td style="background-color:#808080;font-weight:bold;width:200px">Created at</td><td>{{ $Patients->created_at }}</td>
                                    </tr>
                                    <tr>
                                        <td style="background-color:#808080;font-weight:bold;width:200px">Updated at</td><td>{{ $Patients->updated_at }}</td>
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
