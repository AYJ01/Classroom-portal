<?php
session_start();
include("userheader.php");
include("connection.php");
$id = $_SESSION['user'];
$current_date = date('Y-m-d');
$qry4 = "SELECT * from `student` WHERE `id`=$id";

$data4 = mysqli_query($con, $qry4);

if ($data4) {
    while ($row4 = mysqli_fetch_array($data4)) {
        $class = $row4['class'];
    }
}
?>

<br><br>
<center>
    <div style="width:800px">
        <div class="accordion" id="accordionExample">
            <?php
            $qry = "SELECT `assignment`.*, `report`.*, `staff`.*
                    FROM `assignment`
                    LEFT JOIN `report` ON `assignment`.`aid` = `report`.`assignment` AND `report`.`user` = $id
                    LEFT JOIN `staff` ON `assignment`.`staff` = `staff`.`id`
                    WHERE `assignment`.`class` = '$class' AND `report`.`assignment` IS NULL;";
            
            $data = mysqli_query($con, $qry);

            if ($data) {
                $accordionIndex = 0; // Initialize a counter for unique IDs
                while ($row = mysqli_fetch_array($data)) {
                    $accordionIndex++; // Increment the counter
                    ?>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="heading<?php echo $accordionIndex; ?>">
                            <button class="accordion-button border-0" type="button" data-bs-toggle="collapse" data-bs-target="#collapse<?php echo $accordionIndex; ?>" aria-expanded="true" aria-controls="collapse<?php echo $accordionIndex; ?>">
                                <?php
                                if ($row['subdate'] > $current_date) {
                                    ?>
                                    Topic: <?php echo $row['topic'] ?> <span style="font-size:small;color:darkgreen" id="subdate">&nbsp;(Due Date: <?php echo $row['subdate'] ?>)</span>
                                <?php } elseif ($row['subdate'] < $current_date) { ?>
                                    Topic: <?php echo $row['topic'] ?> <span style="font-size:small;color:crimson" id="subdate">&nbsp;(Due Date: <?php echo $row['subdate'] ?>) Submitdate Exceeded</span>
                                <?php } else { ?>
                                    Topic: <?php echo $row['topic'] ?> <span style="font-size:small;color:#e6b800" id="subdate">&nbsp;(Due Date: <?php echo $row['subdate'] ?>) Today is the Submission Date</span>
                                <?php } ?>
                            </button>
                        </h2>
                        <br>
                        <div id="collapse<?php echo $accordionIndex; ?>" class="accordion-collapse collapse <?php echo $accordionIndex === 1 ? 'show active' : ''; ?>" aria-labelledby="heading<?php echo $accordionIndex; ?>" data-bs-parent="#accordionExample">
                            <div class="accordion-body rounded">
                                Q: <?php echo $row['description'] ?>
                            </div><br>
                            <div>
                                <form method="post" enctype="multipart/form-data">
                                    <div class="row g-3" style="width: 550px;">
                                        <div class="col-12">
                                            <input type="hidden" name="staff" value="<?php echo $row[6] ?>">
                                            <input type="hidden" name="assignment" value="<?php echo $row['aid'] ?>">
                                            <div class="form-floating">
                                                <input type="file" name="Image" class="form-control border-0" id="project" placeholder="Image" required>
                                                <label for="project">File</label>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <button name="submit" type="submit" class="btn btn-primary w-100 py-3">Submit</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                <?php
                }
            }
            ?>
        </div>
    </div>
</center>
<br><br>

<?php
if (isset($_POST['submit'])) {
    $class = $_POST['staff'];
    $registerno = $_POST['assignment'];
    $folder = 'media/';
    $file = $folder . basename($_FILES['Image']['name']);
    move_uploaded_file($_FILES['Image']['tmp_name'], $file);

    // Insert user data
    $qry2 = "INSERT INTO `report` (`staff`, `assignment`, `user`, `file`) VALUES ('$class', '$registerno', '$id', '$file')";
    echo $qry2;
    $insertUser = mysqli_query($con, $qry2);

    // Insert login data
    if ($insertUser) {
        echo "<script>alert('Submitted successfully');</script>";
    } else {
        echo "<script>alert('Failed to Submit')</script>";
    }
}

include("commonfooter.php");
?>
