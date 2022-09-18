<?php
    include('dbh.php');
    ?>
 <html lang="en">  
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport"content="width=device-width, initial scale=1.0">
    <title>Students data</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="main.css">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
          <a class="navbar-brand" href="index.php">library management system</a>
          <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
            <li class="nav-item active">
              <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <li class="nav-item">
              <a class="nav-link" href="index.php">Students</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="Forms.php">Students Database</a>
              </li>
          </ul>
          <form class="form-inline my-2 my-lg-0">
            <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
          </form>
        </div>
      </nav>
    <div class="container">
        <table class="table table-hover table-striped table-bordered">
        <thead>students data table</thead>
            <tr>
                <th>id</th>
                <th>firstname</th>
                <th>lastname</th>
                <th>email</th>
                <th>course</th>
                
            </tr>

            <?php
          
            $query = "SELECT * FROM students";
            $statement = $databaseconnection->prepare($query);
            $statement->execute();
            $result = $statement->fetchAll(PDO::FETCH_ASSOC);
            if($result){
                foreach($result as $row){
                    ?>

                    <tr>
                        <td> <?=$row['id'];?></td>
                        <td> <?=$row['firstname'];?></td>
                        <td> <?=$row['lastname'];?></td>
                        <td> <?=$row['email'];?></td>
                        <td> <?=$row['course'];?></td>
                        
                </tr>
                <td>
                <a href="student-edit.php?id=<?=$row['id'];?>"class="btn btn-primary"name="edit_students">Edit</a>
                <a href="student_delete.php?id=<?=$row['id']; ?>" class="btn btn-danger btn sm">Delete</a>
                <a href="Forms.php" class="btn btn-success btn sm">Add</a>
                </td>
                
                <?php

                }
            }