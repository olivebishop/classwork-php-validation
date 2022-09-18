<!DOCTYPE html>
<html>
    <?php
    include('dbh.php');
    ?>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Details Update</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' href='css/bootstrap.min.css'>
</head>
    <?php
        if(isset($_GET['id'])){
            $id = $_GET['id'];

            $query ="SELECT * FROM students WHERE id=:std_id LIMIT 1";
            $statement =$databaseconnection->prepare($query);
            $data = [':std_id' => $id];
            $statement->execute($data);

            $result = $statement->fetch(PDO::FETCH_ASSOC);

        }
    ?>
<body>
    <div class="col-md-4 offset-md-4">
        <h5>Edit Students details</h5>
        <form action="crud.php" method="POST">
            <input type="hidden" name="id" value="<?=$result['id'];?>">
            <div class="form-group">
                <input type="text" name="firstname" value="<?=$result['firstname'];?>" placeholder="enter firstname" class="form-control">
            </div>
            <div class="form-group">
                <input type="text" name="lastname" value="<?=$result['lastname'];?>" placeholder="enter lastname" class="form-control">
            </div>
            <div class="form-group">
                <input type="text" name="course" value="<?=$result['course'];?>" placeholder="enter course" class="form-control">
            </div>
            <div class="form-group">
                <input type="text" name="email" value="<?=$result['email'];?>" placeholder="enter email" class="form-control">
            </div>
            <button name="update_student" class='btn btn-primary'>Update Details</button>
        </form>
    </div>
</body>
</html>