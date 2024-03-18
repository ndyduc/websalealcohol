<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Change Password</title>
    <link rel="stylesheet" href="views/CSS/login.css?v=2">
</head>
<?php include 'views/adbar.php'; ?>
<body style="margin: 0;">
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
    <div class="login-box pass">
        <form id="from" action="index.php?controller=Employee&action=pass" method="post">
            <h2>Change Password</h2>
            <div class="user-box">
                <input type="password" name="pass" required placeholder="Old Password">
                <label>Old Password</label>
            </div>
            <div class="user-box">
                <input type="password" name="pass1" required placeholder="Enter Password">
                <label>Enter Password</label>
            </div>
            <div class="user-box">
                <input type="password" name="pass2" required placeholder="Enter Again">
                <label>Enter Again</label>
            </div>
            <div class="button-form">
                <button type="submit" for="form">Submit</button>
            </div>
        </form>
    </div>
</body>
</html>