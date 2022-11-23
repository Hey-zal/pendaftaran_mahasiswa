<?php

namespace App\Http\Controllers;

use App\Models\Kampus;
use App\Models\Mahasiswa;
use App\Models\ProgramStudi;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class MahasiswaController extends Controller
{
    public function index()
    {
        $auth=Auth::user()->email;

        $data_mahasiswa = Mahasiswa::select('email')->get();
        return view('dashboard_mahasiswa')->with([
            'data'=>$data_mahasiswa,
            'auth'=>$auth
        ]);
    }
    public function create()
    {      
        if (Auth::user()->status_konfirmasi != null) {
            return view("404");  

          }else {
            $auth=Auth::user()->email;
            $data_kampus = Kampus::select('code_kampus','nama_kampus')->get();
            $data_programstudi =ProgramStudi::select('code_program_studi','nama_program_studi')->get();
            return view('mahasiswa_create')->with([
                'data_kampus'=>$data_kampus,
                'data_programstudi'=>$data_programstudi
            ]);
          }
           
        
    }
    public function store(Request $request)
    {
        $rules = [
            'nama_lengkap'             =>'required',
            'jenis_kelamin'            =>'required',
            'tanggal_lahir'            =>'required',
            'agama'                    =>'required',
            'alamat'                   =>'required',
            'code_kampus'              =>'required',
            'code_programstudi'       =>'required',
            'upload_ktp'               =>'required|image|mimes:png,jpg,jpeg|max:2048',
            'upload_ijazah'            =>'required|image|mimes:png,jpg,jpeg|max:2048',


        ];
        $message =[
            'nama_lengkap.required'           =>'Nama Harus Diisi',
            'jenis_kelamin.required'          =>'Jenis Kelamin Harus Diisi',
            'tanggal_lahir.required'          =>'Tanggal Lahir Harus Diisi',
            'agama.required'                  =>'Agama Harus Diisi',
            'alamat.required'                 =>'Alamat Harus Diisi',
            'code_kampus.required'           =>'Kampus Harus Dipilih',
            'code_programstudi.required'    =>'Program Studi Harus Dipilih',


            'upload_ktp.required'   =>'File harus diisi',
            'upload_ktp.image'      =>'File Harus Berbentuk Gambar',
            'upload_ktp.mimes'      =>'File harus Jpg,Jpeg atau Png',
            'upload_ktp.max'        =>'File Max 2MB',

            'upload_ijazah.required'   =>'File harus diisi',
            'upload_ijazah.image'      =>'File Harus Berbentuk Gambar',
            'upload_ijazah.mimes'      =>'File harus Jpg,Jpeg atau Png',
            'upload_ijazah.max'        =>'File Max 2MB'
        ];

        $validator=Validator::make($request->all(), $rules,$message);
        if($validator->passes())
        {
            $upload_ktp       = $request->file('upload_ktp');
            $upload_ktp_doc  = date('YmdHis').'KTP'.'.'.$upload_ktp->getClientOriginalExtension();
            $upload_ktp->move('public/file/file_ktp'.'/', $upload_ktp_doc);

            $upload_ijazah       = $request->file('upload_ijazah');
            $upload_ijazah_doc  = date('YmdHis').'ijazah'.'.'.$upload_ijazah->getClientOriginalExtension();
            $upload_ijazah->move('public/file/file_ijazah'.'/', $upload_ijazah_doc);
            Mahasiswa::create([
                'nama_lengkap'             => $request->nama_lengkap,
                'jenis_kelamin'            =>$request->jenis_kelamin,
                'tanggal_lahir'            =>$request->tanggal_lahir,
                'agama'                    =>$request->agama,
                'alamat'                    =>$request->alamat,
                'pendidikan_terakhir'      =>$request->pendidikan_terakhir,
                'tanggal_lahir'             =>$request->tanggal_lahir,
                'email'                     =>Auth::user()->email,
                'code_programstudi'         =>$request->code_programstudi,
                'code_kampus'                =>$request->code_kampus,
                'upload_ktp'                =>$upload_ktp_doc,
                'upload_ijazah'             =>$upload_ijazah_doc

            ]);
            User::where('email',$request->email)->update([
                'status_konfirmasi'=>'SUDAH KONFIRMASI',
            ]);
            return response()->json(['status'=>true,'message'=>'Data Berhasil Disimpan.']);
        }
        else
        {
            return response()->json(['status'=>false,'message'=>$validator->errors()]);
        }

    }

  
}
