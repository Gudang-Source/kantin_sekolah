@include('templates.waiter.header')
@include('templates.waiter.navbar')

<section id="menu">
    <div class="row">
        <div class="col-md-12">
            <h1>Silahkan Pilih Menu</h1>
        </div>
        <div class="col-4 offset-4">
            <hr>
        </div>
    </div>
    <div class="row mt-4">
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
            @if(session()->has('pesanSuccess'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">{{ Session::get('pesanSuccess') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            @endif
            <form method="GET" action="{{ route('waiter.cari') }}">
                <div class="form-group">
                    <input type="text" name="nama_menu" id="nama_menu" placeholder="Masukkan Nama Menu" class="form-control" style="width:450px;">
                    <button type="submit" class="btn btn-primary mt-3">Cari Menu</button>
                </div>
            </form>
            <div class="row">
                @forelse ($data_menu as $menu)
                <div class="card">
                    <img src="{{ url('assets/img/menu/' . $menu->gambar) }}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">{{ $menu->nama_menu }}</h5>
                        <p class="card-text">Rp {{ $menu->harga }}</p>
                    </div>
                    <div class="card-footer">
                        <small class="text-muted">Tersisa {{ $menu->stok }}</small>
                        @if($menu->stok < 1) <button class="btn btn-danger" style="float: right;">Habis</button>
                            @endif
                            @if($menu->stok > 1)
                            <a href="/order/{{ $menu->id_menu }}" class="btn btn-primary" style="float: right;">Pesan</a>
                            @endif
                    </div>
                </div>
                @empty

                @endforelse
            </div>
            {{ $data_menu->links() }}
        </div>
    </div>
</section>
@include('templates.waiter.footer')