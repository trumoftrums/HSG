<div class="side-bar">
    <div class="cover-logo">
        <a href="{{ route('frontend.home') }}">
            <img src="{{ url('assets/frontend/images/logo.png')}}"/>
        </a>
    </div>
    <div class="menu-bar">
        <ul id="nav">
            <li class="parent has-child"><a href="#">Giới thiệu</a></li>
            <li>
                <ul>
                    <li class="child"><a href="ho-so-cong-ty.html">Hồ sơ công ty</a></li>
                    <li class="child"><a href="nhan-su.html">Nhân sự</a></li>
                    <li class="child"><a href="doi-tac-cua-chung-toi.html">Đối tác của chúng tôi</a></li>
                </ul>
            </li>
            <li class="parent"><a href="giai-phap-dau-tu.html">Giải pháp đầu tư</a></li>
            <li class="parent has-child"><a href="#">Kiến thức tài chính</a></li>
            <li>
                <ul>
                    <li class="child"><a href="kien-thuc-tai-chinh-dau-tu.html">Đầu tư</a></li>
                    <li class="child"><a href="kien-thuc-tai-chinh-dau-tu.html">Quỹ mở</a></li>
                    <li class="child"><a href="kien-thuc-tai-chinh-dau-tu.html">Quản lý tài chính cá nhân</a></li>
                    <li class="child"><a href="kien-thuc-tai-chinh-dau-tu.html">Hưu trí</a></li>
                </ul>
            </li>
            <li class="parent has-child"><a href="#">Quan hệ nhà đầu tư</a></li>
            <li>
                <ul>
                    <li class="child"><a href="quan-he-nha-dau-tu-bao-cao-tai-chinh.html">Báo cáo tài chính</a></li>
                    <li class="child"><a href="quan-he-nha-dau-tu-cong-bo-thong-tin.html">Công bố thông tin</a></li>
                    <li class="child"><a href="quan-he-nha-dau-tu-hoi-dap.html">Hỏi đáp</a></li>
                    <li class="child"><a href="quan-he-nha-dau-tu-tin-tuc.html">Tin tức</a></li>
                </ul>
            </li>
            <li class="parent"><a href="{{ route('frontend.tuyendung') }}">Tuyển dụng</a></li>
            <li class="parent"><a href="{{ route('frontend.lienhe') }}">Liên hệ</a></li>
        </ul>
        <a href="http://private.hoangsanggroup.com" target="_blank" class="private-page">
            <img src=".{{ url('assets/frontend/images/icon-user-page.png')}}"> Văn phòng cá nhân
        </a>
    </div>
</div>