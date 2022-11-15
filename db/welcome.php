<?php
/* Initialize the session */
session_start();
 
/* Check if the user is logged in, if not then redirect him to login page */
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}

?>

 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Welcome</title>
    <link rel="stylesheet" href="assets/bootstrap.css"/>
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-glyphicons.css"/>
    <style type="text/css">
        body{ font: 14px sans-serif; text-align: center; }
        .table-update{
          margin: 2px 10px 2px 15px;
        }
        .navbar{
          text-align:right;
        }
        .collapse{
          margin-top:1%;
        }
        .btn:hover{
        background-color: #696969;

    }
    </style>
</head>
<body >
<nav class="navbar fixed-top navbar-expand-lg navbar-light" style="background-color: DodgerBlue;">
    <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
      
        <p><a  href="logout.php" class="btn btn-lg btn-danger">Logout</a></p>
       
    </div>
  </nav>
    <div class="container">
        <h1> <b><?php echo htmlspecialchars($_SESSION["username"]); ?> Dashbord </b></h1> 
    </div>
    <h2>Employee Details</h2>

<table class="table class='table table-striped table-bordered  table-update" >
  <thead thead-dark>
    <td>ID.NO.</td>
    <td>Name</td>
    <td>Usename</td>
    <td>Salary</td>
    <td>Age</td>
    <td>Phone</td>
    <td>Update </td>
    <td>Remove </td>
  </thead>

<?php

include "connect.inc.php"; 
// Using database connection file here

$uname = $_SESSION['username'];


if($uname != "Admin"){
  $records = mysqli_query($con,"SELECT * FROM users where username ='$uname'"); 
  // fetch data from database
  $data = mysqli_fetch_array($records);
  ?>
    <tr>
      <td><?php echo $data['id']; ?></td>
      <td><?php echo $data['name']; ?></td>
      <td><?php echo $data['username']; ?></td>
      <td><?php echo $data['salary']; ?></td>
      <td><?php echo $data['age']; ?></td> 
      <td><?php echo $data['phone']; ?></td>   
      <td><a class="btn btn-success btn-md" href="edit.php?id=<?php echo $data['id']; ?>">Update</a></td>
    
    </tr> 
     <?php
}else{
  $records = mysqli_query($con,"SELECT * FROM users"); 
 while ($data = mysqli_fetch_array($records)){
  
// fetch data from database
?>
  <tr>
    <td><?php echo $data['id']; ?></td>
    <td><?php echo $data['name']; ?></td>
    <td><?php echo $data['username']; ?></td>
    <td><?php echo $data['salary']; ?></td>
    <td><?php echo $data['age']; ?></td> 
    <td><?php echo $data['phone']; ?></td>   
    <td><a class="btn btn-success btn-md" href="edit.php?id=<?php echo $data['id']; ?>">Update</a></td>
    <td><a class="btn btn-danger btn-md" href="delete.php?id=<?php echo $data['id']; ?>" >delete</a></td>
  </tr>  
<?php
 }
}
?>
</table>

</body>
</html>