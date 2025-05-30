<style>
/* Responsive heading scaling */
.responsive-heading {
  font-weight: 700;
  font-size: clamp(1.5rem, 5vw, 3.5rem); /* min 1.5rem, max 3.5rem, scales with viewport */
  line-height: 1.2;
}

.responsive-subheading {
  font-size: clamp(1rem, 3vw, 1.5rem);
  font-weight: 600;
  text-transform: uppercase;
  margin-bottom: 1rem;
}

.responsive-paragraph {
  font-size: clamp(0.9rem, 2vw, 1.25rem);
  margin-bottom: 1.5rem;
}
</style>

<?php  
include('staffheader.php');
?>

<div class="header-carousel owl-carousel owl-theme">
    <div class="header-carousel-item bg-primary">
        <div class="carousel-caption">
            <div class="container">
                <div class="row g-4 align-items-center">
                    <div class="col-12 col-md-7 col-lg-7 animated fadeInLeft">
                        <div class="text-center text-md-start">
                            <h4 class="text-white responsive-subheading">Welcome Staff</h4>
                            <h1 class="text-white responsive-heading">Learning Made Fun and Easy</h1>
                            <p class="text-white responsive-paragraph">Discover a world of knowledge with interactive lessons, exciting activities, and a supportive learning environment.</p>
                            <div class="d-flex justify-content-center justify-content-md-start flex-wrap gap-3 mb-4">
                                <a class="btn btn-light rounded-pill py-3 px-4 px-md-5" href="#">
                                    <i class="fas fa-play-circle me-2"></i> Watch Video
                                </a>
                                <a class="btn btn-dark rounded-pill py-3 px-4 px-md-5" href="#">Learn More</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-5 col-lg-5 animated fadeInRight">
                        <img src="img/carousel-2.png" class="img-fluid w-100" alt="Classroom Image" style="object-fit: cover; max-height: 400px;">
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="header-carousel-item bg-primary">
        <div class="carousel-caption">
            <div class="container">
                <div class="row g-4 align-items-center">
                    <div class="col-12 col-md-5 col-lg-5 animated fadeInLeft">
                        <img src="img/carousel-2.png" class="img-fluid w-100" alt="Classroom Image" style="object-fit: cover; max-height: 400px;">
                    </div>
                    <div class="col-12 col-md-7 col-lg-7 animated fadeInRight">
                        <div class="text-center text-md-end">
                            <h4 class="text-white responsive-subheading">Welcome To Classroom Portal</h4>
                            <h1 class="text-white responsive-heading">Empowering Students for Success</h1>
                            <p class="text-white responsive-paragraph">Engage with expert teachers, collaborate with peers, and achieve your academic goals with our innovative classroom solutions.</p>
                            <div class="d-flex justify-content-center justify-content-md-end flex-wrap gap-3 mb-4">
                                <a class="btn btn-light rounded-pill py-3 px-4 px-md-5" href="#">
                                    <i class="fas fa-play-circle me-2"></i> Watch Video
                                </a>
                                <a class="btn btn-dark rounded-pill py-3 px-4 px-md-5" href="#">Learn More</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
$(document).ready(function(){
  $('.header-carousel').owlCarousel({
    items: 1,
    loop: true,
    autoplay: true,
    autoplayTimeout: 5000,
    smartSpeed: 1000,
    animateOut: 'fadeOut',
    dots: true,
    nav: false,
    responsive: {
      0: { items: 1 },
      768: { items: 1 },
      992: { items: 1 }
    }
  });
});
</script>

<?php
include('commonfooter.php');
?>
