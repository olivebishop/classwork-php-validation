<?php
include('dbh.php');
include('student-edit.php');

if(isset($_POST["update_student"])){
    $id=$_POST['id'];
    $firstname=$_POST['firstname'];
    $lastname=$_POST['lastname'];
    $course=$_POST['course'];
    $email=$_POST['email'];

    try{
        $query="UPDATE students SET firstname=:firstname,lastname=:lastname,course=:course,email=:email WHERE id=:std_id";
        $statement=$databaseconnection->prepare($query);
        $data=[
            ':firstname'=>$firstname,
            ':lastname'=>$lastname,
            ':course'=>$course,
            ':email'=>$email,
            ':std_id'=>$id
        ];
        $query_execute=$statement->execute($data);

        if($query_execute){

            header('Location:students.php');

        }else{
            //echo'<script>alert("Data Not added")</script>';
        }


    }catch(PDOException $err){
        echo $err->getMessage();
    }
}
?>

