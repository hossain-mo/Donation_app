<!-- BEGIN: Left Aside -->

<button class="m-aside-left-close  m-aside-left-close--skin-dark " id="m_aside_left_close_btn"><i class="la la-close"></i></button>

<div id="m_aside_left" class="m-grid__item m-aside-left  m-aside-left--skin-dark ">

    <!-- BEGIN: Aside Menu -->
    <div id="m_ver_menu" class="m-aside-menu  m-aside-menu--skin-dark m-aside-menu--submenu-skin-dark " m-menu-vertical="1" m-menu-scrollable="1"
        m-menu-dropdown-timeout="500" style="position: relative;">
        <ul class="m-menu__nav  m-menu__nav--dropdown-submenu-arrow ">
            
            @foreach ($menus as $menu)
                @if (!isset($menu->parent))
                    {{-- @can($menu['permission']) --}}
                    <li class="m-menu__item " aria-haspopup="true">
                        <a href={{$menu->route}} class="m-menu__link ">
                        <i class="m-menu__link-icon {{$menu->class}}"></i>
                            <span class="m-menu__link-title">
                                <span class="m-menu__link-wrap">
                                    <span class="m-menu__link-text">
                                        {{$menu->title}}
                                    </span>
                                    <span class="m-menu__link-badge">
                                        <span class="m-badge m-badge--danger">
                                            -
                                        </span>
                                    </span>
                                </span>
                            </span>
                        </a>
                    </li>
                    {{-- @endcan --}}
                @else
                    @if ($menu->parent == '0')
                            
                        <?php
                            $filter = $menus->filter(function($me) use($menu){
                                    return $me->parent == $menu->id;
                                })->values()->sortBy('order');
                            $permissions = $filter->pluck('permission')->toArray();

                            $haspermission = \Auth::user()->can($permissions); // true;
                        ?>
                            @if ($haspermission)
                                <li class="m-menu__item  m-menu__item--submenu" aria-haspopup="true" data-menu-submenu-toggle="hover">
                                    <a href="#" class="m-menu__link m-menu__toggle">
                                        <i class="m-menu__link-icon {{$menu->class}}"></i>
                                    <span class="m-menu__link-text">{{$menu->title}}</span>
                                        <i class="m-menu__ver-arrow la la-angle-right"></i>
                                    </a>
                                    <div class="m-menu__submenu">
                                        <span class="m-menu__arrow"></span>
                                        <ul class="m-menu__subnav">
                                            <li class="m-menu__item  m-menu__item--parent" aria-haspopup="true">
                                                <a href="#" class="m-menu__link ">
                                                    <span class="m-menu__link-text">{{$menu->title}}</span>
                                                </a>
                                            </li>
                                            <li class="m-menu__item  m-menu__item--submenu" aria-haspopup="true" data-menu-submenu-toggle="hover">
                                                @foreach ($filter as $item)
                                                    @can($item->permission)
                                                    <li class="m-menu__item" aria-haspopup="true">
                                                        <a href={{$item->route}} class="m-menu__link ">
                                                        <i class="m-menu__link-bullet  m-menu__link-bullet--dot">
                                                            <span></span>
                                                        </i>
                                                        <span class="m-menu__link-text">{{$item->title}}</span>
                                                    </a>
                                                    </li>
                                                    @endcan
                                                @endforeach
                                            </li>
                                </li>
                                </ul>
                                </div>
                                </li>
                            @endif
                            
                    @endif
                @endif
                
                
            @endforeach
            
        </ul>
    </div>
    <!-- END: Aside Menu -->
</div>

<!-- END: Left Aside -->