<?php

    include 'db.php';

    $nameErr    = "";
    $emailErr   = "";
    $mobileErr  = "";
    $genderErr  = "";
    $websiteErr = "";
    $commentErr = "";

    $name      = "";
    $gender    = "";
    $email     = "";
    $phnNumber = "";
    $website   = "";
    $comment   = "";

    $success   = "";

    $mySQLerr  = ""; 

    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        function checkInput($input) {
            $input = trim($input);
            $input = stripslashes($input);
            $input = htmlspecialchars($input);
    
            return $input;
        }

        if (empty($_POST['full_name'])) {
            $nameErr = "Please enter a valid name";
        } else {
            $name = checkInput($_POST['full_name']);
            if (!preg_match("/^[a-zA-Z ]*$/", $name)) {
                $nameErr = "Only letters and white space allowed";
            }
        }

        if (empty($_POST['email'])) {
            $emailErr = "Email is required";
        } else {
            $email = checkInput($_POST['email']);
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $emailErr = "Invalid email format";
            }
        }

        if (empty($_POST['mobile_num'])) {
            $mobileErr = "Mobile number is required";
        } else {
            $phnNumber = checkInput($_POST['mobile_num']);
            if (!preg_match("/[0-9]{11}/", $phnNumber)) {
                $mobileErr = "Only numbers allowed and only 11 digits";
            }
        }

        if (empty($_POST['website'])) {
            $websiteErr = "Website is required";
        } else {
            $website = checkInput($_POST['website']);
            if (!preg_match("#^https?://.+#", $website)) {
                $websiteErr = "Invalid URL, please enter a valid URL. e.g. http://www.example.com";
            }
        }
        
        if (empty($_POST['comment'])) {
            $commentErr = "Please enter a comment";
        } else {
            $comment = checkInput($_POST['comment']);
        }

        if (empty($_POST['gender'])) {
            $genderErr = "Please select a gender";
        } else {
            $gender = checkInput($_POST['gender']);
        }

        if (empty($_POST['full_name'])) {
            $mySQLerr = "Data not insterted into table.";
            mysqli_close($connection);
        } else {
            $Insertquery = mysqli_query($connection, "INSERT INTO users (`id`, `full_name`, `email`, `website`, `comment`, `gender`, `mobile`)
                VALUES(NULL, '$name', '$email', '$website', '$comment', '$gender', '$phnNumber');");
            $success = "Information added. <a href='view.php'>Click here</a> to see the information.";
        }
    }


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Form validator with MySQL Database</title>
    <link rel="stylesheet" href="assets/style.css">
</head>
<body>
    <h1>PHP Form validator with MySQL Database</h1>
    <p class="error">(*) filed are required</p>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
        <label for="full_name">Full Name :</label>
        <input type="text" name="full_name" id="full_name">
        <span class="error">* <?php echo $nameErr;?></span>
        <br>

        <label for="email">Email Address :</label>
        <input type="email" name="email" id="email">
        <span class="error">* <?php echo $emailErr;?></span>
        <br>

        <label for="mobile_num">Mobile :</label>
        <input type="text" name="mobile_num" id="mobile_num">
        <span class="error">* <?php echo $mobileErr;?></span>
        <br>

        <label for="website">Website :</label>
        <input type="url" name="website" id="website">
        <span class="error">* <?php echo $websiteErr;?></span>
        <br>

        <label>Gender :</label>
        <input type="radio" name="gender" value="female"> Female
        <input type="radio" name="gender" value="male"> Male
        <span class="error">* <?php echo $genderErr;?></span>
        <br>

        <label for="comment">Comment :</label>
        <textarea name="comment" id="comment" cols="30" rows="10"></textarea>
        <span class="error">* <?php echo $commentErr;?></span>
        <br>

        <input type="submit" value="Submit">
        
        <span class="success"><?php echo $success;?></span>
        <span class="error"><?php echo $mySQLerr;?></span>
    </form>
</body>
</html>