<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SARC CMS | Add Patients</title>
    @include('Health_system.layouts.css')
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">

        <!-- Preloader -->
        <div class="preloader flex-column justify-content-center align-items-center">
            <img class="animation__shake" src="{{ asset('/img/sarc.png') }}" alt="AdminLTELogo" height="60"
                width="60">
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
                    @if (Session::has('success'))
                        <div class="alert alert-success" role="alert">
                            {{ Session::get('success') }}
                        </div>
                    @endif
                    <div class="card card-info">
                        <div class="card-header">
                            <h3 class="card-title">Add Patient Information</h3>
                            <a href="{{ url('/patients/all') }}" class="btn btn-danger" style="float: right;">back</a>
                        </div>
                        <div class="card-body">
                            <form method="POST" action="{{ route('Health_system.patients.store') }}">
                                @csrf
                                <!-- Color Picker -->
                                <div class="row">
                                    <div class="form-group col-4">
                                        <label>First Name</label>
                                        <input type="text" name="first_name" class="form-control my-colorpicker1">
                                        @error('first_name')
                                            <small class="form-text text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <!-- /.form group -->
                                    <!-- Color Picker -->
                                    <div class="form-group col-4">
                                        <label>Last Name</label>
                                        <input type="text" name="last_name" class="form-control my-colorpicker1">
                                        @error('last_name')
                                            <small class="form-text text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <!-- /.form group -->
                                    <!-- Color Picker -->
                                    <div class="form-group col-4">
                                        <label>Father Name</label>
                                        <input type="text" name="father_name" class="form-control my-colorpicker1">
                                        @error('father_name')
                                            <small class="form-text text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <!-- /.form group -->

                                <!-- Color Picker -->
                                <div class="row">
                                    <div class="form-group col-4">
                                        <label>Mother Name</label>
                                        <input type="text" name="mother_name" class="form-control my-colorpicker1">
                                        @error('mother_name')
                                            <small class="form-text text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <!-- /.form group -->
                                    <!-- Birth Date -->
                                    <div class="form-group col-4">
                                        <label>Registeration Date</label>
                                        <input type="datetime-local" class="form-control my-colorpicker1"
                                            name="registration_date">
                                        @error('registration_date')
                                            <small class="form-text text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <!--  Registeration Date -->
                                    <div class="form-group col-4">
                                        <label> Birthdate</label>
                                        <input type="datetime-local" class="form-control my-colorpicker1"
                                            name="birth_date">
                                        @error('registration_date')
                                            <small class="form-text text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>

                                </div>

                                <div class="row">
                                    <!-- /.form group -->
                                    <div class="form-group col-4">
                                        <label>Document</label>
                                        <select name="document_type" id="select_document"
                                            class="form-control my-colorpicker1 select2" required foccus>
                                            <option value="" disabled selected>Please Select Type</option>
                                            @foreach ($documents as $document)
                                                <option value="{{ $document->id }}">{{ $document->en_name }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('document_type')
                                            <small class="form-text text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>

                                    <!-- Color Picker -->
                                    <div class="form-group col-4">
                                        <label>Document ID</label>
                                        <input type="text" name="document_id" class="form-control my-colorpicker1">
                                        @error('document_id')
                                            <small class="form-text text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <!-- /.form group -->

                                    <!-- Color Picker -->
                                    <div class="form-group col-4">
                                        <label>UNHCR Number</label>
                                        <input type="text" name="unhcr_number" class="form-control my-colorpicker1">
                                        @error('unhcr_number')
                                            <small class="form-text text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <!-- /.form group -->

                                <div class="row">
                                    <!-- /.form group -->
                                    <div class="form-group col-4">
                                        <label>Nationality</label>
                                        <select name="nationality_id" id="select_nationality"
                                            class="form-control my-colorpicker1 select2" required foccus>
                                            <option value="" disabled selected>Please Select nationality</option>
                                            @foreach ($nationalities as $nationality)
                                                <option value="{{ $nationality->id }}">{{ $nationality->en_name }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('nationality_id')
                                            <small class="form-text text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>

                                    <!-- Color Picker -->
                                    <div class="form-group col-4">
                                        <label>Phone</label>
                                        <input type="text" name="phone" class="form-control my-colorpicker1">
                                        @error('phone')
                                            <small class="form-text text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <!-- /.form group -->

                                    <!-- Color Picker -->
                                    <div class="form-group col-4">
                                        <label>Mobile</label>
                                        <input type="text" name="mobile" class="form-control my-colorpicker1">
                                        @error('mobile')
                                            <small class="form-text text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <!-- /.form group -->
                                <!-- /.form group -->
                                <div class="row">
                                    <div class="col-4">
                                        <label>Gender</label>
                                        <div class="form-group clearfix">
                                            <div class="icheck-primary d-inline ">
                                                <input type="radio" id="male" name="Gender" value="1" checked="true">
                                                <label for="male"> MALE
                                                </label>
                                            </div> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                            <div class="icheck-primary d-inline">
                                                <input type="radio" id="female" name="Gender" value="0">
                                                <label for="female">FEMALE </label>
                                            </div>
                                            @error('Gender')
                                                <small class="form-text text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>

                                    <!-- Color Picker -->
                                    <div class="col-4">
                                        <label>Is Disability</label>
                                        <div class="form-group clearfix">
                                            <div class="icheck-primary d-inline ">
                                                <input type="radio" id="yes" name="is_disablity" value="1" onclick="disability(0)">
                                                <label for="yes"> Yes
                                                </label>
                                            </div> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                            <div class="icheck-primary d-inline">
                                                <input type="radio" id="no" name="is_disablity"
                                                    value="0" checked="true" onclick="disability(1)">
                                                <label for="no">No </label>
                                            </div>
                                            @error('is_disablity')
                                                <small class="form-text text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>

                                    <!-- Color Picker -->
                                    <div class="col-4">
                                        <label>IS Displaced</label>
                                        <div class="form-group clearfix">
                                            <div class="icheck-primary d-inline ">
                                                <input type="radio" id="true"  name="is_displaced"
                                                    value="1" onclick="display_city(0)">
                                                <label for="true"> Yes
                                                </label>
                                            </div> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                            <div class="icheck-primary d-inline">
                                                <input type="radio" id="false" name="is_displaced"
                                                    value="0" checked="true" onclick="display_city(1)">
                                                <label for="false">No </label>
                                            </div>
                                            @error('is_displaced')
                                                <small class="form-text text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <!-- Color Picker -->
                                <div class="row">
                                    <div class="form-group col-4">
                                        <label>File No</label>
                                        <input type="text" name="file_id" class="form-control my-colorpicker1">
                                        @error('file_id')
                                            <small class="form-text text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <!-- /.form group -->
                                    <!-- /.form group -->
                                    <div class="form-group col-4" id="disabletype">
                                        <label>Disability Type</label>
                                        <select name="disablity_id" id="select_disablity"
                                            class="select2 form-control my-colorpicker1"  >
                                            <option value="" disabled selected>Please Select Type</option>
                                            @foreach ($disablities as $disablity)
                                                <option value="{{ $disablity->id }}">{{ $disablity->ar_name }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('disablity_id')
                                            <small class="form-text text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <!-- /.form group -->
                                    <div class="form-group col-2" id='oldcity'>
                                        <label>Old City</label>
                                        <select name="old_city_id" id="select_ocity"
                                            class="select2 form-control my-colorpicker1  "  >
                                            <option value="" disabled selected>Please Select City</option>
                                            @foreach ($cities as $city)
                                                <option value="{{ $city->id }}">{{ $city->en_name }}</option>
                                            @endforeach
                                        </select>
                                        @error('old_city_id')
                                            <small class="form-text text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <!-- /.form group -->
                                    <div class="form-group col-2" id="oldarea">
                                        <label>Old Area</label>
                                        <select name="old_area_id" id="select_oarea"
                                            class="select2 form-control my-colorpicker1  "  >
                                            <option value="" disabled selected>Please Select Area</option>
                                            @foreach ($areas as $area)
                                                <option value="{{ $area->id }}">{{ $area->en_name }}</option>
                                            @endforeach
                                        </select>
                                        @error('old_area_id')
                                            <small class="form-text text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <!-- /.form group -->
                                <div class="row">
                                                                    <!-- /.form group -->
                                    <div class="form-group col-6">
                                        <label>New City</label>
                                        <select name="new_city_id" id="select_ncity"
                                            class="select2 form-control my-colorpicker1  " required foccus>
                                            <option value="" disabled selected>Please Select City</option>
                                            @foreach ($cities as $city)
                                                <option value="{{ $city->id }}">{{ $city->en_name }}</option>
                                            @endforeach
                                        </select>
                                        @error('new_city_id')
                                            <small class="form-text text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <!-- /.form group -->
                                    <div class="form-group col-6">
                                        <label>New Area</label>
                                        <select name="new_area_id" id="select_narea"
                                            class="select2 form-control my-colorpicker1  " required foccus>
                                            <option value="" disabled selected>Please Select Area</option>
                                            @foreach ($areas as $area)
                                                <option value="{{ $area->id }}">{{ $area->en_name }}</option>
                                            @endforeach
                                        </select>
                                        @error('new_area_id')
                                            <small class="form-text text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                                <!-- /.form group -->
                                <div class="row  justify-content-center">

                                <div class="form-group col-1 ">
                                    <button type="submit" value="save" name="action" class="btn btn-success">Save</button>
                                </div>

                                <div class="form-group col-1">
                                      <button type="submit" value="add_visit" name="action" class="btn btn-primary">add visit</button>
                                </div>
                            </div>
                                <!-- /.form group -->
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
    @include('Health_system.layouts.script')

</body>

</html>
