@extends('layouts.app1')

@section('content')

<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0">Data Program Studi</h4>
            <div class="page-title-right">
                <button id="tambah-data" type="button" class="btn btn-primary glow mr-1 mb-1"><i class="mdi mdi-account-multiple-plus"></i><strong> Add Data Program Studi</strong></button>
            </div>
        </div>
    </div>
</div>
    <div class="content-body">
        <section id="basic-datatable">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-content">
                            <div class="card-body card-dashboard">
                                <div class="table-responsive">
                                    <table  id="datatable" class="table table-bordered dt-responsive nowrap data-table" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Action</th>
                                                <th>Code Program Studi</th>
                                                <th>Nama Program Studi</th>
                                                <th>Created_at</th>
                                            </tr>
                                        </thead>
                                        <tbody></tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--/ Zero configuration table -->
    </div>


    <div class="modal fade" id="exampleModalScrollable" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalScrollableTitle">Scrollable Modal</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="data-form" name="data-form">
                        {{ csrf_field() }}
                           <div class="container">
                            <div class="col-lg-12">
        
                                <input type="hidden" id="id" name="id">    
                                <label>Code Program Studi: </label>
                                <div class="form-group" id="name-error">
                                    <div class="controls">
                                        <input  type="text" name="code_program_studi" class="form-control" id="code_program_studi" >
                                        <div class="invalid-feedback" id="error-code_program_studi"></div><br>
                                    </div>
                                </div>
                                <label>Nama Program Studi: </label>
                                <div class="form-group" id="name-error">
                                    <div class="controls">
                                        <input  type="text" name="nama_program_studi" class="form-control" id="nama_program_studi" >
                                        <div class="invalid-feedback" id="error-nama_program_studi"></div><br>
                                    </div>
                                </div>
                               

                        <div class="modal-footer">
                            <button type="submit" id="saveBtn" class="btn btn-primary ml-1">
                            <button type="button" class="btn btn-danger waves-effect" data-bs-dismiss="modal">Back</button>
                            </button>
                        </div>
                            </div>
                           </div>
                    </form>
                </div>
               
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
    <script type="text/javascript">
    
        $(function () {
            $('.message-success').hide('true');
            $.ajaxSetup({headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}});
            var table = $('.data-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('program_studi.index') }}",

                columns: [
                    {
                        "data":null, "sortable":false, "orderable":false,
                        render: function(data, type, row, meta){
                            return meta.row + meta.settings._iDisplayStart+1
                        }
                    },
                    {data: 'action', name: 'action', orderable: false, searchable: false},
                    {data: 'code_program_studi', name: 'code_program_studi'},
                    {data: 'nama_program_studi', name: 'nama_program_studi'},
                    {data: 'created_at', name: 'created_at'},
                ]
            });
    
            $('#tambah-data').click(function () {
                $('#saveBtn').html("Save");
    
                $('#code_program_studi').val('');
                $('#code_program_studi').removeClass('is-invalid');
                $('#error-code_program_studi').html('');

                $('#nama_program_studi').val('');
                $('#nama_program_studi').removeClass('is-invalid');
                $('#error-nama_program_studi').html('');
    
                $('#exampleModalScrollableTitle').html('Tambah Data Program Studi');
                $('#data-form').trigger("reset");
                $('#exampleModalScrollable').modal('show');
            });
            $(document).ready(function(){
            $('#data-form').on('submit', function(event){
                event.preventDefault();
                $.ajax({
                    url:"{{ route('program_studi.store') }}",
                    method:"POST",
                    data:new FormData(this),
                    dataType:'JSON',
                    contentType: false,
                    cache: false,
                    processData: false,
                    beforeSend:function(data){
                $('#code_program_studi').removeClass('is-invalid');
                $('#error-code_program_studi').html('');

                $('#nama_program_studi').removeClass('is-invalid');
                $('#error-nama_program_studi').html('');
    
                 $('#saveBtn').attr('disabled',true);
                 $('#saveBtn').html('Loading');
                    },
                  
                    success:function(data){
                        $('#saveBtn').attr('disabled',false);
                        $('#saveBtn').html('Simpan');
                        if (data.status == true) {
                            $('#exampleModalScrollable').modal('hide');
                            Swal.fire({
                                icon:'success',
                                title: 'Berhasil',
                                html: 'Data tersimpan didatabase',
                                timer: 2000,
                            })
                            table.draw();
    
    
    
                        } else if(data.status == false) {
    
                            if(data.message.code_program_studi){
                                $( '#code_program_studi' ).addClass('is-invalid');
                                $( '#error-code_program_studi' ).html(data.message.code_program_studi[0]);
                            }
                           
    
                            if(data.message.nama_program_studi){
                                $( '#nama_program_studi' ).addClass('is-invalid');
                                $( '#error-nama_program_studi' ).html(data.message.nama_program_studi[0]);
                            }
  
    
                        }
                    },
                    error:function(data){
                        $('#saveBtn').attr('disabled',false);
                        $('#saveBtn').html('Simpan');
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: 'Terjadi kesalahan sistem',
                        });
                    }
                })
            })
         })
            
         $('body').on('click', '.edit-data', function () {
                var code = $(this).data('id');
    
                $.get("{{ route('program_studi.index') }}" +'/' + code +'/edit', function (data) {
                    $('#exampleModalScrollableTitle').html("Edit Data Program Studi");
                    $('#exampleModalScrollable').modal('show');
                    $('#code_program_studi').val(data.code_program_studi);
                    $('#nama_program_studi').val(data.nama_program_studi);
                    $('#id').val(data.id);

                    $('#saveBtn').html("Update Data");
                })
            });

            $('body').on('click', '.delete-data', function(){
            var id = $(this).data('id');
            var name = $(this).data('name');
            Swal.fire({
            title: 'Anda yakin Ingin menghapus "'+name+'" ?',
            text: "Data akan dihapus secara permanen",
            icon: 'warning',
            type: 'error',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, Hapus!'
            }).then((result) => {
            if (result.value) {
                $.ajax({
                type: "DELETE",
                url: "{{ route('program_studi.store') }}"+'/'+id,
                success: function (data) {
                    Swal.fire({
                            icon:'success',
                            title: 'Berhasil',
                            html: 'Data terhapus dari database',
                            timer: 2000,
                        })
                        table.draw();
                },
                error: function (data) {
                    console.log('Error:', data);
                }
            });
            }
            })
        });
    
            
        });
    </script>


    
    
@endsection
