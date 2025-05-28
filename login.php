<?php
session_start();
include("commonheader.php");
include("connection.php");
?>

<div class="container d-flex justify-content-center align-items-center" style="min-height: 100vh;">
    <div class="col-md-6 wow fadeInRight" data-wow-delay="0.4s">
        <div class="p-5 shadow rounded bg-light">
            <h3 class="text-center mb-4">Login</h3>
            <form method="post">
                <div class="form-floating mb-3">
                    <input type="email" name="Sender" class="form-control" id="email" placeholder="Your Email" required>
                    <label for="email">Your Email</label>
                </div>

                <div class="form-floating mb-4">
                    <input type="password" name="Password" class="form-control" id="password" placeholder="Your Password" required>
                    <label for="password">Your Password</label>
                </div>

                <div class="d-grid text-center">
                    <button name="login" type="submit" class="btn btn-primary py-2">Login</button>
                </div>
            </form>
        </div>
    </div>
</div>

<?php
if (isset($_POST['login'])) {
    $email = mysqli_real_escape_string($con, $_POST['Sender']);
    $password = mysqli_real_escape_string($con, $_POST['Password']);

    $qry1 = "SELECT * FROM `login` WHERE `email` = '$email' AND `password` = '$password'";
    $result = mysqli_query($con, $qry1);

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);

        $_SESSION['user'] = $row['user'];

        switch ($row['type']) {
            case 'User':
                echo "<script>alert('Welcome User'); location='userhome.php';</script>";
                break;
            case 'Staff':
                echo "<script>alert('Welcome Staff'); location='staffhome.php';</script>";
                break;
            case 'Admin':
                echo "<script>alert('Welcome Admin'); location='adminhome.php';</script>";
                break;
            default:
                echo "<script>alert('Unknown user type');</script>";
        }
    } else {
        echo "<script>alert('User Not Found');</script>";
    }
}

include("commonfooter.php");
?>
