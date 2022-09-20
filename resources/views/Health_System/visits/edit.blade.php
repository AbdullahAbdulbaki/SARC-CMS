<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SARC CMS | Edit Visits</title>
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
                            <h3 class="card-title">Edit Visit Information</h3>
                            <a href="{{ url('/visits/all') }}" class="btn btn-danger" style="float: right;">back</a>
                        </div>
                        <div class="card-body">
                            <form method="POST" action="{{ route('Health_system.visits.update') }}">
                                @csrf
                                <input type="hidden" name="id" value="{{ $visits->id }}" />
                                <!-- Color Picker -->
                                <div class="row">
                                    <div class="form-group col-12">
                                        <label>Patient</label>
                                        <select name="patient_id" id="select_patient"
                                            class="form-control my-colorpicker1 select2" required foccus>
                                            <option value="option_select" disabled selected>Please Select Patient
                                            </option>
                                            @foreach ($patients as $patient)
                                                <option value="{{ $patient->id }}"
                                                    {{ $visits->patient_id == $patient->id ? 'selected' : '' }}>
                                                    {{ $patient->first_name}} &nbsp; {{ $patient->last_name}}</option>
                                            @endforeach
                                        </select>
                                        @error('patient_id')
                                            <small class="form-text text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>

                                </div>
                                <div class="row">
                                    <!-- Birth Date -->
                                    <div class="form-group col-12">
                                        <label>Visit Date</label>
                                        <input type="datetime-local" class="form-control my-colorpicker1"
                                            name="visit_date" value="{{ $visits->visit_date }}">
                                        @error('visit_date')
                                            <small class="form-text text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row">
                                    <!-- /.form group -->
                                    <div class="form-group col-4">
                                        <label>Clinic</label>
                                        <select name="clinic_id" id="select_clinic"
                                            class="form-control my-colorpicker1 select2" required foccus>
                                            <option value="option_select" disabled selected>Please Select Clinic
                                            </option>
                                            @foreach ($clinics as $clinic)
                                                <option value="{{ $clinic->id }}"
                                                    {{ $visits->clinic_id == $clinic->id ? 'selected' : '' }}>
                                                    {{ $clinic->ar_name }}</option>
                                            @endforeach
                                        </select>
                                        @error('clinic_id')
                                            <small class="form-text text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="form-group col-4">
                                        <label>Doctor</label>
                                        <select name="doctor_id" id="select_doctor"
                                            class="form-control my-colorpicker1 select2" required foccus>
                                            <option value="option_select" disabled selected>Please Select Doctor
                                            </option>
                                            @foreach ($doctors as $doctor)
                                                <option value="{{ $doctor->id }}"
                                                    {{ $visits->doctor_id == $clinic->id ? 'selected' : '' }}>
                                                    {{ $doctor->ar_name }}</option>
                                            @endforeach
                                        </select>
                                        @error('doctor_id')
                                            <small class="form-text text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="form-group col-4">
                                        <label>Assistant</label>
                                        <select name="assistant_id" id="select_Assistant"
                                            class="form-control my-colorpicker1 select2" required foccus>
                                            <option value="option_select" disabled selected>Please Select Assistant
                                            </option>
                                            @foreach ($assistants as $assistant)
                                                <option value="{{ $assistant->id }}"
                                                    {{ $visits->assistant_id == $assistant->id ? 'selected' : '' }}>
                                                    {{ $assistant->ar_name }}</option>
                                            @endforeach
                                        </select>
                                        @error('assistant_id')
                                            <small class="form-text text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>


                                <div class="row">
                                    <div class="form-group col-12">
                                        <label>Diagnosis</label>
                                        <select name="diagnosis_id" id="select_diagnosis"
                                            class="form-control my-colorpicker1 select2" required foccus>
                                            <option value="option_select" disabled selected>Please Select Diagnosis
                                            </option>
                                            @foreach ($diagnosiss as $diagnosis)
                                                <option value="{{ $assistant->id }}"
                                                    {{ $visits->diagnosis_id == $diagnosis->id ? 'selected' : '' }}>
                                                    {{ $diagnosis->ar_name }}</option>
                                            @endforeach
                                        </select>
                                        @error('diagnosis_id')
                                            <small class="form-text text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <!-- /.form group -->
                                <div class="row">
                                    <div class="form-group col-12">
                                        <label>Medical Services</label>
                                        <select name="ms_id" id="select_ms"
                                            class="form-control my-colorpicker1 select2" required foccus>
                                            <option value="option_select" disabled selected>Please Select Medical
                                                Services</option>
                                            @foreach ($Mss as $Ms)
                                                <option value="{{ $assistant->id }}"
                                                    {{ $visits->ms_id == $Ms->id ? 'selected' : '' }}>
                                                    {{ $Ms->ar_name }}</option>
                                            @endforeach
                                        </select>
                                        @error('ms_id')
                                            <small class="form-text text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>

                                <!-- Color Picker -->
                                <div class="row">
                                    <div class="form-group col-12">
                                        <label>Labtest</label>
                                        <select name="labtest_id" id="select_lt"
                                            class="form-control my-colorpicker1 select2" required foccus>
                                            <option value="option_select" disabled selected>Please Select Lab Test
                                            </option>
                                            @foreach ($labtests as $labtest)
                                                <option value="{{ $labtest->id }}"
                                                    {{ $visits->labtest_id == $labtest->id ? 'selected' : '' }}>
                                                    {{ $labtest->ar_name }}</option>
                                            @endforeach
                                        </select>
                                        @error('labtest_id')
                                            <small class="form-text text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <!-- /.form group -->
                                <div class="row">
                                    <div class="form-group col-12">
                                        <label>Xray</label>
                                        <select name="xray_id" id="select_xray"
                                            class="form-control my-colorpicker1 select2" required foccus>
                                            <option value="option_select" disabled selected>Please Select X-Ray</option>
                                            @foreach ($xrays as $xray)
                                                <option value="{{ $xray->id }}"
                                                    {{ $visits->xray_id == $xray->id ? 'selected' : '' }}>
                                                    {{ $xray->ar_name }}</option>
                                            @endforeach
                                        </select>
                                        @error('xray_id')
                                            <small class="form-text text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>

                                </div>
                                <!-- /.form group -->

                                    <div class="form-group col-12 ">
                                        <button type="submit" value="save" class="btn btn-success">Update Visit
                                            Info</button>
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
