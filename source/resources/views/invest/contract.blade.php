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

<div class="cover-contract">
    <div class="cover-line-contract">
        <h5 class="h5-title-contract"><img src="{{ url('assets/img/icon-contract.png') }}"/>HỢP ĐỒNG 1:</h5>
    </div>
    <div class="cover-line-contract">
        <p class="item-in-contract-div">NGÀY BẮT ĐẦU: <span>01/01/2017</span></p>
        <p class="item-in-contract-div">NGÀY KẾT THÚC: <span>01/01/2017</span></p>
        <p class="item-in-contract-div">SỐ TIỀN ĐẦU TƯ: <span>1.000.000.000VND</span></p>
        <p class="item-in-contract-div">% LÃI SUẤT: <span>10%/tháng</span></p>
        <p class="item-in-contract-div">% LÃI BIÊN ĐỘ: <span>0%</span></p>
    </div>
    <div class="cover-line-contract">
        <h4 class="h4-title-chart">BIỂU ĐỒ THỐNG KÊ LỢI NHUẬN</h4>
        <div class="chart-contract">
            {{--<img src="{{ url('assets/img/img-chart.png') }}"/>--}}
            <canvas id="myChart1"></canvas>
        </div>
    </div>
    <div class="transfer-history">
        <h5 class="h5-title-contract">LỊCH SỬ GIAO DỊCH</h5>
        <p class="p-history">* Ngày 01/02/2017: Nhận lãi lần đầu là 8.3000.000VND. Quý khách không rút. Số tiền hiện có 1.008.300.000VND</p>
        <p class="p-history">* Ngày 01/03/2017: Nhận lãi lần đầu là 8.3000.000VND. Quý khách không rút. Số tiền hiện có 1.008.300.000VND</p>
        <p class="p-history">* Ngày 01/04/2017: Nhận lãi lần đầu là 8.3000.000VND. Quý khách không rút. Số tiền hiện có 1.008.300.000VND</p>
        <p class="p-history">* Ngày 01/05/2017: Nhận lãi lần đầu là 8.3000.000VND. Quý khách không rút. Số tiền hiện có 1.008.300.000VND</p>
    </div>
    <div class="cover-line-contract">
        <input class="inp-sub bt-first" value="XEM LỊCH SỬ GIAO DỊCH">
        <input class="inp-sub bt-second" value="XEM HỢP ĐỒNG">
        <input class="inp-sub bt-third" value="HOÀN VỐN ĐẦU TƯ">
    </div>
</div>
<div class="cover-contract">
    <div class="cover-line-contract">
        <h5 class="h5-title-contract"><img src="{{ url('assets/img/icon-contract.png') }}"/>HỢP ĐỒNG 2:</h5>
    </div>
    <div class="cover-line-contract">
        <p class="item-in-contract-div">NGÀY BẮT ĐẦU: <span>01/01/2017</span></p>
        <p class="item-in-contract-div">NGÀY KẾT THÚC: <span>01/01/2017</span></p>
        <p class="item-in-contract-div">SỐ TIỀN ĐẦU TƯ: <span>1.000.000.000VND</span></p>
        <p class="item-in-contract-div">% LÃI SUẤT: <span>10%/tháng</span></p>
        <p class="item-in-contract-div">% LÃI BIÊN ĐỘ: <span>0%</span></p>
    </div>
    <div class="cover-line-contract">
        <h4 class="h4-title-chart">BIỂU ĐỒ THỐNG KÊ LỢI NHUẬN</h4>
        <div class="chart-contract">
            {{--<img src="{{ url('assets/img/img-chart.png') }}"/>--}}
            <canvas id="myChart2"></canvas>
        </div>
    </div>
    <div class="transfer-history">
        <h5 class="h5-title-contract">LỊCH SỬ GIAO DỊCH</h5>
        <p class="p-history">* Ngày 01/02/2017: Nhận lãi lần đầu là 8.3000.000VND. Quý khách không rút. Số tiền hiện có 1.008.300.000VND</p>
        <p class="p-history">* Ngày 01/03/2017: Nhận lãi lần đầu là 8.3000.000VND. Quý khách không rút. Số tiền hiện có 1.008.300.000VND</p>
        <p class="p-history">* Ngày 01/04/2017: Nhận lãi lần đầu là 8.3000.000VND. Quý khách không rút. Số tiền hiện có 1.008.300.000VND</p>
        <p class="p-history">* Ngày 01/05/2017: Nhận lãi lần đầu là 8.3000.000VND. Quý khách không rút. Số tiền hiện có 1.008.300.000VND</p>
    </div>
    <div class="cover-line-contract">
        <input class="inp-sub bt-first" value="XEM LỊCH SỬ GIAO DỊCH">
        <input class="inp-sub bt-second" value="XEM HỢP ĐỒNG">
        <input class="inp-sub bt-third" value="HOÀN VỐN ĐẦU TƯ">
    </div>
</div>
    <script>
        var canvas = document.getElementById('myChart1');
        var data = {
            labels: ["Th1", "Th2", "Th3", "Th4", "Th5", "Th6", "Th7", "Th8","Th9","Th10","Th11","Th12" ],
            datasets: [
                {
                    label: "Lãi",
                    backgroundColor: "#06743f",
                    borderColor: "#06743f",
                    borderWidth: 0,
                    hoverBackgroundColor: "#06b25f",
                    hoverBorderColor: "#06b25f",
                    data: [6.5, 5.9, 2.0, 3.1, 5.6, 5.5, 4.0, 2.0, 1.1, 3.0, 6.0, 2.3],
                }
            ]
        };
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
        var canvas2 = document.getElementById('myChart2');
        Chart.Bar(canvas,{
            data:data,
            options:option
        });
        Chart.Bar(canvas2,{
            data:data,
            options:option
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