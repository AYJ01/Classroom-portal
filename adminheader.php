<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CR-Portal</title>

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans&family=Inter&display=swap" rel="stylesheet">

    <!-- Icon Fonts -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- CSS Libraries -->
    <link href="lib/animate/animate.min.css" rel="stylesheet">
    <link href="lib/lightbox/css/lightbox.min.css" rel="stylesheet">
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Bootstrap & Custom Styles -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
</head>
<body>

<!-- Spinner Start -->
<div id="spinner" class="show bg-white position-fixed w-100 vh-100 top-0 start-0 d-flex align-items-center justify-content-center">
    <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
        <span class="visually-hidden">Loading...</span>
    </div>
</div>
<!-- Spinner End -->

<!-- Topbar Start -->
<div class="container-fluid bg-light py-2 px-3 px-lg-4 d-none d-lg-block">
    <div class="container">
        <div class="row align-items-center gx-0">
            <div class="col-lg-8 text-center text-lg-start mb-2 mb-lg-0">
                <div class="d-flex flex-wrap justify-content-center justify-content-lg-start">
                    <div class="border-end border-primary pe-3 me-3">
                        <a href="#" class="text-muted small"><i class="fas fa-map-marker-alt text-primary me-2"></i>Find A Location</a>
                    </div>
                    <div>
                        <a href="mailto:example@gmail.com" class="text-muted small"><i class="fas fa-envelope text-primary me-2"></i>example@gmail.com</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 text-center text-lg-end">
                <div class="d-flex justify-content-center justify-content-lg-end align-items-center">
                    <div class="d-flex me-3">
                        <a class="text-primary me-2" href="#"><i class="fab fa-facebook-f"></i></a>
                        <a class="text-primary me-2" href="#"><i class="fab fa-twitter"></i></a>
                        <a class="text-primary me-2" href="#"><i class="fab fa-instagram"></i></a>
                        <a class="text-primary" href="#"><i class="fab fa-linkedin-in"></i></a>
                    </div>
                    <div class="dropdown">
                        <a href="#" class="dropdown-toggle text-dark small" data-bs-toggle="dropdown">
                            <i class="fas fa-globe-europe text-primary me-1"></i> English
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end">
                            <li><a class="dropdown-item" href="#">English</a></li>
                            <li><a class="dropdown-item" href="#">Bangla</a></li>
                            <li><a class="dropdown-item" href="#">French</a></li>
                            <li><a class="dropdown-item" href="#">Spanish</a></li>
                            <li><a class="dropdown-item" href="#">Arabic</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Topbar End -->

<!-- Navbar Start -->
<div class="container-fluid nav-bar px-0 px-lg-4">
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-light py-3">
            <a href="#" class="navbar-brand p-0">
                <h1 class="text-primary mb-0"><i class="bi bi-bookmark-star"></i> CR-Portal</h1>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                <span class="fa fa-bars"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <div class="navbar-nav ms-auto">
                    <a href="./adminhome.php" class="nav-item nav-link active">Home</a>
                    <a href="./adminmaterials.php" class="nav-item nav-link">Materials</a>
                    <a href="./adminreport.php" class="nav-item nav-link">Report</a>
                    <a href="./addstaff.php" class="nav-item nav-link"><i class="fas fa-plus-circle"></i>Staffs</a>
                    <a href="./adduser.php" class="nav-item nav-link"><i class="fas fa-plus-circle"></i>Students</a>
                    <a href="./viewstaff.php" class="nav-item nav-link"><i class="fas fa-eye"></i>Staffs</a>
                    <a href="./viewuser.php" class="nav-item nav-link"><i class="fas fa-eye"></i>Students</a>
                    <a href="login.php" class="nav-item nav-link">Logout</a>
                </div>
            </div>

            <!-- Contact Button -->
            <div class="d-none d-xl-flex align-items-center ms-4">
                <a href="#" class="btn btn-light btn-lg-square rounded-circle position-relative wow tada" data-wow-delay=".9s">
                    <i class="fa fa-phone-alt fa-2x"></i>
                    <div class="position-absolute" style="top: 7px; right: 12px;">
                        <span><i class="fa fa-comment-dots text-secondary"></i></span>
                    </div>
                </a>
                <div class="d-flex flex-column ms-3">
                    <span>Call to Our Experts</span>
                    <a href="tel:+01234567890"><span class="text-dark">Free: +0123 456 7890</span></a>
                </div>
            </div>
        </nav>
    </div>
</div>
<!-- Navbar End -->

<!-- Scripts -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="lib/wow/wow.min.js"></script>
<script src="lib/easing/easing.min.js"></script>
<script src="lib/waypoints/waypoints.min.js"></script>
<script src="lib/counterup/counterup.min.js"></script>
<script src="lib/lightbox/js/lightbox.min.js"></script>
<script src="lib/owlcarousel/owl.carousel.min.js"></script>
<script src="js/main.js"></script>

</body>
</html>
