<?php

namespace App\Http\Controllers;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\DataTables;

class UserController extends Controller

{
  
   public function index(Request $request)
   {


    if (Auth::user()->roles == "admin") {
        $data = User::select('users.*')->get();
    if($request->ajax()){
        return DataTables::of($data)
            ->addIndexColumn()
            ->addColumn('action', function($row){
                    $btn = '<button class="btn btn-sm btn-icon btn-dark mr-1 edit-data" data-toggle="tooltip" title="Edit"  data-id="'.$row->id.'" data-original-title="Edit">Edit</button>
                    <button class="btn btn-sm btn-icon btn-danger mr-1 delete-data" data-toggle="tooltip" title="delete"  data-id="'.$row->id.'" data-name="'.$row->name.'"" data-original-title="Delete">Delete </button>'; 
                    return $btn; 
            })
            ->rawColumns(['action'])
            ->make(true);
        }
    return view("users");
      }else {
        return view("404");  
      }

   
   }

   public function store(Request $request)
   {
       if ($request->id == null) {
           $rules  = [
               'name'                  => 'required|min:8|max:30',
               'email'                 => 'required|email|unique:users',
               'password'              => 'required|confirmed|min:8|string',
               'password_confirmation' => 'required',
               'roles'                  => 'required',

           ];
           $message = [
               'name.required'                     => 'Nama harus diisi',
               'name.min'                          => 'Nama minimal 8 karekter',
               'name.max'                          => 'Nama maksimal 30 karekater',
               'email.required'                    => 'Email harus diisi',
               'email.email'                       => 'Email tidak valid',
               'email.unique'                      => 'Email sudah terdaftar',
               'password.required'                 => 'Password harus diisi',
               'password_confirmation.required'    => 'Konfirmasi Password harus diisi',
               'password.confirmed'                => 'Password tidak cocok',
               'roles.required'                     => 'Pilih Peran',

           ];
        } else{
               $rules  = [
               'name'            => 'required|min:2|max:30',
               'roles'            => 'required',

           ];
           $message = [
               'name.required'             => 'Nama harus diisi',
               'name.min'                  => 'Nama minimal 3 karekter',
               'name.max'                  => 'Nama maksimal 30 karekater',
               'roles.required'             => 'Peran Harus diisi',
           ];
       }

       $validator = Validator::make($request->all(), $rules,$message);
       if($validator->passes()){
           if ($request->id == null) {
               $user = User::create(
                   [
                   'name' => $request->name,
                   'email' => $request->email,
                   'roles' => $request->roles,
                   'password' => Hash::make($request->password),
                   ]);
           } else {
               $user = User::find($request->id);
               $user->update(
                   [
                       'name' => $request->name,
                       'email' => $request->email,
                       'roles' => $request->roles,
                       'password' => Hash::make($request->password),
                   ]);
           }
           return response()->json(['status'=>true,'message'=>' Data Berhasil Disimpan.']);
       }else{
           return response()->json(['status'=>false,'message'=>$validator->errors()]);
       }
   }
   public function edit($id)
   {
    $data = User::select('users.*')->where('users.id',$id)->first(); 
       return response()->json($data);
   }
   public function destroy($id)
   {
        User::where('id',$id)->delete();
        return response()->json(['success'=>'Data berhasil dihapus']);
      
   }


 

}
