<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

require 'repositorio_clientes.php';

if (isset($_POST) && !empty($_POST)) {
  $cliente = new Cliente(
    $_POST['nomeCliente'],
    $_POST['cpf'],
    $_POST['endereco'],
    $_POST['dataCadastro'],
    doubleval($_POST['saldoDevedor']),
    $_POST['situacaoDebito']
  );
  switch ($_POST['acao']) {
    case 'cadastrar':
      $repositorio->cadastrarCliente($cliente);
      break;
    case 'alterar':
      $repositorio->atualizarCliente($cliente);
      break;
    case 'remover':
      $repositorio->removerCliente($cliente);
      break;
    default:
      break;
  }
}

header('Location: index_cliente.php');
