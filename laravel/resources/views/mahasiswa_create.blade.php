@extends('layouts.app1')

@section('content')
<div class="page-content-custom">

    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('mahasiswa') }}">Mahasiswa</a></li>
            <li class="breadcrumb-item active" aria-current="page">Create Data Mahasiswa</li>
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
                                        <input type="text" class="form-control"name="nama_lengkap" id="nama_lengkap" placeholder="">
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
                                    <label for="jenis_kelamin" class="col-sm-3 col-form-label">Jenis Kelampin</label>
                                    <div class="col-sm-9">
                                        <select id="jenis_kelamin"name="jenis_kelamin"class="form-select mb-3">
                                            <option selected>Pilih Jenis Kelamin</option>
                                            <option value="Perempuan">Perempuan</option>
                                            <option value="Laki-Laki">Laki-Laki</option>
                                        </select>   
                                        <div class="invalid-feedback" id="error-jenis_kelamin"></div><br>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="tanggal_lahir" class="col-sm-3 col-form-label">Tanggal Lahir</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control"name="tanggal_lahir" id="tanggal_lahir" placeholder="">
                                        <div class="invalid-feedback" id="error-tanggal_lahir"></div><br>
                                    </div>
                                </div>
                               
                                <div class="row mb-3">
                                    <label for="agama" class="col-sm-3 col-form-label">Agama</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control"name="agama" id="agama">
                                        <div class="invalid-feedback" id="error-agama"></div><br>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="alamat" class="col-sm-3 col-form-label">Alamat</label>
                                    <div class="col-sm-9">
                                        <textarea name="alamat" class="my-editor form-control" id="alamat" cols="30" rows="10"></textarea>
                                        <div class="invalid-feedback" id="error-alamat"></div><br>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                            
                                <div class="row mb-3">
                                    <label for="pendidikan_terakhir" class="col-sm-3 col-form-label">Pendidikan Terakhir</label>
                                    <div class="col-sm-9">
                                        <select id="pendidikan_terakhir"name="pendidikan_terakhir"class="form-select mb-3">
                                            <option disabled selected>Pilih Pendidikan Terakhir</option>
                                            <option value="S1">S1</option>
                                            <option value="SMA">SMA</option>
                                        </select>   
                                        <div class="invalid-feedback" id="error-code_kampus"></div><br>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="code_programstudi" class="col-sm-3 col-form-label">Program Studi</label>
                                    <div class="col-sm-9">
                                        <select id="code_programstudi"name="code_programstudi"class="form-select mb-3">
                                            <option disabled selected>Pilih Program Studi</option>
                                            @foreach ($data_programstudi as $item)
                                            <option value="{{ $item->code_program_studi }}">{{ $item->nama_program_studi }}</option>
                                            @endforeach
                                          
                                        </select>  
                                        <div class="invalid-feedback" id="error-code_programstudi"></div><br>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="code_kampus" class="col-sm-3 col-form-label">Kampus</label>
                                    <div class="col-sm-9">
                                        <select id="code_kampus"name="code_kampus"class="form-select mb-3">
                                            <option disabled selected>Pilih Kampus</option>
                                            @foreach ($data_kampus as $item)
                                            <option value="{{ $item->code_kampus }}">{{ $item->nama_kampus }}</option>
                                            @endforeach
                                        </select>   
                                        <div class="invalid-feedback" id="error-code_kampus"></div><br>
                                    </div>
                                </div>
                              
                                <div class="row mb-3">
                                    <label for="upload_ktp" class="col-sm-3 col-form-label">Upload KTP</label>
                                    <div class="col-sm-9">
                                        <input type="file" name="upload_ktp"class="form-control" id="upload_ktp">
                                        <div class="invalid-feedback" id="error-upload_ktp"></div><br>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="upload_ijazah" class="col-sm-3 col-form-label">Upload Ijazah</label>
                                    <div class="col-sm-9">
                                        <input type="file" name="upload_ijazah"class="form-control" id="upload_ijazah">
                                        <div class="invalid-feedback" id="error-upload_ijazah"></div><br>
                                    </div>
                                </div>
                            </div>
                      
                    </div>
                        <button type="submit"id="saveBtn" class="btn btn-primary me-2">Submit</button>
                        <button class="btn btn-secondary">Cancel</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    $(function(){

        $(document).ready(function(){
            
            $('#data-form').on('submit',function(event){
                event.preventDefault();
                $.ajax({
                    url:"{{ route('mahasiswa_store') }}",
                    method:"POST",
                    data:new FormData(this),
                    dataType:'JSON',
                    contentType: false,
                    cache: false,
                    processData: false,
                    beforeSend:function(data){
                        $('#nama_lengkap').removeClass('is-invalid');
                        $('#error-nama_lengkap').html('');

                        $('#jenis_kelamin').removeClass('is-invalid');
                        $('#error-jenis_kelamin').html('');

                        $('#tanggal_lahir').removeClass('is-invalid');
                        $('#error-tanggal_lahir').html(''); 
                        
                        $('#agama').removeClass('is-invalid');
                        $('#error-agama').html('');

                        $('#alamat').removeClass('is-invalid');
                        $('#error-alamat').html('');

                        $('#pendidikan_terakhir').removeClass('is-invalid');
                        $('#error-pendidikan_terakhir').html('');


                        $('#code_kampus').removeClass('is-invalid');
                        $('#error-code_kampus').html('');


                        $('#code_programstudi').removeClass('is-invalid');
                        $('#error-code_programstudi').html('');

                        $('#upload_ktp').removeClass('is-invalid');
                        $('#error-upload_ktp').html('');

                        $('#upload_ijazah').removeClass('is-invalid');
                        $('#error-upload_ijazah').html('');


                        $('#saveBtn').attr('disabled',true);
                        $('#saveBtn').html('Loading');
                    },
                    success:function(data){
                        $('#saveBtn').attr('disabled',false);
                        $('#saveBtn').html('simpan');
                        if(data.status == true){
                            Swal.fire({
                                icon:'success',
                                title:'Berhasil',
                                html:'Data tersimpan di database',
                                timer:2000,
                            })
                            window.location.href ="{{ route('profile') }}";
                        } else if(data.status == false)
                        {
                            if(data.message.nama_lengkap){
                                 $( '#nama_lengkap' ).addClass('is-invalid');
                                 $( '#error-nama_lengkap' ).html(data.message.nama_lengkap[0]);
                            }
                            if(data.message.jenis_kelamin){
                                 $( '#jenis_kelamin' ).addClass('is-invalid');
                                 $( '#error-jenis_kelamin' ).html(data.message.jenis_kelamin[0]);
                            }
                            if(data.message.tanggal_lahir){
                                 $( '#tanggal_lahir' ).addClass('is-invalid');
                                 $( '#error-tanggal_lahir' ).html(data.message.tanggal_lahir[0]);
                            }
                            if(data.message.agama){
                                 $( '#agama' ).addClass('is-invalid');
                                 $( '#error-agama' ).html(data.message.agama[0]);
                            }
                            if(data.message.alamat){
                                 $( '#alamat' ).addClass('is-invalid');
                                 $( '#error-alamat' ).html(data.message.alamat[0]);
                            }
                            if(data.message.pendidikan_terakhir){
                                 $( '#pendidikan_terakhir' ).addClass('is-invalid');
                                 $( '#error-pendidikan_terakhir' ).html(data.message.pendidikan_terakhir[0]);
                            }
                            if(data.message.code_kampus){
                                 $( '#code_kampus' ).addClass('is-invalid');
                                 $( '#error-code_kampus' ).html(data.message.code_kampus[0]);
                            }
                            if(data.message.code_programstudi){
                                 $( '#code_programstudi' ).addClass('is-invalid');
                                 $( '#error-code_programstudi' ).html(data.message.code_programstudi[0]);
                            }
                            if(data.message.upload_ktp){
                                 $( '#upload_ktp' ).addClass('is-invalid');
                                 $( '#error-upload_ktp' ).html(data.message.upload_ktp[0]);
                            } if(data.message.upload_ijazah){
                                 $( '#upload_ijazah' ).addClass('is-invalid');
                                 $( '#error-upload_ijazah' ).html(data.message.upload_ijazah[0]);
                            }
                            
                        }
                    },
                    error:function(data){
                         $('#saveBtn').attr('disabled',false);
                         $('#saveBtn').html('Simpan');
                         Swal.fire({
                            icon:'error',
                            title:'Oops....',
                            text:'Terjadi kesalahan sistem',
                         })
                    }
                })
            })
        })

    });
</script>
<script src="https://cdn.ckeditor.com/ckeditor5/23.1.0/classic/ckeditor.js"></script>
<script>
    ClassicEditor
        .create( document.querySelector( '#alamat' ) )
        .catch( error => {
            console.error( error );
        });
</script>

@endsection