@include('templates.waiter.header')
@include('templates.waiter.navbar')

<!-- Content -->
<section>
    <div class="container-fluid">
        <div class="row mt-4">
            <div class="col-xl-12">
                <div class="card mb-4">
                    <div class="card-body">
                        <h5 class="card-title"><strong>Keranjang</strong></h5>
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
                        @if(empty($order->tanggal))
                        <p>Tanggal : -</p>
                        @endif
                        @if(!empty($order->tanggal))
                        <p>Tanggal : {{ $order->tanggal }}</p>
                        @endif
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Gambar</th>
                                        <th>Nama Menu</th>
                                        <th>Jumlah</th>
                                        <th>Harga</th>
                                        <th>Sub Total</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1 ?>
                                    @foreach ($detail_orders as $detail_order)
                                    <tr>
                                        <td>{{ $no++ }}</td>
                                        <td>
                                            <img src="{{ url('assets/img/menu') }}/{{ $detail_order->menu->gambar }}" width="100">
                                        </td>
                                        <td>{{ $detail_order->menu->nama_menu }}</td>
                                        <td>{{ $detail_order->jumlah }}</td>
                                        <td>Rp. {{ number_format($detail_order->menu->harga,0,',','.') }}</td>
                                        <td>Rp. {{ number_format($detail_order->sub_total,0,',','.') }}</td>
                                        <td>
                                            <a href="#" class="btn btn-danger"><i class="fas fa-trash"></i></a>
                                            <a href="#" class="btn btn-warning btn-jumlah" data-nama="{{ $detail_order->menu->nama_menu }}" data-jumlah="{{ $detail_order->jumlah }}">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="row">
                            <div class="col-md-4 offset-8">
                                <form action="{{ url('/keranjang') }}" method="POST">
                                    @csrf
                                    <strong>Pilih Meja : </strong>
                                    <input type="number" name="no_meja" class="form-control mt-1 mb-3" style="width: 40%;">
                                    <button class="btn btn-primary mt-3"><i class="fas fa-shopping-basket"> Konfirmasi Pesanan</i></button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Modal -->
<!-- tambah menu -->
<div class="modal fade" id="ubahJumlah" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="judulUbah">Ubah Jumlah</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body ">
                <form method="POST" action="{{ url('/admin/menu') }}" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Nama Menu</label>
                        <input type="text" class="form-control" name="nama_menu" id="nama_menu" placeholder="" readonly>
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Masukkan Jumlah</label>
                        <input type="number" class="form-control" name="jumlah" id="jumlah" placeholder="">
                    </div>
                    <div class="form-group">
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                            <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Simpan</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- end ubah jumlah -->
<!-- End Of Content -->

@include('templates.waiter.footer')