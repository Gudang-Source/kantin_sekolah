@include('templates.kasir.header')
@include('templates.kasir.navbar')

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
            <div class="form-group">
                <input type="text" name="country" id="country" placeholder="Masukkan Nama Menu" class="form-control" style="width:450px;">
                <button class="btn btn-primary mt-3">Cari Menu</button>
            </div>
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
                        <a href="/order/{{ $menu->id_menu }}" class="btn btn-primary" style="float: right;">Pesan</a>
                    </div>
                </div>
                @empty

                @endforelse
            </div>
            {{ $data_menu->links() }}
        </div>
    </div>
</section>
@include('templates.kasir.footer')