@include('templates.header')
@include('templates.navbar')

<!-- Content -->
<section>
    <div class="container-fluid">
        <div class="row mt-4">
            <div class="col-xl-12">
                <div class="card mb-4">
                    <div class="card-body">
                        <h5 class="card-title"><strong>Keranjang</strong></h5>
                        @if(session()->has('pesanSuccess'))
                        <div class="alert alert-success">{{ session()->get('pesanSuccess') }}</div>
                        @endif
                        @if(session()->has('pesanDanger'))
                        <div class="alert alert-danger">{{ session()->get('pesanDanger') }}</div>
                        @endif
                        <p>Tanggal : {{ $order->tanggal }}</p>
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
                                        <a href="#" class="btn btn-primary"><i class="fas fa-edit"></i></a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="row">
                            <div class="col-md-4 offset-8">
                                <form action="">
                                    <strong>Total Harga : </strong>
                                    <input type="number" class="form-control mt-1" style="width: 70%;" value="{{ number_format($order->jumlah_harga,0,',','.') }}" readonly>
                                    <strong>Jumlah Bayar : </strong>
                                    <input type="number" class="form-control mt-1" style="width: 70%;">
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
<!-- End Of Content -->

@include('templates.footer')