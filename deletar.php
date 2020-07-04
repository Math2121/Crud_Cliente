<?php
try{
    $con = new PDO("mysql:host=localhost;dbname=hibrido","root","");
    }catch(PDOException $e){
    echo $e->getMessage();
    }

    $stmt = $con->prepare("DELETE FROM users WHERE id = :ID ");
    
    
    $id = filter_input(INPUT_GET,'id',FILTER_SANITIZE_NUMBER_INT);
   
    $stmt->bindParam(":ID",$id);
    $stmt->execute();
  
header("Location:index.php");


