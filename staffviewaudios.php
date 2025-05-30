<?php
session_start();
include("staffheader.php");
include("connection.php");
$id = $_SESSION['user'];

// Handle delete request
if (isset($_GET['delete_id'])) {
    $delete_id = $_GET['delete_id'];

    // Fetch the audio file path
    $get_stmt = $con->prepare("SELECT `audio` FROM `audios` WHERE id = ? AND staff = ?");
    $get_stmt->bind_param("is", $delete_id, $id);
    $get_stmt->execute();
    $get_result = $get_stmt->get_result();

    if ($get_result && $get_result->num_rows > 0) {
        $audio = $get_result->fetch_assoc();
        $audioPath = $audio['audio'];

        // Delete file from server
        if (file_exists($audioPath)) {
            unlink($audioPath);
        }

        // Delete DB record
        $del_stmt = $con->prepare("DELETE FROM `audios` WHERE id = ? AND staff = ?");
        $del_stmt->bind_param("is", $delete_id, $id);
        $del_stmt->execute();

        echo "<script>alert('Audio deleted successfully'); window.location.href='" . $_SERVER['PHP_SELF'] . "';</script>";
    } else {
        echo "<script>alert('Audio not found');</script>";
    }
}
?>

<div class="container-fluid team pb-5">
    <div class="container pb-5">
        <div class="text-center mx-auto pb-5 wow fadeInUp" data-wow-delay="0.2s" style="max-width: 800px;">
            <h4 class="text-primary">Our Staffs</h4>
            <h1 class="display-4 mb-4">Meet Our Expert Team Members</h1>
        </div>

        <div class="row g-4">
        <?php
        $qry = "SELECT * FROM `audios` WHERE `staff` = ?";
        $stmt = $con->prepare($qry);
        $stmt->bind_param("s", $id);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result) {
            while ($row = $result->fetch_assoc()) {
        ?>
            <div class="col-12 col-sm-6 col-xl-3 wow fadeInUp" data-wow-delay="0.2s">
                <div class="team-item h-100 d-flex flex-column justify-content-between border shadow-sm rounded">
                    <div class="p-3 bg-light">
                        <audio controls class="w-100">
                            <source src="<?php echo htmlspecialchars($row['audio']); ?>" type="audio/ogg">
                            <source src="<?php echo htmlspecialchars($row['audio']); ?>" type="audio/mpeg">
                            Your browser does not support the audio element.
                        </audio>
                    </div>
                    <div class="team-title p-3 bg-primary text-white">
                        <h5 class="mb-1 text-white"><?php echo htmlspecialchars($row['adesc']); ?></h5>
                        <small class="d-block">Uploaded: <?php echo htmlspecialchars($row['date']); ?></small>
                        <small class="d-block">Class: <?php echo htmlspecialchars($row['class']); ?></small>
                        <div class="text-end mt-2">
                            <a href="?delete_id=<?php echo $row['id']; ?>" onclick="return confirm('Are you sure you want to delete this audio?');" class="btn btn-sm btn-outline-danger">
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
