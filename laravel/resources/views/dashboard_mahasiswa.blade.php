@extends('layouts.app1')

@section('content')

<div class="row">
    <div class="col-5">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0"></h4>
            <div class="page-title-right">
                @if (Auth::user()->status_konfirmasi != null)
                 <h4>Anda Sudah Melakukan Konfirmasi</h4>   
               @else
                <a href="{{ route('mahasiswa_create')}}"  id="tambah-data" type="button" class="btn btn-primary glow mr-1 mb-1"><i class="mdi mdi-account-multiple-plus"></i><strong> Form Pendaftaran Mahasiswa</strong></a>
            
                @endif
            </div>
        </div>
    </div>
</div>

    
    
@endsection
