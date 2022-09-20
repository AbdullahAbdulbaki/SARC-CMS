<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SARC CMS | Edit User Info</title>
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
                    @if (Session::has('update_user'))
                        <div class="alert alert-success" role="alert">
                            {{ Session::get('update_user') }}
                        </div>
                    @endif
                    <div class="card card-info">
                        <div class="card-header">
                            <h3 class="card-title">Edit User Information</h3>
                            <a href="{{ url('/users/all') }}" class="btn btn-danger" style="float: right;">back</a>
                        </div>
                        <div class="card-body">
                            <form method="POST" action="{{ route('admin.users.update') }}">
                                @csrf
                                <input type="hidden" name="id" value="{{ $users->id }}" />
                                <!-- Color Picker -->
                                <div class="form-group">
                                    <label> Name</label>
                                    <input type="text" name="name" class="form-control my-colorpicker1"
                                        value="{{ $users->name }}">
                                    @error('name')
                                        <small class="form-text text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <!-- /.form group -->
                                <!-- Color Picker -->
                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="text" name="email" class="form-control my-colorpicker1"
                                        value="{{ $users->email }}">
                                    @error('email')
                                        <small class="form-text text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <!-- /.form group -->
                                <!-- Color Picker -->
                                <div class="form-group">
                                    <label>Password</label>
                                    <input type="text" name="password" class="form-control my-colorpicker1"
                                        value="">
                                    @error('password')
                                        <small class="form-text text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <!-- /.form group -->
                                <div class="form-group">
                                    <label>Role</label>
                                    <select name="role_id" id="role_id"
                                        class="form-control my-colorpicker1 select2-dropdown" required foccus>
                                        <option value="option_select" disabled selected>Roles</option>
                                        @foreach ($roles as $role)
                                            <option value="{{ $role->id }}"
                                                {{ $users->role_id == $role->id ? 'selected' : '' }}>
                                                {{ $role->name }}</option>
                                        @endforeach
                                    </select>

                                    @error('role_id')
                                        <small class="form-text text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <!-- /.form group -->
                                <div class="form-group">
                                    <label>Medical Point</label>
                                    <select name="role_id" id="role_id"
                                        class="form-control my-colorpicker1 select2-dropdown" required foccus>
                                        <option value="option_select" disabled selected>Roles</option>
                                        @foreach ($roles as $role)
                                            <option value="{{ $role->id }}"
                                                {{ $users->role_id == $role->id ? 'selected' : '' }}>
                                                {{ $role->name }}</option>
                                        @endforeach
                                    </select>

                                    @error('role_id')
                                        <small class="form-text text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="form-group">

                                    <input type="submit" value="Update User Info"
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
