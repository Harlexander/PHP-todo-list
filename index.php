<?php

    include('config/db_connect.php');
    include('config/auth.php');

    $username = $_SESSION['USER'];

    
    //get tasks from DB
    $query = "SELECT * from `tasks`";

    $result = mysqli_query($connection, $query);

    //convert to array
    $data = mysqli_fetch_all($result, MYSQLI_ASSOC);


    if(isset($_POST['task'])){
        $task = stripslashes($_POST['task']);
        $task = mysqli_real_escape_string($connection, $task);

        $query = "INSERT into `tasks` ( user, task) VALUES ('$username', '$task')";

        //get data
        $result = mysqli_query($connection, $query);

        if($result){
            $latest = array("task" => $task);
            array_push($data, $latest);
        }else{
            echo 'Error : '. mysqli_error($connection);
        }
    };

    // getTasks();

?>

<!Doctype html>
<html>
    <?php include('./templates/header.php');?>
    <main class="container py-3 bg-info my-5">
        
        <!-- Modal -->
        <form class="modal fade" method="POST" action="<?php echo $_SERVER['PHP_SELF'] ?>" id="addtask" tabindex="-1" role="dialog" aria-labelledby="addtaskLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addtaskLabel">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                        <label for="exampleInputEmail1">Task</label>
                        <textarea type="text" class="form-control" name="task" placeholder="write here..."></textarea>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" value="submit" class="btn btn-primary">Save changes</button>
            </div>
            </div>
        </div>
        </form>
        <h3>Hello Peachy!</h3>
        <p>My tasks</p>
        <table class="table my-4">
        <tbody>
            <?php foreach($data as $index => $task) : ?>
                    <tr>
                        <th scope="row"><?php echo $index+1 ?></th>
                        <td><?php echo $task['task'] ?></td>
                        <!-- <td><?php echo $task['date_added'] ?></td> -->
                        <td class="text-danger">Remove</td>
                    </tr>
           <?php endforeach ?>
        </tbody>
        </table>
    </main>
    <?php include('./templates/footer.php') ?>
</html>