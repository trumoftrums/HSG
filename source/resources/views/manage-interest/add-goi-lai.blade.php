@extends('layouts.app')

@section('page-title', trans('app.add_user'))

@section('content')
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">
            ĐẦU TƯ VÀO HSG
            <img class="icon-bread" src="{{ url('assets/img/icon-next.png') }}"/>
            <span class="sp-bread">TẠO GÓI LÃI</span>
        </h1>
    </div>
</div>

@include('partials.messages')
<div class="cover-invest-admin1">
    <div class="cover-line">
        <div class="ele-div">
            <span class="sp-line">NHẬP KỲ HẠN</span>
            <input type="text" class="inp-text"/>
            <div class="cover-check">
                <label class="rad-lk radio-inline"><input type="radio" name="radio-laikep">Tháng</label>
                <label class="rad-lk radio-inline"><input type="radio" name="radio-laikep">Năm</label>
            </div>
        </div>
    </div>
    <div class="cover-line">
        <div class="ele-div">
            <span class="sp-line">LÃI SUẤT ÁP DỤNG CHO KỲ HẠN</span>
            <input type="text" class="inp-text"/> <span class="sp-percent"> %</span>
        </div>
    </div>
    <div class="cover-line">
        <div class="ele-div">
            <span class="sp-line">CHO PHÉP LÃI KÉP: </span>
            <div class="cover-check">
                <label class="rad-lk radio-inline"><input type="radio" name="radio-laikep">Có</label>
                <label class="rad-lk radio-inline"><input type="radio" name="radio-laikep">Không</label>
            </div>
        </div>
    </div>
    <div class="cover-line-new">
        <h5 class="h5-phat-hoan-von">PHẠT HOÀN VỐN TRƯỚC KỲ HẠN</h5>
    </div>
    <div class="cover-line">
        <p class="p-muc-phat">Mức phạt 1:</p>
    </div>
    <div class="cover-line">
        <div class="ele-div">
            <span class="sp-line has-width">Từ tháng: </span>
            <input type="text" class="inp-text"/>
        </div>
        <div class="ele-div">
            <span class="sp-line has-width">Đến tháng: </span>
            <input type="text" class="inp-text"/>
        </div>
        <div class="ele-div">
            <span class="sp-line has-width">% Mức phạt: </span>
            <input type="text" class="inp-text"/>
        </div>
    </div>
    <div class="cover-line">
        <p class="p-muc-phat">Mức phạt 2:</p>
    </div>
    <div class="cover-line">
        <div class="ele-div">
            <span class="sp-line has-width">Từ tháng: </span>
            <input type="text" class="inp-text"/>
        </div>
        <div class="ele-div">
            <span class="sp-line has-width">Đến tháng: </span>
            <input type="text" class="inp-text"/>
        </div>
        <div class="ele-div">
            <span class="sp-line has-width">% Mức phạt: </span>
            <input type="text" class="inp-text"/>
        </div>
    </div>
    <div class="cover-line">
        <p class="p-muc-phat">Mức phạt 3:</p>
    </div>
    <div class="cover-line">
        <div class="ele-div">
            <span class="sp-line has-width">Từ tháng: </span>
            <input type="text" class="inp-text"/>
        </div>
        <div class="ele-div">
            <span class="sp-line has-width">Đến tháng: </span>
            <input type="text" class="inp-text"/>
        </div>
        <div class="ele-div">
            <span class="sp-line has-width">% Mức phạt: </span>
            <input type="text" class="inp-text"/>
        </div>
    </div>
    <div class="cover-line">
        <input type="submit" class="inp-sub" value="Lưu gói mới"/>
    </div>
</div>
<script>
    $( "#datepicker1" ).datepicker({ dateFormat: 'yy-mm-dd' });
    $( "#datepicker2" ).datepicker({ dateFormat: 'yy-mm-dd' });
</script>
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