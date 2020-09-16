@include('templates.auth.header')
@include('templates.auth.banner')

<div class="col-md-6 form-container">
    <div class="col-lg-8 form-box text-center">
        <div class="heading mb-4">
            <h4>Daftar</h4>
        </div>
        <form action="{{ route('register') }}" method="POST" enctype="multipart/form-data">
            {{ csrf_field() }}
            @if(session()->has('pesanSuccess'))
            <div class="alert alert-success">{{ session()->get('pesanSuccess') }}</div>
            @endif
            @if(session()->has('pesanDanger'))
            <div class="alert alert-danger">{{ session()->get('pesanDanger') }}</div>
            @endif
            <div class="form-group">
                <input type="text" class="form-control form-control-user" name="nama" id="nama" placeholder="Nama Lengkap" value="">
                <small class="text-danger text-left"></small>
            </div>
            <div class="form-group">
                <input type="text" class="form-control form-control-user" name="email" id="email" placeholder="Email" value="">
                <small class="text-danger text-left"></small>
            </div>
            <div class="form-group">
                <input type="password" class="form-control form-control-user" name="password" id="password" placeholder="Kata Sandi" value="">
            </div>
            <div class="form-group">
                <input type="password" class="form-control form-control-user" name="password_confirmation" id="password_confirmation" placeholder="Ketik ulang kata sandi">
                <small class="text-danger text-left"></small>
            </div>
            <div class="form-group">
                <input type="file" class="form-control-file" name="gambar" id="gambar">
            </div>
            <input type="hidden" class="form-control-file" name="id_level" id="id_level" value="1">
            <div class="row mb-3">
                <div class="text-left mb-3">
                    <button type="submit" class="btn">Daftar</button>
                </div>
            </div>
            <div style="color: #777;">Sudah punya akun?
                <a href="{{ url('auth/login') }}" class="login-link">Masuk disini</a>
            </div>
        </form>
    </div>
</div>
</div>
</div>

@include('templates.auth.footer')