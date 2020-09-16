@include('templates.auth.header')
@include('templates.auth.banner')


<div class="container-fluid">
    <div class="row">
        <div class="col-md-6 image-container">
            <img src="{{ url('assets/img/buildings.png') }}" alt="" class="buildings">
            <img src="{{ url('assets/img/people.png') }}" alt="" class="people">
            <br>
            <p class="title">Layanan Pengaduan <br>
                Masyarakat Secara Online</p>
        </div>

        <div class="col-md-6 form-container">
            <div class="col-md-8 form-box text-center">
                <div class="heading mb-4">
                    <h4>Masukkan Kata Sandi Baru</h4>
                </div>

                <form action="#" method="post">
                    <div class="form-group">
                        <input type="password" class="form-control form-control-user" name="password1" id="password1" placeholder="Kata Sandi" value="">
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control form-control-user" name="password2" id="password2" placeholder="Ketik ulang kata sandi">
                        <small class="text-danger text-left"></small>
                    </div>
                    <div class="row mb-3">
                        <div class="text-left mb-3">
                            <button type="submit" class="btn">Kirim</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@include('templates.auth.footer')