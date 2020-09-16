@include('templates.auth.header')
@include('templates.auth.banner')

<div class="col-md-6 form-container">
    <div class="col-md-8 form-box text-center">
        <div class="heading mb-4">
            <h4>Masuk</h4>
        </div>

        <form action="{{ route('login') }}" method="post">
            {{ csrf_field() }}
            @if(session()->has('pesanSuccess'))
            <div class="alert alert-success">{{ session()->get('pesanSuccess') }}</div>
            @endif
            @if(session()->has('pesanDanger'))
            <div class="alert alert-danger">{{ session()->get('pesanDanger') }}</div>
            @endif
            <div class="form-group">
                <input type="text" class="form-control form-control-user" name="email" id="email" placeholder="Email" value="">
                <small class="text-danger text-left"></small>
            </div>
            <div class="form-group">
                <input type="password" class="form-control form-control-user" name="password" id="password" placeholder="Kata Sandi">
                <small class="text-danger text-left"></small>
            </div>
            <div class="row mb-3">
                <div class="text-left mb-3">
                    <button type="submit" class="btn">Masuk</button>
                </div>
                <div class="col-6 text-left">
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" id="cb1">
                        <label class="custom-control-label" for="cb1">Ingat Saya</label>
                    </div>
                </div>
                <div class="col-6 text-right">
                    <div class="custom-control custom-checkbox">
                        <a href="{{ url('auth/forgot-password') }}" class="forgot-link">Lupa Kata Sandi</a>
                    </div>
                </div>
            </div>
            <div style="color: #777">Belum punya akun?
                <a href="{{ url('auth/register') }}" class="register-link">Daftar disini</a>
            </div>
        </form>
    </div>
</div>
</div>
</div>

@include('templates.auth.footer')