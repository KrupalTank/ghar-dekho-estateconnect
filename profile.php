
<?php
session_start();
$host = "localhost";
$user = "root";  
$password = "";  
$database = "ghar_dekho"; 

$conn = new mysqli($host, $user, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$user = $_SESSION['username'];
$query_user = "SELECT * FROM `user_table` WHERE `username` = '$user'"; 
$user_query = $conn->query($query_user);

if ($user_query->num_rows > 0) {
    $user_info = $user_query->fetch_assoc();
    $fullname = $user_info['fullname'];

    // Split the full name into an array of words
    $name_parts = explode(" ", $fullname);
    
    // Reformat the name to "first name last name" (assuming the first and last parts are the relevant ones)
    $first_name = $name_parts[1]; // Second word as first name
    $last_name = $name_parts[0];  // First word as last name
    
    // Create the desired formatted name
    $personname = $first_name . " " . $last_name;  // Result: "krupal tank"
} else {
    $personname = "User"; // Default if fullname is not found
}


$query = "SELECT * FROM rent_home WHERE `username` = '$user'"; 
$result = $conn->query($query);

$query1 = "SELECT * FROM sale_commerecial WHERE `username` = '$user'"; 
$result1 = $conn->query($query1);

$query2 = "SELECT * FROM sale_home WHERE `username` = '$user'"; 
$result2 = $conn->query($query2);

$query3 = "SELECT * FROM rent_commerecial WHERE `username` = '$user'";
$result3 = $conn->query($query3);

$query4 = "SELECT * FROM hostel WHERE `username` = '$user'";
$result4 = $conn->query($query4);

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
                    <div class="img"><img src="Photos/logo.jpg" alt="logo"></div>
                    <div class="headtitle"><h1>GHAR-DEKHO</h1></div>
                </div>
                
                <div class="signuplogin">
                    <a href="index.php"><div class="login">Home</div></a>
                    <form action="index.php" method="post">
                        <input type="submit" class="logout" name="logout_submit" value="logout">
                    </form>
                </div>
            </div>
        </header>
        <main>
            <div class="textarea">
                <h1>....Hello <?php echo $personname ?>....</h1>
            </div>


            <?php
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo '
                <div class="home">
                    <div class="slider-container">
                        <div class="slider" id="slider'. $row['id'] .'">
                            <div class="slide"><img src="form/images/'. $row["username"] . '/' . $row["image1"] .'" alt="Image 1"></div>
                            <div class="slide"><img src="form/images/'. $row["username"] . '/' . $row["image2"] .'" alt="Image 2"></div>
                            <div class="slide"><img src="form/images/'. $row["username"] . '/' . $row["image3"] .'" alt="Image 3"></div>
                            <div class="slide"><img src="form/images/'. $row["username"] . '/' . $row["image4"] .'" alt="Image 4"></div>
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
                                <h3>₹'. $row['rent'] .' / Month</h3>
                                <p>+ Deposit 2 Months Rent</p>
                            </div>
                            <div class="details2_1">
                                <h3>'. $row['carpetarea'] .' sqft</h3>
                                <p>Carpet Area</p>
                            </div>
                            <div class="details2_1">
                                <h3>'. $row['bhk'] .' BHK</h3>
                            </div>
                        </div>
                        <div class="details3">
                            <div class="form1">
                                <form action="form/delete_rent.php" class="insideform"  method="POST">
                                    <input type="hidden"  class="hidden-input" name="id" value="'. $row['id'] .'">
                                    <input type="submit" name="submit" onclick="return sure();" value="delete" class="login">
                                </form>

                                <form action="form/edit_rent.php" class="insideform" method="GET">
                                    <input type="hidden" name="id" class="hidden-input" value="'. $row['id'] .'">
                                    <input type="submit" name="submit" value="Edit" class="login">
                                </form>
                            </div>
                        </div>
                        <div class="contact">
                            <h3>Contact Details:</h3>
                            <p>Name : '.$user_info['fullname'].'</p>
                            <p>Mobile No. : '. $user_info['mobilenumber'] .'</p>
                        </div>
                        
                    </div>
                </div>';
                }
            }
            ?>

<!-- sale commercial -->

        <?php
            if ($result1->num_rows > 0) {
                while ($row = $result1->fetch_assoc()) {
                    echo '<div class="home">
                    <div class="slider-container">
                        <div class="slider" id="slider'. $row['id'] .'">
                            <div class="slide"><img src="form/images/'. $row["username"] . '/' . $row["image1"] .'" alt="Image 1"></div>
                            <div class="slide"><img src="form/images/'. $row["username"] . '/' . $row["image2"] .'" alt="Image 2"></div>
                            <div class="slide"><img src="form/images/'. $row["username"] . '/' . $row["image3"] .'" alt="Image 3"></div>
                            <div class="slide"><img src="form/images/'. $row["username"] . '/' . $row["image4"] .'" alt="Image 4"></div>
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
                        
                        <div class="details3">
                            <div class="form1">
                                <form action="form/delete_sale_commerecial.php" class="insideform"  method="POST">
                                    <input type="hidden"  class="hidden-input" name="id" value="'. $row['id'] .'">
                                    <input type="submit" name="submit" onclick="return sure();" value="delete" class="login">
                                </form>

                                <form action="form/edit_sale_commerecial.php" class="insideform" method="GET">
                                    <input type="hidden" name="id" class="hidden-input" value="'. $row['id'] .'">
                                    <input type="submit" name="submit" value="Edit" class="login">
                                </form>
                            </div>
                        </div>

                        <div class="contact">
                            <h3>Contact Details:</h3>
                            <p>Name : '.$user_info['fullname'].'</p>
                            <p>Mobile No. : '. $user_info['mobilenumber'] .'</p>
                        </div>
                        
                    </div>
                </div>';
                }
            }
            ?>

<!-- sale home  -->
        <?php
        //for sale home.
            if ($result2->num_rows > 0) {
                while ($row = $result2->fetch_assoc()) {
                    echo '<div class="home">
                    <div class="slider-container">
                        <div class="slider" id="slider'. $row['id'] .'">
                            <div class="slide"><img src="form/images/'. $row["username"] . '/' . $row["image1"] .'" alt="Image 1"></div>
                            <div class="slide"><img src="form/images/'. $row["username"] . '/' . $row["image2"] .'" alt="Image 2"></div>
                            <div class="slide"><img src="form/images/'. $row["username"] . '/' . $row["image3"] .'" alt="Image 3"></div>
                            <div class="slide"><img src="form/images/'. $row["username"] . '/' . $row["image4"] .'" alt="Image 4"></div>
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
                            <div class="details2_1">
                                <h3>'. $row['bhk'] .' BHK</h3>
                            </div>
                        </div>

                        <div class="details3">
                            <div class="form1">
                                <form action="form/delete_sale_home.php" class="insideform"  method="POST">
                                    <input type="hidden"  class="hidden-input" name="id" value="'. $row['id'] .'">
                                    <input type="submit" name="submit" onclick="return sure();" value="delete" class="login">
                                </form>

                                <form action="form/edit_sale_home.php" class="insideform" method="GET">
                                    <input type="hidden" name="id" class="hidden-input" value="'. $row['id'] .'">
                                    <input type="submit" name="submit" value="Edit" class="login">
                                </form>
                            </div>
                        </div>

                        <div class="contact">
                            <h3>Contact Details:</h3>
                            <p>Name : '.$user_info['fullname'].'</p>
                            <p>Mobile No. : '. $user_info['mobilenumber'] .'</p>
                        </div>
                    </div>
                </div>';
                }
            }
            ?>

            <?php
            if ($result3->num_rows > 0) {
                while ($row = $result3->fetch_assoc()) {
                    echo '<div class="home">
                    <div class="slider-container">
                        <div class="slider" id="slider'. $row['id'] .'">
                            <div class="slide"><img src="form/images/'. $row["username"] . '/' . $row["image1"] .'" alt="Image 1"></div>
                            <div class="slide"><img src="form/images/'. $row["username"] . '/' . $row["image2"] .'" alt="Image 2"></div>
                            <div class="slide"><img src="form/images/'. $row["username"] . '/' . $row["image3"] .'" alt="Image 3"></div>
                            <div class="slide"><img src="form/images/'. $row["username"] . '/' . $row["image4"] .'" alt="Image 4"></div>
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
                                <h3>₹'. $row['rent'] .'</h3>
                                <p>20% advance</p>
                            </div>
                            <div class="details2_1">
                                <h3>'. $row['carpetarea'] .' sqft</h3>
                                <p>Carpet Area</p>
                            </div>
                            
                        </div>

                        <div class="details3">
                            <div class="form1">
                                <form action="form/delete_rent_commerecial.php" class="insideform"  method="POST">
                                    <input type="hidden"  class="hidden-input" name="id" value="'. $row['id'] .'">
                                    <input type="submit" name="submit" onclick="return sure();" value="delete" class="login">
                                </form>

                                <form action="form/edit_rent_commerecial.php" class="insideform" method="GET">
                                    <input type="hidden" name="id" class="hidden-input" value="'. $row['id'] .'">
                                    <input type="submit" name="submit" value="Edit" class="login">
                                </form>
                            </div>
                        </div>

                        <div class="contact">
                            <h3>Contact Details:</h3>
                            <p>Name : '.$user_info['fullname'].'</p>
                            <p>Mobile No. : '. $user_info['mobilenumber'] .'</p>
                        </div>
                        
                    </div>
                </div>';
                }
            }
            ?>

        <?php
            if ($result4->num_rows > 0) {
                while ($row = $result4->fetch_assoc()) {
                    echo '<div class="home">
                    <div class="slider-container">
                        <div class="slider" id="slider'. $row['id'] .'">
                            <div class="slide"><img src="form/images/'. $row["username"] . '/' . $row["image1"] .'" alt="Image 1"></div>
                            <div class="slide"><img src="form/images/'. $row["username"] . '/' . $row["image2"] .'" alt="Image 2"></div>
                            <div class="slide"><img src="form/images/'. $row["username"] . '/' . $row["image3"] .'" alt="Image 3"></div>
                            <div class="slide"><img src="form/images/'. $row["username"] . '/' . $row["image4"] .'" alt="Image 4"></div>
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
                                <h3>₹'. $row['fees'] .' / Month</h3>
                                <p> + Deposite 2 Months Fees</p>
                            </div>
                            <div class="details2_1">
                                <h3>'. $row['carpetarea'] .' sqft</h3>
                                <p>Carpet Area</p>
                            </div>
                            <div class="details2_1">
                                <h3>'. $row['persons'] .' Persons</h3>
                                <p>Per Room</p>
                            </div>
                            
                        </div>

                        <div class="details3">
                            <div class="form1">
                                <form action="form/delete_hostel.php" class="insideform"  method="POST">
                                    <input type="hidden"  class="hidden-input" name="id" value="'. $row['id'] .'">
                                    <input type="submit" name="submit" onclick="return sure();" value="delete" class="login">
                                </form>

                                <form action="form/edit_hostel.php" class="insideform" method="GET">
                                    <input type="hidden" name="id" class="hidden-input" value="'. $row['id'] .'">
                                    <input type="submit" name="submit" value="Edit" class="login">
                                </form>
                            </div>
                        </div>

                        <div class="contact">
                            <h3>Contact Details:</h3>
                            <p>Name : '.$user_info['fullname'].'</p>
                            <p>Mobile No. : '. $user_info['mobilenumber'] .'</p>
                        </div>
                        
                    </div>
                </div>';
                }
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
    <script>
        function sure()
        {
            if(confirm("Are You Sure you Want To Delete Property?"))
            {
                return true;
            }
            return false;
        }
    </script>
</body>

</html>

<?php $conn->close(); ?>