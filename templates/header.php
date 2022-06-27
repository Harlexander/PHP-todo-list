<head>
    <title>Todo List</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
</head>
    <body class="bg-light" style="height : 100vh">
        <nav class="navbar navbar-expand-sm flex justify-content-between bg-light navbar-light container">
        <!-- Brand/logo -->
        <div class="navbar-brand flex align-items-center" href="#">
            <img src="https://peachy-plum.vercel.app/logo.png" alt="logo" style="width:40px;">
            <span>Peachy To do</span>
        </div>
        <!-- Links -->
        <ul class="navbar-nav">
            <li class="nav-item">
            <a class="nav-link" href="#">Home </a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="#">Register</a>
            </li>
            <li class="nav-item">
                <button class="btn btn-info"  data-toggle="modal" data-target="#addtask">Add Task</button>
            </li>
        </ul>
        </nav>