@extends('layouts.app')

@section('page-title', trans('app.roles'))

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                ĐẦU TƯ VÀO HSG
                <img class="icon-bread" src="{{ url('assets/img/icon-next.png') }}"/>
                <span class="sp-bread">HOÀN VỐN ĐẦU TƯ</span>
            </h1>
        </div>
    </div>

    @include('partials.messages')

    <div class="cover-invest">
        <div class="cover-line">
            <div class="ele-div">
                <span class="sp-up">Yêu cầu kết thúc hợp đồng</span>
                <select class="select-inp" name="investID">
                    <option value="">Chọn hợp đồng đầu tư</option>
                    <?php
                        if(!empty($datas)){
                            $i =1;
                            foreach ($datas as $v){
                                echo '<option value="'.$v->id.'">Hợp đồng '.$i.' ['.$v->actStartDate.' : '.number_format($v->money,0,".",",").$v->currency.']</option>';
                                $i++;
                            }
                        }
                    ?>
                </select>
            </div>
            <div class="ele-div">
                <input type="submit" class="inp-sub bt-end-contract" value="Tính thống kê kết thúc HĐ"/>
            </div>
        </div>
        <h4 class="h4-title">BẢNG THỐNG KÊ</h4>
        <div class="cover-line no-mar-bottom">
            <label class="lb-line">Ngày đầu tư: 01/01/2016</label>
            <label class="lb-line">Ngày nhận lãi: 01/01/2016</label>
            <label class="lb-line">Ngày đáo hạn: 01/01/2016</label>
            <label class="lb-line">Tái đầu tư: không</label>
        </div>
        <div class="cover-line no-mar-bottom">
            <label class="lb-2">Số tiền đầu tư: <b>1.000.000.000 VND</b></label>
            <label class="lb-2">Số tiền lãi thời điểm hiện tại: <b>10.000.000 VND</b></label>
            <label class="lb-2">Số tiền phạt hoàn vốn trước kỳ hạn: <b>% theo số tiền đầu tư</b></label>
            <label class="lb-2">Tổng tiền khi hoàn vốn (Tiền gốc + Lãi suất - Tiền phạt): <b>1.140.000.000 VND</b></label>
        </div>
        <div class="cover-note">
            <p>* Sau khi nhận được yêu cầu hoàn vốn Công Ty sẽ có nhân viên xác nhận yêu cầu trực tiếp qua điện thoại và email cá nhân của Quý Khách.</p>
            <p>* Yêu cầu kết thúc hợp đồng sẽ trở thành biên bản kết thúc hợp đồng gửi đến Quý khách qua email.</p>
            <p>* Sau khi Quý Khách xác nhận nội dung biên bản kết thúc hợp đồng là chính xác qua Email hoặc điện thoại thì tiền sẽ được hoàn lại cho Quý Khách sau 24h.</p>
        </div>
        <div class="cover-line">
            <input type="submit" class="inp-sub" value="Gửi yêu cầu"/>
        </div>
    </div>
    <script type="application/javascript">
        var dataArr = [];
        <?php

            foreach ($datas as $v){
                echo 'var dataArr['.$v->id.'] = []';
                echo 'var dataArr['.$v->id.'][0] ='.$v->actStartDate;
                echo 'var dataArr['.$v->id.'][1] ='.$v->ngayNhanLai;
                echo 'var dataArr['.$v->id.'][2] ='.date("Y-m-d");
                echo 'var dataArr['.$v->id.'][3] ='.$v->taiDauTu;
                echo 'var dataArr['.$v->id.'][4] ='.$v->money;
                echo 'var dataArr['.$v->id.'][5] ='.($v->Trade[0]['tongTien'] - $v->money);


                echo 'var dataArr['.$v->id.'][6] ='.$v->actStartDate;
                echo 'var dataArr['.$v->id.'][7] ='.$v->actStartDate;
            }
        ?>

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