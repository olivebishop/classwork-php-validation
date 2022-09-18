<?php
include('dbh.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet"href="css/bootstrap.min.css">
    <link rel="stylesheet" href="main.css">
  
  
    
</head>
<?php

$firstname=$lastname=$email=$course='';
$errors =array('firstname'=>'','lastname'=>'','email'=>'','course'=>'');

if(isset($_POST['save'])){
 // checking for Firstname validation

if(empty($_POST['firstname'])){
  $errors['firstname']='firstname cannot be empty <br/>';
}else{
  //echo $_POST['Firstname'];
   $firstname= $_POST['firstname'];
   if(!preg_match('/^[a-zA-Z\s]+$/',$firstname)){
    $errors['firstname']='firstname must be letters and spaces only';
   }
}

    // checking for lastname validation

    if(empty($_POST['lastname'])){
      $errors['lastname']='lastname cannot be empty <br/>';
    }else{
     // echo $_POST['lastname'];
     $lastname= $_POST['lastname'];
   if(!preg_match('/^[a-zA-Z\s]+$/',$lastname)){
    $errors['lastname']='lastname must be letters and spaces only';
   }
 }


        // checking for Course validation

if(empty($_POST['course'])){
  $errors['course']='course cannot be empty <br/>';
}else{
  //echo $_POST['Course'];
  $course = $_POST['course'];
if(!preg_match('/^[a-zA-Z\s]+$/',$course)){
  $errors['course']= 'Course must be letters and spaces only';
}
}

  //echo $_POST['Email'];
if(empty($_POST['email'])){
  $errors['email']='Email cannot be empty <br/>';
}else{
  //echo $_POST['Email'];
  $email = $_POST['email'];
  if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
    $errors['email']=  'email must be a valid email address';
  }
}
if(array_filter($errors)){
  //echo 'There are errors'
}else{
  //echo 'No errors in the form';

  try{
  $query="INSERT INTO students (firstname,lastname,email,course) VALUES (:firstname,:lastname,:email,:course)";
  $query_run=$databaseconnection->prepare($query);
  $data=[
      ':firstname'=>$firstname,
      ':lastname'=>$lastname,
      ':email'=>$email,
      ':course'=>$course,
  ];
  $query_execute=$query_run->execute($data);
  if($query_execute){
      echo '<script>alert("Data added Successfully")</script>';
  }else{
      echo '<script>alert("Data not added")</script>';
  }

  }catch(PDOException $err){
    echo $err->getmessage();
  }
  
}


}

?>
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
            <li class="nav-item">
                <a class="nav-link" href="Forms.php">Add Students</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="students.php">Students</a>
              </li>
          </ul>
          <form class="form-inline my-2 my-lg-0">
            <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
          </form>
        </div>
      </nav>
  <div class="col-md-4 offset-md-4">
    <h1><u><i>Student Details</i></u></h1>
    <form action="Forms.php"method="POST">
  <div class="form-group">

    <input type="text"name="firstname" placeholder="Enter your firstname" class="form-control" >
    <div class='text-primary'><?php echo $errors['firstname']; ?></div>
  </div>

  <div class="form-group">
  
    <input type="text"name="lastname"placeholder="Enter your lastname">
    <div class='text-primary'><?php echo $errors['lastname']; ?></div>
  </div>

  <div class="form-group">
    
    <input type="text"name="course"placeholder="Enter your Course" >
    <div class='text-primary'><?php echo $errors['course']; ?></div>
  </div>

  <div class="form-group">
    
    <input type="text"name="email"placeholder="Enter your Email">
    <div class='text-primary'><?php echo $errors['email']; ?></div>
  </div>
  <button name='save'>Save Details</button>
    </form>
    </div>
</body>
</html>
