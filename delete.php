<?php
include 'db.php';

if (isset($_GET['id'])) {
    $id = intval($_GET['id']); // ensure it's an integer

    $stmt = $conn->prepare("DELETE FROM nicholas_records WHERE id = ?");
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        header("Location: view.php"); // redirect back after delete
        exit();
    } else {
        echo "Error deleting record: " . $stmt->error;
    }

    $stmt->close();
}
$conn->close();
?>
