<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <?php
        include("nav.php"); 

        try {
            $conn = new PDO("mysql:host=localhost;dbname=PhotoSharingApp", "root", "root");
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            echo "Connected successfully"; 
        } catch(PDOException $e) {
            echo "Connection Error: " . $e->getMessage();
        }

        $username = $_POST["username"];
        $password = $_POST["password"];
        $email = $_POST["email"];

        $hashPassword = password_hash($password, PASSWORD_BCRYPT);
        
        $sql = "INSERT INTO User (Username, Password, Email) value ('$username', '$hashPassword', '$email')";
        
        $conn->exec($sql);
    ?>
</body>
</html>