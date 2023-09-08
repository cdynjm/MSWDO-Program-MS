

<title>{{ config('chatify.name') }}</title>

{{-- Meta tags --}}
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="id" content="{{ $id }}">
<meta name="messenger-color" content="{{ $messengerColor }}">
<meta name="messenger-theme" content="{{ $dark_mode }}">
<meta name="csrf-token" content="{{ csrf_token() }}">
<meta name="url" content="{{ url('').'/'.config('chatify.routes.prefix') }}" data-user="{{ Auth::user()->id }}">

<link rel="icon" type="image/png" href="https://scontent.fceb1-2.fna.fbcdn.net/v/t39.30808-6/260360176_435480637960387_2708555319710348803_n.jpg?_nc_cat=100&ccb=1-7&_nc_sid=8631f5&_nc_eui2=AeF7DqsvGr5ilRWp-YzGHfmdkMfA7y0oCQWQx8DvLSgJBZUHJr9yiQpA6vDydzy3FIqbFxSmlT20EvhMWKY2l_od&_nc_ohc=3vkyAp_i5BAAX-jRLeA&_nc_oc=AQl5_brtkTpCpmTY9rW9SR0xhGpvJ9HAYiP_n4EwgCcD2vsHJBLdvtt5RgxXvRCRWYk&_nc_ht=scontent.fceb1-2.fna&oh=00_AfBqjholwETuWynhcsAD0iylymp2ZH0O8YEkHl8Vu4hreQ&oe=64E9D7AF">

{{-- scripts --}}
<script
  src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="{{ asset('js/chatify/font.awesome.min.js') }}"></script>
<script src="{{ asset('js/chatify/autosize.js') }}"></script>
<script src="{{ asset('js/app.js') }}"></script>
<script src='https://unpkg.com/nprogress@0.2.0/nprogress.js'></script>

{{-- styles --}}
<link rel='stylesheet' href='https://unpkg.com/nprogress@0.2.0/nprogress.css'/>
<link href="{{ asset('css/chatify/style.css') }}" rel="stylesheet" />
<link href="{{ asset('css/chatify/'.$dark_mode.'.mode.css') }}" rel="stylesheet" />
<link href="{{ asset('css/app.css') }}" rel="stylesheet" />

{{-- Setting messenger primary color to css --}}
<style>
    :root {
        --primary-color: {{ $messengerColor }};
    }
</style>
