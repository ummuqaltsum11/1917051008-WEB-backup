<section class="content">
    <?php if (session()->getFlashdata('pesan')) : ?>
        <div align="center" class="alert alert-success" role="alert">
        <?= session()->getFlashdata('pesan'); ?>
    </div>
<?php endif; ?>

<div class="container mt-3">
    <br><h1 class="text-center">Selamat Datang di Yuki Blog</h1><br><br>

    <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-indicators">
        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
    </div>
    <div align="center" class="carousel-inner">
        <div class="carousel-item active">
        <img width="1400px" height="400px" src="/assets/images/caro1.jpg" alt="...">
        <div class="carousel-caption d-none d-md-block">
            <h5>Eunseom - Arthdal Chronicles</h5>
            <p>"Give me a name. Give me something so that I keep on going. So that I won’t give up"</p>
        </div>
        </div>
        <div class="carousel-item">
        <img width="1400px" height="400px" src="/assets/images/caro2.jpg" alt="...">
        <div class="carousel-caption d-none d-md-block">
            <h5>Saya - Arthdal Chronicles</h5>
            <p>"Everyone is living in their own tragedy"</p>
        </div>
        </div>
        <div class="carousel-item">
        <img width="1400px" height="400px"  src="/assets/images/caro3.jpg"  alt="...">
        <div class="carousel-caption d-none d-md-block">
            <h5>Tagon - Arthdal Chronicles</h5>
            <p>"You will never be able to save your people because you have no idea what this place is, what a nation is, and what moves the world"</p>
        </div>
        </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
</div>


</div>