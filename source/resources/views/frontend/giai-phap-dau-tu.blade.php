@extends('layouts.frontend')

@section('page-title', 'HSG')

@section('content')
    <div class="title-header">
        <p class="title-after title-after-only">GIẢI PHÁP ĐẦU TƯ</p>
        <span class="span-date-update">Được cập nhật mới nhất: 15/03/2017</span>
    </div>
    <div class="giai-phap cong-bo-thong-tin">
        <ul class="ul-cover-tab">
            <li class="active"><a data-toggle="tab" href="#dt01"><img src="{{ url('assets/frontend/images/icon-dt01.png')}}"/></a></li>
            <li><a data-toggle="tab" href="#dt02"><img src="{{ url('assets/frontend/images/icon-dt02.png')}}"/></a></li>
            <li><a data-toggle="tab" href="#dt03"><img src="{{ url('assets/frontend/images/icon-dt03.png')}}"/></a></li>
            <li><a data-toggle="tab" href="#dt04"><img src="{{ url('assets/frontend/images/icon-dt04.png')}}"/></a></li>
            <li class="final-li"><a data-toggle="tab" href="#dt05"><img src="{{ url('assets/frontend/images/icon-dt05.png')}}"/></a></li>
        </ul>

        <div class="cover-tab tab-content">
            <div id="dt01" class="tab-pane fade in active">
                <p class="p-head-giai-phap"><b>GOLDLAND</b> là Công ty đầu tư bất động sản với vốn đầu tư lên hàng tỷ đồng. <b style="color: #d57d00;">Năm 2016 là năm Công ty mang lại lợi nhuận cao nhất 50.000.000.000</b>. Năm 2017 với nhiếu dự án sắp triển khai và bán ra thị trường hứa hẹn sẽ mang lại nguồn <b style="color: #d57d00;">doanh thu cao hơn năm 2016</b>. <b>GOLDLAND</b> luôn chào đón các đối tác muốn đầu tư vào các dự án của Chúng Tôi. Chúng tôi đảm bảo <b style="color: #d57d00;">lợi nhuận 100%.</b></p>
                <div class="giai-phap-left">
                    <div class="cover-title-giai-phap">
                        <h4 class="title-giai-phap">vì sao đầu tư?</h4>
                    </div>
                    <div class="cover-content-giai-phap">

                    </div>
                    <div class="cover-title-giai-phap">
                        <h4 class="title-giai-phap">thông tin chung</h4>
                    </div>
                    <div class="cover-content-giai-phap">
                        <ul class="ul-muctieu">
                            <li><p class="text-no-icon">Tên Công ty:</p></li>
                            <li><p class="text-no-icon">Năm thành lập:</p></li>
                            <li><p class="text-no-icon">Giấy phép:</p></li>
                            <li><p class="text-no-icon">Vốn đầu tư:</p></li>
                            <li><p class="text-no-icon">Đối tác:</p></li>
                            <li><p class="text-no-icon">Liên lạc:</p></li>
                            <li><p class="text-no-icon">Địa Chỉ:</p></li>
                        </ul>
                    </div>
                    <div class="cover-title-giai-phap">
                        <h4 class="title-giai-phap">mục tiêu nam 2017</h4>
                    </div>
                    <div class="cover-content-giai-phap">
                        <ul class="ul-muctieu">
                            <li><p class="text-icon-pre">Mở 10 dự án đầu tư tung ra thị trường. Đạt doanh thu khoảng 10.000.000.000VND</p></li>
                            <li><p class="text-icon-pre">Mở 10 dự án đầu tư tung ra thị trường. Đạt doanh thu khoảng 10.000.000.000VND</p></li>
                            <li><p class="text-icon-pre">Mở 10 dự án đầu tư tung ra thị trường. Đạt doanh thu khoảng 10.000.000.000VND</p></li>
                            <li><p class="text-icon-pre">Mở 10 dự án đầu tư tung ra thị trường. Đạt doanh thu khoảng 10.000.000.000VND</p></li>
                            <li><p class="text-icon-pre">Mở 10 dự án đầu tư tung ra thị trường. Đạt doanh thu khoảng 10.000.000.000VND</p></li>
                            <li><p class="text-icon-pre">Mở 10 dự án đầu tư tung ra thị trường. Đạt doanh thu khoảng 10.000.000.000VND</p></li>
                            <li><p class="text-icon-pre">Mở 10 dự án đầu tư tung ra thị trường. Đạt doanh thu khoảng 10.000.000.000VND</p></li>
                            <li><p class="text-icon-pre">Mở 10 dự án đầu tư tung ra thị trường. Đạt doanh thu khoảng 10.000.000.000VND</p></li>
                        </ul>
                    </div>
                    <div class="cover-title-giai-phap">
                        <h4 class="title-giai-phap">hướng dẫn đầu tư</h4>
                    </div>
                    <div class="cover-content-giai-phap">
                        <img src="{{ url('assets/frontend/images/img-giai-phap-dau-tu.png')}}"/>
                    </div>
                </div>
                <div class="giai-phap-right">
                    <div class="cover-title-giai-phap">
                        <h4 class="title-giai-phap">biểu đồ hoạt động</h4>
                    </div>
                    <div class="cover-content-giai-phap">
                        <img src="{{ url('assets/frontend/images/chart01.png')}}"/>
                        <img src="{{ url('assets/frontend/images/chart02.png')}}"/>
                    </div>
                    <div class="cover-title-giai-phap">
                        <h4 class="title-giai-phap">báo cáo dự án năm 2016</h4>
                    </div>
                    <div class="cover-content-giai-phap">
                        <ul class="ul-muctieu">
                            <li>
                                <a href="#" class="a-muctieu a-muctieu-left">Dự án khu chung cư blabla - 10 tỷ (2/2016)</a>
                                <a href="#" class="a-muctieu a-muctieu-right">Tải tài liệu</a>
                            </li>
                            <li>
                                <a href="#" class="a-muctieu a-muctieu-left">Dự án khu chung cư blabla - 10 tỷ (2/2016)</a>
                                <a href="#" class="a-muctieu a-muctieu-right">Tải tài liệu</a>
                            </li>
                            <li>
                                <a href="#" class="a-muctieu a-muctieu-left">Dự án khu chung cư blabla - 10 tỷ (2/2016)</a>
                                <a href="#" class="a-muctieu a-muctieu-right">Tải tài liệu</a>
                            </li>
                            <li>
                                <a href="#" class="a-muctieu a-muctieu-left">Dự án khu chung cư blabla - 10 tỷ (2/2016)</a>
                                <a href="#" class="a-muctieu a-muctieu-right">Tải tài liệu</a>
                            </li>
                            <li>
                                <a href="#" class="a-muctieu a-muctieu-left">Dự án khu chung cư blabla - 10 tỷ (2/2016)</a>
                                <a href="#" class="a-muctieu a-muctieu-right">Tải tài liệu</a>
                            </li>
                            <li>
                                <a href="#" class="a-muctieu a-muctieu-left">Dự án khu chung cư blabla - 10 tỷ (2/2016)</a>
                                <a href="#" class="a-muctieu a-muctieu-right">Tải tài liệu</a>
                            </li>
                            <li>
                                <a href="#" class="a-muctieu a-muctieu-left">Dự án khu chung cư blabla - 10 tỷ (2/2016)</a>
                                <a href="#" class="a-muctieu a-muctieu-right">Tải tài liệu</a>
                            </li>
                            <li>
                                <a href="#" class="a-muctieu a-muctieu-left">Dự án khu chung cư blabla - 10 tỷ (2/2016)</a>
                                <a href="#" class="a-muctieu a-muctieu-right">Tải tài liệu</a>
                            </li>
                            <li>
                                <a href="#" class="a-muctieu a-muctieu-left">Dự án khu chung cư blabla - 10 tỷ (2/2016)</a>
                                <a href="#" class="a-muctieu a-muctieu-right">Tải tài liệu</a>
                            </li>
                            <li>
                                <a href="#" class="a-muctieu a-muctieu-left">Dự án khu chung cư blabla - 10 tỷ (2/2016)</a>
                                <a href="#" class="a-muctieu a-muctieu-right">Tải tài liệu</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div id="dt02" class="tab-pane fade">
            </div>
            <div id="dt03" class="tab-pane fade">

            </div>
            <div id="dt04" class="tab-pane fade">

            </div>
            <div id="dt05" class="tab-pane fade">

            </div>
        </div>
    </div>
@stop
