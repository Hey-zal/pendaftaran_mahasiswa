<?php

namespace App\Http\Controllers;

use App\Models\Kampus;
use App\Models\ProgramStudi;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;

class DashboardController extends Controller
{
    public function index()
    {
  if (Auth::user()->roles == "admin") {
    $data= User::get()->count();
        $data_kampus= Kampus::get()->count();
        $data_program_studi= ProgramStudi::get()->count();

        return view('dashboard')
        ->with([
            'data'=>$data,
            'data_kampus'=>$data_kampus,
            'data_program_studi'=>$data_program_studi,

        ]);
  }else {
            return view('dashboard_mahasiswa');
  }
      
    }
}
