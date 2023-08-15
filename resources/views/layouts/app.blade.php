<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<!-- BEGIN: Head-->
@include('partials.head')
@yield('extraCSS')

<script>
    let current_url = '{{\Illuminate\Support\Facades\URL::current()}}';
</script>
<link rel="stylesheet" type="text/css"
      href="{{asset('management/appassets/css/custom.css')}}">

<!-- END: Head-->

<!-- BEGIN: Body-->
<body class="vertical-layout vertical-menu-modern  navbar-floating footer-static  " data-open="click"
      data-menu="vertical-menu-modern" data-col="">

<!-- BEGIN: Header-->
@include('partials.header')
<!-- END: Header-->


<!-- BEGIN: Main Menu-->
@include('partials.sidebar')
<!-- END: Main Menu-->

<!-- BEGIN: Content-->
@yield('content')
<!-- END: Content-->


<!-- BEGIN: Customizer-->
@include('partials.customizer')
<!-- End: Customizer-->

<div class="sidenav-overlay"></div>
<div class="drag-target"></div>

<!-- BEGIN: Footer-->
@include('partials.footer')
<!-- END: Footer-->

@include('partials.footer_scripts')
@yield('extraJS')


</body>
<!-- END: Body-->
</html>
