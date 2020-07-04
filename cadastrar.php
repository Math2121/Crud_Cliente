<?php
if(isset($_POST['name'])){
$usuario = $_POST['name'];
$email = $_POST['email'];
$telefone = $_POST['tel'];
$cpf = $_POST['cpf'];


try {
  

    $con = new PDO("mysql:host=localhost;dbname=hibrido","root","");
    $stmt = $con->prepare("INSERT INTO users (nome, email,cpf,telefone) VALUES(:USUARIO, :EMAIL,:CPF, :TELEFONE) ");
    

    $stmt->bindParam(":USUARIO",$usuario);
    $stmt->bindParam(":EMAIL",$email);
    $stmt->bindParam(":TELEFONE",$telefone);
    $stmt->bindParam(":CPF",$cpf);
  
    $stmt->execute();

    header('Location:index.php');
} catch (Exception $e) {
    
    header('Location:erro.php');
}
}