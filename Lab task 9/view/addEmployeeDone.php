

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
		<b> <h1 align="center"><?php echo  "successfully completed ";?></h1>
<p><br></p><p><br></p>

<body>





</body>


  <?php include('footer.php')?>

  </html>