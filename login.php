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
    
    <!-- <?php
        include("nav.php"); 
    ?> -->

    <div class="body">
        <div class="login">
            <form action="p1.php"  method="POST" class="f_login">
                <div class="title_">Log in</div><br><br>
                <input type="email" placeholder="Email" id="l_email" name="l_email" class="enter"><br><br>
                <input type="password" placeholder="Password" id="l_password" name="l_password" class="enter"><br><br>
                <input type="submit" value="Submit" class="submit"><br><br>
            </form>
        </div>

        <!-- sign up -->
        <div class="signup">
            <form action="p2.php" method="POST" class="f_signup">
                <div class="title_">Sign Up</div><br><br>
                <input type="text" placeholder="Username" id="username" name="username" class="enter"><br><br>
                <input type="email" placeholder="Email" id="email" name="email" class="enter"><br><br>
                <input type="password" placeholder="Password" id="password" name="password" class="enter"><br><br>
                <input type="password" placeholder="Confirm Password" id="c_password" name="c_password" class="enter"><br><br>
                <input type="submit" value="Sign Up" class="submit">
            </form>
        </div>
    </div>


</body>

</html>