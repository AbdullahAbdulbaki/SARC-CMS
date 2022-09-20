<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SARC CMS | Edit Form Info</title>
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
                            <h3 class="card-title">Edit Form Information</h3>
                            <a href="{{ url('/Form/all') }}" class="btn btn-danger"
                                style="float: right;">back</a>
                        </div>
                        <div class="card-body">
                            <form method="POST" action="{{ route('admin.Form.update') }}">
                                @csrf
                                <input type="hidden" name="id" value="{{ $Form->id }}" />
                                <!-- Color Picker -->
                                <div class="form-group">
                                    <label>English Name</label>
                                    <input type="text" name="en_name" class="form-control my-colorpicker1"
                                        value="{{ $Form->en_name }}">
                                    @error('en_name')
                                        <small class="form-text text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <!-- /.form group -->
                                <!-- Color Picker -->
                                <div class="form-group">
                                    <label>Arabic Name</label>
                                    <input type="text" name="ar_name" class="form-control my-colorpicker1"
                                        value="{{ $Form->ar_name }}">
                                    @error('ar_name')
                                        <small class="form-text text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <!-- /.form group -->
                        
                                <!-- /.form group -->
                                <div class="form-group">

                                    <input type="submit" value="Update Form Info"
                                        class="form-control btn btn-success ">
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
