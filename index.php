
<?php

session_start();
$sname = "localhost";
$uname = "root";
$pwd = "";
$conn = mysqli_connect($sname, $uname, $pwd, "ghar_dekho");

if(isset($_POST['submit']))
{
    $username = $_POST['username'];
    $fullname = $_POST['fullname'];
    $password = $_POST['pwd'];
    $mobile = $_POST['mobile'];

    $sql = "SELECT * FROM `user_table` WHERE( `username` = '$username')";
    $result = mysqli_query($conn, $sql);
    if(mysqli_num_rows($result) == 0)
    {
        $sql = "INSERT INTO `user_table` (`username`, `fullname`, `mobilenumber`, `password`) VALUES ('$username', '$fullname', '$mobile', '$password')";
        $result = mysqli_query($conn, $sql);
        if($result)
        {
            echo "<script>alert('successful signup, account has been created.');</script>";
        }
    }
    else{
        echo "<script>alert('this username is already used, try to use different username for creating account.');</script>";
    }
}


if(isset($_POST['login_submit']))
{
    $username = $_POST['username'];
    $password = $_POST['pwd'];
    $sql = "SELECT * FROM `user_table` WHERE( `username` = '$username')";

    $result = mysqli_query($conn, $sql);
    if(mysqli_num_rows($result) == 0)
    {
        echo "<script>alert('Account is not found, please Signup first.');</script>";
    }
    else{
        $sql1 = "SELECT * FROM `user_table` WHERE( `username` = '$username' AND `password` = '$password')";
        $result = mysqli_query($conn, $sql1);
        if(mysqli_num_rows($result) == 0)
        {
            echo "<script>alert('INVALID PASSWORD.');</script>";
        }
        else{
            $_SESSION['username'] = $username;
            echo "<script>alert('successful login.');</script>";
        }
    }
}


if(isset($_POST['logout_submit']))
{
    session_unset();  // Unset all session variables
    session_destroy();  // Destroy the session
    header("Location: index.php");  // Redirect to home or login page after logout
}

mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ghar Dekho</title>
    <link rel="stylesheet" href="card.css">
    <link rel="stylesheet" href="Signup_Login.css">
    <link rel="stylesheet" href="om.css">

</head>
<body>
    <div class="div1">
    <header>
        <div class="header">
            <div class="logo">
                <!-- <div class="img"><img src="Photos/logo.jpg" alt="logo"></div> -->
                <div class="headtitle"><h1>GHAR-DEKHO</h1></div>
            </div>
           
            <div class="signuplogin">
                <?php
                    if(isset($_SESSION['username']))
                    {
                        echo'
                            <form action="index.php" method="post">
                            <input type="submit" class="login" name="logout_submit" value="Logout">
                            </form>
                            <a href="profile.php"><div class="login">Profile</div></a>
                        ';
                    }
                    else{
                        echo'
                            
                            <div class="login" id="loginBtn">LogIn</div>
                            
                        ';
                    }
                ?>
            </div>
        </div>
    </header>

    <!-- Overlay for background fade effect -->
    <div class="overlay" id="overlay"></div>

    <!-- Modal for Login and Sign Up -->
    <div class="modal" id="signupModal">
        <div class="modalclass">
            <span class="close-btn" id="signclose" onclick="closeModal()">&#x2715;</span>
            <div class="modalclass1"><h2>Sign Up</h2></div>
            <form action="index.php" method = "post" onsubmit="return validation()">
            <input type="text" id="fullname" name="fullname" class="modalclass1" placeholder="Full Name">
            <input type="password" id="s_password" class="modalclass1" name="pwd" placeholder="Password">
            <input type="text" id="s_username" class="modalclass1" name="username" placeholder="username">
            <input type="number" id="mobile" class="modalclass1" name="mobile" placeholder="Mobile Number">
            
            <div class="modalclass1"><input type="submit" class="login" id="submit-btn1" name="submit"></div>
            </form>
        </div>
    </div>

    
    <div class="modal" id="loginModal">
        <div class="modalclass">
            <span class="close-btn" id="logclose" onclick="closeModal()">&#x2715;</span>
            <div class="modalclass1"><h2>Log In</h2></div>
            <form action="index.php" method="post" onsubmit="return login_validation()">
            <input type="username" id="l_username" class="modalclass1" name="username" placeholder="username">
            <input type="password" id="l_password" class="modalclass1" name="pwd" placeholder="Password">
            <div class="modalclass1" ><input type="submit" class="login" value="Login" name="login_submit"></div>
            </form>
            <div class="modalclass1"><h3>If you Have Not Created Account, Signup Here</h3></div>
            <div class="signup modalclass1" id="signupBtn">Sign Up</div>
        </div>
    </div>

    <main>
        <div class="main">
            <div class="textarea">
                <div class="text"><h1>Surat's Largest Brokerage Property site</h1></div>
                <div class="nexttext">Free for Buy and get property rent.</div>
            </div>
            <div class="info horizontal">
                <div class="fist box">Trusted Places</div>
                <div class="second box">Well clients</div>
            </div>

            <div class="option horizontal">
                <a href="form/Sale_Home.php">
                    <div class="buy box">Buy Flats</div>
                </a>
                <a href="form/Rent_Home.php">
                    <div class="rent box">Rent Flats</div>
                </a>
                <a href="form/Rent_Commerecial.php">
                    <div class="commercial box">Commercial For Rent</div>
                </a>
                <a href="form/Hostel.php">
                    <div class="hostel box">Hostels/PG</div>
                </a>
                <a href="form/Sale_Commerecial.php">
                    <div class="builder box">Commerecial For Sale</div>
                </a>
            </div>

            <div class="seller">
                <?php
                    global $flag;
                    if(isset($_SESSION['username']))
                    {
                        echo '
                         <div><p>Are You a property owner?</p></div>
                        <a href="form/property_form.php"><div id="addpropertybtn" class="box" >Post Property Here</div></div></a>
                        ';
                    }
                    else{
                        echo '
                        <div><p>Are You a property owner?</p></div>
                        <a href="index.php"><div id="addpropertybtn" class="box" >LogIn To Add Property.</div></div></a>
                       ';
                    }
                    
                ?>
               
            </div>
       
        <div class="content">
            <div><p>GET STARTED WITH EXPLORING REAL ESTATE OPTIONS</p></div>

            <!-- Slider Section -->
            <div class="slider-container">
                <button class="prev-btn" onclick="moveSlide('prev')">&#10094;</button>

                <div class="slider">
                    <div class="card">
                        <div class="image">
                            <a href="form/Rent_Home.php"><img src="photos/rent.jpg" alt="rent"></a>
                        </div>
                        <div class="detail">
                            <h3>Home For Rent</h3>
                        </div>
                    </div>
                    <div class="card">
                        <div class="image">
                            <a href="form/Sale_Home.php"><img src="photos/sale3.jpg" alt="rent"></a>
                        </div>
                        <div class="detail">
                            <h3>Home For Sale</h3>
                        </div>
                    </div>
                    <div class="card">
                        <div class="image">
                            <a href="form/Hostel.php"><img src="photos/hostel.jpg" alt="rent"></a>
                        </div>
                        <div class="detail">
                            <h3>Hostels</h3>
                        </div>
                    </div>
                    <div class="card">
                        <div class="image">
                            <a href="form/Rent_Commerecial.php"><img src="photos/commercial.jpg" alt="rent"></a>
                        </div>
                        <div class="detail">
                            <h3>Commercial Properties For Rent</h3>
                        </div>
                    </div>
                    <div class="card">
                        <div class="image">
                            <a href="form/Sale_Commerecial.php"><img src="photos/builders.jpg" alt="rent"></a>
                        </div>
                        <div class="detail">
                            <h3>Commercial Properties for sale</h3>
                        </div>
                    </div>
                </div>

                <button class="next-btn" onclick="moveSlide('next')">&#10095;</button>
            </div>

            <div class="about">
                <div class="abouttext">
                    <div class="aboutmaintext"><h2>BUY AND GET PROPERTY RENT FOR FREE ON <b>GHAR DEKHO!</b></h2></div>
                    <div class="desctext">Lorem ipsum, dolor sit amet consectetur adipisicing elit...</div>
                </div>
                <div class="image2"><img src="Photos/6.png" alt="about"></div>
            </div>

            <div class="div4">
                <h1>Find better Place To Live Worth And Wonder</h1>
            </div>
            <div class="div5">
                <div class="card1">
                    <div class="image">
                        <img src="Photos/500+properties.jpg" alt="logo">
                    </div>
                    <div class="description">
                        <h3>500+ Properties For Rent</h3>
                    </div>
                </div>
                <div class="card1">
                    <div class="image">
                        <img src="Photos/users1.jpg" alt="logo">
                    </div>
                    <div class="description">
                        <h3>1000+ Users</h3>
                    </div>
                </div>
                <div class="card1">
                    <div class="image">
                        <img src="Photos/forsale.jpg" alt="logo">
                    </div>
                    <div class="description">
                        <h3>250+ Properties For Sale</h3>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <footer class="footer">
        <div class="footerbox">
            <p>Copyright : &copy; Ghar Dekho Pvt Ltd 2025 All</p>
        </div>
    </footer>
    <script src="Signup_Login.js"></script>
    <script src="index.js"></script>
    <script src="login_signup_validation.js"></script>
</div>
</body>
</html>
