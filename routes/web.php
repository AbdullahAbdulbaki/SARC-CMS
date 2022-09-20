<?php


use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\Diseases\DiseasesController;
use App\Http\Controllers\Diseases\DiseasesCategoryController;
use App\Http\Controllers\Programs\ProgramController;
use App\Http\Controllers\Nationality\NationalityController;
use App\Http\Controllers\UserManagement\Roles\RolesController;
use App\Http\Controllers\UserManagement\Users\UsersController;
use App\Http\Controllers\Locations\Cities\CityController;
use App\Http\Controllers\Locations\Regions\RegionController;
use App\Http\Controllers\Locations\Districts\DistrictController;
use App\Http\Controllers\Locations\Areas\AreaController;
use App\Http\Controllers\Locations\Types\LocationTypesController;
use App\Http\Controllers\Donors\DonorController;
use App\Http\Controllers\Labtest\LabtestController;
use App\Http\Controllers\Xray\XrayController;
use App\Http\Controllers\Medicines\Forms\FormController;
use App\Http\Controllers\Medicines\categories\CategoryController;
use App\Http\Controllers\Age\AgeCategoryGroupController;
use App\Http\Controllers\Age\AgeGroupElementController;
use App\http\Controllers\Health_system\patients\PatientsController;
use App\http\Controllers\Health_system\visits\VisitsController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/*--------Welcome Login Route Begin-------*/

Route::get('/', function () {
    return view('auth.login');
});
/*--------Welcome Login Route End-------*/

Auth::routes(['register' => false]);

/*-------------admin User Routes List Begin-----------------*/
Route::middleware(['auth', 'user-access:0'])->group(function () {

    Route::get('/dashboard', [HomeController::class, 'adminHome'])->name('admin.home');
    //programs Route
    Route::group(['prefix' => 'programs'], function () {
        Route::get('all', [ProgramController::class, 'programs_read'])->name('admin.programs.all');
        Route::get('create', [ProgramController::class, 'programs_index'])->name('admin.programs.add');
        Route::post('store', [ProgramController::class, 'programs_store'])->name('admin.programs.store');
        Route::get('/show/{id}', [ProgramController::class, 'program_show'])->name('admin.programs.showbyid');
        Route::get('/delete/{id}', [ProgramController::class, 'delete_program'])->name('admin.programs.deletebyid');
        Route::get('/edit/{id}', [ProgramController::class, 'edit_program'])->name('admin.programs.updatebyid');
        Route::post('update', [ProgramController::class, 'update_program'])->name('admin.programs.update');
    });
    //donors Route
    Route::group(['prefix' => 'donors'], function () {
        Route::get('all', [DonorController::class, 'donors_read'])->name('admin.donors.all');
        Route::get('create', [DonorController::class, 'donors_index'])->name('admin.donors.add');
        Route::post('store', [DonorController::class, 'donors_store'])->name('admin.donors.store');
        Route::get('/show/{id}', [DonorController::class, 'donor_show'])->name('admin.donors.showbyid');
        Route::get('/delete/{id}', [DonorController::class, 'delete_donor'])->name('admin.donors.deletebyid');
        Route::get('/edit/{id}', [DonorController::class, 'edit_donor'])->name('admin.donors.updatebyid');
        Route::post('update', [DonorController::class, 'update_donor'])->name('admin.donors.update');
    });
    //User MAnagement ---Roles--- Route
    Route::group(['prefix' => 'roles'], function () {
        Route::get('all', [RolesController::class, 'roles_read'])->name('admin.roles.all');
        Route::get('create', [RolesController::class, 'roles_index'])->name('admin.roles.add');
        Route::post('store', [RolesController::class, 'roles_store'])->name('admin.roles.store');
        Route::get('/show/{id}', [RolesController::class, 'role_show'])->name('admin.roles.showbyid');
        Route::get('/delete/{id}', [RolesController::class, 'delete_role'])->name('admin.roles.deletebyid');
        Route::get('/edit/{id}', [RolesController::class, 'edit_role'])->name('admin.roles.updatebyid');
        Route::post('update', [RolesController::class, 'update_role'])->name('admin.roles.update');
    });
    //User MAnagement ---users--- Route
    Route::group(['prefix' => 'users'], function () {
        Route::get('all', [UsersController::class, 'users_read'])->name('admin.users.all');
        Route::get('create', [UsersController::class, 'users_index'])->name('admin.users.add');
        Route::post('store', [UsersController::class, 'users_store'])->name('admin.users.store');
        Route::get('/show/{id}', [UsersController::class, 'user_show'])->name('admin.users.showbyid');
        Route::get('/delete/{id}', [UsersController::class, 'delete_user'])->name('admin.users.deletebyid');
        Route::get('/edit/{id}', [UsersController::class, 'edit_user'])->name('admin.users.updatebyid');
        Route::post('update', [UsersController::class, 'update_user'])->name('admin.users.update');
    });
    //Location cities Route
    Route::group(['prefix' => 'locations/cities'], function () {
        Route::get('all', [CityController::class, 'cities_read'])->name('admin.lcations.cities.all');
        Route::get('create', [CityController::class, 'cities_index'])->name('admin.lcations.cities.add');
        Route::post('store', [CityController::class, 'cities_store'])->name('admin.lcations.cities.store');
        Route::get('/show/{id}', [CityController::class, 'city_show'])->name('admin.lcations.cities.showbyid');
        Route::get('/delete/{id}', [CityController::class, 'delete_city'])->name('admin.lcations.cities.deletebyid');
        Route::get('/edit/{id}', [CityController::class, 'edit_city'])->name('admin.lcations.cities.updatebyid');
        Route::post('update', [CityController::class, 'update_city'])->name('admin.lcations.cities.update');
    });
    //Location regions  Route
    Route::group(['prefix' => 'locations/regions'], function () {
        Route::get('all', [RegionController::class, 'regions_read'])->name('admin.lcations.regions.all');
        Route::get('create', [RegionController::class, 'regions_index'])->name('admin.lcations.regions.add');
        Route::post('store', [RegionController::class, 'regions_store'])->name('admin.lcations.regions.store');
        Route::get('/show/{id}', [RegionController::class, 'region_show'])->name('admin.lcations.regions.showbyid');
        Route::get('/delete/{id}', [RegionController::class, 'delete_region'])->name('admin.lcations.regions.deletebyid');
        Route::get('/edit/{id}', [RegionController::class, 'edit_region'])->name('admin.lcations.regions.updatebyid');
        Route::post('update', [RegionController::class, 'update_region'])->name('admin.lcations.regions.update');
    });
    //Location Districts  Route
    Route::group(['prefix' => 'locations/districts'], function () {
        Route::get('all', [DistrictController::class, 'districts_read'])->name('admin.lcations.districts.all');
        Route::get('create', [DistrictController::class, 'districts_index'])->name('admin.lcations.districts.add');
        Route::post('store', [DistrictController::class, 'districts_store'])->name('admin.lcations.districts.store');
        Route::get('/show/{id}', [DistrictController::class, 'district_show'])->name('admin.lcations.districts.showbyid');
        Route::get('/delete/{id}', [DistrictController::class, 'delete_district'])->name('admin.lcations.districts.deletebyid');
        Route::get('/edit/{id}', [DistrictController::class, 'edit_district'])->name('admin.lcations.districts.updatebyid');
        Route::post('update', [DistrictController::class, 'update_district'])->name('admin.lcations.districts.update');
    });
    //Location Areas  Route
    Route::group(['prefix' => 'locations/areas'], function () {
        Route::get('all', [AreaController::class, 'areas_read'])->name('admin.lcations.areas.all');
        Route::get('create', [AreaController::class, 'areas_index'])->name('admin.lcations.areas.add');
        Route::post('store', [AreaController::class, 'areas_store'])->name('admin.lcations.areas.store');
        Route::get('/show/{id}', [AreaController::class, 'area_show'])->name('admin.lcations.areas.showbyid');
        Route::get('/delete/{id}', [AreaController::class, 'delete_area'])->name('admin.lcations.areas.deletebyid');
        Route::get('/edit/{id}', [AreaController::class, 'edit_area'])->name('admin.lcations.areas.updatebyid');
        Route::post('update', [AreaController::class, 'update_area'])->name('admin.lcations.areas.update');
    });
    //Location Location Type  Route
    Route::group(['prefix' => 'locations/types'], function () {
        Route::get('all', [LocationTypesController::class, 'read'])->name('admin.lcations.types.all');
        Route::get('create', [LocationTypesController::class, 'index'])->name('admin.lcations.types.add');
        Route::post('store', [LocationTypesController::class, 'store'])->name('admin.lcations.types.store');
        Route::get('/show/{id}', [LocationTypesController::class, 'show'])->name('admin.lcations.types.showbyid');
        Route::get('/delete/{id}', [LocationTypesController::class, 'delete'])->name('admin.lcations.types.deletebyid');
        Route::get('/edit/{id}', [LocationTypesController::class, 'edit'])->name('admin.lcations.types.updatebyid');
        Route::post('update', [LocationTypesController::class, 'update'])->name('admin.lcations.types.update');
    });

    //Nationality Route
    Route::group(['prefix' => 'nationalities'], function () {
        Route::get('all', [NationalityController::class, 'nationality_read'])->name('admin.nationalities.all');
        Route::get('create', [NationalityController::class, 'nationality_index'])->name('admin.nationalities.add');
        Route::post('store', [NationalityController::class, 'nationality_store'])->name('admin.nationalities.store');
        Route::get('/show/{id}', [NationalityController::class, 'nationality_show'])->name('admin.nationalities.showbyid');
        Route::get('/delete/{id}', [NationalityController::class, 'delete_nationality'])->name('admin.nationalities.deletebyid');
        Route::get('/edit/{id}', [NationalityController::class, 'edit_nationality'])->name('admin.nationalities.updatebyid');
        Route::post('update', [NationalityController::class, 'update_nationality'])->name('admin.nationalities.update');
    });

    //Diseases Category Route
    Route::group(['prefix' => 'diseasescat'], function () {
        Route::get('all', [DiseasesCategoryController::class, 'diseasescat_read'])->name('admin.diseasescat.all');
        Route::get('create', [DiseasesCategoryController::class, 'diseasescat_index'])->name('admin.diseasescat.add');
        Route::post('store', [DiseasesCategoryController::class, 'diseasescat_store'])->name('admin.diseasescat.store');
        Route::get('/show/{id}', [DiseasesCategoryController::class, 'diseasescat_show'])->name('admin.diseasescat.showbyid');
        Route::get('/delete/{id}', [DiseasesCategoryController::class, 'delete_diseasescat'])->name('admin.diseasescat.deletebyid');
        Route::get('/edit/{id}', [DiseasesCategoryController::class, 'edit_diseasescat'])->name('admin.diseasescat.updatebyid');
        Route::post('update', [DiseasesCategoryController::class, 'update_diseasescat'])->name('admin.diseasescat.update');
    });

    //Diseases Route
    Route::group(['prefix' => 'diseases'], function () {
        Route::get('all', [DiseasesController::class, 'diseases_read'])->name('admin.diseases.all');
        Route::get('create', [DiseasesController::class, 'diseases_index'])->name('admin.diseases.add');
        Route::post('store', [DiseasesController::class, 'diseases_store'])->name('admin.diseases.store');
        Route::get('/show/{id}', [DiseasesController::class, 'diseases_show'])->name('admin.diseases.showbyid');
        Route::get('/delete/{id}', [DiseasesController::class, 'delete_diseases'])->name('admin.diseases.deletebyid');
        Route::get('/edit/{id}', [DiseasesController::class, 'edit_diseases'])->name('admin.diseases.updatebyid');
        Route::post('update', [DiseasesController::class, 'update_diseases'])->name('admin.diseases.update');
    });

    //Xray Route
    Route::group(['prefix' => 'xray'], function () {
        Route::get('all', [XrayController::class, 'xray_read'])->name('admin.xray.all');
        Route::get('create', [XrayController::class, 'xray_index'])->name('admin.xray.add');
        Route::post('store', [XrayController::class, 'xray_store'])->name('admin.xray.store');
        Route::get('/show/{id}', [XrayController::class, 'xray_show'])->name('admin.xray.showbyid');
        Route::get('/delete/{id}', [XrayController::class, 'delete_xray'])->name('admin.xray.deletebyid');
        Route::get('/edit/{id}', [XrayController::class, 'edit_xray'])->name('admin.xray.updatebyid');
        Route::post('update', [XrayController::class, 'update_xray'])->name('admin.xray.update');
    });

    //Labtest Route
    Route::group(['prefix' => 'labtest'], function () {
        Route::get('all', [LabtestController::class, 'labtest_read'])->name('admin.labtest.all');
        Route::get('create', [LabtestController::class, 'labtest_index'])->name('admin.labtest.add');
        Route::post('store', [LabtestController::class, 'labtest_store'])->name('admin.labtest.store');
        Route::get('/show/{id}', [LabtestController::class, 'labtest_show'])->name('admin.labtest.showbyid');
        Route::get('/delete/{id}', [LabtestController::class, 'delete_labtest'])->name('admin.labtest.deletebyid');
        Route::get('/edit/{id}', [LabtestController::class, 'edit_labtest'])->name('admin.labtest.updatebyid');
        Route::post('update', [LabtestController::class, 'update_labtest'])->name('admin.labtest.update');
    });

    //Age Category Group Route
    Route::group(['prefix' => 'Agecategorygroup'], function () {
        Route::get('all', [AgeCategoryGroupController::class, 'Agecategorygroup_read'])->name('admin.Agecategorygroup.all');
        Route::get('create', [AgeCategoryGroupController::class, 'Agecategorygroup_index'])->name('admin.Agecategorygroup.add');
        Route::post('store', [AgeCategoryGroupController::class, 'Agecategorygroup_store'])->name('admin.Agecategorygroup.store');
        Route::get('/show/{id}', [AgeCategoryGroupController::class, 'Agecategorygroup_show'])->name('admin.Agecategorygroup.showbyid');
        Route::get('/delete/{id}', [AgeCategoryGroupController::class, 'delete_Agecategorygroup'])->name('admin.Agecategorygroup.deletebyid');
        Route::get('/edit/{id}', [AgeCategoryGroupController::class, 'edit_Agecategorygroup'])->name('admin.Agecategorygroup.updatebyid');
        Route::post('update', [AgeCategoryGroupController::class, 'update_Agecategorygroup'])->name('admin.Agecategorygroup.update');
    });
    //Age Group Elements Route
    Route::group(['prefix' => 'Agegroupelement'], function () {
        Route::get('all', [AgeGroupElementController::class, 'Agegroupelement_read'])->name('admin.Agegroupelement.all');
        Route::get('create', [AgeGroupElementController::class, 'Agegroupelement_index'])->name('admin.Agegroupelement.add');
        Route::post('store', [AgeGroupElementController::class, 'Agegroupelement_store'])->name('admin.Agegroupelement.store');
        Route::get('/show/{id}', [AgeGroupElementController::class, 'Agegroupelement_show'])->name('admin.Agegroupelement.showbyid');
        Route::get('/delete/{id}', [AgeGroupElementController::class, 'delete_Agegroupelement'])->name('admin.Agegroupelement.deletebyid');
        Route::get('/edit/{id}', [AgeGroupElementController::class, 'edit_Agegroupelement'])->name('admin.Agegroupelement.updatebyid');
        Route::post('update', [AgeGroupElementController::class, 'update_Agegroupelement'])->name('admin.Agegroupelement.update');
    });
    // Medicines Form Route
    Route::group(['prefix' => 'Form'], function () {
        Route::get('all', [FormController::class, 'Form_read'])->name('admin.Form.all');
        Route::get('create', [FormController::class, 'Form_index'])->name('admin.Form.add');
        Route::post('store', [FormController::class, 'Form_store'])->name('admin.Form.store');
        Route::get('/show/{id}', [FormController::class, 'Form_show'])->name('admin.Form.showbyid');
        Route::get('/delete/{id}', [FormController::class, 'delete_Form'])->name('admin.Form.deletebyid');
        Route::get('/edit/{id}', [FormController::class, 'edit_Form'])->name('admin.Form.updatebyid');
        Route::post('update', [FormController::class, 'update_Form'])->name('admin.Form.update');
    });

    // Medicines Categories Route
    Route::group(['prefix' => 'Categories'], function () {
        Route::get('all', [CategoryController::class, 'Category_read'])->name('admin.Categories.all');
        Route::get('create', [CategoryController::class, 'Category_index'])->name('admin.Categories.add');
        Route::post('store', [CategoryController::class, 'Category_store'])->name('admin.Categories.store');
        Route::get('/show/{id}', [CategoryController::class, 'Category_show'])->name('admin.Categories.showbyid');
        Route::get('/delete/{id}', [CategoryController::class, 'delete_Category'])->name('admin.Categories.deletebyid');
        Route::get('/edit/{id}', [CategoryController::class, 'edit_Category'])->name('admin.Categories.updatebyid');
        Route::post('update', [CategoryController::class, 'update_Category'])->name('admin.Categories.update');
    });
});

/*-------------Admin User Routes List End-----------------*/

/*-------------HIS User Routes List Begin-----------------*/
Route::middleware(['auth', 'user-access:1'])->group(function () {

    Route::get('/his/home', [HomeController::class, 'his'])->name('his.home');
    //Static Data Route
    Route::get('/his/home/nationality', [NationalityController::class, 'nationality_read'])->name('his.nationality');
    //Route::get('/his/home/clinics', [NationalityController::class, 'nationality_read'])->name('his.nationality');
    Route::get('/his/home/diseases', [DiseasesController::class, 'diseases_read'])->name('his.diseases');
    //Route::get('/his/home/medicalservices', [NationalityController::class, 'nationality_read'])->name('his.nationality');
    Route::get('/his/home/labtest', [LabtestController::class, 'Labtest_read'])->name('his.labtest');
    Route::get('/his/home/xray', [XrayController::class, 'Xray_read'])->name('his.xray');
    Route::get('/his/home/location/City', [CityController::class, 'cities_read'])->name('his.location.city');
    Route::get('/his/home/location/region', [RegionController::class, 'regions_read'])->name('his.location.region');
    Route::get('/his/home/location/district', [DistrictController::class, 'districts_read'])->name('his.location.district');
    Route::get('/his/home/location/area', [AreaController::class, 'areas_read'])->name('his.location.area');
    Route::get('/his/home/location/type', [LocationTypesController::class, 'read'])->name('his.location.type');


    //Patients Route
    Route::group(['prefix' => 'patients'], function () {
        Route::get('all', [PatientsController::class, 'patients_read'])->name('Health_system.patients.patients');
        Route::get('create', [PatientsController::class, 'patients_index'])->name('Health_system.patients.add');
        Route::post('store', [PatientsController::class, 'patients_store'])->name('Health_system.patients.store');
        Route::get('/show/{id}', [PatientsController::class, 'patients_show'])->name('Health_system.patients.showbyid');
        Route::get('/show/{id}', [PatientsController::class, 'patients_show'])->name('Health_system.patients.showbyid');
        Route::get('/file/{id}', [PatientsController::class, 'file_patients'])->name('Health_system.patients.filebyid');
        Route::get('/edit/{id}', [PatientsController::class, 'edit_patients'])->name('Health_system.patients.updatebyid');
        Route::post('update', [PatientsController::class, 'update_patients'])->name('Health_system.patients.update');
    });
    //Visits Route
    Route::group(['prefix' => 'visits'], function () {
        Route::get('all', [VisitsController::class, 'visits_read'])->name('Health_system.visits.visits');
        Route::get('create', [VisitsController::class, 'visits_index'])->name('Health_system.visits.add');
        Route::get('/create/{id}', [VisitsController::class, 'visits_index'])->name('Health_system.visits.add2');
        Route::post('store', [VisitsController::class, 'visits_store'])->name('Health_system.visits.store');
        Route::get('/show/{id}', [VisitsController::class, 'visits_show'])->name('Health_system.visits.showbyid');
        Route::get('/delete/{id}', [VisitsController::class, 'delete_visits'])->name('Health_system.visits.deletebyid');
        Route::get('/edit/{id}', [VisitsController::class, 'edit_visits'])->name('Health_system.visits.updatebyid');
        Route::post('update', [VisitsController::class, 'update_visits'])->name('Health_system.visits.update');
    });
});


/*-------------HIS User Routes List End-----------------*/

/*-------------PHIS User Routes List Begin-----------------*/
Route::middleware(['auth', 'user-access:2'])->group(function () {

    Route::get('/phis/home', [HomeController::class, 'phis'])->name('phis.home');
});

/*-------------PHIS User Routes List End-----------------*/

/*-------------PSIS User Routes List Begin-----------------*/
Route::middleware(['auth', 'user-access:4'])->group(function () {

    Route::get('/psis/home', [HomeController::class, 'psis'])->name('psis.home');
});

/*-------------PSIS User Routes List End-----------------*/

/*-------------Reception User Routes List Begin-----------------*/
Route::middleware(['auth', 'user-access:3'])->group(function () {

    Route::get('/reception/home', [HomeController::class, 'reception'])->name('reception.home');
});
/*-------------Reception User Routes List End-----------------*/
