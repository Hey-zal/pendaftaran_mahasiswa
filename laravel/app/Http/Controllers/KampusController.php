<?php

namespace App\Http\Controllers;

use App\Models\Kampus;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Validator;

class KampusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if (Auth::user()->roles == "admin") {
            $data = Kampus::select('kampus.*')->get();
            if($request->ajax()){
                return DataTables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){
                            $btn = '<button class="btn btn-sm btn-icon btn-dark mr-1 edit-data" data-toggle="tooltip" title="Edit"  data-id="'.$row->id.'" data-original-title="Edit">Edit</button>
                            <button class="btn btn-sm btn-icon btn-danger mr-1 delete-data" data-toggle="tooltip" title="delete"  data-id="'.$row->id.'" data-name="'.$row->nama_kampus.'"" data-original-title="Delete">Delete </button>'; 
                            return $btn; 
                    })
                    ->rawColumns(['action'])
                    ->make(true);
                }
            return view("kampus");
          }else {
            return view("404");  
          }
   
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
   {
       if ($request->id == null) {
           $rules  = [
               'code_kampus'                    => 'required|max:5',
               'nama_kampus'                    => 'required',
               'alamat_kampus'                  => 'required',
           ];
           $message = [
               'code_kampus.required'                     =>  'code harus diisi',
               'code_kampus.max'                          =>  'code max 5',

               'nama_kampus.required'                     => 'Nama harus diisi',
               'alamat_kampus.required'                   => 'Nama harus diisi',

           ];
        } else{
               $rules  = [
                'nama_kampus'                    => 'required',
                'alamat_kampus'                  => 'required',

           ];
           $message = [
            'nama_kampus.required'                     => 'Nama harus diisi',
            'alamat_kampus.required'                   => 'Nama harus diisi',
           ];
       }

       $validator = Validator::make($request->all(), $rules,$message);
       if($validator->passes()){
           if ($request->id == null) {
               $kampus = Kampus::create(
                   [
                    
                   'code_kampus' => $request->code_kampus,
                   'nama_kampus' => $request->nama_kampus,
                   'alamat_kampus' => $request->alamat_kampus,

                   ]);
           } else {
               $kampus = Kampus::find($request->id);
               $kampus->update(
                   [
                    'code_kampus' => $request->code_kampus,
                    'nama_kampus' => $request->nama_kampus,
                    'alamat_kampus' => $request->alamat_kampus, 
                   ]);
           }
           return response()->json(['status'=>true,'message'=>' Data Berhasil Disimpan.']);
       }else{
           return response()->json(['status'=>false,'message'=>$validator->errors()]);
       }
   }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
     $data = Kampus::select('kampus.*')->where('kampus.id',$id)->first(); 
        return response()->json($data);
    }
    public function destroy($id)
    {
         Kampus::where('id',$id)->delete();
         return response()->json(['success'=>'Data berhasil dihapus']);
       
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
   
}
