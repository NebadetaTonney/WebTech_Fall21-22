

<?php 

session_start();


if(isset($_SESSION['username'])){



}
else{

    header('location: login.php');
}

?>






<!DOCTYPE html>


<html lang="en">
<head>
    <title>KHABOI</title>
</head>


 <?php include('header2.php')?>
<body>


    

        <p><br></p><p><br></p>
        <table align="center" border="8px" style="padding: 15px;">
            <tr>
                <td>
                    <h3 align="center" >Hello, Dear Owner </span></h3>
                    <h3 align="center" >Thanks For login</h3> 
                    <h3 align="center" >Now You can control <br><br>   <br><br>The Restaurant ""KhaBoI""</h3>
                </td>
            </tr>
        </table>


    
    <p><br></p><p><br></p>
    
</body>

<?php include('footer.php')?>

</html>