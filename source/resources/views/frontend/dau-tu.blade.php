@extends('layouts.frontend')

@section('page-title', 'HSG')

@section('content')
    <div class="title-header">
        <p class="title-root">KIẾN THỨC TÀI CHÍNH</p>
        <p class="title-after">ĐẦU TƯ</p>
        <span class="span-date-update">Được cập nhật mới nhất: 15/03/2017</span>
    </div>
    <p class="p-about-header">
        Khi kiếm tiền là động lực chính, bạn sẽ có thêm quyết tâm học hỏi những kinh nghiệm của người thành công. Một cách phổ biến đó là thuê cố vấn tài chính. Nhưng nếu bạn chưa thể tìm ra ai đó đủ năng lực, HSG đưa ra một số kiến thức về kiến thức đầu tư tài chính cho bạn tham khảo. Hy vọng bạn sẽ quyết định được mục tiêu đầu tư chính xác nhất.
    </p>
    <div class="kien-thuc-tai-chinh">
        <div class="item-news">
            <div class="hover-item">
                <div class="cover-zoom">
                    <a href="kien-thuc-tai-chinh-dau-tu-detail.html"><img src="{{ url('assets/frontend/images/icon-zoom.png')}}"></a>
                    <a class="detail" href="kien-thuc-tai-chinh-dau-tu-detail.html">Xem Chi Tiết</a>
                </div>
            </div>
            <img class="thumb-item-news" src="{{ url('assets/frontend/images/img-dau-tu-1.png')}}"/>
            <div class="content-item-news">
                <div class="title-item-news">
                    <h4>Nên đầu tư dài hạn hay lướt sóng?</h4>
                    <span>Đăng bởi Trung Tran - 20/03/2017</span>
                </div>
                <p class="summary-item-news">Nên đầu tư dài hạn hay lướt sóng là một câu hỏi được khá nhiều nhà đầu tư hiện nay quan tâm. Dưới đây là một số...</p>
            </div>
        </div>
        <div class="paging-news">
            <ul class="pagination pagination-sm">
                <li><a href="#">1</a></li>
                <li><a href="#">2</a></li>
                <li><a href="#">3</a></li>
                <li><a href="#">4</a></li>
                <li><a href="#">5</a></li>
            </ul>
        </div>
    </div>
@stop
