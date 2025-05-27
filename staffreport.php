<?php
session_start();
include("staffheader.php");
include("connection.php");
$id = $_SESSION['user'];
$current_date = date('Y-m-d');
?>

<div class="container w-75 p-5">
<table class="table align-middle mb-0 bg-white">
  <thead class="bg-light text-center">
    <tr>
      <th>Student</th>
      <th>Date</th>
      <th>Status</th>
      <th>File</th>
      <th>Mark</th>
      <th>Actions</th>
    </tr>
  </thead>
  <tbody style="text-align:center">
  <?php
                
                $qry = "SELECT `assignment`.*, `report`.*, `student`.* FROM `assignment` LEFT JOIN `report` ON `assignment`.`aid` = `report`.`assignment` JOIN `student` ON `report`.`user` = `student`.`id` WHERE `report`.`staff`=$id AND`report`.`assignment` IS NOT NULL;";

                $data = mysqli_query($con, $qry);

                if($data){
                while ($row = mysqli_fetch_array($data)) {

                ?>
    <tr>
      <td>
        <div class="d-flex align-items-center">
          <img
              src="<?php echo $row['image'] ?>"
              alt=""
              style="width: 45px; height: 45px"
              class="rounded-circle"
              />
          <div class="ms-3">
            <p class="fw-bold mb-1"><?php echo $row['name'] ?></p>
            <p class="text-muted mb-0">Class : &nbsp; <?php echo $row['class'] ?></p>
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
      <form method="post" >
         <div class="col-12">
     
          <div class="form-floating">
            <input type="hidden" name="Rid" value="<?php echo $row['rid'] ?>" >
            <input type="number" name="Name"  class="form-control border-1 text-center w-75" id="name" placeholder="Mark" required>
           <label for="name" >Mark is'nt entered</label>
            </div>
              </div>

        <br>
      <button type="submit" name="submit"  class="btn btn-primary btn-sm btn-rounded">
          Add Mark
      </button>
        </form>
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