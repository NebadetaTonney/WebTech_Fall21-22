

<?php
session_start();

if(isset($_SESSION['username'])){


}
else{

    header('location: login.php');
}

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

    $current_data = file_get_contents('info.json');  
    $array_data = json_decode($current_data, true);  

    
    foreach($array_data as $row)  
        {  
            if($_SESSION['username']==$row["User Name"] && $_SESSION['password']==$row["Password"]){

             echo "<p><br></p><p><br></p><h1 align='center'>Profile</h1><table align='center' border='3px' style='padding: 15px;'><tr><h1  align = \"center\"><td>Profile Name :</td> <td>".$row["Name"]."</h1></td></tr>";

             echo "<tr><h1  align = \"center\"><td>User Name :</td> <td> ".$row["User Name"]."</h1>";

             echo "<tr><h1  align = \"center\"><td>Date of Birth :</td> <td> ".$row["dob"]."</h1>";

             echo "<tr><h1 align = \"center\"><td>Gender :</td> <td> ".$row["gender"]."</h1>";

             echo "<tr><h1  align = \"center\"><td>Email Address :</td> <td> ".$row["Email"]."</h1></table><p><br></p><p><br></p><p><br></p>";

            }
        }



 
?>


<body>






</body>


  <?php include('footer.php')?>

  </html>