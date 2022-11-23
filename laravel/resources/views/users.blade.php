@extends('layouts.app1')

@section('content')

<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0">Data Pengguna</h4>
            <div class="page-title-right">
                <button id="tambah-data" type="button" class="btn btn-primary glow mr-1 mb-1"><i class="mdi mdi-account-multiple-plus"></i><strong> Add Data Pengguna</strong></button>
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
                                                <th>Name</th>
                                                <th>Email</th>
                                                <th>Role</th>
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
                                {{-- <input type="" name="status"value=""  id="statuspengguna" > --}}
    
                                <label>Nama Pengguna: </label>
                                <div class="form-group" id="name-error">
                                    <div class="controls">
                                        <input  type="text" name="name" class="form-control" id="name" >
                                        <div class="invalid-feedback" id="error-name"></div><br>
                                    </div>
                                </div>
                                <label>Email: </label>
                                <div class="form-group" id="email-error">
                                    <div class="controls">
                                        <input type="text" name="email" class="form-control" id="email" >
                                        <div class="invalid-feedback" id="error-email"></div><br>
                                    </div>
                                </div>
                               
                                <div class="form-group" >
                                    <label>Peran: </label>
                                    <div class="controls">
                                        <select class="form-select"name="roles" id="roles" >
                                            <option selected disabled value="">Choose...</option>
                                            <option value="admin">Admin</option>
                                            <option value="user">User</option>
                                        </select>
                                        <div class="invalid-feedback" id="error-roles"></div><br>
                                   </div>
                                   <div>
                                   </div>
                                   <label id="lbl-password">Password: </label>
                                   <div class="form-group" id="password-error">
                                       <div class="controls">
                                        <input type="password" name="password" class="form-control" id="password" maxlength="12" minlength="8" >
                                           <div class="invalid-feedback" id="error-password"></div><br>
                                       </div>
                                   </div>
                                   <label id="lbl-password_confirmation">Konfirmasi Password: </label>
                                   <div class="form-group" id="password_confirmation-error">
                                       <div class="controls">
                                        <input type="password" name="password_confirmation" class="form-control" id="password_confirmation" maxlength="12" minlength="8" >
                                           <div class="invalid-feedback" id="error-password_confirmation"></div><br>
                                       </div>
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
                ajax: "{{ route('users.index') }}",
                columns: [
                    {
                        "data":null, "sortable":false, "orderable":false,
                        render: function(data, type, row, meta){
                            return meta.row + meta.settings._iDisplayStart+1
                        }
                    },
                    {data: 'action', name: 'action', orderable: false, searchable: false},
                    {data: 'name', name: 'name'},
                    {data: 'email', name: 'email'},
                    {data: 'roles', name: 'roles'},
                    {data: 'created_at', name: 'created_at'},
                ]
            });
    
            $('#tambah-data').click(function () {
                $('#saveBtn').html("Save");
    
                $('#name').val('');
                $('#name').removeClass('is-invalid');
                $('#error-name').html('');

                $('#roles').val('');
                $('#roles').removeClass('is-invalid');
                $('#error-roles').html('');
    
                    $('#email').val('');
                    $('#email').removeClass('is-invalid');
                    $('#error-email').html('');
                
               $('#role').val('');
                $('#role').removeClass('is-invalid');
                $('#error-role').html('');

                $('#password_confirmation').val('');
                $('#password_confirmation').removeClass('is-invalid');
                $('#error-password_confirmation').html('');
    
                $('#password').val('');
                $('#password').removeClass('is-invalid');
                $('#error-password').html('');
    
               
                
    
                $('#exampleModalScrollableTitle').html('Tambah Data Pengguna');
                $('#data-form').trigger("reset");
                $('#exampleModalScrollable').modal('show');
            });
            $(document).ready(function(){
            $('#data-form').on('submit', function(event){
                event.preventDefault();
                $.ajax({
                    url:"{{ route('users.store') }}",
                    method:"POST",
                    data:new FormData(this),
                    dataType:'JSON',
                    contentType: false,
                    cache: false,
                    processData: false,
                    beforeSend:function(data){
                $('#name').removeClass('is-invalid');
                $('#error-name').html('');
    
                    $('#email').removeClass('is-invalid');
                    $('#error-email').html('');
    
                    $('#roles').removeClass('is-invalid');
                    $('#error-roles').html('');
            
             
                $('#password').removeClass('is-invalid');
                $('#error-password').html('');
    
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
    
                            // window.location.href = "{{ route('users.index') }}";
    
    
                        } else if(data.status == false) {
    
                            if(data.message.name){
                                $( '#name' ).addClass('is-invalid');
                                $( '#error-name' ).html(data.message.name[0]);
                            }
                           
    
                            if(data.message.email){
                                $( '#email' ).addClass('is-invalid');
                                $( '#error-email' ).html(data.message.email[0]);
                            }

                         
                            if(data.message.roles){
                                $( '#roles' ).addClass('is-invalid');
                                $( '#error-roles' ).html(data.message.roles[0]);
                            }
                          
                            if(data.message.password){
                                $( '#password' ).addClass('is-invalid');
                                $( '#error-password' ).html(data.message.password[0]);
                            }
    
                            if(data.message.password_confirmation){
                                $( '#password_confirmation' ).addClass('is-invalid');
                                $( '#error-password_confirmation' ).html(data.message.password_confirmation[0]);
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
                // $('#statuspengguna').val(2);
    
                $.get("{{ route('users.index') }}" +'/' + code +'/edit', function (data) {
                    $('#exampleModalScrollableTitle').html("Edit Data Pengguna");
                    $('#exampleModalScrollable').modal('show');
                    $('#name').val(data.name);
                    $('#id').val(data.id);
    
                    // $('#code_cabang').val(data.code_cabang).trigger('change');
                    $('#email').val(data.email)
                    $('#roles').val(data.roles)
                    

                    // $('#departement_code').val(data.code_department)
                    $('#error-password_confirmation').hide(true);
                    $('#lbl-password_confirmation').hide(true);
                    $('#lbl-password').hide(true);
    
                    $('#error-password').hide(true);
                    $('#password').hide(true);
                    $('#password_confirmation').hide(true);
                    // $('#email').attr('readonly',true);
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
                url: "{{ route('users.store') }}"+'/'+id,
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
