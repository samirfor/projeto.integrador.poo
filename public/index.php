<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

require 'repositorio_filmes.php';

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

          <h5>Cadastro de Filme:</h5>

          <!-- The above form looks like this -->
          <form method="post">
            <div class="row">
                <label for="titulo">Título</label>
                <input class="u-full-width" type="text" name="titulo" id="titulo" >
            </div>
            <div class="row">
                <label for="sinopse">Sinopse</label>
                <textarea class="u-full-width" name="sinopse" id="sinopse"></textarea>
            </div>
            <div class="row">
                <label for="quantidade">Quantidade</label>
                <input class="u-full-width" type="number" name="quantidade" id="quantidade" >
            </div>
            <div class="row">
                <label for="trailer">Trailer</label>
                <input class="u-full-width" type="text" name="trailer" id="trailer" >
            </div>
            <input class="button-primary" type="submit" value="Cadastrar">
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
                <td><a class="button" href="index.php?acao=alterar">Alterar</a></td>
                <td><?php echo $filme->getTitulo(); ?></td>
                <td><a class="button" href="index.php?acao=excluir">Excluir</a></td>
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
