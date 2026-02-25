<?php
$host = "localhost";
$user = "root";
$password = "";
$database = "ghar_dekho";

$conn = new mysqli($host, $user, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = intval($_POST['id']);
    $address = $_POST['address'];
    $marketprice = $_POST['marketprice'];
    $carpetarea = $_POST['carpetarea'];

    

    $query = "SELECT * FROM sale_home WHERE id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();
    $folderPath = "./images/" . $row['username'] . "/";
        // Delete images if they exist
        for ($i = 1; $i <= 4; $i++) {
        $imagePath = $folderPath . $row["image$i"];
        if (file_exists($imagePath)) {
            unlink($imagePath);
        }
    }
    //replacing images.
    $folderpath = "images/" . $row['username'];
    
    $filename1 = $_FILES['images1']['name'];    
    $temp = $_FILES["images1"]["tmp_name"]; 
    $folder = $folderpath."/" . $filename1;  
    move_uploaded_file($temp, $folder);     
    
    
    $filename2 = $_FILES['images2']['name'];    
    $temp = $_FILES["images2"]["tmp_name"]; 
    $folder = $folderpath."/" . $filename2;  
    move_uploaded_file($temp, $folder); 
    
    $filename3 = $_FILES['images3']['name'];    
    $temp = $_FILES["images3"]["tmp_name"]; 
    $folder = $folderpath."/" . $filename3;  
    move_uploaded_file($temp, $folder); 
    
    $filename4 = $_FILES['images4']['name'];    
    $temp = $_FILES["images4"]["tmp_name"]; 
    $folder = $folderpath."/" . $filename4;  
    move_uploaded_file($temp, $folder); 
    
    $i1 = $filename1;
    $i2 = $filename2;
    $i3 = $filename3;
    $i4 = $filename4;
    
    $query = "UPDATE sale_commerecial SET address=?, marketprice=?, carpetarea=?, image1=?, image2=?, image3=?, image4=? WHERE id=?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("siissssi", $address, $marketprice, $carpetarea, $i1, $i2, $i3, $i4, $id);

    

    if ($stmt->execute()) {
        echo "<script>alert('Property updated successfully!'); window.location.href = '../profile.php';</script>";
    } else {
        echo "<script>alert('Update failed!'); window.location.href = '../profile.php';</script>";
    }
}

$conn->close();
?>
