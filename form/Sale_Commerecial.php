<?php
$host = "localhost";
$user = "root";  
$password = "";  
$database = "ghar_dekho"; 

$conn = new mysqli($host, $user, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get search parameters if any
$searchPrice = isset($_GET['marketprice']) ? $_GET['marketprice'] : '';
$searchAddress = isset($_GET['address']) ? $_GET['address'] : '';

// Build the base query
$query = "SELECT * FROM sale_commerecial NATURAL JOIN user_table WHERE 1";

// If there's a market price filter, add it to the query
if (!empty($searchPrice)) {
    $query .= " AND marketprice <= $searchPrice";
}

// If there's an address filter, add it to the query
if (!empty($searchAddress)) {
    $searchAddress = $conn->real_escape_string($searchAddress); // Prevent SQL injection
    $query .= " AND address LIKE '%$searchAddress%'";
}

$result = $conn->query($query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ghar Dekho</title>
    <link rel="stylesheet" href="Rent.css">
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
            <div class="textarea">
                <h1>....Find Most Suitable Commercial Properties Here....</h1>
            </div>

            <!-- Search Form -->
            <div class="search-form">
                <form action="Sale_Commerecial.php" method="GET">
                    <input type="number" name="marketprice" placeholder="Max Market Price" min="0">
                    <input type="text" name="address" placeholder="Address (e.g., katargam)">
                    <input type="submit" name="submit" value="Search" class="login">
                </form>
            </div>

            <?php
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo '<div class="home">
                    <div class="slider-container">
                        <div class="slider" id="slider'. $row['id'] .'">
                            <div class="slide"><img src="./images/'. $row["username"] . '/' . $row["image1"] .'" alt="Image 1"></div>
                            <div class="slide"><img src="./images/'. $row["username"] . '/' . $row["image2"] .'" alt="Image 2"></div>
                            <div class="slide"><img src="./images/'. $row["username"] . '/' . $row["image3"] .'" alt="Image 3"></div>
                            <div class="slide"><img src="./images/'. $row["username"] . '/' . $row["image4"] .'" alt="Image 4"></div>
                        </div>
                        <button class="prev" onclick="moveSlide(\'slider'. $row['id'] .'\', 1)">&#10094;</button>
                        <button class="next" onclick="moveSlide(\'slider'. $row['id'] .'\', -1)">&#10095;</button>
                    </div>
                    <div class="details">
                        <div class="details1">
                            <h2>'. $row['address'] .'</h2>
                        </div>
                        <div class="details2">
                            <div class="details2_1">
                                <h3>₹'. $row['marketprice'] .'</h3>
                                <p>20% advance</p>
                            </div>
                            <div class="details2_1">
                                <h3>'. $row['carpetarea'] .' sqft</h3>
                                <p>Carpet Area</p>
                            </div>
                        </div>
                        <div class="contact">
                            <h3>Contact Details:</h3>
                            <p>Name : '.$row['fullname'].'</p>
                            <p>Mobile No. : '. $row['mobilenumber'] .'</p>
                        </div>
                    </div>
                </div>';
                }
            } else {
                echo "<h2>No Properties Available</h2>";
            }
            ?>

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
