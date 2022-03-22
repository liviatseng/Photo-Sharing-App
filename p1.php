<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>

<body class="login_or_not">
    <!-- log in -->
    <?php
        session_start();

        try {
            $conn = new PDO("mysql:host=$severname;dbname=$database", "$username", "$password");
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            // echo "Connected successfully"; 
        } catch(PDOException $e) {
            echo "Connection Error: " . $e->getMessage();
        }
        // People without their ClearDB installed
        $servername = "us-cdbr-east-05.cleardb.net";
        $username = "be4c22fe1bd451";
        $password = "0128e3d6";
        $database = "heroku_f4c1f1b843cd581";
 
        $l_email= $_POST["l_email"];
        $l_password = $_POST["l_password"];

            $sql = "SELECT * FROM User WHERE Email = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(1, $l_email);
            $stmt->execute();


        while($row = $stmt->fetch()){
            $db_email = $row["Email"];
            $db_password = $row["Password"];
            $db_username = $row["Username"];
            $db_profile_pic = $row["Profile_pic"];
        }

        $passOk = password_verify($l_password, $db_password);

        if(password_verify($l_password, $db_password) == true){
            $_SESSION['Password']= $db_password;
            $_SESSION['Email']= $db_email;
            $_SESSION['Username']= $db_username;
            $_SESSION['Profile_pic'] = $db_profile_pic;
            header('Location: mypage.php');
        }else{
            echo "<p class='no_match'>There is no match, try it again.<br></p>
            <a class='return_login' href='login.php'>Return to the Login Page</a>
            ";
        }

    ?>
</body>
</html>

<!-- 
    1. Store login pass and email in variables (from POST)
    2. use the email to query the database to find that user
    3. get the hashed password from the database
    4. use the password_verify() to compare the login pass and the hashed pass
    5. if it matches, log the user in by writing session variables
    6. if there is no match, say sorry and have them try again -->
