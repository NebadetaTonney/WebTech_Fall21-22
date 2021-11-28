<?php 

require_once 'db_connect.php';





function addUsers($data){
    $conn = db_conn();
    $selectQuery = "INSERT INTO owner_info( Name ,Email, Dob, Gender, User_Name, Password)
VALUES (:Name,:Email,:Date_Of_Birth,:Gender,:User_Name, :Password)";
    
    
    try{

        $stmt = $conn->prepare($selectQuery);
        
        $stmt->execute([
            ':Name'                =>    $data['Name'],
            ':Email'              =>   $data['Email'],
            ':Date_Of_Birth'     =>     $data['Dob'], 
            ':Gender'           =>     $data['Gender'],     
            ':User_Name'      =>     $data['User Name'],  
            ':Password'     =>     $data['Password']
            //':image'       => $data['image']
            
        ]);
        //echo 'again';
    }catch(PDOException $e){
        echo $e->getMessage();
    }
    
    $conn = null;
    return true;
}

