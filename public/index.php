<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

require 'repositorio_filmes.php';

$acao = 'cadastrar';
$filme = new Filme();
$codigo = null;
if (isset($_GET) && !empty($_GET)) {
  $acao = $_GET['acao'];
  switch ($acao) {
    case 'remover':
    case 'alterar':
      $codigo = intval($_GET['codigo']);
      if ($codigo > 0) {
        $filme = $repositorio->buscarFilme(intval($_GET['codigo']));
        if (!$filme) {
          $filme = new Filme();
          break;
        }
      }
      break;
    default:
      break;
  }
}

$filmes = $repositorio->getListaFilmes();

?>
<!DOCTYPE html>
<html lang="en">
<head>

  <!-- Basic Page Needs
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
  <meta charset="utf-8">
  <title>Projeto Integrado Programação Orientada a Objetos</title>
  <meta name="description" content="">
  <meta name="author" content="">

  <!-- Mobile Specific Metas
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- FONT
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
  <link href="//fonts.googleapis.com/css?family=Raleway:400,300,600" rel="stylesheet" type="text/css">

  <!-- CSS
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
  <link rel="stylesheet" href="css/normalize.css">
  <link rel="stylesheet" href="css/skeleton.css">

  <!-- Favicon
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
  <link rel="icon" type="image/png" href="images/favicon.png">

</head>
<body>

  <!-- Primary Page Layout
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->

  <div class="section hero">
    <div class="container">
      <div class="row">
          <h1 class="hero-heading">Locadora Virtual</h1>
          <a class="button button-primary" href="index.php">Filmes</a>
          <a class="button button-primary" href="clientes.php">Clientes</a>
      </div>

      <div class="row">
        <div class="one-half column">

          <!-- <h5>Cadastro de Filme:</h5> -->

          <!-- The above form looks like this -->
          <form method="post" action="action_filme.php">
            <?php include 'form_filme.php'; ?>
            <input type="hidden" name="acao" value="<?php echo $acao; ?>">
            <input type="hidden" name="codigo" value="<?php echo $codigo; ?>">
            <input class="button-primary" type="submit" value="<?php echo ucfirst($acao); ?>">
          </form>

          <!-- Always wrap checkbox and radio inputs in a label and use a <span class="label-body"> inside of it -->

          <!-- Note: The class .u-full-width is just a utility class shorthand for width: 100% -->

        </div>
      </div>

      <div class="row">
          <h5>Filmes cadastrados:</h5>

          <?php if (!$filmes) : ?>
            <p>Nenhum filme cadastrado.</p>
          <?php else: ?>
          <table>
            <thead>
              <tr>
                <th></th>
                <th>Filme</th>
                <th></th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($filmes as $filme) : ?>
              <tr>
                <td><a class="button" href="index.php?acao=alterar&codigo=<?php echo $filme->getCodigo(); ?>">Alterar</a></td>
                <td><?php echo $filme->getTitulo(); ?></td>
                <td><a class="button" href="index.php?acao=remover&codigo=<?php echo $filme->getCodigo(); ?>">Remover</a></td>
              </tr>
              <?php endforeach ?>
            </tbody>
          </table>
          <?php endif ?>
      </div>

    </div>
  </div>

<!-- End Document
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
</body>
</html>
