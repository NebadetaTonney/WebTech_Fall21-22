
<?php
session_start();
?>



<?php


     require_once '../model/model.php';


     $data['Name']                     =     $_SESSION['name'];
     $data['Email']                    =     $_SESSION['email']; 
     $data['Gender']                   =     $_SESSION['gender'];
     $data['Dob']                      =     $_SESSION['dob'];  
     $data['User Name']                =     $_SESSION['username'];  
     $data['Password']                 =     $_SESSION['pass'];


    if (addUsers($data)) {
          header('location:../view/registrationOk.php');
        //echo 'Successfully added!!';
    } else {
        //header('location:../view/registrationFail.php');
        echo 'You are not allowed to access this page.';    
    }
               
?>