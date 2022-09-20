<?php

namespace App\Http\Controllers;

use App\Models\Donor;
use App\Models\User;
use App\Models\Program;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function reception()
    {
        return view('reception');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function adminHome()
    {
        $usersnormal=User::where('role_id','<>','0')->count();
        $usersadmin=User::where('role_id','0')->count();
        $donors=Donor::count();
        $programs=Program::count();

        return view('admin.dashboard',compact('usersnormal','usersadmin','donors','programs'));
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function his()
    {
        return view('Health_system.dashboard');
    }

    public function phis()
    {
        return view('phis');
    }

    public function psis()
    {
        return view('psis');
    }


}
