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
                                <li class="list-inline-item">Edit Menu</li>
                            </ul>
                        </div>
                        <a href="{{ url('admin/menu') }}" class="au-btn au-btn-icon au-btn--green">
                            <i class="zmdi zmdi-arrow-missed"></i>Kembali</button>
                        </a>
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

        <!-- Pending -->
        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Edit Menu : {{ $menu->nama_menu }}</h5>
                        <form action="{{ url('/admin/menu/edit', ['menu'=>$menu->id_menu]) }}" method="post" enctype="multipart/form-data">
                            @method('PATCH')
                            @csrf
                            <div class="form-group">
                                <label for="">Nama Menu</label>
                                <input type="text" class="form-control" name="nama_menu" value="{{ $menu->nama_menu }}">
                            </div>
                            <div class="form-group">
                                <label for="">Harga</label>
                                <input type="number" class="form-control" name="harga" value="{{ $menu->harga }}">
                            </div>
                            <div class="form-group">
                                <label for="">Kategori Menu</label>
                                <select name="kategori_menu" id="" class="form-control">
                                    <option value="{{ $menu->kategori_menu }}">{{ $menu->kategori_menu }}</option>
                                    <option value="Makanan">Makanan</option>
                                    <option value="Minuman">Minuman</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="">Stok</label>
                                <input type="number" class="form-control" name="stok" value="{{ $menu->stok }}">
                            </div>
                            <div class="form-group">
                                <label for="">Gambar</label>
                                <br>
                                <img src="{{ url('assets/img/menu/', $menu->gambar) }}" width="200px" alt="">
                                <br>
                                <input type="file" name="gambar" id="gambar" placeholder="" class="mt-3">
                            </div>
                            <button class="btn btn-primary" type="submit">
                                <i class="fas fa-save"> Simpan</i>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End Of Content -->
@include('templates.admin.footer')