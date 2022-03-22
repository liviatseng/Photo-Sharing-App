    <?php
        include("nav.php"); 

        if (isset($_POST['upload_pic'])) {

            // Connect to DB
            try {
                $conn = new PDO("mysql:host=localhost;dbname=PhotoSharingApp", "root", "root");
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch(PDOException $e) {
                echo "Connection Error: " . $e->getMessage();
            }
    
            // var_dump($_FILES);
            $destinationFolder = "/Applications/MAMP/htdocs/photo_sharing_app/pics/";
            $filepath = $destinationFolder.$_FILES['upload_img']['name'];
    
            // echo "<br>" . $_FILES['upload_img']['name'];
            // echo "<br>" . $filepath;
    
            move_uploaded_file($_FILES['upload_img']['tmp_name'], $filepath);
    
            $upload_text = $_POST["upload_text"];

            $post_username = $_SESSION['Username'];

            // echo "<br>Upload SESSION: <br>";
            // var_dump($_SESSION);

            $sql = "INSERT INTO Post (Text, Username) value ('$upload_text', '$post_username')";
            $conn->exec($sql);
        }
    
        // // Default PHP
        // echo "<br>Default SESSION: <br>";
        // var_dump($_SESSION);

    ?>

    <form action="upload.php" method="POST" enctype="multipart/form-data">
        <div><strong>Upload a Post</strong></div><br><br>
        <input type="file" name="upload_img"><br><br><br>
        <input type="text" name="upload_text" placeholder="Write your text..."><br><br>
        <input type="submit" name="upload_pic" value="Submit" class="SUBMIT"><br><br>
    </form>



