<?php
$host = "localhost";
$user = "root";
$password = "";
$database = "ghar_dekho";

$conn = new mysqli($host, $user, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);
    $query = "SELECT * FROM sale_commerecial WHERE id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $property = $result->fetch_assoc();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ghar Dekho</title>
    <link rel="stylesheet" href="Rent.css">
    <link rel="stylesheet" href="AddProperty.css">
    <link rel="stylesheet" href="Signup_Login.css">
</head>
<body>
    <div class="page">
        <header>
            <div class="header">
                <div class="logo">
                    <div class="img"><img src="../Photos/logo.jpg" alt="logo"></div>
                    <div class="headtitle"><h1>GHAR-DEKHO</h1></div>
                </div>
                <div class="signuplogin">
                    <a href="../index.php"><div class="button">Home</div></a>
                </div>
            </div>
        </header>

        <main>
            <h2>Edit Property Details</h2>
            <div class="form-container">
            <form action="update_sale_commerecial.php" class="property-form" method="POST"  enctype="multipart/form-data">
                <input type="hidden" name="id" value="<?php echo $property['id']; ?>">

                <div class="input-group">
                <label>Address:</label>
                <input type="text" name="address" value="<?php echo $property['address']; ?>" required><br>
                </div>

                <div class="input-group">
                <label>Rent (₹):</label>
                <input type="number" name="marketprice" value="<?php echo $property['marketprice']; ?>" required><br>
                </div>

                <div class="input-group">
                <label>Carpet Area (sqft):</label>
                <input type="number" name="carpetarea" value="<?php echo $property['carpetarea']; ?>" required><br>
                </div>

                <div class="input-group">
                        <label for="images1">Image 1</label>
                        <input type="file" id="images1" name="images1" accept="image/*"  required>
                    </div>
                    <div class="input-group">
                        <label for="images2">Image 2</label>
                        <input type="file" id="images2" name="images2" accept="image/*"  required>
                    </div>
                    <div class="input-group">
                        <label for="images3">Image 3</label>
                        <input type="file" id="images3" name="images3" accept="image/*"  required>
                    </div>
                    <div class="input-group">
                        <label for="images4">Image 4</label>
                        <input type="file" id="images4" name="images4" accept="image/*"  required>
                    </div>

                <input type="submit" class="submit-btn">
            </form>
            </div>
        </main>

        <footer>
            <div class="footerbox">
                <p>Copyright : &copy; Ghar Dekho Pvt Ltd 2025 All</p>
            </div>
        </footer>
    </div>

    <script src="Rent_script.js"></script>
    <script src="Signup_Login.js"></script>
</body>
</html>



<?php $conn->close(); ?>
