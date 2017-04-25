@extends('layouts.frontend')

@section('page-title', 'HSG')

@section('content')
    <div class="title-header">
        <p class="title-root">GIỚI THIỆU</p>
        <p class="title-after">HỒ SƠ CÔNG TY</p>
        <span class="span-date-update">Được cập nhật mới nhất: 15/03/2017</span>
    </div>
    <p class="p-about-header">
        Hoạt động của HSG tập trung vào những việc đảm bảo tạo ra lợi nhuận cho khách hàng. Đây là tôn chỉ và nền tảng để chúng tôi xây dựng thương hiệu, sản phẩm và dịch vụ. Chúng tôi cung cấp những giải pháp đầu tư và quản lí tài sản tốt nhất để từ đó khách hàng có thể yên tâm đầu tư vào những gì thật sự ý nghĩa.
    </p>
    <div class="about-up">
        <div class="item-about">
            <div class="cover-title-item-about">
                <h3 class="title-item-about">TỒNG QUAN VỀ HSG</h3>
            </div>
            <p>- Công ty TNHH Đầu Tư & Công Nghệ HOÀNG SANG là công ty quản lý quỹ trong nước được thành lập để quản lý quỹ từ nhà đầu tư trong nước. Là công ty quản lý quỹ có tư cách pháp nhân độc lập, do Ủy ban Chứng khoán Nhà nước cấp phép thành lập và hoạt động.</p>
            <p>- HGS cam kết phấn đấu trở thành một trong những công ty quản lý quỹ trong nước hàng đầu được khách hàng tin cậy. Chúng tôi nỗ lực không ngừng nhằm có thể mang lại mức lợi nhuận ổn định tương ứng với độ rủi ro, đạt được cao hơn bình quân thị trường cho tất cả các sản phẩm đầu tư, mang lại sự hài lòng và giúp khách hàng đạt được các mục tiêu tài chính của họ.</p>
            <p>- HGS được sự hậu thuẫn mạnh mẽ từ Ngân hàng cổ phần EximBank và Công ty BH Prudentail. Vì vậy HGS luôn đảm bảo nguồn vốn đầu tư của khách hàng không bao giờ mất đi và luôn tăng trưởng theo thời gian khách hàng đầu tư.</p>
        </div>
        <div class="item-about item-right">
            <div class="cover-title-item-about">
                <h3 class="title-item-about">NHỮNG ƯU ĐIỂM NỔI BẬT CỦA HSG</h3>
            </div>
            <p>1. Công ty quản lý quỹ nội địa tiên phong trên thị trường – là công ty đầu tiên đưa ra các sản phẩm quỹ và dịch vụ mới</p>
            <p>2. Cam kết mang đến cho khách hàng trong nước và quốc tế những giải pháp và dịch vụ đẳng cấp quốc tế</p>
            <p>3. Nhờ truyền thống kinh doanh và cơ cấu tổ chức tinh gọn hiệu quả nên chúng tôi có thể rất linh hoạt và đáp ứng một cách nhanh chóng trước những nhu cầu của khách hàng và điều kiện thị trường không ngừng thay đổi</p>
            <p>4. Tiêu chuẩn và phong cách làm việc chất lượng quốc tế kết hợp với sự am hiểu sâu sắc thị trường và mối quan hệ kinh doanh đa dạng trong nước</p>
            <p>5. Kinh nghiệm, năng lực và mối quan hệ kinh doanh được củng cố nhờ phát huy lợi thế là đối tác của Ngân hàng cổ phần EximBank và Công ty bảo hiểm Prudential.</p>
        </div>
    </div>
    <div class="about-up">
        <div class="item-about">
            <div class="cover-title-item-about">
                <h3 class="title-item-about">ĐỐI TÁC CỦA HSG</h3>
            </div>
        </div>
        <div class="item-about item-right">
            <div class="cover-title-item-about">
                <h3 class="title-item-about">TRỤ SỞ CHÍNH CỦA HSG</h3>
            </div>
            <ul>
                <li><img src="{{ url('assets/frontend/images/icon-about-address.png')}}"/><span>02, Phạm Văn Đồng, P. Linh Đông, Q. Thủ Đức, Tp.HCM</span></li>
                <li><img src="{{ url('assets/frontend/images/icon-about-phone.png')}}"/><span>0970 7777 929</span></li>
                <li><img src="{{ url('assets/frontend/images/icon-about-email.png')}}"/><span>customerservice@hoangsanggroup.vn</span></li>
            </ul>
        </div>
    </div>
@stop
