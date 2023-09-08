<!--
=========================================================
* Material Dashboard 2 - v3.0.0
=========================================================

* Product Page: https://www.creative-tim.com/product/material-dashboard
* Copyright 2021 Creative Tim (https://www.creative-tim.com) & UPDIVISION (https://www.updivision.com)
* Licensed under MIT (https://www.creative-tim.com/license)
* Coded by www.creative-tim.com & www.updivision.com

=========================================================

* The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.
-->

@props(['bodyClass'])
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" type="image/png" href="https://scontent.fceb1-2.fna.fbcdn.net/v/t39.30808-6/260360176_435480637960387_2708555319710348803_n.jpg?_nc_cat=100&ccb=1-7&_nc_sid=8631f5&_nc_eui2=AeF7DqsvGr5ilRWp-YzGHfmdkMfA7y0oCQWQx8DvLSgJBZUHJr9yiQpA6vDydzy3FIqbFxSmlT20EvhMWKY2l_od&_nc_ohc=3vkyAp_i5BAAX-jRLeA&_nc_oc=AQl5_brtkTpCpmTY9rW9SR0xhGpvJ9HAYiP_n4EwgCcD2vsHJBLdvtt5RgxXvRCRWYk&_nc_ht=scontent.fceb1-2.fna&oh=00_AfBqjholwETuWynhcsAD0iylymp2ZH0O8YEkHl8Vu4hreQ&oe=64E9D7AF">
    <title>
        {{ env('APP_NAME') }}
    </title>
    <!--     Fonts and icons     -->
    <link rel="stylesheet" type="text/css"
        href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900|Roboto+Slab:400,700" />
    <!-- Nucleo Icons -->
    <link href="{{ asset('assets') }}/css/nucleo-icons.css" rel="stylesheet" />
    <link href="{{ asset('assets') }}/css/nucleo-svg.css" rel="stylesheet" />
    <!-- Font Awesome Icons -->
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    <!-- Material Icons -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">
    <!-- CSS Files -->
    <link id="pagestyle" href="{{ asset('assets') }}/css/material-dashboard.css?v=3.0.0" rel="stylesheet" />
    <link href="https://cdn.datatables.net/1.13.5/css/dataTables.bootstrap5.min.css" rel="stylesheet"/>
</head>
<body class="{{ $bodyClass }}">

{{ $slot }}

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.16.6/dist/sweetalert2.all.min.js"></script>
<link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/sweetalert2@10.10.1/dist/sweetalert2.min.css'>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.3.5/js/swiper.min.js"></script>
<!-- <script src="https://cdn.datatables.net/1.13.5/js/jquery.dataTables.min.js"></script> -->
<script src="js/jquery-3.1.1.min.js"></script>
<script src="js/bootstrap.min.js"></script>

<script src="https://code.jquery.com/jquery-3.7.0.js"></script>
<script src="https://cdn.datatables.net/1.13.5/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.5/js/dataTables.bootstrap5.min.js"></script>

<script src="{{ asset('assets') }}/js/core/popper.min.js"></script>
<script src="{{ asset('assets') }}/js/core/bootstrap.min.js"></script>
<script src="{{asset('storage/js/app.js')}}"></script>
<script src="{{ asset('assets') }}/js/plugins/perfect-scrollbar.min.js"></script>
<script src="{{ asset('assets') }}/js/plugins/smooth-scrollbar.min.js"></script>
@stack('js')
<script>
    var win = navigator.platform.indexOf('Win') > -1;
    if (win && document.querySelector('#sidenav-scrollbar')) {
        var options = {
            damping: '0.5'
        }
        Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
    }

</script>
<!-- Github buttons -->
<script async defer src="https://buttons.github.io/buttons.js"></script>
<!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
<script src="{{ asset('assets') }}/js/material-dashboard.min.js?v=3.0.0"></script>

<link href="{{asset('storage/css/fullcalendar.css')}}" rel='stylesheet' />
<link href="{{asset('storage/css/fullcalendar.print.css')}}" rel='stylesheet' media='print' />
<script src="{{asset('storage/js/jquery-ui.custom.min.js')}}" ></script>
<script src="{{asset('storage/js/fullcalendar.js')}}" ></script>

</body>
</html>
