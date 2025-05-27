<?php
session_start();
include("staffheader.php");
include("connection.php");
$id = $_SESSION['user'];

?>



<div class="container-fluid team pb-5">
            <div class="container pb-5">
                <div class="text-center mx-auto pb-5 wow fadeInUp" data-wow-delay="0.2s" style="max-width: 800px;">
                    <h4 class="text-primary">Our Staffs</h4>
                    <h1 class="display-4 mb-4">Meet Our Expert Team Members</h1>
                    <br>
                </div>
               
                <div class="row g-4">
                <?php
                
                $qry = "SELECT * from `audios` WHERE `staff`=$id";

                $data = mysqli_query($con, $qry);

                if($data){
                while ($row = mysqli_fetch_array($data)) {

                ?>
                    <div class="col-md-6 col-lg-6 col-xl-3 wow fadeInUp" data-wow-delay="0.2s">
                        <div class="team-item">
                            
                            <div style="width: 100%;background-color:#fafafa">
                            <audio style="width: 100%;background-color:#ebebeb"  controls>
                                
                                <source src="<?php echo $row['audio'] ?>" type="audio/ogg">
                                <source src="<?php echo $row['audio'] ?>" type="audio/mpeg">
                                Your browser does not support the audio tag.
                                </audio>
                            </div> 
                            <div class="team-title p-4">
                                <h4 class="mb-0"><?php echo $row['adesc'] ?></h4>
                                <p class="mb-0" style="font-size:10px">Uploaded in : <?php echo $row['date'] ?></p>
                                <p class="mb-0">Class : <?php echo $row['class'] ?></p>
                            </div>
                        </div>
                    </div>
                    <?php 
                }
                    ?>
                    
                    </div>
                </div>
            </div>
        </div>





<?php
                }
include("commonfooter.php");
?>