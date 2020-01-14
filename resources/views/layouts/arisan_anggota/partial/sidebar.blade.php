{{-- sidebar --}} 
<div class="app-sidebar header-shadow" data-class="sidebar-text-dark">
    <div class="app-header__logo">
        <a href="/">
            <div class="logo-src">
            </div>
        </a>
        <div class="header__pane ml-auto">
            <div>
                <button type="button" class="hamburger close-sidebar-btn hamburger--elastic" data-class="closed-sidebar">
                    <span class="hamburger-box">
                        <span class="hamburger-inner"></span>
                    </span>
                </button>
            </div>
        </div>
    </div>
    <div class="scrollbar-sidebar">
        <div class="app-sidebar__inner">
            <ul class="vertical-nav-menu">
                <li class="app-sidebar__heading">Beranda</li>
                <li>
                    <a href="/" class="mm-active">
                        <i class="metismenu-icon pe-7s-home"></i>
                        Beranda Arisan
                    </a>
                </li>
                <li class="app-sidebar__heading">Fitur</li>
                <li>
                    <a href="{{route('anggota.index')}}">
                        <i class="metismenu-icon pe-7s-users"></i>
                        Daftar Anggota
                        <i class="metismenu-state-icon"></i>
                    </a>
                </li> 
                <li>
                    <a href="{{route('arisan.index')}}">
                        <i class="metismenu-icon pe-7s-cash"></i>
                        Daftar Arisan
                        <i class="metismenu-state-icon"></i>
                    </a>
                </li>  
            </ul>
        </div>
    </div>
</div>   
