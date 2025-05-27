<?php
session_start();
include("userheader.php");
include("connection.php");
$id = $_SESSION['user'];

$qry4 = "SELECT * from `student` WHERE `id`=$id";

                $data4 = mysqli_query($con, $qry4);

                if($data4){
                while ($row4 = mysqli_fetch_array($data4)) {
                        $class= $row4['class'] ;
                }}

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
                
                $qry = "SELECT * from `notes` WHERE `class`='$class'";

                $data = mysqli_query($con, $qry);

                if($data){
                while ($row = mysqli_fetch_array($data)) {

                ?>
                    <div class="col-md-6 col-lg-6 col-xl-3 wow fadeInUp" data-wow-delay="0.2s">
                        <div class="team-item">
                            
                            <!-- <div class="team-img"> -->
                            <embed src= "<?php echo $row['note'] ?>" style="overflow: hidden;" class="viewpdf" type="application/pdf" width= "100%" height= "375">
                            <!-- </div> -->
                            <div class="team-title p-4">
                                <h4 class="mb-0"><?php echo $row['ndesc'] ?></h4>
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