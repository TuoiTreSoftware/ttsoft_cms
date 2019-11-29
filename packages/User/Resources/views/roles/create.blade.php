@extends('base::layouts.master')
@push('css')
<style type="text/css">
    .col-sm-4 .media {
        display: inherit !important;
        align-items: flex-start;
    }
</style>
@endpush
@section('content')
    <div class="container-fluid">
        <div class="row page-titles">
            <div class="col-md-5 align-self-center">
                <h4 class="text-themecolor">{{ trans('User') }}</h4>
            </div>
            <div class="col-md-7 align-self-center text-right">
                <div class="d-flex justify-content-end align-items-center">
                    <a href="{{ route('roles.index') }}" class="btn btn-info d-none d-lg-block m-l-15"><i class="fa fa-reply-all"></i> {{ trans('Phân quyền') }}</a>
                </div>
            </div>
        </div>

        <!-- content -->
        <div class="row">
            <div class="col-md-12">
                @if (count($errors) > 0)
                    <div class="alert alert-danger">
                        <strong>Whoops!</strong> There were some problems with your input.<br><br>
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                @include('base::partials.flash-notifitions')
                <div class="card">
                    <div class="card-body">
                        {!! Form::open(array('route' => 'roles.store','method'=>'POST')) !!}
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>Name:</strong>
                                    {!! Form::text('name', null, array('placeholder' => 'Name','class' => 'form-control')) !!}
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>Display Name:</strong>
                                    {!! Form::text('display_name', null, array('placeholder' => 'Display Name','class' => 'form-control')) !!}
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>Description:</strong>
                                    {!! Form::textarea('description', null, array('placeholder' => 'Description','class' => 'form-control','style'=>'height:100px')) !!}
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <div class="row" style="margin-bottom: 10px;">
                                        <div class="col-sm-10 col-sm-offset-2">
                                        <label class="pos-rel">
                                            <input type="checkbox" id="checkall" class="ace">
                                            <span class="lbl"></span> Chọn tất cả</label>
                                        </div>
                                    </div>
                                    @foreach($permission as $v)
                                        <div class="row" style="margin-bottom: 10px;">

                                            <div class="col-sm-2"><strong>{{ $v->name }}</strong></div>
                                            
                                            <div class="col-sm-10">

                                                <div class="row">
                                                    <div class="col-sm-12">
                                                        <label class="pos-rel" style="margin-right: 10px;">
                                                            <input type="checkbox" data-value="{{ str_slug($v->name) }}" class="mycheckbox ace checkroles">
                                                        <span></span> <span style="cursor: pointer; color: #1967AA">Tất cả quyền {{ $v->name }}</span></label>
                                                    </div>
                                                </div>

                                                @php 
                                                    $per = DB::table('permissions')->where(['permission_group_id' => $v->id])->get();
                                                @endphp
                                                
                                                @foreach($per as $value)
                                                    <div class="col-sm-4">
                                                        <label class="pos-rel" style="margin-right: 10px;">
                                                        <input type="checkbox" name="permission[]" class="mycheckbox ace {{ str_slug($v->name) }}" value="{{ $value->id }}">
                                                        <span class="lbl">{{ $value->display_name }}</span> </label>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </div>
                        {!! Form::close() !!}
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection