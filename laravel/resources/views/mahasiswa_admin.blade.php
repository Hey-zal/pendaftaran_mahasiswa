@extends('layouts.app1')

@section('content')

<div class="row">
   
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
                                                <th>Nama Mahasiswa</th>
                                                <th>Email</th>
                                                <th>Tanggal Lahir</th>
                                                <th>Program Studi</th>
                                                <th>Kampus</th>
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
                                <label>Code Kampus: </label>
                                <div class="form-group" id="name-error">
                                    <div class="controls">
                                        <input  type="text" name="code_kampus" class="form-control" id="code_kampus" >
                                        <div class="invalid-feedback" id="error-code_kampus"></div><br>
                                    </div>
                                </div>
                                <label>Nama Kampus: </label>
                                <div class="form-group" id="name-error">
                                    <div class="controls">
                                        <input  type="text" name="nama_kampus" class="form-control" id="nama_kampus" >
                                        <div class="invalid-feedback" id="error-nama_kampus"></div><br>
                                    </div>
                                </div>
                                <label>Alamat Kampus: </label>
                                <div class="form-group" id="name-error">
                                    <div class="controls">
                                        <input  type="text" name="alamat_kampus" class="form-control" id="alamat_kampus" >
                                        <div class="invalid-feedback" id="error-alamat_kampus"></div><br>
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
                ajax: "{{ route('mahasiswa_admin') }}",

                columns: [
                    {
                        "data":null, "sortable":false, "orderable":false,
                        render: function(data, type, row, meta){
                            return meta.row + meta.settings._iDisplayStart+1
                        }
                    },
                    {data: 'action', name: 'action', orderable: false, searchable: false},
                    {data: 'nama_lengkap', name: 'nama_lengkap'},
                    {data: 'email', name: 'email'},
                    {data: 'tanggal_lahir', name: 'tanggal_lahir'},
                    {data: 'nama_program_studi', name: 'nama_program_studi'},
                    {data: 'nama_kampus', name: 'nama_kampus'},

                ]
            });
    
            
        });
    </script>


    
    
@endsection
