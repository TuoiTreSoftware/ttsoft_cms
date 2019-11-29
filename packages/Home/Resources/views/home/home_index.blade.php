@extends('base::layouts.master')


@push('css')

@endpush

@section('content')


<section id="admin-home" style="margin-top: 2%;">
  <div class="container-fluid">
    <div class="card">
      <div class="card-body">
        <div class="row">
          <div class="col-md-11"><h4 class="card-title">Trang chủ</h4></div>
          <div class="col-md-1"><a href="{{ route('admin.media.get.add') }}" class="btn btn-info btn-effect btn-wacves right">Thêm</a></div>
        </div>
        <!-- Nav tabs -->
        <div class="vtabs">
          <ul class="nav nav-tabs tabs-vertical" role="tablist" style="width: 15%">
            <li class="nav-item"> <a class="nav-link active" data-toggle="tab" href=" #SECTION_1" role="tab"><span class="hidden-sm-up"></span> <span class="hidden-xs-down">{{ get_key_home('SECTION_1')->title }}</span> </a> </li>
            <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#SECTION_2" role="tab"><span class="hidden-sm-up"></span> <span class="hidden-xs-down">{{ get_key_home('SECTION_2')->title }}</span></a> </li>
            <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#SECTION_3" role="tab"><span class="hidden-sm-up"></span> <span class="hidden-xs-down">{{ get_key_home('SECTION_3')->title }}</span></a> </li>
            <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#SECTION_4" role="tab"><span class="hidden-sm-up"></span> <span class="hidden-xs-down">{{ get_key_home('SECTION_4')->title }}</span></a> </li>
            <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#SECTION_8" role="tab"><span class="hidden-sm-up"></span> <span class="hidden-xs-down">{{ get_key_home('SECTION_8')->title }}</span></a> </li>
          </ul>
          <!-- Tab panes -->
          <div class="tab-content" style="width: 100%">

            <!-- SECTION_1-->
            <div class="tab-pane active" id="SECTION_1" role="tabpanel">

              <div class="container">
                <center>
                  @php 
                    $SECTION_1 = get_media_home(\TTSoft\Media\Entities\Media::SECTION_1);
                  @endphp
                  @if($SECTION_1)

                  <div class="title-SECTION_1  m-b-20">
                    <h4>{{ get_key_home('SECTION_1')->title }}</h4> 
                    <img class="image_fade" src="{{ url('/frontend/images/vkspahome/line.jpg') }}" alt="">
                    <p>{{ get_key_home('SECTION_1')->slogan }}</p>
                    <a href="{{ route('admin.media.get.list.category','SECTION_1') }}" class="btn btn-warning btn-effect btn-wacves right">Sửa</a>
                  </div>
                  
                  <div class="row">
                    @foreach($SECTION_1 as $key => $get)
                    <div class="col-md-3 oc-item">
                      <div class="active m-b-20">
                        <img class="d-block img-fluid" style="height: 100px;" src="{{ $get->getImage() }}">
                        <p>{{ $get->getTitle() }}</p>
                        <a href="{{ route('admin.media.get.edit',$get->id) }}" class="btn"><i class="ti-marker-alt"></i></a>
                        <a href="{{ route('admin.media.get.delete',$get->id) }}" class="btn"><i class="ti-trash"></i></a>
                      </div>
                    </div>
                    @endforeach
                  </div>
                  @endif

                </center>
              </div>
            </div>

            <!-- SECTION_2-->
            <div class="tab-pane" id="SECTION_2" role="tabpanel">
              <div class="container">
                <center>
                  @php 
                    $SECTION_2 = get_media_home(\TTSoft\Media\Entities\Media::SECTION_2);
                  @endphp
                  @if($SECTION_2)
                  <div class="title-SECTION_1 m-b-20">
                    <h4>{{ get_key_home('SECTION_2')->title }}</h4> 
                    <img class="image_fade" src="{{ url('/frontend/images/vkspahome/line.jpg') }}" alt="">
                    <p>{{ get_key_home('SECTION_2')->slogan }}</p>
                    <a href="{{ route('admin.media.get.list.category','SECTION_2') }}" class="btn btn-warning btn-effect btn-wacves right">Sửa</a>
                  </div>
                  <div class="row">
                    @foreach($SECTION_2 as $key => $get)
                    <div class="col-md-3">
                      <div class="carousel-item active m-b-20">
                        <img class="d-block img-fluid" style="height: 100px;" src="{{ $get->image }}">
                        <p>{{ $get->title }}</p>
                        <a href="{{ route('admin.media.get.edit',$get->id) }}"><i class="ti-marker-alt"></i></a>
                        <a href="{{ route('admin.media.get.delete',$get->id) }}" class="btn"><i class="ti-trash"></i></a>
                      </div>
                    </div>
                    @endforeach
                  </div>
                  @endif
                </center>
              </div>
            </div>

            <!-- SECTION_3 -->

            <div class="tab-pane" id="SECTION_3" role="tabpanel">
              <div class="container">
                <center>
                  @php 
                    $SECTION_3 = get_media_home(\TTSoft\Media\Entities\Media::SECTION_3);
                  @endphp
                  @if($SECTION_3)
                  <div class="title-SECTION_1 m-b-20">
                    <h4>{{ get_key_home('SECTION_3')->title }}</h4> 
                    <img class="image_fade" src="{{ url('/frontend/images/vkspahome/line.jpg') }}" alt="">
                    <p>{{ get_key_home('SECTION_3')->slogan }}</p>
                    <a href="{{ route('admin.media.get.list.category','SECTION_3') }}" class="btn btn-warning btn-effect btn-wacves right">Sửa</a>
                  </div>
                  <div class="row">
                    @foreach($SECTION_3 as $key => $get)
                    <div class="col-md-3">
                      <div class="carousel-item active m-b-20">
                        <img class="d-block img-fluid" style="height: 100px;" src="{{ $get->image }}">
                        <p>{{ $get->title }}</p>
                        <a href="{{ route('admin.media.get.edit',$get->id) }}"><i class="ti-marker-alt"></i></a>
                        <a href="{{ route('admin.media.get.delete',$get->id) }}" class="btn"><i class="ti-trash"></i></a>
                      </div>
                    </div>
                    @endforeach
                  </div>
                  @endif
                </center>
              </div>
            </div>
            
            <!-- SECTION_4-->

            <div class="tab-pane" id="SECTION_4" role="tabpanel">
              <div class="container">
                <center>
                  @php 
                    $SECTION_4 = get_media_home(\TTSoft\Media\Entities\Media::SECTION_4);
                  @endphp
                  @if($SECTION_4)
                  <div class="title-SECTION_1 m-b-20">
                    <h4>{{ get_key_home('SECTION_4')->title }}</h4> 
                    <img class="image_fade" src="{{ url('/frontend/images/vkspahome/line.jpg') }}" alt="">
                    <p>{{ get_key_home('SECTION_4')->slogan }}</p>
                    <a href="{{ route('admin.media.get.list.category','SECTION_4') }}" class="btn btn-warning btn-effect btn-wacves right">Sửa</a>
                  </div>
                  <div class="row">
                    @foreach($SECTION_4 as $key => $get)
                    <div class="col-md-3">
                      <div class="carousel-item active m-b-20">
                        <img class="d-block img-fluid" style="height: 100px;" src="{{ $get->getImage() }}">
                        <a href="{{ route('admin.media.get.edit',$get->id) }}"><i class="ti-marker-alt"></i></a>
                        <a href="{{ route('admin.media.get.delete',$get->id) }}" class="btn"><i class="ti-trash"></i></a>
                      </div>
                    </div>
                    @endforeach
                  </div>
                  @endif
                </center>
              </div>
            </div>

            <!-- SECTION_8-->

            <div class="tab-pane" id="SECTION_8" role="tabpanel">
              <div class="container">
                <center>
                  @php 
                    $SECTION_8 = get_media_home(\TTSoft\Media\Entities\Media::SECTION_8);
                  @endphp
                  @if($SECTION_8)
                  <div class="title-SECTION_1 m-b-20">
                    <h4>{{ get_key_home('SECTION_8')->title }}</h4> 
                    <img class="image_fade" src="{{ url('/frontend/images/vkspahome/line.jpg') }}" alt="">
                    <p>{{ get_key_home('SECTION_8')->slogan }}</p>
                    <a href="{{ route('admin.media.get.list.category','SECTION_8') }}" class="btn btn-warning btn-effect btn-wacves right">Sửa</a>
                  </div>
                  <div class="row">
                    @foreach($SECTION_8 as $key => $get)
                    <div class="col-md-3">
                      <div class="carousel-item active m-b-20">
                        <img class="d-block img-fluid" style="height: 100px;" src="{{ $get->getImage() }}">
                        <a href="{{ route('admin.media.get.edit',$get->id) }}"><i class="ti-marker-alt"></i></a>
                        <a href="{{ route('admin.media.get.delete',$get->id) }}" class="btn"><i class="ti-trash"></i></a>
                      </div>
                    </div>
                    @endforeach
                  </div>
                  @endif
                </center>
              </div>
            </div>

          </div>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection

@push('js')


@endpush