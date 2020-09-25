@include('templates.header')
@include('templates.navbar')

<!-- Content -->
<section>
    <div class="container-fluid mt-4">
        @if(session()->has('pesanDanger'))
        <div class="alert alert-danger">{{ session()->get('pesanDanger') }}</div>
        @endif
        <div class="row">
            <div class="col-md-6">
                <img src="{{ url('assets/img/menu/' . $menu->gambar) }}" alt="{{ $menu->nama_menu }}" width="600px">
            </div>
            <div class="col-md-6">
                <h2>{{ $menu->nama_menu }}</h2>
                <table class="table">
                    <tr>
                        <td>Harga</td>
                        <td> : </td>
                        <td>{{ $menu->harga }}</td>
                    </tr>
                    <tr>
                        <td>Stok</td>
                        <td> : </td>
                        <td>{{ $menu->stok }}</td>
                    </tr>
                    <tr>
                        <td>Jumlah Pesan</td>
                        <td> : </td>
                        <td>
                            <form action="{{ url('order') }}/{{ $menu->id_menu }}" method="POST">
                                @csrf
                                <input type="text" class="form-control" name="jumlah_pesan" style="width: 20%;">
                                <button type="submit" class="btn btn-primary mt-3">Pesan</button>
                            </form>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</section>
<!-- End Of Content -->

@include('templates.footer')