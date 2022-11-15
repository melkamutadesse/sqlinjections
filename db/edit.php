<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/bootstrap.css">
    <title>Document</title>
    <style>
        .wrapper{
            width:500px;
            margin-left:30%;
        }
    .btn:hover{
        background-color: #696969;

    }
    </style>
</head>
<body>
    
<?php 

require_once "connect.inc.php";

    if (isset($_POST['update'])) {

        $name = $_POST['name'];

        $uname = $_POST['username'];

        $user_id = $_POST['id'];

        $password = $_POST['password'];

        $salary = $_POST['salary'];

        $age = $_POST['age'];

        $phone = $_POST['phone']; 

        $sql = "UPDATE `users` SET `id`='$user_id',`name`='$name',`username`='$uname',`password`='$password',`salary`='$salary',`age`='$age',`phone`='$phone' WHERE `id`='$user_id'"; 

        $result = $con->query($sql); 

        if ($result == TRUE) {

            echo "Record updated successfully.";
            header("location: welcome.php");

        }else{

            echo "Error:" . $sql . "<br>" . $conn->error;

        }

    } 

if (isset($_GET['id'])) {

    $user_id = $_GET['id']; 

    $sql = "SELECT * FROM `users` WHERE `id`='$user_id'";

    $result = $con->query($sql); 

    if ($result->num_rows > 0) {        

        while ($row = $result->fetch_assoc()) {
            $id = $row['id'];
            $name = $row['name'];
            $uname = $row['username'];
            $user_id = $row['id'];
            $password = $row['password'];
            $salary = $row['salary'];
            $age = $row['age'];
            $phone = $row['phone']; 

        } 

    ?>
  <div class="wrapper">
        <form action="" method="post">
          <fieldset>
            <legend>Update Personal information:</legend>
            <div class="form-group ">
                <label>NAME:</label>
                <input type="text" name="name"  class="form-control"
                    value="<?php echo $name; ?>">
                    <input type="hidden" name="id" value="<?php echo $user_id; ?>">
            </div>

            <div class="form-group ">
                <label>USERNAME:</label>
                <input type="text" name="username"   class="form-control"
                    value="<?php echo $uname; ?>">
            </div>

            <div class="form-group ">
                <label>PASSWORD:</label>
                <input type="text" name="password"   class="form-control"
                    value="<?php echo $password; ?>">
            </div>

            <div class="form-group ">
                <label>SALARY:</label>
                <input type="text" name="salary"   class="form-control"
                    value="<?php echo $salary; ?>">
            </div>
            <div class="form-group ">
                <label>AGE:</label>
                <input type="text" name="age"   class="form-control"
                    value="<?php echo $age; ?>">
            </div>
            <div class="form-group ">
                <label>PHONE:</label>
                <input type="text" name="phone"   class="form-control"
                    value="<?php echo $phone; ?>">
            </div>
            <div class="form-group">
            <input class = "btn btn-success btn-lg" type="submit" value="Update" name="update">

            <a class = "btn btn-info btn-lg" href="welcome.php">Back</a>
            </div>      

          </fieldset>

        </form> 

    </div>

    <?php

    } else{ 

        header('Location: welcome.php');

    } 

}

?>
</body>
</html>