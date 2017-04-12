@extends('layouts.app')

@section('page-title', trans('app.add_user'))

@section('content')

<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">
            ĐẦU TƯ VÀO HSG
            <img class="icon-bread" src="{{ url('assets/img/icon-next.png') }}"/>
            <span class="sp-bread">LÃI SUẤT BIẾN ĐỘNG</span>
        </h1>
    </div>
</div>

@include('partials.messages')
<div class="cover-invest">
    <h5 class="h5-title">TỔNG KẾT ĐẠI HỘI CỔ ĐÔNG LẦN THỨ 5, CHO RA LÃI XUẤT BIÊN ĐỘNG NHƯ SAU:</h5>
    <div class="cover-line">
        <div class="ele-div">
            <span class="sp-up">Từ ngày</span>
            <input type="text" class="inp-text"/>
        </div>
        <div class="ele-div">
            <span class="sp-up">Đến ngày</span>
            <input type="text" class="inp-text"/>
        </div>
        <div class="ele-div">
            <span class="sp-up">Lãi suất biên động</span>
            <input type="text" class="inp-text"/>
        </div>
    </div>
    <div class="cover-line">
        <input type="submit" class="inp-sub" value="Cập nhật & Lưu"/>
    </div>
</div>

@stop

@section('styles')
    {!! HTML::style('assets/css/bootstrap-datetimepicker.min.css') !!}
@stop

@section('scripts')
    {!! HTML::script('assets/js/moment.min.js') !!}
    {!! HTML::script('assets/js/bootstrap-datetimepicker.min.js') !!}
    {!! HTML::script('assets/js/as/profile.js') !!}
    {!! JsValidator::formRequest('Vanguard\Http\Requests\User\CreateUserRequest', '#user-form') !!}
@stop