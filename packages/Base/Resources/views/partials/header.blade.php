<header class="topbar">
    <nav class="navbar top-navbar navbar-expand-md navbar-dark">
        <div class="navbar-header">
            <a class="navbar-brand" href="{{ url(config('ttsoft.cms_path')) }}"><!-- Logo icon --><b>
                    <img src="/assets/images/logo-icon.png" alt="homepage" class="dark-logo" />
                    <!-- Light Logo icon -->
                    <img src="/assets/images/logo-light-icon.png" alt="homepage" class="light-logo" />
                </b>
                <!--End Logo icon -->
                <span class="hidden-xs"><span class="font-bold">TT</span>Software</span>
            </a>
        </div>
        <div class="navbar-collapse">
            <ul class="navbar-nav mr-auto">
                <!-- This is  -->
                <li class="nav-item"> <a class="nav-link nav-toggler d-block d-sm-none waves-effect waves-dark" href="javascript:void(0)"><i class="ti-menu"></i></a> </li>
                <li class="nav-item"> <a class="nav-link sidebartoggler d-none d-lg-block d-md-block waves-effect waves-dark" href="javascript:void(0)"><i class="icon-menu"></i></a> </li>
  
            </ul>

            <ul class="navbar-nav my-lg-0">
                @php
                    $lang = (session()->has('locale')) ? session()->get('locale') : config('app.locale');
                @endphp
                <li class="nav-item dropdown">
                    <a style="text-transform: uppercase;" class="nav-link dropdown-toggle waves-effect waves-dark profile-pic" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-language" aria-hidden="true"></i> {{ $lang }}</a>
                    <div class="dropdown-menu dropdown-menu-right animated flipInY">
                        @foreach(config('base.language') as $lang => $name)
                            <a href="{{ route('base.lang.get.setconfig',$lang) }}" class="dropdown-item">
                                <img src="{{ asset('uploads/languages/'.$lang) }}.png" style="text-transform: uppercase;"> {{ $name }}
                            </a>
                        @endforeach
                        
                    </div>
                </li>

                <li class="nav-item"> 
                    <a class="nav-link dropdown-toggle waves-effect waves-dark" href="{{ url('/') }}" target="_blank">
                        <i class="ti-eye"></i> Xem Website
                    </a>
                </li>
                
                <li class="nav-item dropdown u-pro">
                    <a class="nav-link dropdown-toggle waves-effect waves-dark profile-pic" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="{{ Avatar::create(Auth::user()->full_name)->setFontSize(25)->setDimension(60)->toBase64() }}" alt="user" class=""> <span class="hidden-md-down">{{ Auth::user()->full_name }} &nbsp;<i class="fa fa-angle-down"></i></span> </a>
                    <div class="dropdown-menu dropdown-menu-right animated flipInY">
                        <!-- text-->
                        <a href="javascript:void(0)" class="dropdown-item"><i class="ti-user"></i> My Profile</a>
                        <!-- text-->
                        <div class="dropdown-divider"></div>
                        <!-- text-->
                        <a href="{{ route('auth.login.get.logout') }}" class="dropdown-item"><i class="fa fa-power-off"></i> Logout</a>
                        <!-- text-->
                    </div>
                </li>
            </ul>
        </div>
    </nav>
</header>