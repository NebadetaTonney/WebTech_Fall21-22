

<?php
session_start();

if(isset($_SESSION['username'])){


}
else{

    header('location: login.php');
}

?>



<?php  
    require_once '../controller/readData.php';
    $user = fetchUsers($_SESSION['username']);

?>



<!DOCTYPE html>
<html>
<style>

</style>
<head>
    <title>Profile</title>
</head>

 <?php include('header2.php')?>



 <?php

    echo "<p><br></p><p><br></p><h1 align='center'>Profile</h1><table align='center' border='3px' style='padding: 15px;'><tr><h1  align = \"center\"><td>Profile Name :</td> <td>".$user["Name"]."</h1></td></tr>";

    echo "<tr><h1  align = \"center\"><td>User Name :</td> <td> ".$user["User_Name"]."</h1>";

    echo "<tr><h1  align = \"center\"><td>Date of Birth :</td> <td> ".$user["Dob"]."</h1>";

    echo "<tr><h1 align = \"center\"><td>Gender :</td> <td> ".$user["Gender"]."</h1>";

    echo "<tr><h1  align = \"center\"><td>Email Address :</td> <td> ".$user["Email"]."</h1></table><p><br></p><p><br></p><p><br></p>";
 
?>


<body>






</body>


  <?php include('footer.php')?>

  </html>