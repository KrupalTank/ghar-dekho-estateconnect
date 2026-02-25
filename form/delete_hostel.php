<?php
$host = "localhost";
$user = "root";
$password = "";
$database = "ghar_dekho";

$conn = new mysqli($host, $user, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['id'])) {
    $id = intval($_POST['id']); // Sanitize ID input

    // Fetch the username and image paths to delete from local storage
    $query = "SELECT username, image1, image2, image3, image4 FROM hostel WHERE id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();
    
    if ($row) {
        $folderPath = "./images/" . $row["username"] . "/";
        
        // Delete images if they exist
        for ($i = 1; $i <= 4; $i++) {
            $imagePath = $folderPath . $row["image$i"];
            if (file_exists($imagePath)) {
                unlink($imagePath);
            }
        }
        
        // Delete property from database
        $deleteQuery = "DELETE FROM hostel WHERE id = ?";
        $stmt = $conn->prepare($deleteQuery);
        $stmt->bind_param("i", $id);
        
        if ($stmt->execute()) {
            echo "<script>alert('Property deleted successfully!'); window.location.href = '../profile.php';</script>";
        } else {
            echo "<script>alert('Failed to delete property.'); window.location.href = '../profile.php';</script>";
        }
    } else {
        echo "<script>alert('Property not found.'); window.location.href = '../profile.php';</script>";
    }
}
$conn->close();
?>
