<?php  
include  ('adminheader.php') ;
include ('connection.php') ;
?>


<div class="container w-75 p-5">
<table class="table align-middle mb-0 bg-white">
  <thead class="bg-light text-center">
    <tr>
     <th>Student</th>
      <th>Topic</th>
      <th>Date</th>
      <th>Status</th>
      <th>File</th>
      <th>Mark</th>
      <th>Actions</th>
    </tr>
  </thead>
  <tbody style="text-align:center">
  <?php
                
                $qry = "SELECT DISTINCT `report`.`rid`, `assignment`.*, `report`.* FROM `assignment` LEFT JOIN `report` ON `assignment`.`aid` = `report`.`assignment` ;";

                $data = mysqli_query($con, $qry);

                if($data){
                while ($row = mysqli_fetch_array($data)) {

                ?>
    <tr>
        <td>
        <?php
                
                $user_id = $row['user'];

                 // Prepare the query
                $qry8 = "SELECT * FROM `student` WHERE `id` = ?";
                $stmt = $con->prepare($qry8);
                $stmt->bind_param("i", $user_id);
                $stmt->execute();

                $data8 = $stmt->get_result();

                if ($data8) {
                    while ($row8 = $data8->fetch_assoc()) {
                        echo $row8['name'];
                        }
                    }
                ?>
        </td>
      <td>
        <div class="d-flex align-items-center">
          
          <div class="ms-3">
            <p class="fw-bold mb-1"><?php echo $row['topic'] ?></p>
            <p class="text-muted mb-0">Q : &nbsp; <?php echo $row['description'] ?></p>
          </div>
        </div>
      </td>
      <td>
        <p class="fw-normal mb-1"><?php echo $row['time'] ?></p>
        
      </td>
      <td>
      <?php if ($row['subdate'] > $row['time']) { ?>
      <p class="fw-normal mb-1" style="color: green;" > Early </p>
      <?php }else if ($row['subdate'] < $row['time']) { ?>
        <p class="fw-normal mb-1" style="color:crimson" > Late </p>
        <?php }else  { ?>
            <p class="fw-normal mb-1" style="color:yellowgreen" > On Time </p>
            <?php } ?>
      </td>
      <td><embed src= "<?php echo $row['file'] ?>" style="overflow: hidden;" class="viewpdf" type="application/pdf" width= "100%" height= "250"></td>
      <td>    
            <p class="fw-normal mb-1"  > <?php echo $row['mark'] ?> </p>
            
      </td>
      
      <?php if ($row['mark'] == 0) { ?>
      <td>
      <p class="fw-normal mb-1"  > Not Checked <i class="bi bi-cross-square-fill"></i></p>
      </td>
      </td>
        <?php }else  { ?>

            <td>
            <p class="fw-normal mb-1"  > Checked <i class="bi bi-check-square-fill"></i></p>
            </td>
            <?php } ?>


        
       
    </tr>
    <?php }} ?>
</table>



</div>


<?php
include  ('commonfooter.php') ;
?>