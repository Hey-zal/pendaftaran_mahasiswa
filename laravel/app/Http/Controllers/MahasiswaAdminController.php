<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Facades\DataTables;

class MahasiswaAdminController extends Controller
{
    public function index(Request $request)
    {
        if (Auth::user()->roles == "admin") {
            $data = Mahasiswa::select('mahasiswa.*','kampus.nama_kampus','program_studi.nama_program_studi')
            ->leftjoin('kampus','mahasiswa.code_kampus','=','kampus.code_kampus')
            ->leftjoin('program_studi','mahasiswa.code_programstudi','=','program_studi.code_program_studi')
            ->get();
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
            return view("mahasiswa_admin");
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
