<!DOCTYPE html>
<html lang="en">

<head>


  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>SARC CMS | Patients</title>
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
    <!--Content-->

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1>Patients</h1>
            </div>

          </div>
        </div><!-- /.container-fluid -->
      </section>

      <!-- Main content -->
      <section class="content">
        <div class="container-fluid">
          @if(Session::has('Patients_delete'))
          <div class="alert alert-success" role="alert">
            {{ (Session::get('Patients_delete')) }}
          </div>
          @endif
          @if(Session::has('success'))
          <div class="alert alert-success" role="alert">
            {{ (Session::get('success')) }}
          </div>
          @endif
          <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-header">
                  <h3 class="card-title">Patients Info</h3>
                  <a href="{{ route('Health_system.patients.add') }}" class="btn btn-success" style="float: right;">Add New
                    Patient</a>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                  <table id="example1" class="table table-bordered table-hover ">
                    <thead bgcolor="#A0A0A0">
                      <tr>
                        <th>id</th>
                        <th>Full Name</th>
                        <th>Father Name</th>
                        <th>Mother Name</th>
                        <th>Gender</th>
                        <th>File Number</th>
                        <th>Registration Date</th>
                        <th>Full Code</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach ($Patients as $Patient)
                      <tr>
                        <td>{{ $Patient->id}}</td>
                        <td>{{ $Patient->first_name}} &nbsp; {{ $Patient->last_name}}</td>
                        <td>{{ $Patient->father_name }}</td>
                        <td>{{ $Patient->mother_name }}</td>
                        <td>{{ $Patient->Gender }}</td>
                        <td>{{$Patient->file_id}}</td>
                        <td>{{$Patient->registration_date}}</td>
                        <td>{{$Patient->fullcode}}</td>

                        <td>
                          <div class="btn-toolbar" role="toolbar" aria-label="Toolbar with button groups">
                            <a href="/patients/show/{{ $Patient->id }}" class="btn btn-info"
                              style="float: right;">show</a> ||
                            <a href="/patients/edit/{{ $Patient->id }}" class="btn btn-primary" style="float: right;">Edit</a> ||
                            <a href="/patients/delete/{{ $Patient->id }}" onclick="return confirm('Are you sure?')" class="btn btn-danger" style="float: right;">Delete</a>||
                            <a href="{{ route('Health_system.visits.add2',$Patient->id)}}" class="btn btn-secondary" style="float: right;">Add Visit</a>||
                            <a href="/patients/file/{{$Patient->id}}" class="btn btn-success" style="float: right;">Show File</a>


                        </td>
                      </tr>
                      @endforeach

                  </table>
                </div>
                <!-- /.card-body -->
              </div>
              <!-- /.card -->

      </section>
    </div>


    <!-- End Content-->

    <!-- jQuery -->
    @include('admin.layouts.script')
</body>

</html>
