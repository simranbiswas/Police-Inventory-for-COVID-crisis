<?php 
session_start();
include "pdo/connection.php";

include 'pdo/pdo_helper.php';

if (isset($_POST['cancel'])) {
    header("Location: index.php");
    return;
}

$salt = 'XyZzy12*_';            //php123
$failure = false;  

if (isset($_SESSION['failure'])) {
    $failure = htmlentities($_SESSION['failure']);

    unset($_SESSION['failure']);
}

if (isset($_POST['email']) && isset($_POST['pass'])) {
    if (strlen($_POST['email']) < 1 || strlen($_POST['pass']) < 1) {
        $_SESSION['failure'] = "User name and password are required";
        header("Location: login.php");
        return;
    }

    $pass = htmlentities($_POST['pass']);
    $email = htmlentities($_POST['email']);

    try {
        $pdo = pdoHelper();
    } catch (PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
        die();
    }

    $stmt = $pdo->prepare("
        SELECT * FROM users 
        WHERE email = :email AND password = :password
    ");

    $stmt->execute([
        ':email' => $email,
        ':password' => hash('md5', $salt . $pass),
    ]);

    $row = $stmt->fetch(PDO::FETCH_OBJ);

    if ($row !== false) {
        error_log("Login success " . $email);
        $_SESSION['name'] = $row->name;
        $_SESSION['user_id'] = $row->user_id;

        header("Location: index.php");
        return;
    }

    error_log("Login fail " . $pass . " $check");
    $_SESSION['failure'] = "Incorrect password";

    header("Location: login.php");
    return;
}

?>
<!DOCTYPE html>
<html class="h-100">

<head>
    <title>Login Assam Police Database</title>
    <link rel="stylesheet" href="pdo/style.css">
    <?php include 'pdo/headers.php'; ?>
</head>

<body class="h-100">

    <div class="container h-100" id="login">
        <img src="pdo/pic.png" alt="Assam Police Logo"><br>
        <p id="login"></p>
        <script src="pdo/script.js"></script>

        <h1>Please Log In</h1>
        <br>
        <?php

        if ($failure !== false) {
            echo ('<p style="color: red;" class="col-sm-10 col-sm-offset-2>' .
                htmlentities($failure) .
                "</p>\n");
        }
        ?>
        <form method="post" class="form-horizontal">
            <div class="form-group">
                <label class="control-label col-sm-2" for="email"><i class="fa fa-envelope" aria-hidden="true"></i> Email</label>
                <div class="col-sm-3">
                    <input class="form-control" type="text" name="email" id="email" style="height:30px; width:200px; font-size:15px;" placeholder="Enter Email ID">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-2" for="pass"><i class="fa fa-key" aria-hidden="true"></i> Password</label>
                <div class="col-sm-3">
                    <input class="form-control" type="password" name="pass" id="id_1723" style="height:30px; width:200px;font-size:15px;" placeholder="Enter Password">
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-4 col-sm-offset-2">
                    <i class="fa fa-sign-in" aria-hidden="true"></i>
                    <input class="btn btn-primary" style="height:35px; width:70px;font-size:15px;" onclick="return doValidate();" type="submit" value="Log In">
                    <i class="fa fa-times" aria-hidden="true"></i>
                    <input class="btn btn-danger" type="submit" style="height:35px; width:70px;font-size:15px;" name="cancel" value="Cancel">
                </div>
            </div>
        </form>
        <h5>
            
            <!-- Hint: The password is the four character of the application
    we are working on (all lower case) followed by 123. -->
        </h5>

    </div>

    <script>
        function doValidate() {
            console.log('Validating...');
            try {
                addr = document.getElementById('email').value;
                pw = document.getElementById('id_1723').value;
                console.log("Validating addr=" + addr + " pw=" + pw);
                if (addr == null || addr == "" || pw == null || pw == "") {
                    alert("Both fields must be filled out");
                    return false;
                }
                if (addr.indexOf('@') == -1) {
                    alert("Invalid email address");
                    return false;
                }
                return true;
            } catch (e) {
                return false;
            }
            return false;
        }
    </script>

</body>

</html>