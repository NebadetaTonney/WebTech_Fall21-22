<?php
    session_start();

?>



<?php 
                $emailErr = "";

                $data = file_get_contents("info.json");  

                $data = json_decode($data, true);  
                if(isset($_POST['forgotEmail'])){
                  foreach($data as $row)  
                  {  
                       if($_POST['forgotEmail']==$row["Email"])
                       {  
                          session_start();

                          $_SESSION['tempEmail']=$_POST['forgotEmail'];
                          
                          header('location:forgotOk.php');
                       }else
                          $emailErr="Please Enter a Valid  email";
                           
                  }
                }
?>

<!DOCTYPE html>

<html lang="en">
 <?php include('header.php')?>

<style>
.error {color: #FF0000;}
</style>

<center>
<p><br></p><p><br></p>
   
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
		Enter Your  Email:
        <input type="text"  name="forgotEmail" /><input type="submit" value="Check" /> 
        <span class="error">* <?php echo $emailErr;?></span><br><br>
        <p><br></p><p><br></p><p><br></p>
    </form>



</center>

  

<body>

</body>


<?php include('footer.php')?>


</html>