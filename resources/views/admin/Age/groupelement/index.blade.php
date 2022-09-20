<!DOCTYPE html>
<html lang="en">

<head>


  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>SARC CMS | Age Group Elements</title>
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
              <h1>Age Group Elements</h1>
            </div>

          </div>
        </div><!-- /.container-fluid -->
      </section>

      <!-- Main content -->
      <section class="content">
        <div class="container-fluid">
          @if(Session::has('Agegroupelement_delete'))
          <div class="alert alert-success" role="alert">
            {{ (Session::get('Agegroupelement_delete')) }}
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
                  <h3 class="card-title">Age Group Elements Info</h3>
                  <a href="{{ route('admin.Agegroupelement.add') }}" class="btn btn-success" style="float: right;">Add New
                    Category</a>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                  <table id="example1" class="table table-bordered table-hover ">
                    <thead bgcolor="#A0A0A0">
                      <tr>
                        <th>id</th>
                        <th>English Name</th>
                        <th>Arabic Name</th>
                        <th>Group</th>
                        <th>From</th>
                        <th>To</th>
                        <th>Index</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach ($Agegroupelement as $Agegroupelements)
                      <tr>
                        <td>{{ $Agegroupelements->id}}</td>
                        <td>{{ $Agegroupelements->en_name }}</td>
                        <td>{{ $Agegroupelements->ar_name }}</td>
                        <td>{{ $Agegroupelements->group->en_name }}</td>
                        <td>{{ $Agegroupelements->from }}</td>
                        <td>{{ $Agegroupelements->to }}</td>
                        <td>{{ $Agegroupelements->index }}</td>
                        <td>
                          <div class="btn-toolbar" role="toolbar" aria-label="Toolbar with button groups">
                            <a href="/Agegroupelement/show/{{ $Agegroupelements->id }}" class="btn btn-info"
                              style="float: right;">show</a> ||
                            <a href="/Agegroupelement/edit/{{ $Agegroupelements->id }}" class="btn btn-primary" style="float: right;">Edit</a> ||
                            <a href="/Agegroupelement/delete/{{ $Agegroupelements->id }}" onclick="return confirm('Are you sure?')" class="btn btn-danger" style="float: right;">Delete</a>


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
