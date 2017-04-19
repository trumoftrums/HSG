@extends('layouts.app')

@section('page-title', trans('app.roles'))

@section('content')

<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">
            ĐẦU TƯ VÀO HSG
            <img class="icon-bread" src="{{ url('assets/img/icon-next.png') }}"/>
            <span class="sp-bread">HỢP ĐỒNG ĐẦU TƯ</span>
        </h1>
    </div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.js"></script>
@include('partials.messages')
<script type="application/javascript">
    var option = {
        scales: {
            yAxes:[{
                stacked:true,
                gridLines: {
                    display:true,
                    color:"rgba(255,99,132,0.2)"
                }
            }],
            xAxes:[{
                gridLines: {
                    display:false
                }
            }]
        },
        tooltips: {
            callbacks: {
                label: function(tooltipItem, data) {
                    return "Lãi: " + tooltipItem.yLabel+"tr";
                }
            }
        },
        responsive: true,
        maintainAspectRatio: this.maintainAspectRatio,
        legend: {display: false}
    };
    function createChart(idChart,labelsArr,dataArr){
        var canvas = document.getElementById(idChart);
        var data = {
            labels: labelsArr,
            datasets: [
                {
                    label: "Lãi",
                    backgroundColor: "#06743f",
                    borderColor: "#06743f",
                    borderWidth: 0,
                    hoverBackgroundColor: "#06b25f",
                    hoverBorderColor: "#06b25f",
                    data: dataArr
                }
            ]
        };
        Chart.Bar(canvas,{
            data:data,
            options:option
        });
    }

    //        Chart.Bar(canvas2,{
    //            data:data,
    //            options:option
    //        });
</script>
<?php
if(!empty($datas)){
    $i =1;
    foreach ($datas as $v){
?>

<div class="cover-contract">
    <div class="cover-line-contract">
        <h5 class="h5-title-contract"><img src="{{ url('assets/img/icon-contract.png') }}"/>HỢP ĐỒNG {{$v->investCode}}:</h5>
    </div>
    <div class="cover-line-contract">
        <p class="item-in-contract-div">NGÀY BẮT ĐẦU: <span><?php if(!empty($v->actStartDate)) echo $v->actStartDate; else echo $v->estStartDate;?></span></p>
        <p class="item-in-contract-div">NGÀY KẾT THÚC: <span><?php if(!empty($v->actEndDate)) echo $v->actEndDate; else echo $v->estEndDate;?></span></p>
        <p class="item-in-contract-div">SỐ TIỀN ĐẦU TƯ: <span><?php echo number_format($v->money,0,".",","); ?> VND</span></p>
        <p class="item-in-contract-div">LÃI SUẤT: <span><?php echo $v->interest ?>%</span></p>
        <p class="item-in-contract-div">LÃI BIẾN ĐỘNG: <span><?php echo $v->further ?>%</span></p>
    </div>
    <div class="cover-line-contract">
        <h4 class="h4-title-chart">BIỂU ĐỒ THỐNG KÊ LỢI NHUẬN</h4>
        <div class="chart-contract">
            {{--<img src="{{ url('assets/img/img-chart.png') }}"/>--}}
            <canvas id="myChart{{$i}}"></canvas>
            <script type="application/javascript">
                var labelsArr =[]; var dataArr =[];

                <?php
                    $ngaybatDau = $v->actStartDate;
                    if(empty($ngaybatDau)) $ngaybatDau =  $v->estStartDate;
                    $k = 0;
                    foreach ($v->ketQuaChiTiet as $th){
                        $k++;
                        echo 'labelsArr.push("'.date("Y-m-d",strtotime($ngaybatDau. " + $k month")).'");';
                        echo 'dataArr.push('.round($th['tienlai']/1000000,2).');';
                    }
                ?>
            createChart("myChart{{$i}}",labelsArr,dataArr);
            </script>

        </div>
    </div>
    <div class="transfer-history">
        <h5 class="h5-title-contract">LỊCH SỬ GIAO DỊCH</h5>
        <?php if(!empty($v->trade)){ foreach ($v->trade as $trade){
            if(empty($trade['soTienLai'])) {


        ?>
        <p class="p-history">* Ngày {{$trade['ngayGD']}}: {{$trade['noiDungGD']}} {{number_format($trade['tongTien'],0,".",",")}} {{$trade['loaiTien']}}. Tổng số tiền đầu tư {{number_format($trade['tongDauTu'],0,".",",")}} {{$trade['loaiTien']}}.  Tổng số tiền hiện có {{number_format($trade['tongTien'],0,".",",")}} {{$trade['loaiTien']}}</p>

        <?php }else{?>
        <p class="p-history">* Ngày {{$trade['ngayGD']}}: {{$trade['noiDungGD']}} {{number_format($trade['soTienLai'],0,".",",")}} {{$trade['loaiTien']}}. Tái đầu tư {{number_format($trade['soTienLai'],0,".",",")}} {{$trade['loaiTien']}}. Tổng số tiền đầu tư {{number_format($trade['tongDauTu'],0,".",",")}} {{$trade['loaiTien']}}. Tổng số tiền hiện có {{number_format($trade['tongTien'],0,".",",")}} {{$trade['loaiTien']}}</p>
        <?php }}}?>
    </div>
    <div class="cover-line-contract">
        <input class="inp-sub bt-first" value="XEM LỊCH SỬ GIAO DỊCH">
        <input class="inp-sub bt-second" value="XEM HỢP ĐỒNG">
        <input class="inp-sub bt-third " value="HOÀN VỐN ĐẦU TƯ" onclick="hoanvon({{$v->id}});">
    </div>
</div>
<?php $i++;}}?>
<script type="application/javascript">
    function hoanvon(id){
        window.location = "/hoan-von/refund-invest/?investID="+id;
    }
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