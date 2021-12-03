

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





<body onload="getAllEmployee()">

    <b> <h1 align="center" ><?php echo  "Employee Details";?></h1>


    <div align="center">Search <input type="text" name="search" id="search"  onkeyup ="showResultEmp(this.value)"></div><br>

    <div id="empShow" align="center" >

</body>





</div>

<script type="text/javascript" src="../javascript/ajax.js"></script>

<p><br></p><p><br></p><p><br></p>



  <?php include('footer.php')?>

  </html>