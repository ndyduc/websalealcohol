<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="views/CSS/login.css?v=4">
    <title> Log in page </title>
</head>

<?php include 'views/header.php'; ?>
<body>
    <div class="page">
        <div class="center">
            <div class="wave"></div>
            <div class="wave"></div>
            <div class="wave"></div>
            <div class="wave"></div>
            <div class="wave"></div>
            <div class="wave"></div>
            <div class="wave"></div>
            <div class="wave"></div>
            <div class="wave"></div>
            <div class="wave"></div>
        </div>
    </div>
    <p>&nbsp;</p>
    <?php 
    if ($Employees) {
    echo "<div>$Employees</div>";
    } else {
        echo '<div class="good"> </div>';
    } ?>
    <div class="login-box">
        <form action="index.php?controller=Employee&action=log" method="POST">
            <h2>Login C&S</h2>
            <div class="user-box">
                <input type="number" name="phone" required placeholder="Phone Number">
                <label>Phone Number</label>
            </div>
            <div class="user-box">
                <input type="password" name="password" required placeholder="Password">
                <label>Password</label>
            </div>
            <div class="button-form">
                <button type="submit" name="submit" id='submit'>Submit</button>
                <div id="register">
                    <p>Wanna join in our career !</p>
                    <a href="signup.html"> Register</a>
                </div>
            </div>
        </form>
    </div>
</body>

</html>