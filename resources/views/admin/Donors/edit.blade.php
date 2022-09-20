<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>SARC CMS | Edit Donors Info</title>
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
          @if(Session::has('update_donor'))
          <div class="alert alert-success" role="alert">
            {{ (Session::get('update_donor')) }}
          </div>
          @endif
          <div class="card card-info">
            <div class="card-header">
              <h3 class="card-title">Edit Donor Information</h3>
              <a href="{{ url('/donors/all')}}" class="btn btn-danger"  style="float: right;">back</a>
            </div>
            <div class="card-body">
              <form method="POST" action="{{ route('admin.donors.update') }}">
                @csrf
                <input type="hidden" name="id" value="{{ $donors->id }}"/>
                <!-- Color Picker -->
                <div class="form-group">
                  <label>Donor Code</label>
                  <input type="text" name="code" class="form-control my-colorpicker1" value="{{ $donors->code }}">
                  @error('code')
                  <small class="form-text text-danger">{{ $message }}</small>
                  @enderror
                </div>
                <!-- /.form group -->
                <div class="form-group">

                  <input type="submit" value="Update Donor Info" class="form-control btn btn-success ">
                </div>
                <!-- /.form group -->
              </form>
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
