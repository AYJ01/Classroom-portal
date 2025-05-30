<?php
session_start();
include("staffheader.php");
include("connection.php");

$id = $_SESSION['user'];

// Handle delete
if (isset($_GET['delete_id'])) {
    $delete_id = $_GET['delete_id'];
    $delete_qry = "DELETE FROM `notes` WHERE id = ? AND staff = ?";
    $delete_stmt = $con->prepare($delete_qry);
    $delete_stmt->bind_param("is", $delete_id, $id);
    $delete_stmt->execute();
    echo "<script>alert('Note deleted successfully.'); window.location.href='" . $_SERVER['PHP_SELF'] . "';</script>";
}
?>

<div class="container-fluid team pb-5">
    <div class="container pb-5">
        <div class="text-center mx-auto pb-5 wow fadeInUp" data-wow-delay="0.2s" style="max-width: 800px;">
            <h4 class="text-primary">Our Staffs</h4>
            <h1 class="display-4 mb-4">Meet Our Expert Team Members</h1>
            <br>
        </div>

        <div class="row g-4">
        <?php
        $qry = "SELECT * FROM `notes` WHERE `staff` = ?";
        $stmt = $con->prepare($qry);
        $stmt->bind_param("s", $id);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result) {
            while ($row = $result->fetch_assoc()) {
        ?>
            <div class="col-12 col-sm-6 col-lg-4 col-xl-3 wow fadeInUp" data-wow-delay="0.2s">
                <div class="team-item h-100 d-flex flex-column justify-content-between">
                    <div class="ratio ratio-4x3">
                        <embed src="<?php echo htmlspecialchars($row['note']); ?>" type="application/pdf" class="w-100 h-100" />
                    </div>
                    <div class="team-title p-3">
                        <h5 class="mb-1 text-white"><?php echo htmlspecialchars($row['ndesc']); ?></h5>
                        <small class="text-white">Uploaded: <?php echo htmlspecialchars($row['date']); ?></small><br>
                        <small class="text-white">Class: <?php echo htmlspecialchars($row['class']); ?></small>
                        <div class="text-end mt-2">
                            <a href="?delete_id=<?php echo $row['id']; ?>" onclick="return confirm('Are you sure you want to delete this note?');" class="btn btn-sm btn-outline-danger">
                                <i class="fa fa-trash"></i> Delete
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        <?php
            }
        }
        ?>
        </div>
    </div>
</div>

<?php include("commonfooter.php"); ?>
