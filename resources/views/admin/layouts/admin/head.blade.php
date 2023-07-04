<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
        <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="https://fonts.googleapis.com/css?family=Material+Icons|Material+Icons+Outlined" rel="stylesheet">
    <meta name="author" content="">

    <title>QMS</title>

    <!-- Custom fonts for this template-->
    <link href="{{URL::asset( 'assets/js/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{URL::asset( 'assets/css/sb-admin-2.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('template/css/styles.css') }}" rel="stylesheet">

        <!-- Custom styles for this template -->
    

    <!-- Custom styles for this page -->
    <link href="{{URL::asset( 'assets/js/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.css" />
    <link rel="stylesheet" href="{{ URL::asset('assets/css/dataTables.bootstrap4.min.css') }}">

      {{-- message toastr --}}
        <link rel="stylesheet" href="{{ URL::to('assets/css/toastr.min.css') }}">
        <script src="{{ URL::asset('assets/js/toastr_jquery.min.js') }}"></script>
        <script src="{{ URL::asset('assets/js/toastr.min.js') }}"></script>
        <script src="{{ URL::asset('teplate/js/scripts.js') }}"></script>
    
    @yield('css')

</head>

<body id="page-top">