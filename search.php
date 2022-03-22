<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
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

    <div class="search">
        <form action="search.php" method="POST">
            <input type="email" class="search_bar" name="s_email" class="s_email">
            <input type="submit" value="Search" class="search_submit">
        </form>
    </div>

    <?php

    // check if search was submitted
        $s_email = $_POST['s_email']; 
        var_dump($s_email);       

        $sql = "SELECT * From User WHERE Email LIKE ?";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(1, $s_email);
        var_dump($stmt->execute());

        while($row = $stmt -> fetch()){
            $db_username = $row["Username"];
            $db_email = $row["Email"];

        echo 
            "<div class='search_result'>
                <div>
                    Username: ".$db_username."<br>User Email: " . $db_email . 
                "</div>
                <div class='follow_button'>
                    // follow button
                </div>
            </div>";
        }
    ?>

    

</body>
</html>
