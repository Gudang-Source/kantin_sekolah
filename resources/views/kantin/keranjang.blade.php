@include('templates.header')
@include('templates.navbar')

<!-- Content -->
<section>
    <div class="container-fluid">
        <div class="row mt-4">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Keranjang</h5>
                        @if(session()->has('pesanSuccess'))
                        <div class="alert alert-success">{{ session()->get('pesanSuccess') }}</div>
                        @endif
                        @if(session()->has('pesanDanger'))
                        <div class="alert alert-danger">{{ session()->get('pesanDanger') }}</div>
                        @endif
                        <div class="table-responsive">
                            <table class="table table-bordered" id="tabelMenu" width="100%" cellspacing="0">
                                <thead style="font-weight: bold;">
                                    <tr class="text-center">
                                        <th>#</th>
                                        <th>$order</th>
                                        <th>Harga</th>
                                        <th>Jumlah</th>
                                        <th>Sub Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($detail_orders as $detail_order)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $detail_order->menus->nama_menu }}</td>
                                        <td>{{ $detail_order->id_menu }}</td>
                                        <td>{{ $detail_order->jumlah }}</td>
                                        <td>{{ $detail_order->sub_total }}</td>
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