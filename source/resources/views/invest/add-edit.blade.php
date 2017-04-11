@extends('layouts.app')

@section('page-title', trans('app.roles'))

@section('content')
    <style>
        .slider, .slider.slider-horizontal{
            width: 100%;
            float: left;
            margin-bottom: 15px;
            margin-top: 2px;
        }
        #custom-handle {
            width: 3em;
            height: 1.6em;
            top: 50%;
            margin-top: -.8em;
            text-align: center;
            line-height: 1.6em;
        }
    </style>
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script>
        $( function() {
            var handle = $( "#custom-handle" );
            $( "#slider" ).slider({
                min: 0,
                max: 100,
                value: 0,
                create: function() {
                    handle.text( $( this ).slider( "value" )+" %" );
                },
                slide: function( event, ui ) {
                    handle.text( ui.value );
                }
            });
        } );
    </script>
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">
            {{--{{ $edit ? $role->name : trans('app.create_new_invest') }}--}}
            ĐẦU TƯ VÀO HSG
            {{--<small>{{ $edit ? trans('app.edit_role_details') : trans('app.role_details') }}</small>--}}
            <div class="pull-right">
                <ol class="breadcrumb">
                    <li><a href="{{ route('dashboard') }}">@lang('app.home')</a></li>
                    <li><a href="{{ route('role.index') }}">@lang('app.invest')</a></li>
                    <li class="active">{{ $edit ? trans('app.edit') : trans('app.create') }}</li>
                </ol>
            </div>
        </h1>
    </div>
</div>

@include('partials.messages')

<div class="cover-invest">
    <div class="cover-line">
        <div class="ele-div">
            <span class="sp-up">Ngày bắt đầu</span>
            <input type="text" id="datepicker" readonly class="inp-text" name=""/>
        </div>
        <div class="ele-div">
            <span class="sp-up">Loại tiền</span>
            <select class="select-inp">
                <option>USD</option>
                <option>VNĐ</option>
            </select>
        </div>
        <div class="ele-div">
            <span class="sp-up">Nhập số tiền muốn đầu tư</span>
            <input class="inp-text onlynumber autonumber"/>
        </div>
        <div class="ele-div">
            <span class="sp-up">Chọn kỳ hạn đầu tư</span>
            <select class="inp-text" name="investID">
                <option value=""></option>
                <?php
                    if(!empty($listIVT)){

                        foreach ($listIVT as $ivt){
                            echo '<option value="'.$ivt->id.'">'.$ivt->typeName.'</option>';
                        }
                    }
                ?>
            </select>
        </div>
    </div>
    <div class="cover-line">
        <div class="ele-div-2">
            <span class="sp-line">Lãi suất</span>
            <input class="inp-text"/>
        </div>
        <div class="ele-div-2">
            <span class="sp-line">Lãi suất biên động</span>
            <input class="inp-text"/>
        </div>
        <div class="ele-div-2">
            <span class="sp-line">Áp dụng lãi kép:</span>
            <label class="rad-lk radio-inline"><input type="radio" name="radio-laikep">Có</label>
            <label class="rad-lk radio-inline"><input type="radio" name="radio-laikep">Không</label>
        </div>
    </div>
    <div class="cover-line">
        <p class="p-line">TÁI ĐẦU TƯ (đây là phần trăm trích từ lãi hàng tháng hoặc hàng kỳ của bạn tự chọn nhập vào vốn ban đầu)</p>
    </div>
    <div class="slider">
        <div id="slider">
            <div id="custom-handle" class="ui-slider-handle"></div>
        </div>
    </div>
    <div class="cover-line">
        <span class="sp-line">HÌNH THỨC NHẬN LÃI:</span>
        <label class="radio-inline"><input type="radio" name="radio-nhanlai">Cuối kỳ</label>
        <label class="radio-inline"><input type="radio" name="radio-nhanlai">Hàng tháng</label>
    </div>
    <h4 class="h4-title">BẢNG TỒNG KẾT</h4>
    <div class="cover-line no-mar-bottom">
        <label class="lb-line">Ngày đầu tư: 01/01/2016</label>
        <label class="lb-line">Ngày nhận lãi: 01/01/2016</label>
        <label class="lb-line">Ngày đáo hạn: 01/01/2016</label>
        <label class="lb-line">Tái đầu tư: không</label>
    </div>
    <div class="cover-line">
        <label class="lb-2">Số tiền đầu tư:<b>1.000.000.000 VND</b></label>
        <label class="lb-2">Số tiền lãi hàng tháng (12th):<b>10.000.000 VND</b></label>
        <label class="lb-2">Tổng tiền khi đáo hạn (Tiền gốc + Lãi suất + Lãi 2% biến động): <b>1.140.000.000 VND</b></label>
    </div>
    <div class="cover-line">
        <input type="submit" class="inp-sub" value="Xem hợp đồng"/>
    </div>
    <h4 class="h4-title">HÌNH THỨC THANH TOÁN VỐN ĐẦU TƯ</h4>
    <div class="cover-line">
        <div class="cover-line-common cover-line-left">
            <h5 class="h5-title"><input type="checkbox" value="">CHUYỂN TIỀN TRỰC TIẾP TẠI VĂN PHÒNG</h5>
            <span class="sp-add">Địa chỉ: 02, Phạm Văn Đồng, P. Linh Đông, Q. Thủ Đức, Tp.HCM</span>
            <span class="sp-add">Hotline: 0970 7777 929 - Email: cskh@hoangsanggroup.vn</span>
            <div class="cover-p">
                <p>* Khi chọn hình thức này Quý khách sẽ làm Hợp đồng trực tiếp tại Công ty.</p>
                <p>* Quý khách sẽ nhận được bảng thống kê đảm bảo lợi nhuận.</p>
                <p>(Mọi thông tin chi tiết sẽ được Chuyên viên của HSG hỗ trợ tư vấn cho Quý khách)</p>
            </div>
            <input type="submit" class="inp-sub" value="Hoàn thành"/>
        </div>
        <div class="cover-line-common cover-line-right">
            <h5 class="h5-title"><input type="checkbox" value="">CHUYỂN TIỀN TRỰC TUYẾN</h5>
            <div class="cover-bank">
                <img src="{{ url('assets/img/img-bank.png') }}"/>
                <img src="{{ url('assets/img/img-bank.png') }}"/>
                <img src="{{ url('assets/img/img-bank.png') }}"/>
                <img src="{{ url('assets/img/img-bank.png') }}"/>
                <img src="{{ url('assets/img/img-bank.png') }}"/>
            </div>
            <h5 class="h5-bank">Tài khoản ngân hàng ... của HSG</h5>
            <div class="cover-bank-info">
                <span>Chủ TK : Cty TNHH ĐT& CN Hoàng Sang Group</span>
                <span>Chi nhánh NH: Kha Vạn Cân, Thủ Đức, Tp HCM</span>
            </div>
            <h5 class="h5-bank">Upload biên lai(Ủy nhiệm chi)</h5>
            <input class="upload-file" type="file"/>
            <div class="cover-p">
                <p>* Khi chọn hình thức này Quý khách cần đợi 5 - 10 phút cho hệ thống xác nhận.</p>
                <p>* Quý khách sẽ nhận Hợp Đồng niêm phong sau 5 ngày từ ngày Quý khách đầu tư.</p>
                <p>* Nhân viên của HSG sẽ gọi điện trực tiếp đến Quý Khách để xác nhận.</p>
            </div>
            <input type="submit" class="inp-sub" value="Hoàn thành"/>
        </div>
    </div>
</div>
<script type="application/javascript">
    $( "#datepicker" ).datepicker({ dateFormat: 'yy-mm-dd' });
    $(".onlynumber").keydown(function(e) {
        // Allow: backspace, delete, tab, escape, enter and .
        console.log(e.keyCode);
        if ($.inArray(e.keyCode, [8, 9, 27, 13, 110, 190]) !== -1 ||
            // Allow: Ctrl+A
            (e.keyCode == 65 && e.ctrlKey === true) ||
            // Allow: home, end, left, right
            (e.keyCode >= 35 && e.keyCode <= 39)) {
            // let it happen, don't do anything
            return;
        }
        // Ensure that it is a number and stop the keypress
        if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
            e.preventDefault();
        }
    });
    $('input.autonumber').keyup(function(event) {

        // skip for arrow keys
        if(event.which >= 37 && event.which <= 40) return;

        // format number
        $(this).val(function(index, value) {
            return value
                .replace(/\D/g, "")
                .replace(/\B(?=(\d{3})+(?!\d))/g, ",")
                ;
        });
    });
</script>

@stop
@section('styles')
    {!! HTML::style('assets/css/bootstrap-datetimepicker.min.css') !!}
    {!! HTML::style('assets/css/bootstrap-slider.css') !!}
@stop
@section('scripts')
    {!! HTML::script('assets/js/bootstrap-slider.js') !!}
    {!! HTML::script('assets/js/moment.min.js') !!}
    {!! HTML::script('assets/js/bootstrap-datetimepicker.min.js') !!}
    {!! HTML::script('assets/js/as/profile.js') !!}
    @if ($edit)
        {!! JsValidator::formRequest('Vanguard\Http\Requests\Role\UpdateRoleRequest', '#role-form') !!}
    @else
        {!! JsValidator::formRequest('Vanguard\Http\Requests\Role\CreateRoleRequest', '#role-form') !!}
    @endif
@stop