<!--start sidebar-->
<aside class="sidebar-wrapper">
    <div class="sidebar-header">
        <!-- <div class="logo-icon">
            <img src="{{asset('assets/images/logo-icon.png')}}" class="logo-img" alt="">
        </div> -->
        <div class="logo-name flex-grow-1">
            <h5 class="mb-0">Mizuho</h5>
        </div>
        <div class="sidebar-close">
            <span class="material-icons-outlined">close</span>
        </div>
    </div>
    <div class="sidebar-nav" data-simplebar="true">

        <!--navigation-->
        <ul class="metismenu" id="sidenav">
            <li>
                <a href="{{route('ketentuans.index')}}">
                    <div class="menu-title">Ketentuan</div>
                </a>
            </li>
            <li>
                <a href="{{route('pengajuan.index')}}">
                    <div class="menu-title">Pengajuan</div>
                </a>
            </li>
            <li>
                <a href="{{route('bunga.index')}}">
                    <div class="menu-title">Bunga</div>
                </a>
            </li>
            <li>
                <a href="{{route('rule.index')}}">
                    <div class="menu-title">Rule</div>
                </a>
            </li>
            <li>
                <a href="{{route('kendaraan.index')}}">
                    <div class="menu-title">Kendaraan</div>
                </a>
            </li>
             
            <li>
                <a href="javascrpt:;">
                    <div class="menu-title">Laporan</div>
                </a>
            </li>
            

        </ul>
        <!--end navigation-->
    </div>
</aside>
<!--end sidebar-->