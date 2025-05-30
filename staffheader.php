<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>CR-Portal</title>

  <!-- Google Web Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=DM+Sans&family=Inter&display=swap" rel="stylesheet">

  <!-- Font Awesome & Bootstrap Icons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" crossorigin="anonymous" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css" rel="stylesheet">

  <!-- CSS Libraries -->
  <link rel="stylesheet" href="lib/animate/animate.min.css">
  <link rel="stylesheet" href="lib/lightbox/css/lightbox.min.css">
  <link rel="stylesheet" href="lib/owlcarousel/assets/owl.carousel.min.css">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/style.css">

  <!-- JS Libraries (defer for performance) -->
  <script src="https://code.jquery.com/jquery-3.6.4.min.js" crossorigin="anonymous" defer></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous" defer></script>
  <script src="lib/wow/wow.min.js" defer></script>
  <script src="lib/easing/easing.min.js" defer></script>
  <script src="lib/waypoints/waypoints.min.js" defer></script>
  <script src="lib/counterup/counterup.min.js" defer></script>
  <script src="lib/lightbox/js/lightbox.min.js" defer></script>
  <script src="lib/owlcarousel/owl.carousel.min.js" defer></script>
  <script src="js/main.js" defer></script>
</head>
<body>
  <!-- Spinner -->
  <div id="spinner" class="position-fixed top-50 start-50 translate-middle w-100 vh-100 bg-white d-flex justify-content-center align-items-center z-3">
    <div class="spinner-border text-primary" role="status" style="width: 3rem; height: 3rem;"></div>
  </div>

  <!-- Topbar -->
  <div class="container-fluid bg-light py-2 d-none d-lg-block">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-lg-8">
          <div class="d-flex flex-wrap">
            <div class="me-3">
              <a href="#" class="text-muted small">
                <i class="fas fa-map-marker-alt text-primary me-1"></i> Find A Location
              </a>
            </div>
            <div>
              <a href="mailto:example@gmail.com" class="text-muted small">
                <i class="fas fa-envelope text-primary me-1"></i> example@gmail.com
              </a>
            </div>
          </div>
        </div>
        <div class="col-lg-4 text-end">
          <div class="d-inline-flex align-items-center">
            <div class="me-3">
              <a class="text-primary me-2" href="#"><i class="fab fa-facebook-f"></i></a>
              <a class="text-primary me-2" href="#"><i class="fab fa-twitter"></i></a>
              <a class="text-primary me-2" href="#"><i class="fab fa-instagram"></i></a>
              <a class="text-primary" href="#"><i class="fab fa-linkedin-in"></i></a>
            </div>
            <div class="dropdown">
              <a href="#" class="dropdown-toggle text-dark small" data-bs-toggle="dropdown">
                <i class="fas fa-globe-europe text-primary me-1"></i> English
              </a>
              <ul class="dropdown-menu">
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

  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm sticky-top">
    <div class="container">
      <a class="navbar-brand d-flex align-items-center" href="#">
        <h1 class="text-primary fs-4 mb-0"><i class="bi bi-bookmark-star me-2"></i> CR-Portal</h1>
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarCollapse">
        <ul class="navbar-nav mx-auto">
          <li class="nav-item"><a class="nav-link active" href="./staffhome.php">Home</a></li>
          <li class="nav-item"><a class="nav-link" href="./staffassignment.php">Assignments</a></li>
          <li class="nav-item"><a class="nav-link" href="./staffreport.php">Report</a></li>
          <li class="nav-item"><a class="nav-link" href="./staffvideos.php">Add Videos</a></li>
          <li class="nav-item"><a class="nav-link" href="./staffnotes.php">Add Notes</a></li>
          <li class="nav-item"><a class="nav-link" href="./staffaudio.php">Add Audios</a></li>
          <li class="nav-item"><a class="nav-link" href="./staffviewvideos.php">View Videos</a></li>
          <li class="nav-item"><a class="nav-link" href="./staffviewnotes.php">View Notes</a></li>
          <li class="nav-item"><a class="nav-link" href="./staffviewaudios.php">View Audios</a></li>
          <li class="nav-item"><a class="nav-link" href="login.php">Logout</a></li>
        </ul>
        <div class="d-none d-lg-flex align-items-center">
          <a class="btn btn-light btn-lg-square rounded-circle position-relative wow tada" data-wow-delay=".9s" href="#">
            <i class="fa fa-phone-alt fa-lg"></i>
            <span class="position-absolute top-0 end-0">
              <i class="fa fa-comment-dots text-secondary"></i>
            </span>
          </a>
          <div class="ms-3 d-none d-xl-block">
            <span class="small">Call to Our Experts</span><br />
            <a href="tel:+01234567890" class="text-dark small">Free: +0123 456 7890</a>
          </div>
        </div>
      </div>
    </div>
  </nav>
</body>
</html>