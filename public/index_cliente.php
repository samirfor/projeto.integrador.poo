<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

require 'repositorio_clientes.php';

$acao = 'cadastrar';
$cliente = new Cliente();
$codigo = null;
$clientes = null;
$filtro_situacao_debito = 'cadastrados';
if (isset($_GET) && !empty($_GET)) {
  if (isset($_GET['acao'])) {
    $acao = $_GET['acao'];
    switch ($acao) {
      case 'remover':
      case 'alterar':
        $cpf = $_GET['cpf'];
        if ($cpf) {
          $cliente = $repositorio->buscarCliente($_GET['cpf']);
          if (!$cliente) {
            $cliente = new Cliente();
            break;
          }
        }
        break;
      default:
        break;
    }
  }

  if (isset($_GET['situacao_debito'])) {
    switch ($_GET['situacao_debito']) {
      case 'atraso':
        $filtro_situacao_debito = 'em atraso';
        $clientes = $repositorio->getListaClientesEmAtraso();
        break;
      case 'dia':
        $filtro_situacao_debito = 'em dia';
        $clientes = $repositorio->getListaClientesEmDia();
        break;
      default:
        break;
    }
  }
}

if (!$clientes) {
  $clientes = $repositorio->getListaClientes();
}

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
          <a class="button button-primary" href="index_cliente.php">Clientes</a>
          <a class="button button-primary" href="index_cliente.php?situacao_debito=atraso">Clientes em atraso</a>
          <a class="button button-primary" href="index_cliente.php?situacao_debito=dia">Clientes em dia</a>
      </div>

      <div class="row">
        <div class="one-half column">

          <h5>Clientes</h5>

          <!-- The above form looks like this -->
          <form method="post" action="action_cliente.php">
            <?php include 'form_cliente.php'; ?>
            <input type="hidden" name="acao" value="<?php echo $acao; ?>">
            <input type="hidden" name="cpf" value="<?php echo $cpf; ?>">
            <input class="button-primary" type="submit" value="<?php echo ucfirst($acao); ?>">
          </form>

          <!-- Always wrap checkbox and radio inputs in a label and use a <span class="label-body"> inside of it -->

          <!-- Note: The class .u-full-width is just a utility class shorthand for width: 100% -->

        </div>
      </div>

      <div class="row">
          <h5>Clientes <?php echo $filtro_situacao_debito;?>:</h5>

          <?php if (!$clientes) : ?>
            <p>Nenhum cliente cadastrado.</p>
          <?php else: ?>
          <table>
            <thead>
              <tr>
                <th></th>
                <th>Cliente</th>
                <th></th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($clientes as $cliente) : ?>
              <tr>
                <td><a class="button" href="index_cliente.php?acao=alterar&cpf=<?php echo $cliente->getCpf(); ?>">Alterar</a></td>
                <td><?php echo $cliente->getNomeCliente(); ?></td>
                <td><a class="button" href="index_cliente.php?acao=remover&cpf=<?php echo $cliente->getCpf(); ?>">Remover</a></td>
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
