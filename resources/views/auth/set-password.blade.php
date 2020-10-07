@include('templates.auth.header')
@include('templates.auth.banner')

<div class="col-md-6 form-container">
    <div class="col-md-8 form-box text-center">
        <div class="heading mb-4">
            <h4>Masukkan Kata Sandi Baru</h4>
        </div>

        <form action="{{ route('proses.set.password') }}" method="POST">
            @if(session()->has('pesanSuccess'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">{{ Session::get('pesanSuccess') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            @endif
            @csrf
            <div class="form-group">
                <input type="password" class="form-control form-control-user" name="password" id="password" placeholder="Kata Sandi" value="">
            </div>
            <div class="form-group">
                <input type="password" class="form-control form-control-user" name="password_confirmation" id="password_confirmation" placeholder="Ketik ulang kata sandi">
                <small class="text-danger text-left"></small>
            </div>
            <div class="row mb-3">
                <div class="text-left mb-3">
                    <input type="hidden" name="id_user" id="id_user" value="{{ $user->id_user }}">
                    <button type="submit" class="btn">Kirim</button>
                </div>
            </div>
        </form>
    </div>
</div>
</div>
</div>

@include('templates.auth.footer')