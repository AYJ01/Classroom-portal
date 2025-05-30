<?php  
include('adminheader.php');
include('connection.php');
?>

<style>
    /* Smaller font and padding on small screens */
    @media (max-width: 768px) {
        table, th, td {
            font-size: 12px;
            padding: 5px !important;
        }
        .table-responsive {
            font-size: 12px;
        }
        embed {
            height: 150px !important;
        }
    }
</style>

<div class="container py-4">
    <div class="table-responsive">
        <table class="table table-bordered align-middle text-center">
            <thead class="table-light">
                <tr>
                    <th>Student</th>
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
                $qry = "SELECT DISTINCT report.rid, assignment.*, report.* 
                        FROM assignment 
                        LEFT JOIN report ON assignment.aid = report.assignment";

                $data = mysqli_query($con, $qry);

                if ($data) {
                    while ($row = mysqli_fetch_array($data)) {
                        // Get student name
                        $stmt = $con->prepare("SELECT name FROM student WHERE id = ?");
                        $stmt->bind_param("i", $row['user']);
                        $stmt->execute();
                        $studentResult = $stmt->get_result();
                        $studentName = ($studentRow = $studentResult->fetch_assoc()) ? $studentRow['name'] : "N/A";
                ?>
                <tr>
                    <td><?php echo $studentName; ?></td>
                    <td>
                        <strong><?php echo $row['topic']; ?></strong><br>
                        <small class="text-muted">Q: <?php echo $row['description']; ?></small>
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
                        <embed src="<?php echo $row['file']; ?>" type="application/pdf" width="100%" height="200">
                    </td>
                    <td><?php echo $row['mark']; ?></td>
                    <td>
                        <?php
                        if ($row['mark'] == 0) {
                            echo '<span class="text-danger">Not Checked <i class="bi bi-x-square-fill"></i></span>';
                        } else {
                            echo '<span class="text-success">Checked <i class="bi bi-check-square-fill"></i></span>';
                        }
                        ?>
                    </td>
                </tr>
                <?php }} ?>
            </tbody>
        </table>
    </div>
</div>

<?php include('commonfooter.php'); ?>
