<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Hello, world!</title>
  </head>
  <body>
    <div class="container">
        
    <h1>Tela de alteração</h1>

      <form action="alterar.php" method="get">
    
        
        <?php
          $id = $_GET['id'];
          require_once ('../../Service/DatabaseService.php');

      $db =  new DatabaseService();
          $sql="select * from Aluno where id='$id'";
          $linhas = $db->query($sql);
    
          foreach( $linhas as $linha) {
            echo '
            <input type="hidden" name="id" value='.$linha['id'].'>
            <input type="hidden" name="nome" value='.$linha['nome'].'>
            <input type="hidden" name="matricula" value='.$linha['matricula'].'>
            <div class="mb-3">
        
          <label for="idDisciplina" class="form-label">Disciplina
          </label>
          <input type="text" class="form-control" id="idDisciplina" 
            name="disciplina" placeholder="Ex: Matemática "
            value='.$linha['disciplina'].'
            >
        </div>
        <div class="mb-3">
          <label for="idnota1" class="form-label">Nota1
          </label>
          <input type="number" class="form-control" id="idnota1" 
            name="nota1" placeholder="Nota 1"
             value='.$linha['nota1'].'
            >
        </div>
        <div class="mb-3">
          <label for="idNota2" class="form-label">Nota2
          </label>
          <input type="number" class="form-control" id="idNota2" 
            name="nota2"  value='.$linha['nota2'].'>
        </div>
        <div class="mb-3">
         
          <input type="submit" class="btn btn-primary" 
            value="Salvar" >
        </div>
     
            ';
          }

      ?>
      </form>   
    </div>
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

  </body>
</html>