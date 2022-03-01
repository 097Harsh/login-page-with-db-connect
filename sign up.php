<?php 
$showAlert = false;
$showError = false;
if($_SERVER["REQUEST_METHOD"] == "POST"){
    include 'partials/_dbconnect.php';
    $username = $_POST["username"];
    $password = $_POST["password"];
    $cpassword = $_POST["cpassword"];
    $exists = false;
    if(($password == $cpassword) && $exists == false)
    {
        $sql = "INSERT INTO 'users' ('username','password','dt')VALUES('$username','$password',current_timestamp())";
        $result = mysqli_query($conn, $sql);
        if($result){
            $showAlert = tru;
        }
    }
    else{
        $showError = "Passwords do not match";
    }
}
?>
<!doctype html>
<html lang="en">
    <head>
        <!--Required meta tags-->
        <meta charset = "utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!--Bootstrap CSS-->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

        <title>Signup</title>
    </head>
        <body>
            <?php require 'partials/_nav.php' ?>
            <?php
            if($showAlert){
                echo'<div class="alert alert-sucess alert-dismissible fade show" role="alert ">
                <strong>Sucess</strong>Your accont is now created and you can  login 
                <button type="button" class="close" data-dismiss="alert" arial-label="Close">
                    <span arial-hidden="true">x</span>
                </button>
                </div> ';


            }
            if($showError){
                echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Error</strong>'.$showError.'
                <button type="button" class="close" data-dismiss="alert" arial-label="Close">
                    <span arial-hidden="true">x</span>
                </button>
                <?div>';
            }
            ?>
            <div class="container my-4">
                <h1 class="text-center">Signup tu our website </h1>
                <form action="/php project/signup.php" method="post">
                    <div class="form-group">
                        <label for="username">username</label>
                        <input type="text" class="form-control" id="username" name="username" aria-describedby="emailHelp">
                    </div>
                    <div class="form-group">
                        <label for="password">password</label>
                        <input type="password" class="form-control" id="password" name="password">
                      </div>
                    <div class="form-group">
                        <label for="cppassword">Confirm password</label>
                        <input type="password" class="form-control" id="cpassword" name="cpassword">
                        <small id="emailHelp" class ="form-text text-muted">Make sure to type the same password</small>
                    </div>

                    <button type="submit" class="btn btn-primary">Signup</button>
        </form>
        </div>

        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
        </body>
        </html>