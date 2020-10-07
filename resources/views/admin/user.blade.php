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
                                    <a href="#">Admin</a>
                                </li>
                                <li class="list-inline-item seprate">
                                    <span>/</span>
                                </li>
                                <li class="list-inline-item">USer</li>
                            </ul>
                        </div>
                        <button class="au-btn au-btn-icon au-btn--green" data-toggle="modal" data-target="#mediumModal">
                            <i class="zmdi zmdi-plus"></i>Tambah User</button>
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
                        <h5 class="card-title">Data User</h5>
                        <div align="right" class="mb-4">
                            <button class="btn btn-primary"><i class="zmdi zmdi-print"></i> Cetak</button>
                        </div>
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
                                        <th>Nama</th>
                                        <th>Email</th>
                                        <th>Level</th>
                                        <th>Gambar</th>
                                        <th style="max-width: 110px;">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        @foreach ($allUser as $user)
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $user->nama }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>{{ $user->level->nama_level }}</td>
                                        <td><img src="{{ url('assets/img/user') }}/{{ $user->gambar }}" width="100"></td>
                                        <td>
                                            <!-- Button trigger modal -->
                                            <a href="/admin/user/detail/{{ $user->id_user }}" class="btn btn-success">
                                                <i class="fas fa-eye"></i>
                                            </a>
                                            <a href="/admin/user/edit/{{ $user->id_user }}" class="btn btn-warning">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <a href="/admin/user/delete/{{ $user->id_user }}" class="btn btn-danger">
                                                <i class="fas fa-trash"></i>
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

<!-- Modal -->
<!-- tambah menu -->
<div class="modal fade" id="mediumModal" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="judulTambah">Tambah User</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body ">
                <form method="POST" action="{{ url('/admin/user') }}" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Nama User</label>
                        <input type="text" class="form-control" name="nama" id="exampleFormControlInput1">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Email</label>
                        <input type="email" class="form-control form-control-user" name="email" id="email">
                        <small class="text-danger text-left"></small>
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Kata Sandi</label>
                        <input type="password" class="form-control form-control-user" name="password" id="password">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Ketik ulang kata sandi</label>
                        <input type="password" class="form-control form-control-user" name="password_confirmation" id="password_confirmation">
                        <small class="text-danger text-left"></small>
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Level</label>
                        <select name="level" id="level" class="form-control">
                            <option value="1">Admin</option>
                            <option value="2">Waiter</option>
                            <option value="3">Kasir</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Gambar</label>
                        <input type="file" class="form-control-file" name="gambar" id="gambar">
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
@include('templates.footer')