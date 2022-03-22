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
        session_start();

        try {
            $conn = new PDO("mysql:host=localhost;dbname=PhotoSharingApp", "root", "root");
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch(PDOException $e) {
            echo "Connection Error: " . $e->getMessage();
        }

    ?>
    <div class="user_info">
        <!-- + profile pic -->
        <p>Username: <?php echo $_SESSION['Username']?></p><br>
        <p>Email: <?php echo $_SESSION['Email']?></p><br><br>
    </div>
    <div>
        <!-- user's post -->
        <?php

        $result = $conn -> query("SELECT * FROM `Message`");

        ?>
    </div>


</body>
</html>