<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

require 'repositorio_filmes.php';

if (isset($_POST) && !empty($_POST)) {
  $filme = new Filme(
    $_POST['titulo'],
    $_POST['codigo'],
    $_POST['sinopse'],
    $_POST['quantidade'],
    $_POST['trailer']
  );
  switch ($_POST['acao']) {
    case 'cadastrar':
      $repositorio->cadastrarFilme($filme);
      break;
    case 'alterar':
      $repositorio->atualizarFilme($filme);
      break;
    case 'remover':
      $repositorio->removerFilme($filme);
      break;
    default:
      break;
  }
}

header('Location: index.php');
