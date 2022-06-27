<?php

    include('config/db_connect.php');
    session_start();

    echo $_SESSION['USER'];

    $error = false;

    if(isset($_POST['submit'])){
        $username =  stripslashes($_POST['username']);
        $username = mysqli_real_escape_string($connection, $username);
        $password =  stripslashes($_POST['password']);
        $password = md5(mysqli_real_escape_string($connection, $password));


        // check if user exist and password is correct
        $query = "SELECT * FROM `users` WHERE username='$username' and password='$password' ";

        //get data
        $result = mysqli_query($connection, $query);

        $rows = mysqli_num_rows($result);
        //check no of rows
        if($rows === 1){
            $_SESSION['USER'] = $username;
        }else{
            $error = true;
        };
    }



?>

<?php
         include('./templates/header.php'); ?>
                <section class="container py-5">
                <form action='login.php' method="POST" class="p-5 bg-info w-50 mx-auto">
                    <p class="alert alert-danger">Invalid username or password</p>
                <div class="form-group">
                    <label for="exampleInputPassword1">Username</label>
                    <input type="text" name="username" class="form-control" >
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Password</label>
                    <input type="password" name="password" class="form-control" >
                </div>
                <div class="form-group form-check">
                    <input type="checkbox" class="form-check-input" id="exampleCheck1">
                    <label class="form-check-label" for="exampleCheck1">Check me out</label>
                </div>
                <button type="submit" name="submit" value="submit" class="btn btn-primary">Submit</button>
                <a href="/test/register.php" class="d-block text-light">Create an account here</a>
                </form>    
                </section>

      <?php  include('./templates/footer.php');
?>