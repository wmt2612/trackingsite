<!-- ========== Left Sidebar Start ========== -->
<div class="vertical-menu">

    <div data-simplebar class="h-100">

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">
                <li class="menu-title">Menu</li>

                <li>
                    <a href="{{ route('dashboard') }}" class="waves-effect">
                        <i class="mdi mdi-home-variant-outline"></i><span
                            class="badge rounded-pill bg-primary float-end">3</span>
                        <span>Dashboard</span>
                    </a>
                </li>

                <li>
                    <a href="{{ route('cloned_websites') }}" class=" waves-effect">
                        <i class="mdi mdi-calendar-outline"></i>
                        <span>Cloned Websites</span>
                    </a>
                </li>

                <li>
                    <a href="{{ route('product.index') }}" class=" waves-effect">
                        <i class="mdi mdi-calendar-outline"></i>
                        <span>Products</span>
                    </a>
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="ri-apps-fill"></i>
                        <span>Tools</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{ route('tools.sha1') }}">Sha1</a></li>
                        <li><a href="{{ route('tools.base64') }}">Base64</a></li>
                    </ul>
                </li>
                <li>
                    <a href="{{ route('settings') }}" class=" waves-effect">
                        <i class="dripicons-gear "></i>
                        <span>Settings</span>
                    </a>
                </li>
            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>
<!-- Left Sidebar End -->