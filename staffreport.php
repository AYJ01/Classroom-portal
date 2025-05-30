<?php
session_start();
include("staffheader.php");
include("connection.php");
$id = $_SESSION['user'];
$current_date = date('Y-m-d');
?>

<div class="container my-5">
    <div class="table-responsive">
        <table class="table table-bordered align-middle text-center">
            <thead class="table-light">
                <tr>
                    <th>Student</th>
                    <th>Date</th>
                    <th>Status</th>
                    <th>File</th>
                    <th>Mark</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $qry = "SELECT `assignment`.*, `report`.*, `student`.* 
                        FROM `assignment` 
                        LEFT JOIN `report` ON `assignment`.`aid` = `report`.`assignment` 
                        JOIN `student` ON `report`.`user` = `student`.`id` 
                        WHERE `report`.`staff` = $id AND `report`.`assignment` IS NOT NULL";

                $data = mysqli_query($con, $qry);

                if ($data) {
                    while ($row = mysqli_fetch_array($data)) {
                ?>
                        <tr>
                            <td class="text-start">
                                <div class="d-flex align-items-center">
                                    <img src="<?php echo $row['image']; ?>" alt="avatar" style="width: 45px; height: 45px;" class="rounded-circle me-2" />
                                    <div>
                                        <div class="fw-bold"><?php echo $row['name']; ?></div>
                                        <small class="text-muted">Class: <?php echo $row['class']; ?></small>
                                    </div>
                                </div>
                            </td>
                            <td><?php echo $row['time']; ?></td>
                            <td>
                                <?php
                                if ($row['subdate'] > $row['time']) {
                                    echo '<span class="text-success">Early</span>';
                                } elseif ($row['subdate'] < $row['time']) {
                                    echo '<span class="text-danger">Late</span>';
                                } else {
                                    echo '<span class="text-warning">On Time</span>';
                                }
                                ?>
                            </td>
                            <td>
                                <div style="max-height:250px; overflow:auto;">
                                    <embed src="<?php echo $row['file']; ?>" type="application/pdf" width="100%" height="250px">
                                </div>
                            </td>
                            <td><?php echo $row['mark']; ?></td>
                            <td>
                                <?php if ($row['mark'] == 0) { ?>
                                    <form method="post">
                                        <input type="hidden" name="Rid" value="<?php echo $row['rid']; ?>">
                                        <div class="input-group mb-2">
                                            <input type="number" name="Name" class="form-control form-control-sm text-center" placeholder="Enter Mark" required>
                                        </div>
                                        <button type="submit" name="submit" class="btn btn-sm btn-primary">Add Mark</button>
                                    </form>
                                <?php } else { ?>
                                    <span class="text-success fw-semibold">Checked <i class="bi bi-check-square-fill"></i></span>
                                <?php } ?>
                            </td>
                        </tr>
                <?php
                    }
                }
                ?>
            </tbody>
        </table>
    </div>
</div>

<?php
if (isset($_POST['submit'])) {
    $mark = $_POST['Name'];
    $rid = $_POST['Rid'];

    $qry2 = "UPDATE `report` SET `mark` = $mark WHERE `rid` = $rid";
    $insertUser = mysqli_query($con, $qry2);

    if ($insertUser) {
        echo "<script>alert('Mark added successfully'); window.location.href = window.location.href;</script>";
    } else {
        echo "<script>alert('Failed to add mark');</script>";
    }
}

include("commonfooter.php");
?>
