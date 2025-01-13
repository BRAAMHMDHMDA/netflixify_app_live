<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{config('app.name')}}</title>

    <!--google font-->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,500,700&display=swap" rel="stylesheet">\

    <!--font awesome-->
        <link rel="stylesheet" href="{{ asset('website_assets/css/font-awesome5.11.2.min.css') }}">
{{--    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">--}}

    <!--bootstrap-->
    <link rel="stylesheet" href="{{ asset('website_assets/css/bootstrap.min.css') }}">

    <!--vendor css-->
    <link rel="stylesheet" href="{{ asset('website_assets/css/vendor.min.css') }}">
    <link rel="stylesheet" href="{{ asset('website_assets/css/easy-autocomplete.min.css') }}">

    <!--main styles -->
    <link rel="stylesheet" href="{{ asset('website_assets/css/main.min.css') }}">

    <link rel="icon" type="image/png" href="{{ config('app.logo') }}">
    <link rel="shortcut icon" href="{{ config('app.logo') }}">

    <style>
        .easy-autocomplete{
            width: 90% !important;
        }

        .easy-autocomplete input{
            color: white !important;
        }

        .eac-icon-left .eac-item img{
            max-height: 80px !important;
            margin-right: 20px;
        }
    </style>
    <meta name="csrf-token" content="{{@csrf_token()}}">
</head>
