

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
.error {color: #FF0000;}
</style>


<head>
    <title>Profile</title>
</head>

 <?php include('header2.php')?>



 <?php


    // define variables and set to empty values
    $nameErr = $emailErr = $genderErr = $birthdateErr= $degreeErr = $bloodgroupErr = $newpassErr = $renewpassErr = $usernameErr = "";

    $name = $email = $gender = $birthdate = $degree1 = $degree2 = $degree3 = $degree4= $bloodgroup =$newpass = $renewpass = $username = "";
    $msg="";

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
          $nameErr = "Only Can contain a-z, A-Z, period(.) , dash only(-) and at least two words";
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
            $usernameErr = "User Name must contain at least two (2) characters and can contain alpha numeric characters, period, dash or underscore only";
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
            $newpassErr = "UPassword must not be less than eight (8) characters contain at least one of the special characters (@, #, $, %)";

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

        $current_data = file_get_contents('info.json');  
        $array_data = json_decode($current_data, true); 

        $extra = array(  
            'Name'                 =>     $_REQUEST['name'],  
            'Email'             =>     $_REQUEST['email'],
            'User Name'      =>     $_REQUEST['username'],  
            'Password'     =>     $_REQUEST['newpass'],
            'dob'        =>     $_REQUEST['birthdate'],  
            'gender'  =>     $_REQUEST['gender'],
        );  


        $array_data[] = $extra;  
        $final_data = json_encode($array_data);  
        if(file_put_contents('employee.json', $final_data))  
        {  
             $message = " <label class='text-success'>File Appended  Success fully</p>"; 
             $msg="Employee has added successfully";
        }    
        else  
        {  
            $error = 'JSON File not exits';  
            $msg="Employee has not added yet";
        } 

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
        <h1 align='center'>Add Employee <br><span class="error"><?php echo $msg; ?></span></h1>


        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
            <table border="3px" align="center">
                
                <tr>
                    <td>
                        Profile Name :
                    </td>
                    <td>
                        <input type='text' name='name'>
                    </td>
                    <td>
                        <span class="error">* <?php echo $nameErr;?></span>
                    </td>
                </tr>

                <tr>
                    <td>
                        User Name :
                    </td>

                    <td>
                        <input type='text' name='username'>
                    </td>

                    <td>
                        <span class="error">* <?php echo $usernameErr;?></span>
                    </td>
                </tr>


                <tr>
                    <td>
                        Password :
                    </td>

                    <td>
                        <input type='text' name='newpass'>
                    </td>

                    <td>
                        <span class="error">* <?php echo $newpassErr;?></span>
                    </td>
                </tr>



                <tr>
                    <td>
                        Retype Password :
                    </td>

                    <td>
                        <input type='text' name='renewpass'>
                    </td>

                    <td>
                        <span class="error">* <?php echo $renewpassErr;?></span>
                    </td>
                </tr>


                <tr>
                    <td>
                        Email  :
                    </td>

                    <td>
                        <input type='text' name='email'>
                    </td>

                    <td>
                        <span class="error">* <?php echo $emailErr;?></span>
                    </td>
                </tr>


                <tr>
                    <td>
                        D.O.B :
                    </td>

                    <td>
                        <input type="date" min="1953-01-01" max="1998-12-31" id="birthdate" name="birthdate">
                    </td>

                    <td>
                        <span class="error">* <?php echo $birthdateErr;?></span>
                    </td>
                </tr>


                <tr>
                    <td>
                        Gender :
                    </td>

                    <td>
                        <input type="radio" name="gender" value="female">Female
                        <input type="radio" name="gender" value="male">Male
                        <input type="radio" name="gender" value="other">Other<br>
                    </td>

                    <td>
                        <span class="error">* <?php echo $genderErr;?></span>
                    </td>
                </tr>


            </table>

            <h2  align ="center"><input type='submit' value='Add'></h2>
        </form>






</body>


  <?php include('footer.php')?>

  </html>