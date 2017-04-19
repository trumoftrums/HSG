<!doctype html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('page-title') | {{ settings('app_name') }}</title>

    <link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet"
          type="text/css">

    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="{{ url('assets/img/icons/logo-not.png') }}"/>
    <link rel="apple-touch-icon-precomposed" sizes="152x152" href="{{ url('assets/img/icons/logo-not.png') }}"/>
    <link rel="icon" type="image/png" href="{{ url('assets/img/icons/logo-not.png') }}" sizes="32x32"/>
    <link rel="icon" type="image/png" href="{{ url('assets/img/icons/logo-not.png') }}" sizes="16x16"/>
    <meta name="application-name" content="{{ settings('app_name') }}"/>
    <meta name="msapplication-TileColor" content="#FFFFFF"/>
    <meta name="msapplication-TileImage" content="{{ url('assets/img/icons/logo-not.png') }}"/>

    {{--<script src="https://code.jquery.com/jquery-1.12.4.js"></script>--}}
    {{-- For production, it is recommended to combine following styles into one. --}}
    {!! HTML::script('assets/js/jquery-2.1.4.min.js') !!}
    {!! HTML::style('assets/css/bootstrap.min.css') !!}
    {!! HTML::style('assets/css/font-awesome.min.css') !!}
    {!! HTML::style('assets/css/metisMenu.css') !!}
    {!! HTML::style('assets/css/sweetalert.css') !!}
    {!! HTML::style('assets/css/bootstrap-social.css') !!}
    {!! HTML::style('assets/css/app.css') !!}
    {{--{!! HTML::script('assets/js/jquery-ui/jquery-ui.js') !!}--}}
    {{--{!! HTML::style('assets/js/jquery-ui/jquery-ui.css') !!}--}}


    {{--<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">--}}
    {{--<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>--}}

    @yield('styles')
</head>
<body>
<nav class="navbar navbar-default navbar-fixed-top">
    <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand" href="{{ route('dashboard') }}" style="padding: 7px 0 0 0;">
                <img src="{{ url('assets/img/logo-admin.png') }}" height="40" alt="{{ settings('app_name') }}">
            </a>
        </div>
        <div id="navbar" class="navbar-collapse">
            <a href="#" id="sidebar-toggle" class="btn">
                <i class="navbar-icon fa fa-bars icon"></i>
            </a>
            <ul class="nav navbar-nav navbar-right">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle avatar" data-toggle="dropdown">
                        <img alt="image" class="img-circle avatar" src="{{ Auth::user()->present()->avatar }}">
                        {{ Auth::user()->present()->name }}
                        <b class="caret"></b>
                    </a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="{{ route('profile') }}">
                                <i class="fa fa-user"></i>
                                @lang('app.my_profile')
                            </a>
                        </li>
                        @if (config('session.driver') == 'database')
                            <li>
                                <a href="{{ route('profile.sessions') }}">
                                    <i class="fa fa-list"></i>
                                    @lang('app.active_sessions')
                                </a>
                            </li>
                        @endif
                        <li>
                            <a href="{{ route('auth.logout') }}">
                                <i class="fa fa-sign-out"></i>
                                @lang('app.logout')
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>

@include('partials.sidebar')

<div id="page-wrapper">
    <div class="container-fluid">
        @yield('content')
        <div class="footer">
            <div class="left">
                <p>Địa chỉ: 02, Phạm Văn Đồng, P. Linh Đông, Q. Thủ Đức, Tp.HCM</p>
                <p>Hotline: 0970 7777 929 - Email: customerservice@hoangsanggroup.vn</p>
            </div>
            <p class="p-right">Số lượng thành viên: 1000</p>
            <p class="p-copyright">Bản quyền @ 2017 Hoangsanggroup.vn</p>
        </div>
    </div>
</div>

{{-- For production, it is recommended to combine following scripts into one. --}}
{!! HTML::script('assets/js/jquery-2.1.4.min.js') !!}
{!! HTML::script('assets/js/bootstrap.min.js') !!}
{!! HTML::script('assets/js/metisMenu.min.js') !!}
{!! HTML::script('assets/js/sweetalert.min.js') !!}
{!! HTML::script('assets/js/delete.handler.js') !!}
{!! HTML::script('assets/plugins/js-cookie/js.cookie.js') !!}
<script type="text/javascript">
    $.ajaxSetup({
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}
    });
</script>
{!! HTML::script('vendor/jsvalidation/js/jsvalidation.js') !!}
{!! HTML::script('assets/js/as/app.js') !!}
@yield('scripts')
</body>
</html>
