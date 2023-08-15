<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1.0,user-scalable=0,minimal-ui">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{@$title .' | ' . env('APP_NAME')}}  - ECommerce dashboard </title>
    <link rel="apple-touch-icon" href="{{asset('admin/favicon.svg')}}">
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('admin/favicon.svg')}}">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;1,400;1,500;1,600" rel="stylesheet">

    <meta name="theme-color" content="#ffffff">
    <meta name="application-name" content="{{env('APP_NAME')}}">

    <link rel="shortcut icon" href="{{asset('logo.png')}}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{asset('admin/favicon.svg')}}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{asset('admin/favicon.svg')}}">

    <!-- Apple -->
    <meta name="apple-mobile-web-app-title" content="{{env('APP_NAME')}}">

    <link rel="apple-touch-icon" sizes="180x180" href="{{asset('admin/favicon.svg')}}">
    <link rel="mask-icon" href="{{asset('admin/favicon.svg')}}" color="grey">


    <!-- BEGIN: Vendor CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset('admin/appassets/vendors/css/vendors.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('admin/appassets/vendors/css/extensions/toastr.min.css')}}">
    <link href="{{asset('admin/vendors/sweetalert2/sw2.min.css')}}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{asset('admin/appassets/vendors/css/forms/select/select2.min.css')}}">
    <link rel="stylesheet" type="text/css"
          href="{{asset('admin/appassets/vendors/css/pickers/flatpickr/flatpickr.min.css')}}">

    <!-- END: Vendor CSS-->

    <!-- BEGIN: Theme CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset('admin/appassets/css/bootstrap.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('admin/appassets/css/bootstrap-extended.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('admin/appassets/css/colors.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('admin/appassets/css/components.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('admin/appassets/css/themes/dark-layout.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('admin/appassets/css/themes/bordered-layout.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('admin/appassets/css/themes/semi-dark-layout.min.css')}}">

    <!-- BEGIN: Page CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset('admin/appassets/css/core/menu/menu-types/vertical-menu.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('admin/appassets/css/pages/dashboard-ecommerce.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('admin/appassets/css/plugins/extensions/ext-component-toastr.min.css')}}">
    <!-- END: Page CSS-->

    <!-- BEGIN: Custom CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset('admin/assets/css/style.css?v'.time())}}">
    <!-- END: Custom CSS-->
    <script>
        let language='{{app()->getLocale()}}';
        const default_delete_title='{{__('buttons.delete')}}';
        const default_delete_message='{{__('warning.delete_question')}}';

    </script>

</head>
