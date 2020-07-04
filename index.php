<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- Compiled and minified CSS -->
  <link rel="stylesheet" href="css/main.css">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">

  <title>Document</title>
</head>

<body>
  <div class="container">
    <div class="row">
      <form class="col s12" method="POST" action="cadastrar.php" id="form">
        <div class="row">
          <div class="input-field col s12">
            <input id="name" type="text" name="name" class="validate" require>
            <label for="first_name">Nome</label>
          </div>

        </div>
        <div class="row">
          <div class="input-field col s12">
            <input id="Email" type="email" name="email" class="validate" require>
            <label for="Email">Email</label>
          </div>
        </div>
        <div class="row">
          <div class="input-field col s12">
            <input id="cpf" type="text" name="cpf" class="validate" require>
            <label for="cpf">CPF</label>
          </div>
        </div>
        <div class="row">
          <div class="input-field col s12">
            <input id="tel" type="tel" name="tel" class="validate" require>
            <label for="tel">Telefone</label>
          </div>
        </div>
        <button class="btn waves-effect waves-light" type="submit" name="action">Submit
          <i class="material-icons right">send</i>
        </button>

      </form>
    </div>
  </div>



     
  <table class="responsive-table">
    <thead>
      <tr>
        <th>Nome</th>
        <th>Email</th>
        <th>CPF</th>
        <th>Telefone</th>
        <th></th>
        <th></th>
      </tr>
    </thead>
 
  <?php try{
  $con = new PDO("mysql:host=localhost;dbname=hibrido","root","");
  }catch(PDOException $e){
  echo $e->getMessage();
  }
  $stmt = $con->prepare("SELECT * FROM  users");
  $stmt->execute();

  while($lista = $stmt->fetch(PDO::FETCH_ASSOC)):
?>
 

    <tbody>
      <tr>
        <td><?=$lista['nome'];?></td>
        <td><?=$lista['email'];?></td>
        <td><?=$lista['cpf'];?></td>
        <td><?=$lista['telefone'];?>
    
      </td>

      <td>
      <?= "<a href='deletar.php?id=".$lista['id']." class='waves-effect waves-teal
       btn-flat'>
        <i class='material-icons right'>clear</i>
      </a>"
      ?>


    
  
      </td>
      <td>
      <?= "<a href='editar.php?id=".$lista['id']." class='waves-effect waves-teal
       btn-flat'>
        <i class='material-icons right'>update</i>
      </a>"
      ?>
      </td>
      </tr>
 
    </tbody>
    <?php
    endwhile;
  ?>
  </table>















  <!-- Compiled and minified JavaScript -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>


</body>

</html>