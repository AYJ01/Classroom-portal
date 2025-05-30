<?php  
include('adminheader.php');
include('connection.php');
?>

<style>
/* Responsive tweaks for small devices */
@media (max-width: 768px) {
    .team-icon p {
        font-size: 11px !important;
        margin: 2px 0;
    }
    .team-title h4 {
        font-size: 15px;
        margin-bottom: 4px;
    }
    .team-title p {
        font-size: 12px;
    }
    .team-img img {
        height: 180px !important;
        object-fit: cover;
    }
    .team-title {
        padding: 10px !important;
    }
}

.team-img img {
    height: 250px;
    object-fit: cover;
}
.team-icon {
    background-color: azure;
    border-radius: 15px;
    color: black;
    margin-top: 5px;
    font-size: 13px;
}
</style>

<div class="container-fluid team pb-4">
    <div class="container pb-4">
        <div class="text-center mx-auto pb-4 wow fadeInUp" data-wow-delay="0.2s" style="max-width: 800px;">
            <h4 class="text-primary">Our Staffs</h4>
            <h1 class="h3 mb-3">Meet Our Expert Team Members</h1>
        </div>

        <div class="row g-3">
            <?php
            $qry = "SELECT * from `staff`";
            $data = mysqli_query($con, $qry);
            if ($data) {
                while ($row = mysqli_fetch_array($data)) {
            ?>
            <div class="col-12 col-sm-6 col-md-4 col-lg-3 wow fadeInUp" data-wow-delay="0.2s">
                <div class="team-item border rounded shadow-sm h-100">
                    <div class="team-img position-relative text-center">
                        <img src="<?php echo $row['image'] ?>" class="img-fluid rounded-top w-100" alt="">
                        <div class="team-icon text-center p-2">
                            <p>Email: <?php echo $row['email'] ?></p>
                            <p>Contact: <?php echo $row['contact'] ?></p>
                            <p>Joined: <?php echo $row['joinedtime'] ?></p>
                        </div>
                    </div>
                    <div class="team-title p-3 text-center">
                        <h4 class="mb-1"><?php echo $row['name'] ?></h4>
                        <p class="mb-0"><?php echo $row['description'] ?></p>
                    </div>
                </div>
            </div>
            <?php }} ?>
        </div>
    </div>
</div>

<?php include('commonfooter.php'); ?>
