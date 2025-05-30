<?php
session_start();
include("userheader.php");
include("connection.php");
$id = $_SESSION['user'];
$current_date = date('Y-m-d');
?>

<style>
    @media (max-width: 768px) {
        .table td, .table th {
            padding: 0.4rem;
            font-size: 12px;
        }
        .viewpdf {
            height: 150px;
        }
    }
    .viewpdf {
        width: 100%;
        height: 250px;
    }
</style>

<div class="container p-3">
    <div class="table-responsive-sm">
        <table class="table table-sm table-bordered align-middle bg-white text-center">
            <thead class="bg-light">
                <tr>
                    <th>Topic</th>
                    <th>Date</th>
                    <th>Status</th>
                    <th>File</th>
                    <th>Mark</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $qry = "SELECT DISTINCT `report`.`rid`, `assignment`.*, `report`.* 
                        FROM `assignment` 
                        LEFT JOIN `report` ON `assignment`.`aid` = `report`.`assignment` 
                        WHERE `report`.`user` = $id;";
                $data = mysqli_query($con, $qry);

                if ($data) {
                    while ($row = mysqli_fetch_array($data)) {
                ?>
                <tr>
                    <td>
                        <strong><?php echo $row['topic']; ?></strong><br>
                        <small>Q: <?php echo $row['description']; ?></small>
                    </td>
                    <td><?php echo $row['time']; ?></td>
                    <td>
                        <?php if ($row['subdate'] > $row['time']) { ?>
                            <span style="color: green;">Early</span>
                        <?php } elseif ($row['subdate'] < $row['time']) { ?>
                            <span style="color: crimson;">Late</span>
                        <?php } else { ?>
                            <span style="color: yellowgreen;">On Time</span>
                        <?php } ?>
                    </td>
                    <td>
                        <embed src="<?php echo $row['file']; ?>" class="viewpdf" type="application/pdf">
                    </td>
                    <td><?php echo $row['mark']; ?></td>
                    <td>
                        <?php if ($row['mark'] == 0) { ?>
                            <span class="text-danger">Not Checked</span>
                        <?php } else { ?>
                            <span class="text-success">Checked</span>
                        <?php } ?>
                    </td>
                </tr>
                <?php }} ?>
            </tbody>
        </table>
    </div>
</div>

<?php
if (isset($_POST['submit'])) {
    $class = $_POST['Name'];
    $rid = $_POST['Rid'];

    $qry2 = "UPDATE `report` SET `mark`=$class WHERE `rid`=$rid";
    $insertUser = mysqli_query($con, $qry2);

    if ($insertUser) {
        echo "<script>alert('Added successfully');</script>";
    } else {
        echo "<script>alert('Failed to Add');</script>";
    }
}
include("commonfooter.php");
?>
