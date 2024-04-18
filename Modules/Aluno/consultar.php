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
      
    <h1>Consultar</h1>

      <a href="form-incluir.php" class="btn btn-primary"> Incluir</a>
    <?php

      require_once ('../../Service/DatabaseService.php');

      $db = new DatabaseService(); 
      $sql = "SELECT * FROM aluno ORDER BY 1";
      $linhas = $db->query($sql);

      echo '<table class="table table-striped">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Matrícula</th>
                <th scope="col">Nome</th>
                <th scope="col">Disciplina</th>
                <th scope="col">Nota 1</th>
                <th scope="col">Nota 2</th>
                <th scope="col">Média</th>
                <th scope="col">Situação</th>
                <th scope="col"></th>
                <th scope="col"></th>
              </tr>
            </thead>
            <tbody>';

      foreach ($linhas as $linha) {
        $nota1 = $linha['nota1'];
        $nota2 = $linha['nota2'];
        $media = ($nota1 + $nota2) / 2;
        $situacao = ($media >= 6) ? 'Aprovado' : 'Recuperação';

        echo '<tr>
              
              <th scope="row">'.$linha['id'].'</th>
              <td>'.$linha['matricula'].'</th>
              <td>'.$linha['nome'].'</td>
              <td>'.$linha['disciplina'].'</td>
              <td>'.$linha['nota1'].'</td>
              <td>'.$linha['nota2'].'</td>
              <td>'.$media.'</td>
              <td>'.$situacao.'</td>
              <td>
              <a href="excluir.php?id='.$linha['id'].'" class="btn btn-warning">Excluir</a>
              </td>
              <td>
              <a href="form-update.php?id='.$linha['id'].'" class="btn btn-primary">Atualizar</a>
              </td>
            </tr>';
      }

      echo '</tbody></table>';
    ?>

<a href="/menu.php">Voltar</a>
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    </div>

  </body>
</html>