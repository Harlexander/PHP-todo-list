<?php

    include('config/db_connect.php');

    $username = $email = $passsword = '';
    $successful = false;

    //start session
    session_start();

    if(isset($_POST['submit'])){
        //remove backslashes and special character
        $username =  stripslashes($_POST['username']);
        $username = mysqli_real_escape_string($connection, $username);
        $email = stripslashes( $_POST['email']);
        $email =  mysqli_real_escape_string($connection, $email) ;
        $password =  md5($_POST['password']) ;
        


        //sql query
        $query = "INSERT into `users` ( username, email, password) VALUES ('$username', '$email', '$password')";

        // insert data
        $result = mysqli_query($connection, $query);

        if($result){
            echo $successful = true;
            $_SESSION['USER'] = $username;
            header ('Location: /test');
        }
    };

?>

<?php
         include('./templates/header.php'); ?>
                <section class="container py-5">
                    <?php
                       if($successful){
                         echo "<p class='alert-success alert'>Registration successful!!!</p>";
                       }';'
                    ?>
                <form action="register.php" method="POST" class="p-5 bg-info w-50 mx-auto">
                <div class="form-group">
                    <label for="exampleInputEmail1">Username</label>
                    <input type="name" value="<?php echo $username; ?>" class="form-control" name="username">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Email</label>
                    <input type="email"  value="<?php echo $email; ?>" name="email" class="form-control" >
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Password</label>
                    <input type="password" name="password" class="form-control" >
                </div>
                <button type="submit"  name="submit" value="submit" class="btn btn-primary">Submit</button>
                </form>    
                </section>

      <?php  include('./templates/footer.php');
?>