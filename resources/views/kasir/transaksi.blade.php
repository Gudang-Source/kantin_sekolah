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
                                <li class="list-inline-item">Transaksi</li>
                            </ul>
                        </div>
                        <a href="{{ route('kasir.printAll') }}" class="au-btn au-btn-icon au-btn--green" target="_blank"><i class="zmdi zmdi-print"></i>Cetak</a>
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
                        <h5 class="card-title">Data Transaksi</h5>
                        <div class="table-responsive">
                            <table class="table table-bordered" id="tabelMenu" width="100%" cellspacing="0">
                                <thead style="font-weight: bold;">
                                    <tr class="text-center">
                                        <th>#</th>
                                        <th>ID Transaksi</th>
                                        <th>ID User</th>
                                        <th>ID Order</th>
                                        <th>Tanggal</th>
                                        <th>Total Bayar</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($transaksis as $transaksi)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $transaksi->id_transaksi }}</td>
                                        <td>{{ $transaksi->id_user }}</td>
                                        <td>{{ $transaksi->id_order }}</td>
                                        <td>{{ $transaksi->tanggal }}</td>
                                        <td>{{ $transaksi->total_bayar }}</td>
                                        <td>
                                            <a href="/kasir/print/{{ $transaksi->id_transaksi }}" class="btn btn-primary" target="_blank"><i class="fas fa-print"></i></a>
                                        </td>
                                    </tr>
                                    @empty
                                    @endforelse
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
@include('templates.footer')