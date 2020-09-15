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
                        <form action="{{ route('menu.update', $menu->id_menu) }}" method="post">
                            @method('PATCH')
                            @csrf
                            <div class="form-group">
                                <label for="">Nama Menu</label>
                                <input type="text" class="form-control" value="{{ $menu->nama_menu }}">
                            </div>
                            <div class="form-group">
                                <label for="">Harga</label>
                                <input type="number" class="form-control" value="{{ $menu->harga }}">
                            </div>
                            <div class="form-group">
                                <label for="">Kategori Menu</label>
                                <input type="text" class="form-control" value="{{ $menu->kategori }}">
                            </div>
                            <div class="form-group">
                                <label for="">Stok</label>
                                <input type="number" class="form-control" value="{{ $menu->stok }}">
                            </div>
                            <button class="btn btn-primary">
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