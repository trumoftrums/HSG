@extends('layouts.frontend')

@section('page-title', 'HSG')

@section('content')
<div class="first-top">
    <div class="one">
        <div class="why-invest">
            <img class="img-header" src="{{ url('assets/frontend/images/bg-header.png') }}"/>
            <img class="icon-why-invest" src="{{ url('assets/frontend/images/icon-vi-sao-dau-tu.png') }}"/>
            <p class="date-author">08/03/2017 | Được viết bởi: ông Lê Hoàng Thái Sang(CEO)</p>
        </div>
        <div class="slide-why-invest">
            <div class="carousel slide" data-ride="carousel">
                <div class="carousel-inner" role="listbox">
                    <div class="item active">
                        <img src="{{ url('assets/frontend/images/slides/img1.png') }}"/>
                    </div>
                    <div class="item">
                        <img src="{{ url('assets/frontend/images/slides/img1.png') }}"/>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="two">
        <div class="up">
            <div class="item-service">
                <img class="img-service" src="{{ url('assets/frontend/images/giai-phap-dau-tu.png')}}"/>
                <div class="cover-title">
                    <a href="{{ route('frontend.giaiphapdautu') }}"><img class="img-title-01" src="{{ url('assets/frontend/images/title-service-01.png')}}"/></a>
                    <p class="date-author right-p">Được viết bởi: ông Lê Hoàng Thái Sang (CEO)</p>
                </div>
                <div class="cover-content-item">
                    <div class="icon-item">
                        <img src="{{ url('assets/frontend/images/icon-bds.png')}}"/>
                        <p>Bất Động Sản</p>
                    </div>
                    <div class="icon-item">
                        <img src="{{ url('assets/frontend/images/icon-ipo.png')}}"/>
                        <p>Thị Trường IPO</p>
                    </div>
                    <div class="icon-item">
                        <img src="{{ url('assets/frontend/images/icon-tmdt.png')}}"/>
                        <p>Thương Mại Điện Tử</p>
                    </div>
                    <div class="icon-item" style="margin-left: 17%;">
                        <img src="{{ url('assets/frontend/images/icon-chan-nuoi.png')}}"/>
                        <p>Chăn Nuôi</p>
                    </div>
                    <div class="icon-item">
                        <img src="{{ url('assets/frontend/images/icon-dau-tu-khoi-nghiep.png')}}"/>
                        <p>Quỹ Đầu Tư Khởi Nghiệp</p>
                    </div>
                </div>
            </div>
            <div class="item-service">
                <img class="img-service" src="{{ url('assets/frontend/images/nha-dau-tu.png')}}"/>
                <div class="cover-title">
                    <a href="{{ route('frontend.baocaotaichinh') }}"><img class="img-title-02" src="{{ url('assets/frontend/images/title-service-02.png')}}"/></a>
                    <p class="date-author right-p">Được viết bởi: ông Lê Hoàng Thái Sang (CEO)</p>
                </div>
                <div class="cover-content-item">
                    <ul>
                        <li>
                            <input type="checkbox" checked/><span>Công bố thông tin</span>
                        </li>
                        <li>
                            <input type="checkbox" checked/><span>Lịch hoạt động của quỹ</span>
                        </li>
                        <li>
                            <input type="checkbox" checked/><span>Hỏi và đáp</span>
                        </li>
                        <li>
                            <input type="checkbox" checked/><span>Hỗ trợ tư vấn tài chính</span>
                        </li>
                        <li>
                            <input type="checkbox" checked/><span>Báo cáo tài chính</span>
                        </li>
                    </ul>
                    <a class="view-more" href="{{ route('frontend.baocaotaichinh') }}">Tìm hiểu thêm</a>
                </div>
            </div>
        </div>
        <div class="bottom">
            <div class="item-service">
                <img class="img-service" src="{{ url('assets/frontend/images/kien-thuc-tai-chinh.png')}}"/>
                <div class="cover-title">
                    <a href="{{ route('frontend.dautu') }}"><img class="img-title-03" src="{{ url('assets/frontend/images/title-service-03.png')}}"/></a>
                    <p class="date-author right-p">Được viết bởi: ông Lê Hoàng Thái Sang (CEO)</p>
                </div>
                <div class="cover-content-item">
                    <h4><img src="{{ url('assets/frontend/images/icon-mo-khoa-kien-thuc.png')}}"/>CÙNG HSG MỞ KHÓA KIẾN THỨC QLTC</h4>
                    <p class="p-service">Chúng ta thảo luận rất nhiều về kinh tế nhưng đôi khi lại bỏ qua những điều cơ bản. Những gì <b>HOÀNG SANG GROUP</b> chia sẻ hy vọng sẽ giúp bạn cấu trúc lại kiến thức kinh tế của mình.</p>
                    <a class="view-more" href="{{ route('frontend.dautu') }}">Tìm hiểu thêm</a>
                </div>
            </div>
            <div class="item-service">
                <img class="img-service" src="{{ url('assets/frontend/images/tuyen-dung.png')}}"/>
                <div class="cover-title">
                    <a href="{ route('frontend.tuyendung') }}"><img class="img-title-04" src="{{ url('assets/frontend/images/title-service-04.png')}}"/></a>
                    <p class="date-author right-p">Được viết bởi: ông Lê Hoàng Thái Sang (CEO)</p>
                </div>
                <div class="cover-content-item">
                    <h4><img src="{{ url('assets/frontend/images/icon-khoi-nghiep-dam-me.png')}}"/>CÙNG HSG KHỞI NGHIỆP ĐAM MÊ</h4>
                    <p class="p-service">Hiện tại HOÀNG SANG GROUP đang tìm kiếm những ứng viên có niềm đam mê với lĩnh vực tài chính. Chúng tôi sẽ rất hạnh phúc khi có được sự hợp tác của các bạn.</p>
                    <a class="view-more" href="{ route('frontend.tuyendung') }}">Tìm hiểu thêm</a>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="second-bottom">
    <img class="img-slogan" src="{{ url('assets/frontend/images/bg-title.png')}}"/>
    <div class="item-thong-diep">
        <div class="left">
            <img src="{{ url('assets/frontend/images/img-ceo.png')}}">
            <p>Ô.LÊ HOÀNG THÁI SANG</p>
            <span>(CEO HoangSangGroup)</span>
        </div>
        <div class="right">
            <div class="cover-p-thong-diep">
                <img class="phay-left" src="{{ url('assets/frontend/images/phay-left.png')}}"/>
                <p>ĐẢM BẢO LỢI NHUẬN CHO KHÁCH HÀNG LÀ ƯU TIÊN HÀNG ĐẦU CỦA HSG</p>
                <img class="phay-right" src="{{ url('assets/frontend/images/phay-right.png')}}"/>
            </div>
            <p class="p-content-thong-diep">
                Với sự liên kết với Ngân hàng Eximbank và Công ty bảo hiểm Prudential đảm bảo. Chúng tôi cam đoan Khách hàng sẽ luôn được đảm bảo lợi nhuận mà không cần lo lắng vốn đầu tư sẽ hao hụt.
                Mục tiêu của Hoàng Sang Group sẽ trở thành công ty đầu tư tài chính UY TÍN - CHẤT LƯƠNG hàng đầu VN.
            </p>
        </div>
    </div>
    <div class="item-thong-diep">
        <div class="left">
            <img src="{{ url('assets/frontend/images/img-ceo.png')}}">
            <p>Ô.LÊ HOÀNG THÁI SANG</p>
            <span>(CEO HoangSangGroup)</span>
        </div>
        <div class="right">
            <div class="cover-p-thong-diep">
                <img class="phay-left" src="{{ url('assets/frontend/images/phay-left.png')}}"/>
                <p>ĐẢM BẢO LỢI NHUẬN CHO KHÁCH HÀNG LÀ ƯU TIÊN HÀNG ĐẦU CỦA HSG</p>
                <img class="phay-right" src="{{ url('assets/frontend/images/phay-right.png')}}"/>
            </div>
            <p class="p-content-thong-diep">
                Với sự liên kết với Ngân hàng Eximbank và Công ty bảo hiểm Prudential đảm bảo. Chúng tôi cam đoan Khách hàng sẽ luôn được đảm bảo lợi nhuận mà không cần lo lắng vốn đầu tư sẽ hao hụt.
                Mục tiêu của Hoàng Sang Group sẽ trở thành công ty đầu tư tài chính UY TÍN - CHẤT LƯƠNG hàng đầu VN.
            </p>
        </div>
    </div>
    <div class="item-thong-diep">
        <div class="left">
            <img src="{{ url('assets/frontend/images/img-ceo.png')}}">
            <p>Ô.LÊ HOÀNG THÁI SANG</p>
            <span>(CEO HoangSangGroup)</span>
        </div>
        <div class="right">
            <div class="cover-p-thong-diep">
                <img class="phay-left" src="{{ url('assets/frontend/images/phay-left.png')}}"/>
                <p>ĐẢM BẢO LỢI NHUẬN CHO KHÁCH HÀNG LÀ ƯU TIÊN HÀNG ĐẦU CỦA HSG</p>
                <img class="phay-right" src="{{ url('assets/frontend/images/phay-right.png')}}"/>
            </div>
            <p class="p-content-thong-diep">
                Với sự liên kết với Ngân hàng Eximbank và Công ty bảo hiểm Prudential đảm bảo. Chúng tôi cam đoan Khách hàng sẽ luôn được đảm bảo lợi nhuận mà không cần lo lắng vốn đầu tư sẽ hao hụt.
                Mục tiêu của Hoàng Sang Group sẽ trở thành công ty đầu tư tài chính UY TÍN - CHẤT LƯƠNG hàng đầu VN.
            </p>
        </div>
    </div>
    <div class="item-thong-diep">
        <div class="left">
            <img src="{{ url('assets/frontend/images/img-ceo.png')}}">
            <p>Ô.LÊ HOÀNG THÁI SANG</p>
            <span>(CEO HoangSangGroup)</span>
        </div>
        <div class="right">
            <div class="cover-p-thong-diep">
                <img class="phay-left" src="{{ url('assets/frontend/images/phay-left.png')}}"/>
                <p>ĐẢM BẢO LỢI NHUẬN CHO KHÁCH HÀNG LÀ ƯU TIÊN HÀNG ĐẦU CỦA HSG</p>
                <img class="phay-right" src="{{ url('assets/frontend/images/phay-right.png')}}"/>
            </div>
            <div class="p-content-thong-diep">
                Với sự liên kết với Ngân hàng Eximbank và Công ty bảo hiểm Prudential đảm bảo. Chúng tôi cam đoan Khách hàng sẽ luôn được đảm bảo lợi nhuận mà không cần lo lắng vốn đầu tư sẽ hao hụt.
                Mục tiêu của Hoàng Sang Group sẽ trở thành công ty đầu tư tài chính UY TÍN - CHẤT LƯƠNG hàng đầu VN.
            </div>
        </div>
    </div>
</div>
@stop
