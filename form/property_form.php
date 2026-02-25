<?php

session_start();
$sname = "localhost";
$uname = "root";
$pwd = "";
$conn = mysqli_connect($sname, $uname, $pwd, "ghar_dekho");
$user = $_SESSION['username'];
$folderpath = "images/".$user;

if(!is_dir($folderpath))
{
    mkdir($folderpath, 0777, true);  
}

if(isset($_POST['submit']))
{
    $type = $_POST['type'];
    $area = $_POST['area'];
    $address = $_POST['address'];   
    $image1 = $_POST['images1'];
    $image2 = $_POST['images2'];
    $image3 = $_POST['images3'];
    $image4 = $_POST['images4'];

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

      
    if($type == "rent_home")
    {
        $rent = $_POST['rentamount'];
        $bhk = $_POST['bhk'];
        
        $sql = "INSERT INTO `rent_home` (`id`, `username`, `bhk`, `rent`, `carpetarea`, `address`, `image1`, `image2`, `image3`, `image4`, `type`) VALUES (NULL, '$user', '$bhk', '$rent', '$area', '$address', '$filename1', '$filename2', '$filename3', '$filename4', 'rent_home')";
        $result = mysqli_query($conn, $sql);
        
    }
    elseif($type == "sale_home")
    {
        $marketprice = $_POST['marketpriceh'];
        $bhk = $_POST['nbhks'];
        $sql = "INSERT INTO `sale_home` (`id`, `username`, `bhk`, `marketprice`, `carpetarea`, `address`, `image1`, `image2`, `image3`, `image4`, `type`) VALUES (NULL, '$user', '$bhk', '$marketprice', '$area', '$address', '$filename1', '$filename2', '$filename3', '$filename4', 'sale_home')";
        $result = mysqli_query($conn, $sql);
    }
    elseif($type == "rent_commerecial")
    {
        $rent = $_POST['rentcomm'];
        $sql = "INSERT INTO `rent_commerecial` (`id`, `username`, `rent`, `carpetarea`, `address`, `image1`, `image2`, `image3`, `image4`, `type`) VALUES (NULL, '$user', '$rent', '$area', '$address', '$filename1', '$filename2', '$filename3', '$filename4', 'rent_commerecial')";
        $result = mysqli_query($conn, $sql);
    }
    elseif($type == "sale_commerecial")
    {
        $marketprice = $_POST['marketpricecomm'];
        $sql = "INSERT INTO `sale_commerecial` (`id`, `username`, `marketprice`, `carpetarea`, `address`, `image1`, `image2`, `image3`, `image4`, `type`) VALUES (NULL, '$user', '$marketprice', '$area', '$address', '$filename1', '$filename2', '$filename3', '$filename4', 'sale_commerecial')";
        $result = mysqli_query($conn, $sql);
    }
    else{
        $rent = $_POST['fees'];
        $person = $_POST['numperson'];
        $sql = "INSERT INTO `hostel` (`id`, `username`, `fees`, `persons`, `carpetarea`, `address`, `image1`, `image2`, `image3`, `image4`, `type`) VALUES (NULL, '$user', '$rent', '$person', '$area', '$address', '$filename1', '$filename2', '$filename3', '$filename4', 'hostel')";
        $result = mysqli_query($conn, $sql);
    }
    mysqli_close($conn);
    if($result)
    {  
        echo '<script>alert("property added successfuly.");
        window.location.href = "../index.php";
        </script>';     
    }


}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ghar Dekho</title>
    <link rel="stylesheet" href="index.css">
    <link rel="stylesheet" href="AddProperty.css">
    <link rel="stylesheet" href="Signup_Login.css">
</head>
<body>
    <script src="form.js"></script>
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
            <div class="form-container">
                <form class="property-form" action="property_form.php" method="post" enctype="multipart/form-data">
                    <h2>Property Submission Form </h2>
                    <select name="type" id="type">
                        <option value="rent_home">Rent home</option>
                        <option value="rent_commerecial">Rent Commerecial</option>
                        <option value="sale_home">Sale Home</option>
                        <option value="sale_commerecial">Sale Commerecial</option>
                        <option value="hostel">Hostel</option>
                        
                    </select>
                    <div class="input-group">
                        <label for="address">Address</label>
                        <input type="text" name="address" id="address" placeholder="Write your address here">
                    </div>
                    <div class="input-group" id="bhk">

                    </div>
                    <div id="rent" class="input-group">

                    </div>

                    <div id="marketprice" class="input-group">

                    </div>
                    <div id="persons" class="input-group">

                    </div>
                   
                    <div class="input-group">
                        <label for="mobile">Carpet Area</label>
                        <input type="number" id="area" min="1" name="area" placeholder="Enter area in square feet" required>
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
                    <input type="submit" value="submit" name="submit" class="submit-btn">
                </form>
            </div>
        </main>
        <footer>
            <div class="footerbox">
                <p>Copyright : &copy; Ghar Dekho Pvt Ltd 2025 All</p>
            </div>
        </footer>
    </div>
    
    <script src="Signup_Login.js"></script>
    <!-- <script src="index.js"></script> -->
</body>
</html>
