<!-- MENU SIDEBAR-->
<aside class="menu-sidebar2">
    <div class="logo">
        <a href="#">
            <p style="color:white; letter-spacing:4px; font-size:25px;">KantinKu</p>
        </a>
    </div>
    <div class="menu-sidebar2__content js-scrollbar1">
        <div class="account2">
            <div>
                <img src="{{ url('assets/img/user') }}/{{ Session::get('gambar') }}" alt="{{ Session::get('gambar') }}" style="border-radius: 100%; width:150px; height:150px" />
            </div>
            <h4 class="name">{{ Session::get('nama') }}</h4>
            <a href="{{ route('logout') }}">Keluar</a>
        </div>
        <nav class="navbar-sidebar2">
            <ul class="list-unstyled navbar__list">
            <?php
            use Illuminate\Support\Facades\Session;
            $id_level = Session::get('id_level');
            ?>    
            @if($id_level == "1")
                <li>
                    <a href="{{ route('admin.index') }}">
                        <i class="fas fa-tachometer-alt"></i>Dashboard</a>
                </li>
                <li class="has-sub">
                    <a class="js-arrow" href="#">
                        <i class="fas fa-copy"></i>User
                        <span class="arrow">
                            <i class="fas fa-angle-down"></i>
                        </span>
                    </a>
                    <ul class="list-unstyled navbar__sub-list js-sub-list">
                        <li>
                            <a href="login.html">
                                <i class="fas fa-sign-in-alt"></i>Waiter</a>
                        </li>
                        <li>
                            <a href="login.html">
                                <i class="fas fa-sign-in-alt"></i>Kasir</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="{{ route('admin.menu') }}">
                        <i class="fas fa-trophy"></i>Menu</a>
                </li>
                @endif
                <li>
                    <a href="{{ route('kasir.order') }}">
                        <i class="fas fa-book"></i>Order</a>
                </li>
                <li>
                    <a href="{{ route('kasir.transaksi') }}">
                        <i class="fas fa-book"></i>Transaksi</a>
                </li>
            </ul>
        </nav>
    </div>
</aside>
<!-- END MENU SIDEBAR-->