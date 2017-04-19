@extends('layouts.app')

@section('page-title', trans('app.dashboard'))

@section('content')

<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">
            Xin chào <?= Auth::user()->username ?: Auth::user()->first_name ?>!
            <div class="pull-right">
                <ol class="breadcrumb">
                    <li><a href="{{ route('dashboard') }}">@lang('app.home')</a></li>
                    <li class="active">@lang('app.dashboard')</li>
                </ol>
            </div>
        </h1>
    </div>
</div>

<div class="row">
    <div class="col-md-3">
        <a href="{{ route('profile') }}" class="panel-link">
            <div class="panel panel-default dashboard-panel">
                <div class="panel-body">
                    <div class="icon">
                        <i class="fa fa-user"></i>
                    </div>
                    <p class="lead">Thông tin cá nhân</p>
                </div>
            </div>
        </a>
    </div>
    @if (config('session.driver') == 'database')
        <div class="col-md-3">
            <a href="{{ route('profile.sessions') }}" class="panel-link">
                <div class="panel panel-default dashboard-panel">
                    <div class="panel-body">
                        <div class="icon">
                            <i class="fa fa-list"></i>
                        </div>
                        <p class="lead">Phiên làm việc</p>
                    </div>
                </div>
            </a>
        </div>
    @endif
    <div class="col-md-3">
        <a href="{{ route('profile.activity') }}" class="panel-link">
            <div class="panel panel-default dashboard-panel">
                <div class="panel-body">
                    <div class="icon">
                        <i class="fa fa-list-alt"></i>
                    </div>
                    <p class="lead">Lịch sử</p>
                </div>
            </div>
        </a>
    </div>
    <div class="col-md-3">
        <a href="{{ route('auth.logout') }}" class="panel-link">
            <div class="panel panel-default dashboard-panel">
                <div class="panel-body">
                    <div class="icon">
                        <i class="fa fa-sign-out"></i>
                    </div>
                    <p class="lead">Thoát</p>
                </div>
            </div>
        </a>
    </div>
</div>
<div class="row">
    <div class="col-md-3">
        <a href="{{ route('invest.hop_dong') }}" class="panel-link">
            <div class="panel panel-default dashboard-panel">
                <div class="panel-body">
                    <div class="icon">
                        <p class="p-title-dash">{{$totalHD}}</p>
                    </div>
                    <p class="lead">Hợp đồng đầu tư</p>
                </div>
            </div>
        </a>
    </div>
    <div class="col-md-3">
        <a href="{{ route('invest.hop_dong') }}" class="panel-link">
            <div class="panel panel-default dashboard-panel">
                <div class="panel-body">
                    <div class="icon">
                        <p class="p-title-dash">
                            {{$strDate}}
                        </p>
                    </div>
                    <p class="lead">Ngày nhận lãi</p>
                </div>
            </div>
        </a>
    </div>
    <div class="col-md-3">
        <a href="{{ route('invest.hop_dong') }}" class="panel-link">
            <div class="panel panel-default dashboard-panel">
                <div class="panel-body">
                    <div class="icon">
                        <p class="p-title-dash p-title-dash-money">{{number_format($totalMoney)}}</p>
                    </div>
                    <p class="lead">Tổng tiền đầu tư</p>
                </div>
            </div>
        </a>
    </div>
</div>

<div class="row">
    <div class="col-md-8">
        <div class="panel panel-default">
            <div class="panel-heading">Biểu đồ</div>
            <div class="panel-body">
                <div>
                    <canvas id="myChart" height="400"></canvas>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="panel panel-default">
            <div class="panel-heading">Tin tức mới nhất</div>
            <div class="panel-body">
                {{--@if (count($latestRegistrations))
                    <div class="list-group">
                        @foreach ($latestRegistrations as $user)
                            <a href="{{ route('user.show', $user->id) }}" class="list-group-item">
                                <img class="img-circle" src="{{ $user->present()->avatar }}">
                                &nbsp; <strong>{{ $user->present()->nameOrEmail }}</strong>
                                <span class="list-time text-muted small">
                                    <em>{{ $user->created_at->diffForHumans() }}</em>
                                </span>
                            </a>
                        @endforeach
                    </div>
                    <a href="{{ route('user.list') }}" class="btn btn-default btn-block">@lang('app.view_all_users')</a>
                @else
                    <p class="text-muted">@lang('app.no_records_found')</p>
                @endif--}}
            </div>
        </div>
    </div>
</div>

@stop

@section('scripts')
    <script>
        var labels = {!! json_encode(array_keys($activities)) !!};
        var activities = {!! json_encode(array_values($activities)) !!};
    </script>
    {!! HTML::script('assets/js/chart.min.js') !!}
    {!! HTML::script('assets/js/as/dashboard-default.js') !!}
@stop