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
                            <a class="nav-link" href="{{ route('kasir.index') }}">Beranda <span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('kasir.pesan') }}">Pesan</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('kasir.keranjang') }}">Keranjang</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link masuk" href="{{ route('logout') }}">Keluar</a>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
    </nav>
</section>