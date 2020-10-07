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
                                <li class="list-inline-item">Profile</li>
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
            <div class="col-xl-8">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title mb-4">Profile</h4>
                        @if(session()->has('pesanSuccess'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">{{ Session::get('pesanSuccess') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        @endif
                        <form method="POST" action="{{ url('/kasir/profile/edit') }}" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label for="inputAddress">ID</label>
                                <input type="text" class="form-control" name="id_user" id="id_user" value="{{ $user->id_user }}" readonly>
                            </div>
                            <div class="form-group">
                                <label for="inputAddress">Nama</label>
                                <input type="text" class="form-control" name="nama" id="nama" value="{{ $user->nama }}">
                            </div>
                            <div class="form-group">
                                <label for="inputEmail4">Email</label>
                                <input type="email" class="form-control" name="email" id="email" value="{{ $user->email }}">
                            </div>
                            <div class="form-row" id="ubah-password">
                                <div class="form-group col-md-6">
                                    <label for="inputPassword4">Password</label>
                                    <input type="password" class="form-control" name="password1" id="password" value="">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="inputPassword4">Konfirmasi Password</label>
                                    <input type="password" class="form-control" name="password2" id="password" value="">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlFile1">Foto Profile</label>
                                <input type="file" class="form-control-file" name="image" id="exampleFormControlFile1">
                            </div>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-xl-4">
                <div class="card">
                    <div class="card-body">
                        <div class="account2">
                            <div class="image img-cir">
                                <img src="{{ url('assets/img/user/' . $user->gambar) }}" alt="{{ $user->nama }}" style="border-radius: 100%; width:150px; height:150px" />
                            </div>
                            <h4 class="name">{{ $user->nama }}</h4>
                            <?php

                            use Illuminate\Support\Facades\Session;

                            $id_level = Session::get('id_level');

                            if ($id_level == "1") {
                                $level = "Admin";
                            } else if ($id_level == "2") {
                                $level = "Waiter";
                            } else if ($id_level == "3") {
                                $level = "Kasir";
                            }
                            ?>
                            <p>{{ $level }}</p>
                        </div>
                    </div>
                </div>
                <div align="center" class="mt-3">
                    <p class="btn btn-warning" id="btn-ubah-password">Ubah Password</p>
                    <p class="btn btn-warning" id="btn-batal-ubah-password">Batal ubah password</p>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End Of Content -->
@include('templates.footer')