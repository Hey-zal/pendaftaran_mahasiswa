@extends('layouts.app1')

@section('content')
<div class="page-content-custom">

    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('profile') }}">Profile</a></li>
            <li class="breadcrumb-item active" aria-current="page">Show data {{ $data_mahasiswa_all->nama_lengkap }}</li>
        </ol>
    </nav>

    <div class="row">
       
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">

                    <h6 class="card-title">Form Pendaftaran Mahasiswa</h6>

                    <form class="forms-sample"id="data-form"name="data-form">
                        {{ csrf_field() }}
                        <div class="row">
                            <div class="col-6">
                                <div class="row mb-3">
                                    <label for="nama_lengkap" class="col-sm-3 col-form-label">Nama Lengkap</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control"name="nama_lengkap" id="nama_lengkap" placeholder=""value="{{ $data_mahasiswa_all->nama_lengkap }}"readonly>
                                        <div class="invalid-feedback" id="error-nama_lengkap"></div><br>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="email" class="col-sm-3 col-form-label">Email</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control"name="email" id="email" readonly value="{{ Auth::user()->email }}">
                                        <div class="invalid-feedback" id="error-email"></div><br>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="nama_lengkap" class="col-sm-3 col-form-label">Jenis Kelamin</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control"name="nama_lengkap" id="nama_lengkap" placeholder=""value="{{ $data_mahasiswa_all->jenis_kelamin }}"readonly>
                                        <div class="invalid-feedback" id="error-nama_lengkap"></div><br>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="tanggal_lahir" class="col-sm-3 col-form-label">Tanggal Lahir</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control"name="tanggal_lahir" id="tanggal_lahir" placeholder=""value= "{{ $data_mahasiswa_all->tanggal_lahir }}"readonly>
                                        <div class="invalid-feedback" id="error-tanggal_lahir"></div><br>
                                    </div>
                                </div>
                               
                                <div class="row mb-3">
                                    <label for="tanggal_lahir" class="col-sm-3 col-form-label">Agama</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control"name="tanggal_lahir" id="tanggal_lahir" placeholder=""value= "{{ $data_mahasiswa_all->agama }}"readonly>
                                        <div class="invalid-feedback" id="error-tanggal_lahir"></div><br>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="alamat" class="col-sm-3 col-form-label">Alamat</label>
                                    <div class="col-sm-9">
                                        <textarea name="alamat" class="my-editor form-control" id="alamat" cols="30" rows="10" value="" readonly><?php echo strip_tags($data_mahasiswa_all->alamat); ?></textarea>
                                        <div class="invalid-feedback" id="error-alamat"></div><br>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                            
                                <div class="row mb-3">
                                    <label for="tanggal_lahir" class="col-sm-3 col-form-label">Pendidikan Terakhir</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control"name="tanggal_lahir" id="tanggal_lahir" placeholder=""value= "{{ $data_mahasiswa_all->pendidikan_terakhir }}"readonly>
                                        <div class="invalid-feedback" id="error-tanggal_lahir"></div><br>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="tanggal_lahir" class="col-sm-3 col-form-label">Program Studi</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control"name="tanggal_lahir" id="tanggal_lahir" placeholder=""value= "{{ $data_mahasiswa_all->nama_program_studi }}"readonly>
                                        <div class="invalid-feedback" id="error-tanggal_lahir"></div><br>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="tanggal_lahir" class="col-sm-3 col-form-label">Nama Kampus</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control"name="tanggal_lahir" id="tanggal_lahir" placeholder=""value= "{{ $data_mahasiswa_all->nama_kampus }}"readonly>
                                        <div class="invalid-feedback" id="error-tanggal_lahir"></div><br>
                                    </div>
                                </div>
                              
                               
                              
                                <div class="row mb-3">
                                    <label for="upload_ktp" class="col-sm-3 col-form-label">Upload KTP</label>
                                    <div class="col-sm-9">
                                        <label class="col-sm- col-form-label"><img src="{{ asset('file/file_ktp/'.$data_mahasiswa_all->upload_ktp)}}"height="150"width="150"> </label>
                                        <div class="invalid-feedback" id="error-upload_ktp"></div><br>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="upload_ijazah" class="col-sm-3 col-form-label">Upload Ijazah</label>
                                    <div class="col-sm-9">
                                        <label class="col-sm- col-form-label"><img src="{{ asset('file/file_ijazah/'.$data_mahasiswa_all->upload_ijazah)}}"height="150"width="150"> </label>
                                        <div class="invalid-feedback" id="error-upload_ijazah"></div><br>
                                    </div>
                                </div>
                            </div>
                      
                    </div>
                    
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>

@endsection