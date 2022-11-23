@extends('layouts.app1')

@section('content')

<div class="row">
    <div class="col-2">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0"></h4>
            <div class="page-title-right">
                <button class="btn btn-primary glow mr-1 mb-1 showData" type="button" data-id="{{$data_mahasiswa}}"></i>Lihat Profile Anda</button>';

            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    $(function () {
  
      $('body').on('click', '.showData', function(){
          var id  = $(this).data('id');
  
         {
              window.location.href = "{{ config('app.url')}}"+"/pendaftaran_mahasiswa/mahasiswa/profile/"+id;
          }
      })
 
    })
  </script>
    
@endsection
