@include('templates.admin.header')
@include('templates.admin.sidebar')
@include('templates.admin.topbar')

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
                                <li class="list-inline-item seprate">
                                    <span>/</span>
                                </li>
                                <li class="list-inline-item">Masyarakat</li>
                            </ul>
                        </div>
                        <button class="au-btn au-btn-icon au-btn--green" data-toggle="modal" data-target="#mediumModal">
                            <i class="zmdi zmdi-plus"></i>Tambah Menu</button>
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
                        <h5 class="card-title">Data Masyarakat</h5>
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
                                        <th>Nama Menu</th>
                                        <th>Harga</th>
                                        <th>Kategori</th>
                                        <th>Stok</th>
                                        <th style="max-width: 140px;">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        @forelse ($data_menu as $menu)
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $menu->nama_menu }}</td>
                                        <td>{{ $menu->harga }}</td>
                                        <td>{{ $menu->kategori_menu }}</td>
                                        <td>{{ $menu->stok }}</td>
                                        <td>
                                            <!-- Button trigger modal -->
                                            <a href="/admin/menu/detail/{{ $menu->id_menu }}" class="btn btn-success">
                                                <i class="fas fa-eye"></i>
                                            </a>
                                            <a href="/admin/menu/edit/{{ $menu->id_menu }}" class="btn btn-warning">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <a href="/admin/menu/delete/{{ $menu->id_menu }}" class="btn btn-danger">
                                                <i class="fas fa-trash"></i>
                                            </a>
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

<!-- Modal -->
<!-- tambah menu -->
<div class="modal fade" id="mediumModal" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="judulTambah">Buat menu</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body ">
                <form method="POST" action="{{ url('/admin/menu') }}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Nama menu</label>
                        <input type="text" class="form-control" name="nama_menu" id="exampleFormControlInput1" placeholder="">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Kategori Menu</label>
                        <select name="kategori_menu" id="kategori" class="form-control">
                            <option value="..." disabled>Pilih Kategori...</option>
                            <option value="Makanan">Makanan</option>
                            <option value="Minuman">Minuman</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Harga</label>
                        <input type="number" class="form-control" name="harga" id="harga" placeholder="">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Jumlah</label>
                        <input type="number" class="form-control" name="stok" id="stok" placeholder="">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Gambar</label>
                        <br>
                        <input type="file" name="gambar" id="gambar" placeholder="">
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
<!-- end tambah menu -->
@include('templates.admin.footer')