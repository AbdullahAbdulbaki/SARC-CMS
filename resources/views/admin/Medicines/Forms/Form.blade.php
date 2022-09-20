<!DOCTYPE html>
<html lang="en">

<head>


  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>SARC CMS | Medicine Forms</title>
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

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1>Medicine Forms</h1>
            </div>

          </div>
        </div><!-- /.container-fluid -->
      </section>

      <!-- Main content -->
      <section class="content">
        <div class="container-fluid">
          @if(Session::has('Form_delete'))
          <div class="alert alert-success" role="alert">
            {{ (Session::get('Form_delete')) }}
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
                  <h3 class="card-title">Medicine Forms Info</h3>
                  <a href="{{ route('admin.Form.add') }}" class="btn btn-success" style="float: right;">Add New
                    Form</a>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                  <table id="example1" class="table table-bordered table-hover ">
                    <thead bgcolor="#A0A0A0">
                      <tr>
                        <th>id</th>
                        <th>English Name</th>
                        <th>Arabic Name</th>
            
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach ($Form as $Forms)
                      <tr>
                        <td>{{ $Forms->id}}</td>
                        <td>{{ $Forms->en_name }}</td>
                        <td>{{ $Forms->ar_name }}</td>

                        <td>
                          <div class="btn-toolbar" role="toolbar" aria-label="Toolbar with button groups">
                            <a href="/Form/show/{{ $Forms->id }}" class="btn btn-info"
                              style="float: right;">show</a> ||
                            <a href="/Form/edit/{{ $Forms->id }}" class="btn btn-primary" style="float: right;">Edit</a> ||
                            <a href="/Form/delete/{{ $Forms->id }}" onclick="return confirm('Are you sure?')" class="btn btn-danger" style="float: right;">Delete</a>


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
