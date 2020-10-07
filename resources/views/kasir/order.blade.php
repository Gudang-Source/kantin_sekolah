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
                                    <a href="#">Kasir</a>
                                </li>
                                <li class="list-inline-item seprate">
                                    <span>/</span>
                                </li>
                                <li class="list-inline-item">Order</li>
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
                        <h5 class="card-title">Data Order</h5>
                        @if(session()->has('pesanSuccess'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">{{ Session::get('pesanSuccess') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        @endif
                        <div class="table-responsive">
                            <table class="table table-bordered" id="tabelMenu" width="100%" cellspacing="0">
                                <thead style="font-weight: bold;">
                                    <tr class="text-center">
                                        <th>#</th>
                                        <th>No Meja</th>
                                        <th>Tanggal</th>
                                        <th>Status</th>
                                        <th>Total Harga</th>
                                        <th style="max-width: 40px;">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($orders as $order)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $order->no_meja }}</td>
                                        <td>{{ $order->tanggal }}</td>
                                        <td>{{ $order->status_order }}</td>
                                        <td>{{ $order->jumlah_harga }}</td>
                                        <td>
                                            <a href="#" class="btn btn-success btn-form-bayar" data-id="{{ $order->id_order }}" data-jumlah="{{ $order->jumlah_harga }}" data-toggle="modal" data-target="#form-bayar">
                                                <i class="fas fa-dollar"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End Of Content -->

<!-- Modal Bayar -->
<div class="modal fade" id="form-bayar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Pembayaran</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ url('/kasir/order') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="exampleFormControlInput1">ID Order</label>
                        <input type="number" class="form-control" name="id_order" id="id_order" placeholder="" readonly>
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Total Harga</label>
                        <input type="number" class="form-control" name="jumlah_harga" id="jumlah_harga" placeholder="" readonly>
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Bayar</label>
                        <input type="number" class="form-control" name="total_bayar" id="total_bayar" placeholder="">
                        <span class="small text-danger" id="bayar-kurang">Uang yang anda masukkan kurang.</span>
                        <span class="small text-primary" id="test"></span>
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Kembalian</label>
                        <input type="number" class="form-control" name="kembalian" id="kembalian" placeholder="" readonly>
                    </div>
                    <div class="modal-footer">
                        <div id="loading-bayar" class="pull-left">
                            <b>Sedang diproses...</b>
                        </div>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary" id="btn-bayar">Bayar</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>
<!-- End Modal Bayar -->

@include('templates.footer')..