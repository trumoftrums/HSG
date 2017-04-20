@extends('layouts.app')

@section('page-title', trans('app.users'))

@section('content')
<style>
    .btnOwn {
        padding: 0px 3px;
        font-size: 12px;
        cursor: auto;
    }
    .att-item{
        width: 100px;
        height: 100px;
        float: left; margin: 5px;
        border: 1px solid #0a6b3d;
    }

</style>
{{--<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>--}}
{{--<link rel="stylesheet" href="https://code.jquery.com/ui/1.12.0/themes/smoothness/jquery-ui.css" >--}}
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">
            QUẢN LÝ ĐẦU TƯ
            <img class="icon-bread" src="{{ url('assets/img/icon-next.png') }}"/>
            <span class="sp-bread">DANH SÁCH TÀI LIỆU CỦA HỢP ĐỒNG ĐẦU TƯ {{$invest['investCode']}}</span>
        </h1>
    </div>
</div>

@include('partials.messages')
<div class="row tab-search">
    <div class="col-md-2">
        <a href="{{ route('manage-interest.createDocs') }}" class="btn btn-success" id="add-docs">
            <i class="glyphicon glyphicon-plus"></i>Thêm tài liệu
        </a>
    </div>
</div>

<div class="table-responsive top-border-table" id="users-table-wrapper">
    <table class="table">
        <thead>
        <th>STT</th>
        <th>Tên tài liệu</th>
        <th>Loại tài liệu</th>
        <th>Người upload</th>
        <th>Ngày upload</th>
        <th>Trạng thái</th>
        <th class="text-center">ACTION</th>
        </thead>
        <tbody>
        @if (count($listDocs))
            $i = 1;
            @foreach ($listDocs as $doc)
                <tr>
                    <td>{{ $i}}</td>
                    <td>{{ $doc['filename']}}</td>
                    <td>{{ $doc['type']}}</td>
                    <td>{{ $doc['uploadBy'] }} %</td>
                    <td>{{ $doc['updated_at']}}</td>
                    <td>
                        @if($hd->status == 'AC') <button type="button" class="btn btn-success btnOwn">Active</button>
                        @elseif($hd->status == 'UP') <button type="button" class="btn btn-warning btnOwn">Đã chỉnh sửa</button>
                        @elseif($hd->status == 'DE') <button type="button" class="btn btn-danger btnOwn">Đã xóa</button> @endif
                    </td>
                    <td class="text-center">
                        <a href="{{ route('interest.hop-dong-dau-tu.edit', $hd->id) }}" class="btn btn-primary btn-circle edit" title="Edit"
                           data-toggle="tooltip" data-placement="top">
                            <i class="glyphicon glyphicon-edit"></i>
                        </a>

                        <a href="{{ route('interest.hop-dong-dau-tu.delete', $hd->id) }}" class="btn btn-danger btn-circle" title="Delete"
                           data-toggle="tooltip"
                           data-placement="top"
                           data-method="DELETE"
                           data-confirm-title="Xác nhận"
                           data-confirm-text="Bạn có muốn xóa?"
                           data-confirm-delete="Xác nhận">
                            <i class="glyphicon glyphicon-trash"></i>
                        </a>
                    </td>
                </tr>
            @endforeach
        @else
            <tr>
                <td colspan="6"><em>Chưa có dữ liệu.</em></td>
            </tr>
        @endif
        </tbody>
    </table>
</div>
@stop

@section('scripts')
    <script type="application/javascript">

    </script>
@stop
