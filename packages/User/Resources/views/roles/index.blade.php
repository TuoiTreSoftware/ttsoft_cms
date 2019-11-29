@extends('base::layouts.master')
@section('content')
  <div class="container-fluid">
      <div class="row page-titles">
        <div class="col-md-5 align-self-center">
                <h4 class="text-themecolor">{{ trans('User') }}</h4>
            </div>
          <div class="col-md-7 align-self-center text-right">
              <div class="d-flex justify-content-end align-items-center">
                  <a href="{{ route('roles.create') }}" class="btn btn-info d-none d-lg-block m-l-15"><i class="fa fa-plus-circle"></i> {{ trans('Tạo phân quyền') }}</a>
              </div>
          </div>
      </div>
      <div class="row">
          <div class="col-lg-12">
            @include('base::partials.flash-notifitions')
              <div class="card">
                <div class="card-header bg-info">
                    <h4 class="m-b-0 text-white">{{ trans('Danh sách Role') }}</h4>
                </div>
                  <div class="card-body">
                      <div class="table-responsive">
                          <table class="table table-bordered table-hover product-overview">
                              <thead>
                                  <tr width="5%">
                                      <th class="center sorting_disabled" rowspan="1" colspan="1" aria-label=""> 
                                      <label class="pos-rel">
                                          <input type="checkbox" class="ace" id="checkall">
                                          <span class="lbl"></span> 
                                      </label>
                                      </th>
                                      <th>No</th>
                                      <th>Name</th>
                                      <th>Description</th>
                                      <th class="sorting_disabled" rowspan="1" colspan="1">Hoạt động</th>
                                  </tr>
                              </thead>
                              <tbody>
                                @if($roles)
                                  @foreach($roles as $role)
                                    <tr role="row" class="odd">
                                      <td class="center"><label class="pos-rel">
                                          <input type="checkbox" class="ace mycheckbox" value="{{ $role->id }}" name="check[]">
                                          <span class="lbl"></span> </label>
                                      </td>
                                      <td>{{ ++$i }}</td>
                                      <td>{{ $role->display_name }}</td>
                                      <td>{{ $role->description }}</td>
                                      <td>
                                        <a class="btn btn-info" href="{{ route('roles.show',$role->id) }}">Show</a>
                                        {{-- @if($role->id != 1) --}}
                                          <a class="btn btn-primary" href="{{ route('roles.edit',$role->id) }}">Edit</a>
                                          {!! Form::open(['method' => 'DELETE','route' => ['roles.destroy', $role->id],'style'=>'display:inline']) !!}
                                            {!! Form::submit('Delete', ['class' => 'btn btn-danger', 'onclick' => 'return onDelete()']) !!}
                                          {!! Form::close() !!}
                                        {{-- @endif --}}
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
            {!! $roles->links('vendor.pagination.bootstrap-4') !!}
          </div>
        </div>
          </div>

      </div>
  </div>
@endsection