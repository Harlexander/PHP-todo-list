<?php
    $connection = mysqli_connect('localhost', 'peachy', '12345678', 'peachy_todo');

    if(!$connection){
        echo 'Çonnection Error' . mysqli_connect_error();
    }
?>