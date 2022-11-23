@extends('layouts.app1')
@section('content')
<div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
    <div>
      <h4 class="mb-3 mb-md-0">Welcome to Dashboard</h4>
    </div>
   
  </div>

  <div class="row">
    <div class="col-6 col-xl-12 stretch-card">
      <div class="row flex-grow-1">
        <div class="col-md-3 grid-margin stretch-card">
          <div class="card">
            <div class="card-body">
              <div class="d-flex justify-content-between align-items-baseline">
                <h6 class="card-title mb-0">Data Users</h6>
                <div class="dropdown mb-2">
                  <button class="btn p-0" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="icon-lg text-muted pb-3px" data-feather="more-horizontal"></i>
                  </button>
             
                </div>
              </div>
                <div class="col-6 col-md-12 col-xl-5">
                  <h3 class="mb-2">{{ $data }}</h3>
                 
                </div>
                
               
            </div>
          </div>
          <div class="card">
            <div class="card-body">
              <div class="d-flex justify-content-between align-items-baseline">
                <h6 class="card-title mb-0">Data Kampus</h6>
                <div class="dropdown mb-2">
                  <button class="btn p-0" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="icon-lg text-muted pb-3px" data-feather="more-horizontal"></i>
                  </button>
             
                </div>
              </div>
                <div class="col-6 col-md-12 col-xl-5">
                  <h3 class="mb-2">{{ $data_kampus }}</h3>
                 
                </div>
                
               
            </div>
          </div>
          <div class="card">
            <div class="card-body">
              <div class="d-flex justify-content-between align-items-baseline">
                <h6 class="card-title mb-0">Data Program Studi</h6>
                <div class="dropdown mb-2">
                  <button class="btn p-0" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="icon-lg text-muted pb-3px" data-feather="more-horizontal"></i>
                  </button>
             
                </div>
              </div>
                <div class="col-6 col-md-12 col-xl-5">
                  <h3 class="mb-2">{{ $data_program_studi }}</h3>
                 
                </div>
                
               
            </div>
          </div>
          <div class="card">
            <div class="card-body">
              <div class="d-flex justify-content-between align-items-baseline">
                <h6 class="card-title mb-0">Data Mahasiswa</h6>
                <div class="dropdown mb-2">
                  <button class="btn p-0" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="icon-lg text-muted pb-3px" data-feather="more-horizontal"></i>
                  </button>
             
                </div>
              </div>
                <div class="col-6 col-md-12 col-xl-5">
                  <h3 class="mb-2">{{ $data }}</h3>
                 
                </div>
                
               
            </div>
          </div>
        </div>
       
        
      </div>
    </div>
    
   
  </div> <!-- row -->

  @endsection