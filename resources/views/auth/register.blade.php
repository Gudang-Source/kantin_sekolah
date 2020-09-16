@include('templates.auth.header')
@include('templates.auth.banner')

<div class="col-md-6 form-container">
    <div class="col-lg-8 form-box text-center">
        <div class="heading mb-4">
            <h4>Daftar</h4>
        </div>
        <form action="">
            <div class="form-group">
                <input type="text" class="form-control form-control-user" name="name" id="name" placeholder="Nama Lengkap" value="">
                <small class="text-danger text-left"></small>
            </div>
            <div class="form-group">
                <input type="text" class="form-control form-control-user" name="email" id="email" placeholder="Email" value="">
                <small class="text-danger text-left"></small>
            </div>
            <div class="form-group">
                <input type="password" class="form-control form-control-user" name="password1" id="password1" placeholder="Kata Sandi" value="">
            </div>
            <div class="form-group">
                <input type="password" class="form-control form-control-user" name="password2" id="password2" placeholder="Ketik ulang kata sandi">
                <small class="text-danger text-left"></small>
            </div>
            <div class="form-group">
                <input type="number" class="form-control form-control-user" name="telp" id="telp" placeholder="No Telepon" value="">
                <small class="text-danger text-left">></small>
            </div>
            <div class="form-group">
                <input type="file" class="form-control-file" name="image" id="image">
            </div>
            <div class="form-level">
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="level" id="radioAdmin" value="admin" ">
                                <label class=" form-check-label" for="inlineRadio1">Admin</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="level" id="radioKaryawan" value="petugas">
                    <label class="form-check-label" for="inlineRadio2">Karyawan</label>
                </div>
            </div>
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