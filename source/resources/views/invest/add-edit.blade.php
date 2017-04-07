@extends('layouts.app')

@section('page-title', trans('app.roles'))

@section('content')

<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">
            {{ $edit ? $role->name : trans('app.create_new_invest') }}
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

@if ($edit)
    {!! Form::open(['route' => ['role.update', $role->id], 'method' => 'PUT', 'id' => 'role-form']) !!}
@else
    {!! Form::open(['route' => 'role.store', 'id' => 'role-form']) !!}
@endif

<div class="row">
    <div class="panel panel-default">
        <div class="panel-heading">Đầu tư</div>
        <div class="panel-body">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="birthday">Ngày</label>
                        <div class="form-group">
                            <div class='input-group date'>
                                <input type='text' name="birthday" id='birthday' value="" class="form-control" />
                                <span class="input-group-addon" style="cursor: default;">
                                <span class="glyphicon glyphicon-calendar"></span>
                            </span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="status">Chọn kỳ hạn đầu tư</label>
                        <select class="form-control">
                            <option>8 Tháng</option>
                            <option>10 Tháng</option>
                            <option>12 Tháng</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="phone">Nhập số tiền muốn đầu tư</label>
                        <input type="text" class="form-control" id="phone"
                               name="phone" placeholder="@lang('app.phone')" value="{{ $edit ? $user->phone : '' }}">
                    </div>
                    <div class="form-group">
                        <div class="col-md-6">
                            <label for="phone">Lãi suất</label>
                            <input type="text" class="form-control" id="phone"
                                   name="phone" placeholder="@lang('app.phone')"
                                   value="{{ $edit ? $user->phone : '' }}">
                        </div>
                        <div class="col-md-6">
                            <label for="phone">Lãi suất biên động</label>
                            <input type="text" class="form-control" id="phone"
                                   name="phone" placeholder="@lang('app.phone')"
                                   value="{{ $edit ? $user->phone : '' }}">
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <label for="status">Áp dụng lãi kép</label>
                    <div class="checkbox">
                        <input checked="checked" type="checkbox" value="1">
                        <label>Không</label>
                    </div>
                    <div class="checkbox">
                        <input checked="checked" type="checkbox" value="1">
                        <label>Có</label>
                    </div>
                </div>
                <div class="col-md-12">
                    <input id="ex1" data-slider-id='ex1Slider' type="text" data-slider-min="0" data-slider-max="20" data-slider-step="1" data-slider-value="14"/>
                </div>
                <div class="col-md-12">
                    <label for="status">Hình thức nhận lãi</label>
                    <div class="checkbox">
                        <input checked="checked" type="checkbox" value="1">
                        <label>Cuối kỳ</label>
                    </div>
                    <div class="checkbox">
                        <input checked="checked" type="checkbox" value="1">
                        <label>Hàng tháng</label>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-2">
        <button type="submit" class="btn btn-primary btn-block">
            <i class="fa fa-save"></i>
            {{ $edit ? trans('app.update_role') : trans('app.create_role') }}
        </button>
    </div>
</div>

@stop
@section('styles')
    {!! HTML::style('assets/css/bootstrap-datetimepicker.min.css') !!}
    {!! HTML::style('assets/css/bootstrap-slider.css') !!}
@stop
<script>
    // With JQuery
    $('#ex1').slider({
        formatter: function(value) {
            return 'Current value: ' + value;
        }
    });

    // Without JQuery
    var slider = new Slider('#ex1', {
        formatter: function(value) {
            return 'Current value: ' + value;
        }
    });
</script>
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