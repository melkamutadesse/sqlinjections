<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>hello delete</h1>

    <?php 

require_once "connect.inc.php"; 

if (isset($_GET['id'])) {

    $user_id = $_GET['id'];

    $sql = "DELETE FROM `users` WHERE `id`='$user_id'";

     $result = $con->query($sql);

     if ($result == TRUE) {

        echo "Record deleted successfully.";
        header("location: welcome.php");

    }else{

        echo "Error:" . $sql . "<br>" . $conn->error;

    }

} 

?>


</body>
</html>