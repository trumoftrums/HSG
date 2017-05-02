@extends('layouts.frontend')

@section('page-title', 'HSG')

@section('content')
    <div class="title-header">
        <p class="title-after title-after-only">GIẢI PHÁP ĐẦU TƯ</p>
        <span class="span-date-update">Được cập nhật mới nhất: 15/03/2017</span>
    </div>
    <div class="giai-phap cong-bo-thong-tin">
        <ul class="ul-cover-tab">
            <li class="active"><a data-toggle="tab" href="#dt01"><img src="{{ url('assets/frontend/images/icon-dt02.png')}}"/></a></li>
            <li><a data-toggle="tab" href="#dt02"><img src="{{ url('assets/frontend/images/icon-dt01.png')}}"/></a></li>
            <li><a data-toggle="tab" href="#dt03"><img src="{{ url('assets/frontend/images/icon-dt03.png')}}"/></a></li>
            <li><a data-toggle="tab" href="#dt04"><img src="{{ url('assets/frontend/images/icon-dt04.png')}}"/></a></li>
            <li class="final-li"><a data-toggle="tab" href="#dt05"><img src="{{ url('assets/frontend/images/icon-dt05.png')}}"/></a></li>
        </ul>

        <div class="cover-tab tab-content">
            <div id="dt01" class="tab-pane fade tab-tmdt in active">
                <div class="giai-phap-left">
                    <div class="cover-title-giai-phap">
                        <h4 class="title-giai-phap">hệ thống hoạt động</h4>
                    </div>
                    <div class="cover-content-giai-phap cover-img-ipo">
                        <img src="{{ url('assets/frontend/images/ipo-01.png')}}"/>
                    </div>
                    <div class="cover-title-giai-phap">
                        <h4 class="title-giai-phap">báo cáo hoạt động đầu tư</h4>
                    </div>
                    <div class="cover-content-giai-phap" style="overflow-y: hidden;">
                        <div class="cover-chart-market">
                            <script type="text/javascript" src="https://s3.tradingview.com/external-embedding/embed-widget-market-overview.js">
                                {
                                    "showChart": true,
                                    "locale": "en",
                                    "width": "100%",
                                    "height": "500",
                                    "plotLineColorGrowing": "rgba(60, 188, 152, 1)",
                                    "plotLineColorFalling": "rgba(255, 74, 104, 1)",
                                    "gridLineColor": "rgba(233, 233, 234, 1)",
                                    "scaleFontColor": "rgba(218, 221, 224, 1)",
                                    "belowLineFillColorGrowing": "rgba(60, 188, 152, 0.05)",
                                    "belowLineFillColorFalling": "rgba(255, 74, 104, 0.05)",
                                    "symbolActiveColor": "rgba(242, 250, 254, 1)",
                                    "tabs": [
                                    {
                                        "title": "Forex",
                                        "symbols": [
                                            {
                                                "s": "FX:EURUSD"
                                            },
                                            {
                                                "s": "FX:GBPUSD"
                                            },
                                            {
                                                "s": "FX:USDJPY"
                                            },
                                            {
                                                "s": "FX:USDCHF"
                                            },
                                            {
                                                "s": "FX:AUDUSD"
                                            },
                                            {
                                                "s": "FX:USDCAD"
                                            }
                                        ]
                                    },
                                    {
                                        "title": "Equities",
                                        "symbols": [
                                            {
                                                "s": "INDEX:SPX",
                                                "d": "The Standard&Poor's Index"
                                            },
                                            {
                                                "s": "INDEX:IUXX",
                                                "d": "NQ100"
                                            },
                                            {
                                                "s": "INDEX:DOWI",
                                                "d": "Dow30"
                                            },
                                            {
                                                "s": "INDEX:NKY",
                                                "d": "Nikkei 225 Index"
                                            },
                                            {
                                                "s": "NASDAQ:AAPL",
                                                "d": "APPLE INC"
                                            },
                                            {
                                                "s": "NASDAQ:GOOG",
                                                "d": "Google"
                                            }
                                        ]
                                    },
                                    {
                                        "title": "Commodities",
                                        "symbols": [
                                            {
                                                "s": "CME_MINI:ES1!",
                                                "d": "Emini"
                                            },
                                            {
                                                "s": "CME:E61!",
                                                "d": "Euro"
                                            },
                                            {
                                                "s": "COMEX:GC1!",
                                                "d": "Gold"
                                            },
                                            {
                                                "s": "NYMEX:CL1!",
                                                "d": "Light Crude Oil Futures"
                                            },
                                            {
                                                "s": "NYMEX:NG1!",
                                                "d": "Natural Gas Futures"
                                            },
                                            {
                                                "s": "CBOT:ZC1!",
                                                "d": "Corn Futures"
                                            }
                                        ]
                                    },
                                    {
                                        "title": "Bonds",
                                        "symbols": [
                                            {
                                                "s": "CME:GE1!",
                                                "d": "Eurodollar"
                                            },
                                            {
                                                "s": "CBOT:ZB1!",
                                                "d": "T-Bond"
                                            },
                                            {
                                                "s": "CBOT:UD1!",
                                                "d": "Ultra T-Bond"
                                            },
                                            {
                                                "s": "EUREX:GG1!",
                                                "d": "Euro Bund"
                                            },
                                            {
                                                "s": "EUREX:II1!",
                                                "d": "Euro BTP"
                                            },
                                            {
                                                "s": "EUREX:HR1!",
                                                "d": "Euro BOBL"
                                            }
                                        ]
                                    }
                                ]
                                }
                            </script>
                            <!-- TradingView Widget END -->
                        </div>
                    </div>
                </div>
                <div class="giai-phap-right">
                    <div class="cover-title-giai-phap">
                        <h4 class="title-giai-phap">giấy phép hoạt động</h4>
                    </div>
                    <div class="cover-content-giai-phap">
                        <img class="img-certificate" src="{{ url('assets/frontend/images/certificate.png')}}"/>
                        <img class="img-certificate" src="{{ url('assets/frontend/images/certificate.png')}}"/>
                    </div>
                </div>
            </div>
            <div id="dt02" class="tab-pane fade">
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
                        </ul>
                    </div>
                </div>
            </div>
            <div id="dt03" class="tab-pane fade tab-tmdt">
                <img src="{{ url('assets/frontend/images/img-tmdt.png')}}"style="width: 99%;margin-bottom: 30px;"/>
                <div class="giai-phap-left">
                    <div class="cover-title-giai-phap">
                        <h4 class="title-giai-phap">hệ thống hoạt động</h4>
                    </div>
                    <div class="cover-content-giai-phap">
                        <p class="cover-img-vno">
                            <img src="{{ url('assets/frontend/images/img-abc.png')}}"/>
                            <span>
                                VietnamOTO.net là website rao vặt mua bán oto mới, cũ với nhiều dịch vụ hữu ích nhất dành cho khách hàng ở VN, được đầu tư mạnh mẽ từ nguồn lực từ Hoàng Sang Group, cùng với đó là chiến lược "dài hơi" hiệu quả đánh vào tâm lý thích "miễn phí" của người Việt. VietnamOTO sẽ ngày càng lớn mạnh và khẳng định vị trí trên thị trường.<br>
                                VietnamOTO với một giao diện website cực kì hiện đại, chuyên nghiệp các thao tác trên trang được thiết kế tối ưu hóa với người dùng, giúp cho dù là người lần đầu vào website này cũng dễ dàng thao tác trên trang.<br>
                                Khi đăng tin trên VietnamOTO bạn không cần phải qua nhiều thao tác phức tạp, các thao tác quản lý rất hiệu quả và dễ sử dụng. Chất lượng tin đăng là gần như không phải bàn cải, do lượng user rất đông, cùng với đội ngũ duyệt tin được đào tạo bài bản và đôi ngũ seoer sẽ giúp tin đăng của bạn được đưa tới người mua bằng nhiều hình thức tiếp cận khác nhau.
                            </span>
                        </p>
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
                        <h4 class="title-giai-phap">ngành nghề hoạt động</h4>
                    </div>
                    <div class="cover-content-giai-phap">
                        <div class="item-branch">
                            <img src="{{ url('assets/frontend/images/img-s1.png')}}"/>
                            <p>thương mại điện tử</p>
                        </div>
                        <div class="item-branch">
                            <img src="{{ url('assets/frontend/images/img-s2.png')}}"/>
                            <p>thiết kế website</p>
                        </div>
                        <div class="item-branch">
                            <img src="{{ url('assets/frontend/images/img-s3.png')}}"/>
                            <p>lập trình phần mềm</p>
                        </div>
                        <div class="item-branch">
                            <img src="{{ url('assets/frontend/images/img-s4.png')}}"/>
                            <p>gia công robot</p>
                        </div>
                    </div>
                </div>
            </div>
            <div id="dt04" class="tab-pane fade tab-cnsx">
                <img src="{{ url('assets/frontend/images/img-cnsx.png')}}"style="width: 99%;margin-bottom: 30px;"/>
                <div class="giai-phap-left">
                    <div class="cover-title-giai-phap">
                        <h4 class="title-giai-phap">ngành nghề hoạt động</h4>
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
                        <img src="{{ url('assets/frontend/images/chart01-cnsx.png')}}"/>
                        {{--<img src="{{ url('assets/frontend/images/chart02-cnsx.png')}}"/>--}}
                    </div>
                    <div class="cover-title-giai-phap">
                        <h4 class="title-giai-phap">hình ảnh hoạt động</h4>
                    </div>
                    <div class="cover-content-giai-phap">
                        <img class="img-item-cnsx" src="{{ url('assets/frontend/images/cnsx01.png')}}"/>
                        <img class="img-item-cnsx" src="{{ url('assets/frontend/images/cnsx02.png')}}"/>
                        <img class="img-item-cnsx" src="{{ url('assets/frontend/images/cnsx01.png')}}"/>
                        <img class="img-item-cnsx" src="{{ url('assets/frontend/images/cnsx02.png')}}"/>
                        <img class="img-item-cnsx" src="{{ url('assets/frontend/images/cnsx01.png')}}"/>
                        <img class="img-item-cnsx" src="{{ url('assets/frontend/images/cnsx02.png')}}"/>
                    </div>
                </div>
            </div>
            <div id="dt05" class="tab-pane fade">
                <p class="p-head-giai-phap"><b>GOLDLAND</b> là Công ty đầu tư bất động sản với vốn đầu tư lên hàng tỷ đồng. <b style="color: #d57d00;">Năm 2016 là năm Công ty mang lại lợi nhuận cao nhất 50.000.000.000</b>. Với mong muốn tạo bước nhảy cho các Doanh nghiệp nhỏ, cá nhân tài năng có những ý tưởng sáng tạo. HSG có quỹ khởi nghiệp hỗ trợ lên đến 1 tỷ để cụ thể hóa những ý tưởng thành hiện thực. Với điều này HSG hy vọng sẽ thúc đẩy sự phát triển của thị trường Việt Nam sánh ngang tầm quốc tế.</p>
                <div class="content-img">
                    <img src="{{ url('assets/frontend/images/img_kn.png')}}"/>
                </div>
            </div>
        </div>
    </div>
@stop
