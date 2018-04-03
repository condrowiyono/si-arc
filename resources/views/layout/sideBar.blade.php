<div class="sidebar">
    <div class="sidebar-inner">
        <!-- ### $Sidebar Header ### -->
        <div class="sidebar-logo">
            <div class="peers ai-c fxw-nw">
                <div class="peer peer-greed">
                    <a class="sidebar-link td-n" href="/">
                        <div class="peers ai-c fxw-nw">
                            <div class="peer">
                                <div class="logo">
                                    <img src="/assets/static/images/logo.png" alt="">
                                </div>
                            </div>
                            <div class="peer peer-greed">
                                <h5 class="lh-1 mB-0 logo-text"></h5>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="peer">
                    <div class="mobile-toggle sidebar-toggle">
                        <a href="" class="td-n">
                            <i class="ti-arrow-circle-left"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <!-- ### $Sidebar Menu ### -->
        <ul class="sidebar-menu scrollable pos-r">
            <li class="nav-item mT-30 active">
                <a class="sidebar-link" href="#">
                <span class="icon-holder">
                  <i class="c-brown-500 ti-home"></i>
                </span>
                    <span class="title">Home</span>
                </a>
            </li>
            <li class="nav-item">
                <a class='sidebar-link' href="{{route('users.index')}}">
                <span class="icon-holder">
                  <i class="c-brown-500 ti-user"></i>
                </span>
                    <span class="title">Users - Kru</span>
                </a>
            </li>
            <li class="nav-item">
                <a class='sidebar-link' href="{{route('roles.index')}}">
                <span class="icon-holder">
                  <i class="c-brown-500 ti-direction"></i>
                </span>
                    <span class="title">Roles</span>
                </a>
            </li>
            <li class="nav-item dropdown open">
                <a class="dropdown-toggle" href="javascript:void(0);">
                <span class="icon-holder">
                  <i class="c-brown-500 ti-archive"></i>
                </span>
                    <span class="title">Inventory</span>
                    <span class="arrow">
                  <i class="ti-angle-right"></i>
                </span>
                </a>
                <ul class="dropdown-menu">
                    <li>
                        <a class='sidebar-link' href="{{route('brands.index')}}">Brand</a>
                    </li>
                    <li>
                        <a class='sidebar-link' href="{{route('locations.index')}}">Location</a>
                    </li>
                    <li>
                        <a class='sidebar-link' href="{{route('sources.index')}}">Source</a>
                    </li>
                    <li>
                        <a class='sidebar-link' href="{{ route('items.index')}}">Item</a>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
</div>