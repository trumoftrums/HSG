@extends('layouts.frontend')

@section('page-title', 'HSG')

@section('content')
    <div class="title-header">
        <p class="title-root">QUAN HỆ NHÀ ĐẦU TƯ</p>
        <p class="title-after">BÁO CÁO TÀI CHÍNH</p>
        <span class="span-date-update">Được cập nhật mới nhất: 15/03/2017</span>
    </div>
    <p class="p-about-header">
        HSG luôn công khai và báo cáo về tình hình tài sản, vốn chủ sở hữ và công nợ cũng như tình hình tài chính, kết quả kinh doanh, tình hình lưu chuyển tiền tệ và khà năng sinh lời hàng kỳ hàng quý của Chúng tôi. Điều này sẽ giúp cho Khách hàng đánh giá, phân tích và dự đoán tình hình tài chính, kết quà hoạt động của Chúng tôi.
    </p>
    <div class="doi-tac cong-bo-thong-tin">
        <div class="item-congbothongtin item01">
            <img class="thumb-congbothongtin" src="{{ url('assets/frontend/images/tai-chinh-01.png')}}"/>
            <div class="cover-list-item-congbo">
                <div class="item-congbothongtin-download">
                    <img src="{{ url('assets/frontend/images/icon-file-tai-chinh.png')}}"/>
                    <div class="cover-congbothongtin-right">
                        <a href="http://local.private.hoangsanggroup.com/ban-lanh-dao-hsg">Bao cao tai chinh ban nien duoc kiem toan 2016</a>
                        <span>15/08/2016</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
