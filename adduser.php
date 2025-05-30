<?php
include("adminheader.php");
include("connection.php");
?>


<center>

<div class="col-xl-6 p-4 wow fadeInRight" data-wow-delay="0.4s">
                        <div>
                            <h4 class="text-primary">Student Registration</h4><br>
                            <form method="post" enctype="multipart/form-data" >
                                <div class="row g-3">
                                    <div class="col-lg-12 col-xl-6">
                                        <div class="form-floating">
                                            <input type="text" name="Name" class="form-control border-0" id="name" placeholder="Your Name" required>
                                            <label for="name" >Your Name</label>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-xl-6">
                                        <div class="form-floating">
                                            <input type="email" name="Email" class="form-control border-0" id="email" placeholder="Your Email" required>
                                            <label for="email" >Your Email</label>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-xl-6">
                                        <div class="form-floating">
                                            <input type="phone" name="Contact" class="form-control border-0" id="phone" placeholder="Phone" required>
                                            <label for="phone"  >Your Phone</label>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-xl-6">
                                        <div class="form-floating">
                                            <input type="file" name="Image" class="form-control border-0" id="project" placeholder="Image" required>
                                            <label for="project" >Your Image</label>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-floating">
                                            <input type="password" name="Password" class="form-control border-0" id="subject" placeholder="Password" required>
                                            <label for="subject" >Password</label>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-floating">
                                            <input type="text" name="Registernumber" class="form-control border-0" id="regno" placeholder="Register Number" required>
                                            <label for="regno" >Register Number</label>
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
                                        <button name="submit" type="submit" class="btn btn-primary w-100 py-3">Register</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

                    </center>




<?php


if (isset($_POST['submit'])) {
    $name = $_POST['Name'];
    $email = $_POST['Email'];
    $phone = $_POST['Contact'];
    $class = $_POST['Class'];
    $registerno = $_POST['Registernumber'];
    $pass = $_POST['Password'];
    $folder = 'media/';
    $file = $folder . basename($_FILES['Image']['name']);
    move_uploaded_file($_FILES['Image']['tmp_name'],$file);
    // Check if user already exists
    $qry1 = "SELECT * FROM `student` WHERE `email`= '$email'";
    $result = mysqli_query($con, $qry1);
    
    if (mysqli_num_rows($result) > 0) {
        echo "<script>alert('User already exists');</script>";
    } else {
        // Insert user data
        $qry2 = "INSERT INTO `student` (`name`, `email`, `class`,`register_no`, `contact`, `image`) VALUES ('$name', '$email','$class','$registerno', '$phone', '$file')";
  
        $insertUser = mysqli_query($con, $qry2);
        
        // Insert login data
        if ($insertUser) {
            $qry3 = "INSERT INTO `login` (`user`, `email`, `password`, `type`) VALUES ((SELECT MAX(`id`) FROM `student`), '$email', '$pass', 'User')";
            $insertLogin = mysqli_query($con, $qry3);

            if ($insertLogin) {
                echo "<script>alert('Registered successfully');</script>";
            } else {
                echo "<script>alert('Failed to register login '+$insertLogin);</script>";
            }
        } else {
            echo "<script>alert('Failed to register user');</script>";
        }
    }
}


include("commonfooter.php");
?>