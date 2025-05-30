<?php include('adminheader.php'); ?>

<!-- Owl Carousel and Bootstrap dependencies -->
<!-- Make sure this is included in your adminheader.php or here -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css" rel="stylesheet">

<style>
    .header-carousel-item {
        min-height: 100vh;
        display: flex;
        align-items: center;
        background-color: #0d6efd; /* Bootstrap primary */
    }

    .carousel-caption {
        color: white;
        padding: 2rem;
    }

    .carousel-img img {
        max-height: 400px;
        object-fit: contain;
        width: 100%;
    }

    @media (max-width: 768px) {
        .carousel-caption h1 {
            font-size: 2rem;
        }
        .carousel-caption p {
            font-size: 1rem;
        }
    }
</style>

<div class="header-carousel owl-carousel owl-theme">
    <!-- Slide 1 -->
    <div class="header-carousel-item">
        <div class="carousel-caption w-100 text-center text-md-start">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-md-7">
                        <h4 class="text-uppercase fw-bold mb-3">Welcome To Classroom Portal</h4>
                        <h1 class="display-4 fw-bold mb-3">Learning Made Fun and Easy</h1>
                        <p class="mb-4 fs-5">Discover a world of knowledge with interactive lessons, exciting activities, and a supportive learning environment.</p>
                        <div class="d-flex justify-content-center justify-content-md-start flex-wrap">
                            <a class="btn btn-light rounded-pill py-2 px-4 me-2 mb-2" href="#"><i class="fas fa-play-circle me-2"></i>Watch Video</a>
                            <a class="btn btn-dark rounded-pill py-2 px-4 ms-2 mb-2" href="#">Learn More</a>
                        </div>
                    </div>
                    <div class="col-md-5 text-center">
                        <div class="carousel-img mt-4 mt-md-0">
                            <img src="img/carousel-2.png" alt="Classroom Image">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Slide 2 -->
    <div class="header-carousel-item">
        <div class="carousel-caption w-100 text-center text-md-end">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-md-5 text-center">
                        <div class="carousel-img mb-4 mb-md-0">
                            <img src="img/carousel-2.png" alt="Classroom Image">
                        </div>
                    </div>
                    <div class="col-md-7">
                        <h4 class="text-uppercase fw-bold mb-3">Welcome Admin</h4>
                        <h1 class="display-4 fw-bold mb-3">Empowering Students for Success</h1>
                        <p class="mb-4 fs-5">Engage with expert teachers, collaborate with peers, and achieve your academic goals with our innovative classroom solutions.</p>
                        <div class="d-flex justify-content-center justify-content-md-end flex-wrap">
                            <a class="btn btn-light rounded-pill py-2 px-4 me-2 mb-2" href="#"><i class="fas fa-play-circle me-2"></i>Watch Video</a>
                            <a class="btn btn-dark rounded-pill py-2 px-4 ms-2 mb-2" href="#">Learn More</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- JS includes (ideally place in footer) -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>

<script>
    $(document).ready(function(){
        $(".header-carousel").owlCarousel({
            items: 1,
            loop: true,
            autoplay: true,
            autoplayTimeout: 5000,
            animateOut: 'fadeOut',
            dots: true,
            nav: false
        });
    });
</script>

<?php include('commonfooter.php'); ?>
