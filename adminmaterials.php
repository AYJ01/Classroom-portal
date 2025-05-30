<?php  
include('adminheader.php');
include('connection.php');
?>

<div class="container-fluid py-5">
    <div class="container">
        
        <!-- Section: Videos -->
        <div class="text-center pb-5 wow fadeInUp" data-wow-delay="0.2s">
            <h3 class="display-4 mb-4">Videos</h3>
        </div>
        <div class="row g-4">
            <?php
            $data = mysqli_query($con, "SELECT * FROM videos");
            if ($data) {
                while ($row = mysqli_fetch_array($data)) {
            ?>
            <div class="col-sm-6 col-lg-4 col-xl-3 wow fadeInUp" data-wow-delay="0.2s">
                <div class="team-item">
                    <video class="img-fluid rounded w-100" height="250" autoplay controls>
                        <source src="<?= $row['video'] ?>" type="video/mp4">
                        <source src="<?= $row['video'] ?>" type="video/ogg">
                        Your browser does not support the video tag.
                    </video>
                    <div class="team-title p-3">
                        <h5><?= $row['vdesc'] ?></h5>
                        <small>Uploaded: <?= $row['date'] ?></small><br>
                        <small>Class: <?= $row['class'] ?></small>
                    </div>
                </div>
            </div>
            <?php } } ?>
        </div>

        <!-- Section: Audios -->
        <div class="text-center py-5 wow fadeInUp" data-wow-delay="0.2s">
            <h3 class="display-4 mb-4">Audios</h3>
        </div>
        <div class="row g-4">
            <?php
            $data = mysqli_query($con, "SELECT * FROM audios");
            if ($data) {
                while ($row = mysqli_fetch_array($data)) {
            ?>
            <div class="col-sm-6 col-lg-4 col-xl-3 wow fadeInUp" data-wow-delay="0.2s">
                <div class="team-item">
                    <div class="p-3 bg-light rounded">
                        <audio class="w-100" controls>
                            <source src="<?= $row['audio'] ?>" type="audio/mpeg">
                            <source src="<?= $row['audio'] ?>" type="audio/ogg">
                            Your browser does not support the audio tag.
                        </audio>
                    </div>
                    <div class="team-title p-3">
                        <h5><?= $row['adesc'] ?></h5>
                        <small>Uploaded: <?= $row['date'] ?></small><br>
                        <small>Class: <?= $row['class'] ?></small>
                    </div>
                </div>
            </div>
            <?php } } ?>
        </div>

        <!-- Section: Notes -->
        <div class="text-center py-5 wow fadeInUp" data-wow-delay="0.2s">
            <h3 class="display-4 mb-4">Notes</h3>
        </div>
        <div class="row g-4">
            <?php
            $data = mysqli_query($con, "SELECT * FROM notes");
            if ($data) {
                while ($row = mysqli_fetch_array($data)) {
            ?>
            <div class="col-sm-6 col-lg-4 col-xl-3 wow fadeInUp" data-wow-delay="0.2s">
                <div class="team-item">
                    <embed src="<?= $row['note'] ?>" type="application/pdf" width="100%" height="300" class="rounded border">
                    <div class="team-title p-3">
                        <h5><?= $row['ndesc'] ?></h5>
                        <small>Uploaded: <?= $row['date'] ?></small><br>
                        <small>Class: <?= $row['class'] ?></small>
                    </div>
                </div>
            </div>
            <?php } } ?>
        </div>

    </div>
</div>

<?php include('commonfooter.php'); ?>
