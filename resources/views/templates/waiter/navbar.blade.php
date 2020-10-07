<section id="navbar">
    <nav class="navbar navbar-style fixed-top bg-white">
        <div class="container">
            <nav class="navbar navbar-light">
                <a class="navbar-brand" href="#">
                    KantinKu
                </a>
            </nav>
            <nav class="navbar navbar-expand-lg navbar-light">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('waiter.index') }}">Beranda <span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('waiter.order') }}">Order</a>
                        </li>
                        <li class="nav-item">
                            <?php

                            use Illuminate\Support\Facades\Session;

                            $order = \App\Order::where('id_user', Session::get('id_user'))->where('status_order', "0")->first();
                            if (empty($order)) {
                                $notif = "";
                            } else {
                                $notif = \App\Detail_order::where('id_order', $order->id_order)->count();
                            }
                            ?>
                            <a class="nav-link" href="{{ route('waiter.keranjang') }}">Keranjang
                                <span class="badge badge-danger">{{ $notif }}</span>
                            </a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle masuk" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Akun
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('waiter.profile') }}">Akun Saya</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="{{ route('logout') }}">Keluar</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
    </nav>
</section>