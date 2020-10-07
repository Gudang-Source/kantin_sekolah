@include('templates.auth.header')
@include('templates.auth.banner')

<div class="col-md-6 form-container">
    <div class="col-md-8 form-box text-center">
        <div class="heading mb-4">
            <h4>Masukkan Email Anda</h4>
        </div>

        <form action="{{ route('cari.email') }}" method="POST">
            @if(session()->has('pesanDanger'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">{{ Session::get('pesanDanger') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            @endif
            @csrf
            <div class="form-group">
                <input type="email" class="form-control form-control-user" name="email" id="email" placeholder="Email" value="" required>
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