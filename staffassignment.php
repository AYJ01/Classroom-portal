<?php
session_start();
include("staffheader.php");
include("connection.php");
$id = $_SESSION['user'];

?>


<center>

<div class="col-xl-6 wow fadeInRight" data-wow-delay="0.4s">
                        <div>
                            <h4 class="text-primary">Add Assignment</h4><br>
                            <form method="post" enctype="multipart/form-data" >
                                <div class="row g-3">
                                    <div class="col-lg-12 col-xl-6">
                                        <div class="form-floating">
                                            <input type="text" name="Topic" class="form-control border-0" id="name" placeholder="Topic" required>
                                            <label for="name" >Topic</label>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-xl-6">
                                        <div class="form-floating">
                                            <input type="date" name="Subdate" class="form-control border-0" id="email" placeholder="Submission Date" required>
                                            <label for="email" >Submission Date</label>
                                            <script>
    document.addEventListener("DOMContentLoaded", function() {
        var today = new Date().toISOString().split('T')[0];
        document.getElementById('email').setAttribute('min', today);
    });
</script>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                    <div class="form-floating">
                                        <select name="Class" class="form-control border-0" id="class" placeholder="Class" required>
                                        <option value="" disabled selected>Select The Class</option>
                                        <option value="A">Class A</option>
                                        <option value="B">Class B</option>
                                        <option value="C">Class C</option>
                                        <option value="D">Class D</option>
                                        </select>
                                    <label for="class">Class</label>
                                    </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-floating">
                                            <textarea class="form-control border-0" name="Desc" placeholder="Add the Detailed Question Here" id="message" style="height: 120px" required></textarea>
                                            <label for="message">Description</label>
                                        </div>

                                    </div>
                                    <div class="col-12">
                                        <button name="submit" type="submit" class="btn btn-primary w-100 py-3">Add</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

                    </center>




<?php


if (isset($_POST['submit'])) {
    $name = $_POST['Topic'];
    $email = $_POST['Subdate'];
    $class = $_POST['Class'];
    $registerno = $_POST['Desc'];
    // $folder = 'media/';
    // $file = $folder . basename($_FILES['Image']['name']);
    // move_uploaded_file($_FILES['Image']['tmp_name'],$file);
    
        // Insert user data
        $qry2 = "INSERT INTO `assignment` (`topic`, `subdate`, `class`,`staff`, `description`) VALUES ('$name', '$email','$class','$id','$registerno')";
  
        $insertUser = mysqli_query($con, $qry2);
        
        // Insert login data
        if ($insertUser) {
           
                echo "<script>alert('Added successfully');</script>";
            
        } else {
            echo "<script>alert('Failed to Add');</script>";
        }
    }



include("commonfooter.php");
?>