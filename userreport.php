<?php
session_start();
include("userheader.php");
include("connection.php");
$id = $_SESSION['user'];
$current_date = date('Y-m-d');
?>

<div class="container w-75 p-5">
<table class="table align-middle mb-0 bg-white">
  <thead class="bg-light text-center">
    <tr>
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
                
                $qry = "SELECT DISTINCT `report`.`rid`, `assignment`.*, `report`.* FROM `assignment` LEFT JOIN `report` ON `assignment`.`aid` = `report`.`assignment` WHERE `report`.`user` = $id;";

                $data = mysqli_query($con, $qry);

                if($data){
                while ($row = mysqli_fetch_array($data)) {

                ?>
    <tr>
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


if (isset($_POST['submit'])) {
  $class = $_POST['Name'];
  $rid = $_POST['Rid'];
  // $folder = 'media/';
  // $file = $folder . basename($_FILES['Image']['name']);
  // move_uploaded_file($_FILES['Image']['tmp_name'],$file);
  
      // Insert user data
      $qry2 = "UPDATE `report` SET `mark`=$class WHERE `rid`=$rid";
      echo $qry2;
      $insertUser = mysqli_query($con, $qry2);
      echo $insertUser;
      
      // Insert login data
      if ($insertUser) {
         
              echo "<script>alert('Added successfully');</script>";
          
      } else {
          echo "<script>alert('Failed to Add')</script>";
      }
  }

                
include("commonfooter.php");
?>