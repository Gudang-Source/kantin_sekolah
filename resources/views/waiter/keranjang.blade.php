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
                        <h5 class="card-title">Keranjang</h5>
                        <div align="right" class="mb-3">
                            @if(empty($order->tanggal))
                            <p>Tanggal : -</p>
                            @endif
                            @if(!empty($order->tanggal))
                            <p>Tanggal : {{ $order->tanggal }}</p>
                            @endif
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
                        <div class="table-responsive">
                            <table class="table table-bordered" id="tabelMenu" width="100%" cellspacing="0">
                                <thead style="font-weight: bold;">
                                    <tr class="text-center">
                                        <th>No</th>
                                        <th>Gambar</th>
                                        <th>Nama Menu</th>
                                        <th>Jumlah</th>
                                        <th>Harga</th>
                                        <th>Sub Total</th>
                                        <th style="max-width: 75px;">Aksi</th>
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
                                            <a href="#" class="btn btn-warning btn-edit-order" data-id="{{ $detail_order->id_detail_order }}" data-nama="{{ $detail_order->menu->nama_menu }}" data-jumlah="{{ $detail_order->jumlah }}" data-toggle="modal" data-target="#editOrder">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <a href="#" class="btn btn-danger btn-delete-order" data-id="{{ $detail_order->id_detail_order }}" data-toggle="modal" data-target="#deleteOrder">
                                                <i class="fas fa-trash"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                                <td colspan="7" align="right">
                                    <form action="{{ url('/keranjang') }}" method="POST">
                                        @csrf
                                        <strong>Pilih Meja : </strong>
                                        <input type="number" name="no_meja" class="form-control mt-1 mb-3" style="width: 15%;">
                                        <button class="btn btn-primary mt-3"><i class="fas fa-shopping-basket"> Konfirmasi Pesanan</i></button>
                                    </form>
                                </td>
                            </table>
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
<div class="modal fade" id="editOrder" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="judulUbah">Form Ubah Jumlah</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body ">
                <form method="POST" action="{{ route('edit.order') }}">
                    @csrf
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
                            <input type="hidden" id="id_detail_order" name="id_detail_order">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                            <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Simpan</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- end edit order -->

<!-- delete order -->
<div class="modal fade" id="deleteOrder" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Hapus Pengaduan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('destroy.order') }}" method="POST">
                    @csrf
                    <label for="exampleFormControlInput1">Apa anda yakin ingin menghapus pengaduan ini?</label>
                    <input type="hidden" class="id_detail_order" id="id_detail_order" name="id_detail_order">
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary" id="btn-hapus">Hapus</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- edit order -->
@include('templates.footer')