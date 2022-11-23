
<!DOCTYPE html>

<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
  <meta name="description" content="Responsive HTML Admin Dashboard Template based on Bootstrap 5">
	<meta name="author" content="NobleUI">
	<meta name="keywords" content="nobleui, bootstrap, bootstrap 5, bootstrap5, admin, dashboard, template, responsive, css, sass, html, theme, front-end, ui kit, web">
    <meta name="csrf-token" content="{{ csrf_token() }}" />

	<title>Test Astrindo</title>

  <!-- Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap" rel="stylesheet">
  <!-- End fonts -->
<!-- Plugin css for this page -->
<link rel="stylesheet" href="{{ asset('assets/vendors/datatables.net-bs5/dataTables.bootstrap5.css')}}">
<!-- End plugin css for this page -->
	<!-- core:css -->
	<link rel="stylesheet" href="{{ asset('assets/vendors/core/core.css')}}
    ">
	<!-- endinject -->
	<!-- Plugin css for this page -->
  <link rel="stylesheet" href="    {{ asset('assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.css')}}">
	<!-- End plugin css for this page -->

	<!-- inject:css -->
	<link rel="stylesheet" href="    {{ asset('assets/fonts/feather-font/css/iconfont.css')}}">
	<link rel="stylesheet" href="    {{ asset('assets/vendors/flag-icon-css/css/flag-icon.min.css')}}">
	<!-- endinject -->

  <!-- Layout styles -->  
	<link rel="stylesheet" href="{{ asset('assets/css/demo1/style.css')}}">
  <!-- End layout styles -->
  
  <link rel="shortcut icon" href="{{ asset('assets/images/favicon.png')}} " />
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <!-- END PAGE LEVEL PLUGINSCUSTOM STYLES -->
  <script type="text/javascript">
	  $(function () {
		  $.ajaxSetup({headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}});
	  });
  </script>
</head>
<body>
	<div class="main-wrapper">

		<!-- partial:partials/_sidebar.html -->
		<nav class="sidebar">
      <div class="sidebar-header">
        <a href="#" class="sidebar-brand">
          Universitas<span>Gunadarma</span>
        </a>
        <div class="sidebar-toggler not-active">
          <span></span>
          <span></span>
          <span></span>
        </div>
      </div>
      <div class="sidebar-body">
        <ul class="nav">
		
          <li class="nav-item nav-category">Main</li>
			  
          <li class="nav-item">
            <a href="{{ route('dashboard') }}" class="nav-link">
              <i class="link-icon" data-feather="box"></i>
              <span class="link-title">Dashboard</span>
            </a>
          </li>
		  @if (Auth::user()->roles == 'user')	
		  <li class="nav-item">
            <a href="{{ route('profile') }}" class="nav-link">
              <i class="link-icon" data-feather="box"></i>
              <span class="link-title">Profile</span>
            </a>
          </li>
		  @endif
		  @if (Auth::user()->roles == 'admin')		 
          <li class="nav-item nav-category">Data</li>
         
          <li class="nav-item">
            <a href="{{route('users.index')}}" class="nav-link">
              <i class="link-icon" data-feather="user"></i>
              <span class="link-title">User</span>
            </a>
          </li>
		  <li class="nav-item">
            <a href="{{route('kampus.index')}}" class="nav-link">
              <i class="link-icon" data-feather="bookmark"></i>
              <span class="link-title">Kampus</span>
            </a>
          </li>

		  <li class="nav-item">
            <a href="{{route('program_studi.index')}}" class="nav-link">
              <i class="link-icon" data-feather="bookmark"></i>
              <span class="link-title">Program Studi</span>
            </a>
          </li>
		  <li class="nav-item">
            <a href="{{route('mahasiswa_admin')}}" class="nav-link">
              <i class="link-icon" data-feather="user"></i>
              <span class="link-title">Mahasiswa</span>
            </a>
          </li>
        
          @else

		  @endif
       
          
        </ul>
      </div>
    </nav>
    
		<!-- partial -->
	
		<div class="page-wrapper">
					
			<!-- partial:partials/_navbar.html -->
			<nav class="navbar">
				<a href="#" class="sidebar-toggler">
					<i data-feather="menu"></i>
				</a>
				<div class="navbar-content">
					
					<ul class="navbar-nav">
				
						<li class="nav-item dropdown">
							<a class="nav-link dropdown-toggle" href="#" id="profileDropdown" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								<img class="wd-30 ht-30 rounded-circle" src="https://via.placeholder.com/30x30" alt="profile">
							</a>
							<div class="dropdown-menu p-0" aria-labelledby="profileDropdown">
								<div class="d-flex flex-column align-items-center border-bottom px-5 py-3">
									<div class="mb-3">
										<img class="wd-80 ht-80 rounded-circle" src="https://via.placeholder.com/80x80" alt="">
									</div>
									<div class="text-center">
										<p class="tx-16 fw-bolder">{{ Auth::user()->name }}</p>
										<p class="tx-12 text-muted">{{ Auth::user()->email }}</p>
									</div>
								</div>
                <ul class="list-unstyled p-1">
                 
                  <li class="dropdown-item py-2">
                    <a href="{{ route('logout') }}" class="text-body ms-0" onclick="event.preventDefault();
					document.getElementById('logout-form').submit();">
							
							<form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
								@csrf
							</form>
						
                      <i class="me-2 icon-md" data-feather="log-out"></i>
                      <span>Log Out</span>
                    </a>
                  </li>
                </ul>
							</div>
						</li>
					</ul>
				</div>
			</nav>
			<!-- partial -->

			<div class="page-content">
                <div class="container-fluid">
                    @yield('content')
                </div>
			</div>

			<!-- partial:partials/_footer.html -->
			<footer class="footer d-flex flex-column flex-md-row align-items-center justify-content-between px-4 py-3 border-top small">
				<p class="text-muted mb-1 mb-md-0">Copyright © 2022 <a href="https://www.nobleui.com" target="_blank">NobleUI</a>.</p>
				<p class="text-muted">Handcrafted With <i class="mb-1 text-primary ms-1 icon-sm" data-feather="heart"></i></p>
			</footer>
			<!-- partial -->
		
		</div>
	</div>

	<!-- core:js -->
	<script src="{{ asset('assets/vendors/core/core.js')}}"></script>
	<!-- endinject -->

	<!-- Plugin js for this page -->
  <script src="{{ asset('assets/vendors/chartjs/Chart.min.js')}}"></script>
  <script src="{{ asset('assets/vendors/jquery.flot/jquery.flot.js')}}"></script>
  <script src="{{ asset('assets/vendors/jquery.flot/jquery.flot.resize.js')}}"></script>
  <script src="{{ asset('assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.js')}}"></script>
  <script src="{{ asset('assets/vendors/apexcharts/apexcharts.min.js')}}"></script>
	<!-- End plugin js for this page -->

	<!-- inject:js -->
	<script src="{{ asset('assets/vendors/feather-icons/feather.min.js')}}"></script>
	<script src="{{ asset('assets/js/template.js')}}"></script>
	<!-- endinject -->

	<!-- Custom js for this page -->
  <script src="{{ asset('assets/js/dashboard-light.js')}}"></script>
  <script src="{{ asset('assets/js/datepicker.js')}}"></script>
	<!-- End custom js for this page -->
<!-- Plugin js for this page -->
<script src="{{ asset('assets/vendors/datatables.net/jquery.dataTables.js')}}"></script>
<script src="{{ asset('assets/vendors/datatables.net-bs5/dataTables.bootstrap5.js')}}"></script>
  <!-- End plugin js for this page -->
</body>
</html>    