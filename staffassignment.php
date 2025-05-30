<?php
session_start();
include("staffheader.php");
include("connection.php");
$id = $_SESSION['user'];
?>

<style>
    @media (max-width: 768px) {
        h4.text-primary {
            font-size: 18px;
        }
        .form-control, .btn {
            font-size: 14px;
        }
    }
</style>

<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-lg-8 col-xl-6 shadow p-4 rounded bg-white">
            <h4 class="text-primary text-center mb-4">Add Assignment</h4>
            <form method="post" enctype="multipart/form-data">
                <div class="row g-3">
                    <!-- Topic -->
                    <div class="col-md-6">
                        <div class="form-floating">
                            <input type="text" name="Topic" class="form-control" id="topic" placeholder="Topic" required>
                            <label for="topic">Topic</label>
                        </div>
                    </div>

                    <!-- Submission Date -->
                    <div class="col-md-6">
                        <div class="form-floating">
                            <input type="date" name="Subdate" class="form-control" id="subdate" placeholder="Submission Date" required>
                            <label for="subdate">Submission Date</label>
                        </div>
                    </div>

                    <!-- Class -->
                    <div class="col-12">
                        <div class="form-floating">
                            <select name="Class" class="form-select" id="class" required>
                                <option value="" disabled selected>Select Class</option>
                                <option value="A">Class A</option>
                                <option value="B">Class B</option>
                                <option value="C">Class C</option>
                                <option value="D">Class D</option>
                            </select>
                            <label for="class">Class</label>
                        </div>
                    </div>

                    <!-- Description -->
                    <div class="col-12">
                        <div class="form-floating">
                            <textarea class="form-control" name="Desc" id="description" placeholder="Add detailed question" style="height: 120px" required></textarea>
                            <label for="description">Description</label>
                        </div>
                    </div>

                    <!-- Submit Button -->
                    <div class="col-12">
                        <button name="submit" type="submit" class="btn btn-primary w-100 py-2">Add Assignment</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
// Set minimum date for submission to today
document.addEventListener("DOMContentLoaded", function () {
    const today = new Date().toISOString().split('T')[0];
    document.getElementById("subdate").setAttribute("min", today);
});
</script>

<?php
// Handle form submission
if (isset($_POST['submit'])) {
    $topic = $_POST['Topic'];
    $subdate = $_POST['Subdate'];
    $class = $_POST['Class'];
    $desc = $_POST['Desc'];

    $qry = "INSERT INTO `assignment` (`topic`, `subdate`, `class`, `staff`, `description`) 
            VALUES ('$topic', '$subdate', '$class', '$id', '$desc')";

    $result = mysqli_query($con, $qry);

    if ($result) {
        echo "<script>alert('Assignment added successfully');</script>";
    } else {
        echo "<script>alert('Failed to add assignment');</script>";
    }
}

include("commonfooter.php");
?>
