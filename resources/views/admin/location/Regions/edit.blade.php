<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>SARC CMS | Edit Region Info</title>
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
          @if(Session::has('update_region'))
          <div class="alert alert-success" role="alert">
            {{ (Session::get('update_region')) }}
          </div>
          @endif
          <div class="card card-info">
            <div class="card-header">
              <h3 class="card-title">Edit Region Information</h3>
              <a href="{{ url('/locations/regions/all')}}" class="btn btn-danger"  style="float: right;">back</a>
            </div>
            <div class="card-body">
              <form method="POST" action="{{ route('admin.lcations.regions.update') }}">
                @csrf
                <input type="hidden" name="id" value="{{ $regions->id }}"/>
                <!-- Color Picker -->
                <div class="form-group">
                  <label>English Name</label>
                  <input type="text" name="en_name" class="form-control my-colorpicker1" value="{{ $regions->en_name }}">
                  @error('en_name')
                  <small class="form-text text-danger">{{ $message }}</small>
                  @enderror
                </div>
                <!-- /.form group -->
                <!-- Color Picker -->
                <div class="form-group">
                  <label>Arabic Name</label>
                  <input type="text" name="ar_name" class="form-control my-colorpicker1" value="{{ $regions->ar_name }}">
                  @error('ar_name')
                  <small class="form-text text-danger">{{ $message }}</small>
                  @enderror
                </div>
                <!-- /.form group -->
                <!-- Color Picker -->
                <div class="form-group">
                  <label>code</label>
                  <input type="text" name="code" class="form-control my-colorpicker1" value="{{ $regions->code }}">
                  @error('code')
                  <small class="form-text text-danger">{{ $message }}</small>
                  @enderror
                </div>
                <div class="form-group">
                    <label>City</label>
                    <select name="city_id" id="city_id" class="form-control my-colorpicker1 select2-dropdown"
                        required foccus>
                        <option value="option_select" disabled selected>Cities</option>
                        @foreach ($cities as $city)
                            <option value="{{ $city->id }}" {{$regions->city_id == $city->id  ? 'selected' : ''}}>{{ $city->en_name }}</option>
                        @endforeach
                    </select>

                    @error('city_id')
                        <small class="form-text text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <!-- /.form group -->
                <div class="form-group">

                  <input type="submit" value="Update Region Info" class="form-control btn btn-success ">
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
