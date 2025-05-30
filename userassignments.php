<?php
session_start();
include("userheader.php");
include("connection.php");
$id = $_SESSION['user'];
$current_date = date('Y-m-d');

// Get student class
$qry4 = "SELECT * FROM `student` WHERE `id`=$id";
$data4 = mysqli_query($con, $qry4);
if ($data4) {
    while ($row4 = mysqli_fetch_array($data4)) {
        $class = $row4['class'];
    }
}
?>

<style>
    @media (max-width: 768px) {
        .accordion-button {
            font-size: 14px;
            padding: 10px;
        }
        .accordion-body {
            font-size: 14px;
        }
        .form-floating label {
            font-size: 13px;
        }
        .btn {
            font-size: 14px;
            padding: 10px;
        }
    }
</style>

<div class="container py-4">
    <div class="accordion" id="accordionExample">
        <?php
        $qry = "SELECT `assignment`.*, `report`.*, `staff`.*
                FROM `assignment`
                LEFT JOIN `report` ON `assignment`.`aid` = `report`.`assignment` AND `report`.`user` = $id
                LEFT JOIN `staff` ON `assignment`.`staff` = `staff`.`id`
                WHERE `assignment`.`class` = '$class' AND `report`.`assignment` IS NULL";
        $data = mysqli_query($con, $qry);
        if ($data) {
            $accordionIndex = 0;
            while ($row = mysqli_fetch_array($data)) {
                $accordionIndex++;
                ?>
                <div class="accordion-item mb-3 shadow-sm rounded">
                    <h2 class="accordion-header" id="heading<?php echo $accordionIndex; ?>">
                        <button class="accordion-button <?php echo $accordionIndex !== 1 ? 'collapsed' : ''; ?>" type="button"
                                data-bs-toggle="collapse"
                                data-bs-target="#collapse<?php echo $accordionIndex; ?>"
                                aria-expanded="<?php echo $accordionIndex === 1 ? 'true' : 'false'; ?>"
                                aria-controls="collapse<?php echo $accordionIndex; ?>">
                            Topic: <?php echo $row['topic']; ?>
                            &nbsp;
                            <?php if ($row['subdate'] > $current_date) { ?>
                                <span class="ms-auto text-success small">(Due Date: <?php echo $row['subdate']; ?>)</span>
                            <?php } elseif ($row['subdate'] < $current_date) { ?>
                                <span class="ms-auto text-danger small">(Due Date: <?php echo $row['subdate']; ?> - Submission Date Exceeded)</span>
                            <?php } else { ?>
                                <span class="ms-auto text-warning small">(Due Date: <?php echo $row['subdate']; ?> - Today is the Submission Date)</span>
                            <?php } ?>
                        </button>
                    </h2>
                    <div id="collapse<?php echo $accordionIndex; ?>" class="accordion-collapse collapse <?php echo $accordionIndex === 1 ? 'show' : ''; ?>" aria-labelledby="heading<?php echo $accordionIndex; ?>" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            <p><strong>Q:</strong> <?php echo $row['description']; ?></p>
                            <form method="post" enctype="multipart/form-data" class="mt-3">
                                <input type="hidden" name="staff" value="<?php echo $row[4]; ?>">
                                <input type="hidden" name="assignment" value="<?php echo $row['aid']; ?>">
                                <div class="row g-3">
                                    <div class="col-12">
                                        <div class="form-floating">
                                            <input type="file" name="Image" class="form-control" id="project" placeholder="Upload File" required>
                                            <label for="project">Upload File (PDF or Image)</label>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <button name="submit" type="submit" class="btn btn-primary w-100">Submit</button>
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

<?php
// Handle file submission
if (isset($_POST['submit'])) {
    $class = $_POST['staff'];
    $registerno = $_POST['assignment'];
    $folder = 'media/';
    $file = $folder . basename($_FILES['Image']['name']);
    move_uploaded_file($_FILES['Image']['tmp_name'], $file);

    $qry2 = "INSERT INTO `report` (`staff`, `assignment`, `user`, `file`) VALUES ('$class', '$registerno', '$id', '$file')";
    $insertUser = mysqli_query($con, $qry2);
    if ($insertUser) {
        echo "<script>alert('Submitted successfully');</script>";
        
    } else {
        echo "<script>alert('Failed to Submit');</script>";
    }
}
include("commonfooter.php");
?>
