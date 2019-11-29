<aside class="left-sidebar">
    <div class="scroll-sidebar">
        <nav class="sidebar-nav">
            <ul id="sidebarnav">
                @if(config_menu_merge())
                @foreach(config_menu_merge() as $menu)
                <?php $group = (count($menu['group']) > 0) ? TRUE : FALSE;?>
                @if($group)
                <li class="@yield($menu['active'])">
                    <a class="has-arrow waves-effect waves-dark @yield($menu['active'])" href="javascript:void(0)" aria-expanded="false">

                        <i class="{{ $menu['icon'] ?? '' }}"></i><span class="hide-menu">{{ $menu['name'] ?? '' }}</span>
                    </a>
                    <ul aria-expanded="false" class="collapse">
                        @foreach($menu['group'] as $k => $children)

                        <li class="@yield($children['active'])">

                            <a href="{{ $children['route'] ? $children['route'] : '#' }}">
                                <i class="{{ $children['icon'] ?? '' }}"></i> {{ $children['name'] }}
                            </a>
                        </li>

                        @endforeach
                    </ul>
                </li>
                @else
                <li class="@yield($menu['active'])">
                  <a href="{{ $menu['route'] ? $menu['route'] : '#' }}" class="waves-effect waves-dark @yield($menu['active'])">
                    <i class="{{ $menu['icon'] ?? '' }}"></i> <span class="hide-menu">{{ $menu['name'] }}</span>
                </a>
            </li>
            @endif
            @endforeach
            @endif

        </ul>
    </nav>
</div>
</aside>