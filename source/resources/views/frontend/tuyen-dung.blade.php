@extends('layouts.frontend')

@section('page-title', 'HSG')

@section('content')
    <div class="title-header">
        <p class="title-after title-after-only">TUYỂN DỤNG</p>
        <span class="span-date-update">Được cập nhật mới nhất: 15/03/2017</span>
    </div>
    <div class="kien-thuc-tai-chinh-detail">
        <div class="detail-news-left">
            <p class="p-about-header">
                HSG luôn chào đón những con người đầy nhiệt huyết và nhiều hoài bão. HSG luôn mong muốn là nơi tạo
                dựng một môi trường tương
                tác thực tế nhất, là nơi mang đến tương lai cho các bạn. HSG sẽ là nơi bạn cống hiến toàn bộ năng
                lực của bản thân.
            </p>
            <div class="kien-thuc-tai-chinh hoi-dap">
                <img class="img-header-tuyen-dung" src="{{ url('assets/frontend/images/img-tuyen-dung.png')}}"/>
                <h3 class="h3-tuyen-dung">HIỆN NAY HOÀNG SANG GROUP ĐANG TUYỂN DỤNG NHỮNG VỊ TRÍ:</h3>
                <ul class="ul-tuyendung">
                    <li><p>1. Chuyên viên phát triển kinh doanh: <b class="b-pos">2 vị trí</b></p></li>
                    <li><p>2. Chuyên viên phân tích kinh doanh: <b class="b-pos">3 vị trí</b></p></li>
                    <li><p>3. Trưởng phòng phát triển kinh doanh – TPHCM: <b class="b-pos">1 vị trí</b></p></li>
                </ul>
                <div class="form-tuyen-dung">
                    <div class="item-form">
                        <input class="inp-td" name="email" placeholder="Nhập email của bạn">
                        <input class="inp-td inp-right" name="email" placeholder="Nhập số điện thoại">
                    </div>
                    <div class="item-form">
                        <textarea class="area-desc" placeholder="Mô tả bản thân"></textarea>
                        <select class="inp-td inp-right inp-select">
                            <option>Click chọn vị trí ứng tuyển</option>
                            <option>Trưởng phòng thiết kế</option>
                        </select>
                        <input class="inp-td inp-file inp-right" type="file" name="file">
                    </div>
                    <div class="item-form">
                        <input class="inp-sub" type="submit" value="Nộp đơn ngay">
                    </div>
                </div>
            </div>
        </div>
        <div class="list-news-related-right">
            <div class="cover-p-title-list-news">
                <p class="p-title-list-news">Mục liên quan</p>
            </div>
            <div class="list-news-right">

            </div>
            <div class="cover-p-title-list-news">
                <p class="p-title-list-news">Liên hệ tuyển dụng</p>
            </div>
            <div class="list-news-right">
                <ul class="info-td">
                    <li><p class="p-td-title">Ứng viên quan tâm gửi hồ sơ về:</p></li>
                    <li><p><span>Email:</span> customerservice@vietnamoto.net</p></li>
                    <li><p><span>Phone:</span> 089 815 4544 - Phòng nhân sự</p></li>
                    <li><p><span>Cell phone:</span> 0969 022 307 – Mr.Trung</p></li>
                    <li><p><span>Address:</span> 02 Phạm Văn Đồng, Phường Linh Đông, Quận Thủ Đức, Thành phố Hồ Chí Minh</p></li>
                </ul>
            </div>
        </div>
    </div>
@stop
