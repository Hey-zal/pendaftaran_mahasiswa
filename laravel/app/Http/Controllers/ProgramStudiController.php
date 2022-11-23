<?php

namespace App\Http\Controllers;

use App\Models\ProgramStudi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Validator;

class ProgramStudiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        if (Auth::user()->roles == "admin") {
            $data = ProgramStudi::select('program_studi.*')->get();
            if($request->ajax()){
                return DataTables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){
                            $btn = '<button class="btn btn-sm btn-icon btn-dark mr-1 edit-data" data-toggle="tooltip" title="Edit"  data-id="'.$row->id.'" data-original-title="Edit">Edit</button>
                            <button class="btn btn-sm btn-icon btn-danger mr-1 delete-data" data-toggle="tooltip" title="delete"  data-id="'.$row->id.'" data-name="'.$row->nama_program_studi.'"" data-original-title="Delete">Delete </button>'; 
                            return $btn; 
                    })
                   
                
                    ->rawColumns(['action'])
                    ->make(true);
                }
            return view("program_studi");
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
               'code_program_studi'                    => 'required|max:5',
               'nama_program_studi'                    => 'required',
           ];
           $message = [
               'code_program_studi.required'                     =>  'code harus diisi',
               'code_program_studi.max'                          =>  'code max 5',
               'nama_program_studi.required'                     => 'Nama harus diisi',

           ];
        } else{
               $rules  = [
                'nama_program_studi'                    => 'required',

           ];
           $message = [
          
            'nama_program_studi.required'                     => 'Nama harus diisi',
           ];
       }

       $validator = Validator::make($request->all(), $rules,$message);
       if($validator->passes()){
           if ($request->id == null) {
               $program_studi = ProgramStudi::create(
                   [
                    
                   'code_program_studi' => $request->code_program_studi,
                   'nama_program_studi' => $request->nama_program_studi,

                   ]);
           } else {
               $program_studi = ProgramStudi::find($request->id);
               $program_studi->update(
                   [
                    'code_program_studi' => $request->code_program_studi,
                    'nama_program_studi' => $request->nama_program_studi,
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
     $data = ProgramStudi::select('program_studi.*')->where('program_studi.id',$id)->first(); 
        return response()->json($data);
    }
    public function destroy($id)
    {
         ProgramStudi::where('id',$id)->delete();
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
