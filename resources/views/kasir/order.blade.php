@include('templates.admin_kasir.header')
@include('templates.admin_kasir.sidebar')
@include('templates.admin_kasir.topbar')

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
                        <div class="table-responsive">
                            <table class="table table-bordered" id="tabelMenu" width="100%" cellspacing="0">
                                <thead style="font-weight: bold;">
                                    <tr class="text-center">
                                        <th>#</th>
                                        <th>ID Order</th>
                                        <th>No Meja</th>
                                        <th>Tanggal</th>
                                        <th>Status</th>
                                        <th>Total Bayar</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        @forelse ($orders as $order)
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $order->id_order }}</td>
                                        <td>{{ $order->no_meja }}</td>
                                        <td>{{ $order->tanggal }}</td>
                                        <td>{{ $order->status_order }}</td>
                                        <td>{{ $order->jumlah_bayar }}</td>
                                        <td>
                                            <a href="#" class="btn btn-success"><i class="fas fa-credit-card"></i></a>
                                        </td>
                                        @empty
                                        @endforelse
                                    </tr>
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
@include('templates.admin_kasir.footer')..