  <!--  comments-->

<?php
  session_start();
?>



<!DOCTYPE html>
<html>
<style>
.error {color: #FF0000;}
</style>

<head>
  <title>Registration</title>
</head>
 <?php include('header.php')?>
<?php

    // define variables and set to empty values
    $nameErr = $emailErr = $genderErr = $birthdateErr= $degreeErr = $bloodgroupErr = $newpassErr = $renewpassErr = $usernameErr = "";

    $name = $email = $gender = $birthdate =$newpass = $renewpass = $username = "";

    $check=0;

    if ($_SERVER["REQUEST_METHOD"] == "POST") {

      
      
      //name validation//name validation//name validation
      if (empty($_POST["name"])) {
        $nameErr = "Name is required";
      } 
      else {
        $name = test_input($_POST["name"]);
        //validating alphabet
        if (!preg_match("/^[a-zA-Z][a-zA-Z.\_\-]+ +[a-zA-Z.\-\_]+/",$name)) {
          $nameErr = "Contain a-z, A-Z  and at least two words";
        }
        else
          $check++;
          //!preg_match("/^[a-zA-Z-'{2,8} ]*$/",$name  
      }




      //email validation//email validation//email validation
    
      if (empty($_POST["email"])) {
        $emailErr = "Email is required";
      } 
      else {
        $email = test_input($_POST["email"]);
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
          $emailErr = "Must be a valid email_address : anything@example.Com";
        }
        else
          $check++;
      }
      
      //username username   
      if (empty($_POST["username"])) {
        $usernameErr = "username is required";
      } 
      else 
      {
          $username = test_input($_POST["username"]);
          //validating alphabet
          if (!preg_match("/^[0-9a-zA-Z-_]{2,}[^\s.]$/",$username)) {
            $usernameErr = "Must contain at least two characters and alpha numeric characters, (@),(-),(_)";
          }
          else
            $check++;
      }



      //password validation//password validation//password validation

      if(empty($_POST["newpass"])){
        $newpassErr=" must need to fill password";
      }else
        $newpass=test_input($_POST["newpass"]);


      if(empty($_POST["renewpass"])){
        $renewpassErr=" must need to fill confirm password";
      }else
        $renewpass=test_input($_POST["renewpass"]);
      

      if (!preg_match("/^[0-9a-zA-Z@%#$]{8,}$/",$newpass)) {
            $newpassErr = "Minimum (8) characters need  one special characters (@, #, $, %)";

      }else if($_POST["newpass"]==$_POST["renewpass"]){
          $check++; 
      }
      else
        $renewpassErr="didn't macth the password ";





      //gender validation//gender validation//gender validation

      if (empty($_POST["gender"])) {
        $genderErr = "Gender is required";
      } 
      else {
        $gender = test_input($_POST["gender"]);
        $check++;
      }
      

      //date validation 
      if(empty($_POST["birthdate"])){
        $birthdateErr = " select up year, month, date ";
      }
      else{
        $birthdate = test_input($_POST["birthdate"]);
        $check++;
      }
      

      //form changing 
      if ($check == 6) {
          $_SESSION['name']=$_REQUEST['name'];
          $_SESSION['email']=$_REQUEST['email'];
          $_SESSION['username']=$_REQUEST['username'];
          $_SESSION['pass']=$_REQUEST['newpass'];
          $_SESSION['dob']=$_REQUEST['birthdate'];
          $_SESSION['gender']=$_REQUEST['gender'];
          header('location:../controller/registrationDone.php');
      }
  }
  

  function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }
?>


<body>

<p>
<center>
  <h1 align = "center" style="color: ;" >Sign Up</h1>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" >
  <span class="error">(*) All need to fill </span><br><br><br>
  <table border="2px" width="20%">
    <tr><td>
      <b> 
      <table border="2px">
          <tr>
              <td>
                  NAME:
              </td>

              <td>
  	            <input type="text" name="name" id="name" onkeyup="nameVal()">
             </td>   
          </tr>
      </table>

      <span class="error" id="nameErr">* <?php echo $nameErr;?></span>
      <b> 
      <table border="2px">
          <tr>
              <td>
                  EMAIL:
              </td>

              <td>
                <input type="text" name="email" id="email" onkeyup="emailVal()">
             </td>   
          </tr>
      </table>
      <span class="error" id="emailErr">* <?php echo $emailErr;?></span>
      

      <b> 
      <table border="2px">
          <tr>
              <td>
                  User Name:
              </td>

              <td>
                <input type="text" name="username" id="userName" onkeyup="userVal()">
             </td>   
          </tr>
      </table>
      <span class="error" id="usernameErr">* <?php echo $usernameErr;?></span><br>



      <b> 
      <table border="2px">
          <tr>
              <td>
                  Password:
              </td>

              <td>
                <input type="twxt" name="newpass" id="password" onkeyup="passVal()">
             </td>   
          </tr>
      </table>
      <span class="error" id="passwordErr">* <?php echo $newpassErr;?></span>

      <b> 
      <table border="2px">
          <tr>
              <td>
                  Confirm Password:
              </td>

              <td>
                <input type="text" name="renewpass" id="rePassword" onkeyup="rePassVal()">
             </td>   
          </tr>
      </table>
      <span class="error" id="rePasswordErr">* <?php echo $renewpassErr;?></span>



      <b> 
      <table border="2px">
          <tr>
              <td>
                   DATE OF BIRTH:
              </td>

              <td>
                <input type="date" min="1953-01-01" max="1998-12-31" id="birthdate" name="birthdate">
             </td>   
          </tr>
      </table>
      <span class="error">* <?php echo $birthdateErr;?></span><br><br>
    

      <b> 
      <table border="2px">
          <tr>
              <td>
                   GENDER:
              </td>

              <td>
                <input type="radio" name="gender" value="female">Female
                <input type="radio" name="gender" value="male">Male
                <input type="radio" name="gender" value="other">Other
             </td>   
            </tr>
        </table>
        <span class="error">* <?php echo $genderErr;?></span><br><br>
      </td></tr>
    </table>
    <input type="submit" value="submit">&nbsp;&nbsp;
  <br><br>


</center>  
</p>


  


</form>



</body>

<script type="text/javascript" src="../javascript/registrationJavaScript.js"></script>

<?php include('footer.php')?>
</html>