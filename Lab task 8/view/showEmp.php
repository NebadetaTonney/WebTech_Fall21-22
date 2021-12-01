

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

    $current_data = file_get_contents('employee.json');  
    $array_data = json_decode($current_data, true);  

    echo "<p><br></p><p><br></p><h1 align='center'>Employee Details</h1><table align='center' border='3px' style='padding: 15px;'>
        <tr>
             <th>Employee Name</th>
             <th>User Name</th>
             <th>Password</th>
             <th>Email</th>
             <th>D.O.B</th>
             <th>Gender</th>
         </tr>";

    foreach($array_data  as $row)  
        {  
        
             echo "

             <tr>
                 <td>
                    <h3  align = \"center\">".$row["Name"]."</h3>
                 </td>

                 <td>
                    <h3  align = \"center\">".$row["User Name"]."</h3>
                 </td>

                 <td>
                    <h3  align = \"center\">".$row["Password"]."</h3>
                 </td>

                 <td>
                    <h3  align = \"center\">".$row["Email"]."</h3>
                 </td>


                 <td>
                    <h3  align = \"center\">".$row["dob"]."</h3>
                 </td>


                 <td>
                    <h3  align = \"center\">".$row["gender"]."</h3>
                 </td>

            </tr>
            
             ";

            
        }

        echo '</table><p><br></p><p><br></p><p><br></p>';

 
?>


<body>















</body>


  <?php include('footer.php')?>

  </html>