@extends('layouts.frontend')

@section('page-title', 'HSG')

@section('content')
    <div class="title-header">
        <p class="title-root">GIỚI THIỆU</p>
        <p class="title-after">NHÂN SỰ</p>
        <span class="span-date-update">Được cập nhật mới nhất: 15/03/2017</span>
    </div>
    <p class="p-about-header">
        Đội ngũ của HOÀNG SANG GROUP bao gồm những chuyên gia nhiều kinh nghiệm về quản lý quỹ đầu tư luôn đặt lợi ích của của nhà đầu tư lên hàng đầu.
    </p>
    <div class="nhan-su">
        <img src="{{ url('assets/frontend/images/hoi-dong-quan-tri.png')}}"/>
        <img src="{{ url('assets/frontend/images/ban-lanh-dao.png')}}"/>
        <img src="{{ url('assets/frontend/images/ban-quan-ly.png')}}"/>
    </div>
@stop
