@extends('layouts.frontend')

@section('page-title', 'HSG')

@section('content')
    <div class="title-header">
        <p class="title-after title-after-only">LIÊN HỆ</p>
        <span class="span-date-update">Được cập nhật mới nhất: 15/03/2017</span>
    </div>
    <div class="kien-thuc-tai-chinh-detail">
        <div class="detail-news-left">
            <p class="p-about-header">
                HSG luôn tiếp thu mọi ý kiến đóng góp của Khách hàng để ngày càng hoàn thiện dịch vụ của Chúng tôi. Bên cạnh đó Chúng tôi luôn chào đón những Khách hàng có nhu cầu hợp tác với HSG.
            </p>
            <div class="kien-thuc-tai-chinh hoi-dap">
                <img class="img-header-tuyen-dung" src="{{ url('assets/frontend/images/img-lien-he.png')}}"/>
                <div class="form-tuyen-dung">
                    <div class="item-form">
                        <input class="inp-td" name="email" placeholder="Nhập email của bạn">
                        <input class="inp-td inp-right" name="email" placeholder="Nhập số điện thoại">
                    </div>
                    <div class="item-form">
                        <textarea class="area-desc area-contact" placeholder="Nhập nội dung tin nhắn"></textarea>
                    </div>
                    <div class="item-form">
                        <input class="inp-sub" type="submit" value="gửi tin">
                    </div>
                </div>
            </div>
        </div>
        <div class="list-news-related-right">
            <div class="cover-p-title-list-news">
                <p class="p-title-list-news">Liên hệ online</p>
            </div>
            <div class="list-news-right">

            </div>
            <div class="cover-p-title-list-news">
                <p class="p-title-list-news">Hotline ban lãnh đạo</p>
            </div>
            <div class="list-news-right">

            </div>
        </div>
    </div>
@stop
