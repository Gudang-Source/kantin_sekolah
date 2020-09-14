@extends('templates.header')

<section id="carousel">
    <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
            <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="{!! asset('assets/img/carousel/carousel1.jpg') !!}" class="d-block image-carousel" alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <h5>Selamat Datang</h5>
                    <p><strong>KantinKu</strong> Merupakan kantin terbaik di Bumi.</p>
                </div>
            </div>
            <div class="carousel-item">
                <img src="{!! asset('assets/img/carousel/carousel2.jpg') !!}" class="d-block image-carousel" alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <h5>Bersih</h5>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                </div>
            </div>
            <div class="carousel-item">
                <img src="{!! asset('assets/img/carousel/carousel3.png') !!}" class="d-block image-carousel" alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <h5>Halal</h5>
                    <p>Praesent commodo cursus magna, vel scelerisque nisl consectetur.</p>
                </div>
            </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
</section>

<section id="content">
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <h1>Paling Laris</h1>
            </div>
        </div>
    </div>
</section>
@extends('templates.footer')