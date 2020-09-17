@include('templates.header')
@include('templates.navbar')

<section id="carousel">
    <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
            <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="{!! asset('assets/img/carousel/carousel1.jpg') !!}" class="d-block image-carousel" alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <h5>Selamat Datang</h5>
                    <p><strong>KantinKu</strong> Merupakan kantin terbaik di Bumi.</p>
                </div>
            </div>
            <div class="carousel-item">
                <img src="{!! asset('assets/img/carousel/carousel2.jpg') !!}" class="d-block image-carousel" alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <h5>Bersih</h5>
                    <p>Makanan dan Minuman yang ada di <strong>KantinKu</strong> dijamin <strong>Bersih</strong>.</p>
                </div>
            </div>
            <div class="carousel-item">
                <img src="{!! asset('assets/img/carousel/carousel3.png') !!}" class="d-block image-carousel" alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <h5>Halal</h5>
                    <p>Makanan dan Minuman yang ada di <strong>KantinKu</strong> dijamin <strong>Halal</strong>.</p>
                </div>
            </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
</section>

<section id="hot-sale">
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <h1>Paling Laris</h1>
            </div>
            <div class="col-2 offset-5">
                <hr>
            </div>
        </div>
        <div class="row">
            <div class="card">
                <img src="{{ url('assets/img/hot/es_teh.jpg') }}" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Card title</h5>
                    <p class="card-text">Rp 45.000</p>
                </div>
                <div class="card-footer">
                    <small class="text-muted">Terjual 3245</small>
                </div>
            </div>
            <div class="card">
                <img src="{{ url('assets/img/hot/somay.jpg') }}" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Card title</h5>
                    <p class="card-text">Rp 45.000</p>
                </div>
                <div class="card-footer">
                    <small class="text-muted">Terjual 3245</small>
                </div>
            </div>
            <div class="card">
                <img src="{{ url('assets/img/hot/es_jeruk.png') }}" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Card title</h5>
                    <p class="card-text">Rp 45.000</p>
                </div>
                <div class="card-footer">
                    <small class="text-muted">Terjual 3245</small>
                </div>
            </div>
            <div class="card">
                <img src="{{ url('assets/img/hot/nasi_goreng.jpg') }}" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Card title</h5>
                    <p class="card-text">Rp 45.000</p>
                </div>
                <div class="card-footer">
                    <small class="text-muted">Terjual 3245</small>
                </div>
            </div>
        </div>
    </div>
</section>

<section id="menu">
    <div class="row">
        <div class="col-md-3 filter">
            <div class="filter-makanan">
                <h3>Makanan</h3>
                <hr>
            </div>
            <div class="filer-minuman">
                <h3>Minuman</h3>
                <hr>
            </div>
        </div>
        <div class="col-md-9">
            <div class="row">
            @forelse ($data_menu as $menu)
            <div class="card">
                <img src="{{ url('assets/img/menu/' . $menu->gambar) }}" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">{{ $menu->nama_menu }}</h5>
                    <p class="card-text">Rp {{ $menu->harga }}</p>
                </div>
                <div class="card-footer">
                    <small class="text-muted">Terisa {{ $menu->stok }}</small>
                </div>
            </div>
            @empty

            @endforelse
            </div>
        </div>
    </div>
</section>
@include('templates.footer')