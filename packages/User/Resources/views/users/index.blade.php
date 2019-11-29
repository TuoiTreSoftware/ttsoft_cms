@extends('base::layouts.master')
@section('content')
  <div class="container-fluid">
      <div class="row page-titles">
        <div class="col-md-5 align-self-center">
                <h4 class="text-themecolor">{{ trans('User') }}</h4>
            </div>
          <div class="col-md-7 align-self-center text-right">
              <div class="d-flex justify-content-end align-items-center">
                  <a href="{{ route('users.create') }}" class="btn btn-info d-none d-lg-block m-l-15"><i class="fa fa-plus-circle"></i> {{ trans('Tạo tài khoản') }}</a>
              </div>
          </div>
      </div>
      <div class="row">
          <div class="col-lg-12">
            @include('base::partials.flash-notifitions')
              <div class="card">
                <div class="card-header bg-info">
                    <h4 class="m-b-0 text-white">{{ trans('Danh sách User') }}</h4>
                </div>
                  <div class="card-body">
                      <div class="table-responsive">
                          <table class="table table-bordered table-hover product-overview">
                              <thead>
                                  <tr>
                                      <th class="center sorting_disabled" rowspan="1" colspan="1" aria-label=""> 
                                      <label class="pos-rel">
                                          <input type="checkbox" class="ace" id="checkall">
                                          <span class="lbl"></span> 
                                      </label>
                                      </th>
                                    <th>No</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Roles</th>
                                    <th width="280px">Action</th>
                                  </tr>
                              </thead>
                              <tbody>
                                @if($data)
                                @foreach($data as $key => $user)
                                    <tr>
                                        <td class="center"><label class="pos-rel">
                                            <input type="checkbox" class="ace mycheckbox" value="{{ $user->id }}" name="check[]">
                                            <span class="lbl"></span> </label>
                                        </td>
                                      <td>{{ ++$i }}</td>
                                      <td><img src="{{ Avatar::create($user->full_name)->setFontSize(20)->setDimension(40)->toBase64() }}" /> {{ $user->full_name }}</td>
                                      <td>{!! $user->email !!}</td>
                                      <td>
                                        @if(!empty($user->roles))
                                          @foreach($user->roles as $v)
                                            <label class="label label-success">{{ $v->display_name }}</label>
                                          @endforeach
                                        @endif
                                    </td>
                                    <td>
                                      <a class="btn btn-outline-info btn-sm" href="{{ route('users.show',$user->id) }}">Show</a>
                                      @if($user->id != 1)
                                      <a class="btn btn-outline-primary btn-sm" href="{{ route('users.edit',$user->id) }}">Edit</a>
                                        {!! Form::open(['method' => 'DELETE','route' => ['users.destroy', $user->id],'style'=>'display:inline']) !!}
                                              {!! Form::submit('Delete', ['class' => 'btn btn-sm btn-outline-danger', 'onclick' => 'return onDelete()']) !!}
                                        {!! Form::close() !!}
                                      @endif
                                     </td>
                                    </tr>
                                  @endforeach
                                  @endif
                              </tbody>
                          </table>
                      </div>
                  </div>
              </div>
              <div class="row  pull-right" style="margin-top: 15px;">
          <div class="col-md-12">
            {!! $data->links('vendor.pagination.bootstrap-4') !!}
          </div>
        </div>
      </div>
      <div class="row  pull-right" style="margin-top: 15px;">
        <div class="col-md-12">
          {!! $data->links('vendor.pagination.bootstrap-4') !!}
        </div>
      </div>
    </div>

  </div>
</div>
@endsection