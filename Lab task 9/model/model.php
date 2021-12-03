<?php 

require_once 'db_connect.php';


function showAllUsers(){
	$conn = db_conn();
    $selectQuery = 'SELECT * FROM `owner_info` ';
    try{
        $stmt = $conn->query($selectQuery);
        //echo "success";
    }catch(PDOException $e){
        echo $e->getMessage();
    }
    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $rows;
}


function showUsers($username){
	$conn = db_conn();
	$selectQuery = "SELECT * FROM `owner_info` where User_Name = ?";

    try {
        $stmt = $conn->prepare($selectQuery);
        $stmt->execute([$username]);
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    return $row;
}



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



function addEmployee($data){
    $conn = db_conn();
    $selectQuery = "INSERT INTO employee_info( Name ,Email, Dob, Gender, User_Name, Password)
VALUES (:Name,:Email,:Date_Of_Birth,:Gender,:User_Name, :Password )";
    
    
    try{

        $stmt = $conn->prepare($selectQuery);
        
        $stmt->execute([
            ':Name'                =>    $data['Name'],
            ':Email'              =>   $data['Email'],
            ':Date_Of_Birth'     =>     $data['Dob'], 
            ':Gender'           =>     $data['Gender'],     
            ':User_Name'      =>     $data['User Name'],  
            ':Password'     =>     $data['Password']
            
        ]);
    }catch(PDOException $e){
        echo $e->getMessage();
    }
    
    $conn = null;
    return true;
}



function addProduct($data){
    $conn = db_conn();
    $selectQuery = "INSERT INTO product( ID, Name , Sell_Price,image)
VALUES (:Id,:name,:sellPrice,:image)";
    
    //echo "done";
    try{
        echo "done";

        $stmt = $conn->prepare($selectQuery);
        
        $stmt->execute([
            ':Id'                =>    $data['productId'],
            ':name'                =>    $data['productName'],
            ':sellPrice'     =>     $data['sellPrice'],
            ':image' => $data['image']
            
        ]);
        //echo 'again';
    }catch(PDOException $e){
        echo $e->getMessage();
    }
    
    $conn = null;
    return true;
}
?>