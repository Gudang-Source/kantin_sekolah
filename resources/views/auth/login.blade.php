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
            <div class="alert alert-success alert-dismissible fade show" role="alert">{{ Session::get('pesanSuccess') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            @endif
            @if(session()->has('pesanDanger'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">{{ Session::get('pesanDanger') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            @endif
            @if(session()->has('pesanLogin'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">{{ Session::get('pesanLogin') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            @endif
            <div class="form-group">
                <input type="text" class="form-control form-control-user" name="email" id="email" placeholder="Email" value="" required>
                <small class="text-danger text-left"></small>
            </div>
            <div class="form-group">
                <input type="password" class="form-control form-control-user password" name="password" id="password" placeholder="Kata Sandi" required>
                <small class="text-danger text-left"></small>
            </div>
            <div class="row mb-3">
                <div class="text-left mb-3">
                    <button type="submit" class="btn btn-primary">Masuk</button>
                </div>
                <div class="col-6 text-left">
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input showPass" id="showPass">
                        <label class="custom-control-label" for="showPass">Lihat Password</label>
                    </div>
                </div>
                <div class="col-6 text-right">
                    <div class="custom-control custom-checkbox">
                        <a href="{{ route('lupa.password') }}" class="forgot-link">Lupa Kata Sandi</a>
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