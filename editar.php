<?php

try{
    $con = new PDO("mysql:host=localhost;dbname=hibrido","root","");
    }catch(PDOException $e){
    echo $e->getMessage();
    }
    $id = $_GET['id'];
  
    $sql = 'SELECT * FROM users WHERE id = :id';

    $stmt = $con->prepare($sql);

    $stmt->execute([':id' => $id ]);

    $values = $stmt->fetch(PDO::FETCH_OBJ);


    if(isset($_POST['name'])){
      $name =$_POST['name'];
      $email =$_POST['email'];
      $cpf =$_POST['cpf'];
      $telefone =$_POST['tel'];
      $con = new PDO("mysql:host=localhost;dbname=hibrido","root","");
      $stmt = $con->prepare("INSERT INTO users (nome, email,cpf,telefone) VALUES(:USUARIO, :EMAIL,:CPF, :TELEFONE) ");
      $stmt->bindParam(":USUARIO",$name);
      $stmt->bindParam(":EMAIL",$email);
      $stmt->bindParam(":TELEFONE",$telefone);
      $stmt->bindParam(":CPF",$cpf);
      $stmt->execute();

    header('Location:index.php');
    }
    
?>   


<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- Compiled and minified CSS -->
  <link rel="stylesheet" href="css/main.css">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">

  <title>Teste Hibrido</title>
</head>

<body>
  <div class="container">
    <div class="row">
      <form class="col s12" method="POST" action="" id="form">
        <div class="row">
          <div class="input-field col s12">
            <input id="name" type="text" name="name" class="validate" value="<?=$values->nome;?>" require>
            <label for="first_name">Nome</label>
          </div>

        </div>
        <div class="row">
          <div class="input-field col s12">
            <input value="<?=$values->email;?>" id="Email" type="email" name="email" class="validate" require>
            <label for="Email">Email</label>
          </div>
        </div>
        <div class="row">
          <div class="input-field col s12">
            <input value="<?=$values->cpf;?>" id="cpf" type="text" name="cpf" class="validate" require>
            <label for="cpf">CPF</label>
          </div>
        </div>
        <div class="row">
          <div class="input-field col s12">
            <input value="<?=$values->telefone;?>" id="tel" type="tel" name="tel" class="validate" require>
            <label for="tel">Telefone</label>
          </div>
        </div>
        <button class="btn waves-effect waves-light" type="submit" name="action">Submit
          <i class="material-icons right">send</i>
        </button>

      </form>
    </div>
  </div>


















  <!-- Compiled and minified JavaScript -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>


</body>

</html>