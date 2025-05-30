<?php
session_start();
include("staffheader.php");
include("connection.php");
$id = $_SESSION['user'];

?>


<center>

<div class="col-xl-6 wow fadeInRight p-4" data-wow-delay="0.4s">
                        <div>
                            <h4 class="text-primary">Add Audios</h4><br>
                            <form method="post" enctype="multipart/form-data" >
                                <div class="row g-3">
                                    <div class="col-lg-12 col-xl-6">
                                    <div class="form-floating">
                                            <input type="file" name="Image" class="form-control border-0" id="project" placeholder="Image" required>
                                            <label for="project" >Audio</label>
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
                                            <textarea class="form-control border-0" name="Desc" placeholder="Add the Details About the Audios" id="message" style="height: 120px" required></textarea>
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
    $class = $_POST['Class'];
    $registerno = $_POST['Desc'];
    $folder = 'media/';
    $file = $folder . basename($_FILES['Image']['name']);
    move_uploaded_file($_FILES['Image']['tmp_name'],$file);
    
        // Insert user data
        $qry2 = "INSERT INTO `audios` (`class`,`staff`, `adesc`,`audio`) VALUES ('$class','$id','$registerno','$file')";
        echo $qry2;
        $insertUser = mysqli_query($con, $qry2);
        
        // Insert login data
        if ($insertUser) {
           
                echo "<script>alert('Added successfully');</script>";
            
        } else {
            echo "<script>alert('Failed to Add')</script>";
        }
    }



include("commonfooter.php");
?>