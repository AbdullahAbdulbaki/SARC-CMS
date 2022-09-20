<!DOCTYPE html>
<html lang="en">

<head>


  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>SARC CMS | Visits</title>
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
              <h1>Visits & Consultation</h1>
            </div>

          </div>
        </div><!-- /.container-fluid -->
      </section>

      <!-- Main content -->
      <section class="content">
        <div class="container-fluid">
          @if(Session::has('visit_delete'))
          <div class="alert alert-success" role="alert">
            {{ (Session::get('visit_delete')) }}
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
                  <h3 class="card-title">Visits & Consultation Info</h3>
                  <a href="{{ route('Health_system.visits.add') }}" class="btn btn-success" style="float: right;">Add New
                    Visits</a>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                  <table id="example1" class="table table-bordered table-hover ">
                    <thead bgcolor="#A0A0A0">
                      <tr>
                        <th>id</th>
                        <th>Patient Number</th>
                        <th>Visit Date</th>
                        <th>Clinic</th>
                        <th>Doctor</th>
                        <th>Assistant</th>
                        <th>Diagnosis</th>
                        <th>Medical Services</th>
                        <th>Labtest</th>
                        <th>X-Ray</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach ($visits as $visit)
                      <tr>

                        <td>{{ $visit->id}}</td>
                        <td>{{$visit->patient->first_name}} {{$visit->patient->last_name}}</td>
                        <td>{{ $visit->visit_date}}</td>
                        <td>{{ $visit->clinic->en_name}}</td>
                        <td>{{ $visit->doctor->en_name}}</td>
                        <td>{{ $visit->assistant->en_name }}</td>
                        <td>{{ $visit->diagnosis->en_name }}</td>
                        <td>{{$visit->medical_services->en_name}}</td>
                        <td>{{$visit->labtest->en_name}}</td>
                        <td>{{$visit->xray->en_name}}</td>

                        <td>
                          <div class="btn-toolbar" role="toolbar" aria-label="Toolbar with button groups">
                            <a href="/visits/show/{{ $visit->id }}" class="btn btn-info"
                              style="float: right;">show</a> ||
                            <a href="/visits/edit/{{ $visit->id }}" class="btn btn-primary" style="float: right;">Edit</a> ||
                            <a href="/visits/delete/{{ $visit->id }}" onclick="return confirm('Are you sure?')" class="btn btn-danger" style="float: right;">Delete</a>


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
