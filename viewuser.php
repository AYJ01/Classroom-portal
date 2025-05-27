<?php  
include  ('adminheader.php') ;
include  ('connection.php') ;

?>




<div class="container-fluid testimonial py-5">
            <div class="container py-5">
                <div class="text-center mx-auto pb-5 wow fadeInUp" data-wow-delay="0.2s" style="max-width: 800px;">
                    <h4 class="text-primary">Students</h4>
                    <h1 class="display-4 mb-4">This are our students</h1>
                    <br>
                </div>
                <div class="owl-carousel testimonial-carousel wow fadeInUp" data-wow-delay="0.2s">
                <?php
                
                $qry = "SELECT * from `student`";

                $data = mysqli_query($con, $qry);

                if($data){
                while ($row = mysqli_fetch_array($data)) {

                ?>
                    <div class="testimonial-item bg-light rounded">
                        <div class="row g-0">
                            <div class="col-4  col-lg-4 col-xl-3">
                                <div class="h-100">
                                    <img src="<?php echo $row['image'] ?>" class="img-fluid h-100 rounded" style="object-fit: cover;" alt="">
                                </div>
                            </div>
                            <div class="col-8 col-lg-8 col-xl-9">
                                <div class="d-flex flex-column my-auto text-start p-4">
                                    <h4 class="text-dark mb-0"><?php echo $row['name'] ?></h4>
                                    <p class="mb-3"><?php echo $row['email'] ?></p>
                                    <div class="d-flex text-primary mb-3">
                                    <p class="mb-3"><?php echo $row['class'] ?></p>
                                    </div>
                                    <div class="d-flex text-primary mb-3">
                                    <p class="mb-3"><?php echo $row['contact'] ?></p>
                                    </div>
                                    <div class="d-flex text-primary mb-3">
                                    <p class="mb-3"><?php echo $row['register_no'] ?></p>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php 
                }
                    ?>
                    
                </div>
            </div>
        </div>





<?php
                }    
include  ('commonfooter.php') ;
?>