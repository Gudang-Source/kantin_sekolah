@include(templates.auth.header)
@include(templates.auth.banner)

<div class="col-md-6 form-container">
    <div class="col-md-8 form-box text-center">
        <div class="heading mb-4">
            <h4>Masukkan Email Anda</h4>
        </div>

        <form action="#" method="post">
            <div class="form-group">
                <input type="text" class="form-control form-control-user" name="email" id="email" placeholder="Email" value="">
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