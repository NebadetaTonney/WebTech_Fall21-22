

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

 <?php include('header2.php')?>

<style>

</style>

  <p><br></p><p><br></p>
		<span > <b> <h1 align="center"><center><img  width="290" height="200" src="images/no.png" ></center></h1> </span>
<p><br></p><p><br></p>

<body>





</body>


  <?php include('footer.php')?>

  </html>