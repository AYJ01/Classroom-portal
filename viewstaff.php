<?php  
include  ('adminheader.php') ;
include  ('connection.php') ;

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
                
                $qry = "SELECT * from `staff`";

                $data = mysqli_query($con, $qry);

                if($data){
                while ($row = mysqli_fetch_array($data)) {

                ?>
                    <div class="col-md-6 col-lg-6 col-xl-3 wow fadeInUp" data-wow-delay="0.2s">
                        <div class="team-item">
                            <div class="team-img">
                                <img src="<?php echo $row['image'] ?>" class="img-fluid rounded-top w-100" alt="">
                                <div class="team-icon" style="background-color:azure;border-radius:40px;color:black;width:250px;padding-left:10px" >
                                    <center><p style="font-size:13px">Email : </p><p style="font-size:13px"><?php echo $row['email'] ?></p></center>
                                   <center> <p style="font-size:13px">Contact : <?php echo $row['contact'] ?></p></center>
                                   <center> <p style="font-size:13px">JoinedOn : </p><p style="font-size:13px"><?php echo $row['joinedtime'] ?></p></center>
                                </div>
                            </div>
                            <div class="team-title p-4">
                                <h4 class="mb-0"><?php echo $row['name'] ?></h4>
                                <p class="mb-0"><?php echo $row['description'] ?></p>
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
include  ('commonfooter.php') ;
?>