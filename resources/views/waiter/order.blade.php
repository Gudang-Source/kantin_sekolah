@include('templates.header')
@include('templates.sidebar')
@include('templates.topbar')

<!-- BREADCRUMB-->
<section class="au-breadcrumb m-t-75">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="au-breadcrumb-content">
                        <div class="au-breadcrumb-left">
                            <span class="au-breadcrumb-span">Kamu sedang berada di :</span>
                            <ul class="list-unstyled list-inline au-breadcrumb__list">
                                <li class="list-inline-item active">
                                    <a href="#">Waiter</a>
                                </li>
                                <li class="list-inline-item seprate">
                                    <span>/</span>
                                </li>
                                <li class="list-inline-item">Keranjang</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- END BREADCRUMB-->

<!-- STATISTIC-->
<section class="statistic">

</section>
<!-- END STATISTIC-->

<!-- Content -->
<section>
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title"></h5>
                        <div align="center" class="mb-3">
                            <h3>Silahkan Pilih Menu</h3>
                        </div>
                        @if(session()->has('pesanSuccess'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">{{ Session::get('pesanSuccess') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        @endif
                        @if(session()->has('pesanDanger'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">{{ Session::get('pesanDanger') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        @endif
                        <div id="pilih-menu">
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
                                            <a href="#" class="btn btn-primary btn-jumlah-order" style="float: right;" data-id="{{ $menu->id_menu }}" data-nama="{{ $menu->nama_menu }}" data-toggle="modal" data-target="#modal-order">Pesan</a>
                                            @endif
                                    </div>
                                </div>
                                @empty

                                @endforelse
                            </div>
                            {{ $data_menu->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End Of Content -->

<!-- Modal -->
<!-- edit order -->
<div class="modal fade" id="modal-order" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="judulUbah">Masukkan jumlah order</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body ">
                <form method="POST" action="{{ route('proses.order') }}">
                    @csrf
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Nama Menu</label>
                        <input type="text" class="form-control" name="nama" id="nama" placeholder="" readonly>
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Masukkan Jumlah</label>
                        <input type="number" class="form-control" name="jumlah_order" id="jumlah_order" placeholder="">
                    </div>
                    <div class="form-group">
                        <div class="modal-footer">
                            <input type="hidden" id="id_menu" name="id_menu">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                            <button type="submit" class="btn btn-primary"><i class="fas fa-shopping-cart"></i> Pesan</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- end edit order -->

@include('templates.footer')