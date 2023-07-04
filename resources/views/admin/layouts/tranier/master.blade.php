<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="keywords" content="HTML5 Template" />
    <meta name="description" content="Webmin - Bootstrap 4 & Angular 5 Admin Dashboard Template" />
    <meta name="author" content="potenzaglobalsolutions.com" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <!-- Datatable CSS -->
	<link rel="stylesheet" href="{{ URL::asset('assets/css/dataTables.bootstrap4.min.css') }}">


    	{{-- message toastr --}}
	<link rel="stylesheet" href="{{ URL::asset('assets/css/toastr.min.css') }}">
	<script src="{{ URL::asset('assets/js/toastr_jquery.min.js') }}"></script>
	<script src="{{ URL::asset('assets/js/toastr.min.js') }}"></script>

    @include('admin.layouts.admin.head')
</head>

<body>

    <div class="wrapper" style="font-family: 'Cairo', sans-serif">

        <!--=================================
 preloader -->

        <div id="pre-loader">
            <img src="{{ URL::asset('assets/images/pre-loader/loader-01.svg') }}" alt="">
        </div>

        <!--=================================
 preloader -->

        @include('admin.layouts.admin.main-header')
        @include('admin.layouts.admin.main-sidebar')

        <!--=================================
 Main content -->
        <!-- main-content -->
        <div class="content-wrapper">

          @yield('page-header')
<div class="page-title"> 
  <div class="row">
        <div class="col-sm-6">
            <h4 class="mb-0" style="font-family: 'Cairo', sans-serif">@yield('PageTitle')</h4>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                <li class="breadcrumb-item"><a href="{{ url('/dashboard') }}" class="default-color">QMS</a></li>
                <li class="breadcrumb-item active">@yield('PageTitle')</li>
            </ol>
        </div>
    </div>

            @yield('content')

            <!--=================================
 wrapper -->

            <!--=================================
 footer -->

            @include('admin.layouts.admin.footer')
        {{-- </div><!-- main content wrapper end--> --}}
    </div>
    </div>
    </div>

    <!--=================================
 footer -->

    @include('admin.layouts.admin.footer-scripts')

</body>

</html>
