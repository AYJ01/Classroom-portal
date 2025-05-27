<?php  
include  ('adminheader.php') ;
include  ('connection.php') ;

?>




<div class="container-fluid team pb-5">
            <div class="container pb-5">
                <div class="text-center mx-auto pb-5 wow fadeInUp" data-wow-delay="0.2s" style="max-width: 800px;">
                    
                    <h3 class="display-4 mb-4">Videos</h3>
                    <br>
                </div>
               
                <div class="row g-4">
                <?php
                
                $qry = "SELECT * from `videos`";

                $data = mysqli_query($con, $qry);

                if($data){
                while ($row = mysqli_fetch_array($data)) {

                ?>
                    <div class="col-md-6 col-lg-6 col-xl-3 wow fadeInUp" data-wow-delay="0.2s">
                        <div class="team-item">
                            
                            <!-- <div class="team-img"> -->
                            <video width="520" height="440" class="img-fluid rounded-top w-100" autoplay controls>
                                <source src="<?php echo $row['video'] ?>" type="video/mp4">
                                <source src="movie.ogg" type="video/ogg">
                                Your browser does not support the video tag.
                                </video>
                            <!-- </div> -->
                            <div class="team-title p-4">
                                <h4 class="mb-0"><?php echo $row['vdesc'] ?></h4>
                                <p class="mb-0" style="font-size:10px">Uploaded in :<?php echo $row['date'] ?></p>
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
        <?php } ?>





        <div class="container-fluid team pb-5">
            <div class="container pb-5">
                <div class="text-center mx-auto pb-5 wow fadeInUp" data-wow-delay="0.2s" style="max-width: 800px;">
                   
                    <h3 class="display-4 mb-4">Audios</h3>
                    <br>
                </div>
               
                <div class="row g-4">
                <?php
                
                $qry = "SELECT * from `audios`";

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
<?php } ?>


<div class="container-fluid team pb-5">
            <div class="container pb-5">
                <div class="text-center mx-auto pb-5 wow fadeInUp" data-wow-delay="0.2s" style="max-width: 800px;">
            
                    <h3 class="display-4 mb-4">Notes</h3>
                    <br>
                </div>
               
                <div class="row g-4">
                <?php
                
                $qry = "SELECT * from `notes`";

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
                }}
                    ?>
                    
                    </div>
                </div>
            </div>
        </div>








<?php
                
include  ('commonfooter.php') ;
?>