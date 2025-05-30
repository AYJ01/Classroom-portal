<?php  
include('adminheader.php');
include('connection.php');
?>

<style>
@media (max-width: 768px) {
    .testimonial-item h4 {
        font-size: 16px;
    }
    .testimonial-item p {
        font-size: 12px;
        margin-bottom: 4px !important;
    }
    .testimonial-item img {
        height: 120px !important;
    }
}
.testimonial-item img {
    height: 100%;
    object-fit: cover;
}
</style>

<div class="container-fluid testimonial py-5">
    <div class="container py-5">
        <div class="text-center mx-auto pb-4 wow fadeInUp" data-wow-delay="0.2s" style="max-width: 800px;">
            <h4 class="text-primary">Students</h4>
            <h1 class="display-5 mb-4">These Are Our Students</h1>
        </div>
        <div class="owl-carousel testimonial-carousel wow fadeInUp" data-wow-delay="0.2s">
            <?php
            $qry = "SELECT * from `student`";
            $data = mysqli_query($con, $qry);
            if ($data) {
                while ($row = mysqli_fetch_array($data)) {
            ?>
            <div class="testimonial-item bg-light rounded">
                <div class="row g-0 align-items-center">
                    <div class="col-4 col-lg-4 col-xl-3">
                        <img src="<?php echo $row['image'] ?>" class="img-fluid h-100 rounded-start" alt="">
                    </div>
                    <div class="col-8 col-lg-8 col-xl-9">
                        <div class="d-flex flex-column text-start p-3">
                            <h4 class="text-dark mb-1"><?php echo $row['name'] ?></h4>
                            <p class="mb-1 text-muted"><?php echo $row['email'] ?></p>
                            <p class="mb-1 text-primary">Class: <?php echo $row['class'] ?></p>
                            <p class="mb-1 text-primary">Contact: <?php echo $row['contact'] ?></p>
                            <p class="mb-0 text-primary">Register No: <?php echo $row['register_no'] ?></p>
                        </div>
                    </div>
                </div>
            </div>
            <?php }} ?>
        </div>
    </div>
</div>

<?php include('commonfooter.php'); ?>
