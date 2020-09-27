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
                                    <a href="#">Admin</a>
                                </li>
                                <li class="list-inline-item seprate">
                                    <span>/</span>
                                </li>
                                <li class="list-inline-item">Kateogori</li>
                            </ul>
                        </div>
                        </div>
                        <button class="au-btn au-btn-icon au-btn--green" data-toggle="modal" data-target="#mediumModal">
                            <i class="zmdi zmdi-plus"></i>Tambah Masyarakat</button>
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
                            <table class="table table-bordered" id="tabelKategori" width="100%" cellspacing="0">
                                <thead style="font-weight: bold;">
                                    <tr class="text-center">
                                        <th>#</th>
                                        <th>Nama Kategori</th>
                                        <th style="max-width: 140px;">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        @forelse ($kategoris as $kategori)
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $kategori->kategori_menu }}</td>
                                        <td>
                                            <!-- Button trigger modal -->
                                            <a href="#" class="btn btn-success">
                                                <i class="fas fa-eye"></i>
                                            </a>
                                            <a href="#" class="btn btn-warning">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <a href="/admin/kategori/delete/{{ $kategori->id_kategori }}" class="btn btn-danger">
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
                <h5 class="modal-title" id="judulTambah">Tambah Kategori</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body ">
                <form method="POST" action="{{ url('/admin/menu') }}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Nama kategori</label>
                        <input type="text" class="form-control" name="kategori" id="exampleFormControlInput1" placeholder="">
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
@include('templates.admin_kasir.footer')