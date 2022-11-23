<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function index()
    {
     
    }
    public function lihat(){
        $data_mahasiswa = Mahasiswa::select('email')->where('email',Auth::user()->email)->pluck('email')->first();
        return view('profile')->with(['data_mahasiswa'=>$data_mahasiswa]);
    }
    public function show($id)
    {
    
        if (Auth::user()->email != $id) {
           return view('404');
        }else
        {
            $data_mahasiswa_all = Mahasiswa::select('mahasiswa.*','kampus.nama_kampus','program_studi.nama_program_studi')
            ->leftjoin('kampus','mahasiswa.code_kampus','=','kampus.code_kampus')
            ->leftjoin('program_studi','mahasiswa.code_programstudi','=','program_studi.code_program_studi')
            ->where('email',$id)->first();
            return view('show_profile_mahasiswa')->with(['data_mahasiswa_all'=>$data_mahasiswa_all]);
        }
    
    }
}
