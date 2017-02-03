<?php

require 'conexao.php';
include 'filme.php';

interface IRepositorioFilmes
{
  public function cadastrarFilme($filme);
  public function removerFilme($filme);
  public function atualizarFilme($filme);
  public function buscarFilme($codigo);
  public function getListaFilmes();
}

class RepositorioFilmesMySQL implements IRepositorioFilmes
{
  private $conexao;

  function __construct()
  {
    $this->conexao = new Conexao("mysql", getenv('MYSQL_USER'), getenv('MYSQL_PASSWORD'), getenv('MYSQL_DATABASE'));
    if (!$this->conexao->conectar()) {
      echo "Erro " . mysqli_error();
    }
  }

  public function cadastrarFilme($filme)
  {
    $titulo = $filme->getTitulo();
    $sinopse = $filme->getSinopse();
    $quantidade = $filme->getQuantidade();
    $trailer = $filme->getTrailer();

    $sql = "INSERT INTO filme (titulo, sinopse, quantidade, trailer) VALUES (?,?,?,?);";

    if ($stmt = $this->conexao->getConexao()->prepare($sql)) {
      $stmt->bind_param("ssis", $titulo, $sinopse, $quantidade, $trailer);
      $stmt->execute();
      $stmt->close();
      return true;
    }
    printf("Erro: %s\n", mysqli_error($this->conexao->getConexao()));
    return false;
  }

  public function removerFilme($filme)
  {
    $sql = "DELETE FROM filme WHERE codigo=?;";
    $codigo = $filme->getCodigo();

    if ($stmt = $this->conexao->getConexao()->prepare($sql)) {
      $stmt->bind_param("i", $codigo);
      $stmt->execute();
      $stmt->close();
      return true;
    }
    printf("Erro: %s\n", mysqli_error($this->conexao->getConexao()));
    return false;
  }

  public function atualizarFilme($filme)
  {
    $titulo = $filme->getTitulo();
    $codigo = $filme->getCodigo();
    $sinopse = $filme->getSinopse();
    $quantidade = $filme->getQuantidade();
    $trailer = $filme->getTrailer();

    $sql = "UPDATE filme SET titulo=?, sinopse=?, quantidade=?, trailer=? WHERE codigo=?;";

    if ($stmt = $this->conexao->getConexao()->prepare($sql)) {
      $stmt->bind_param("ssisi", $titulo, $sinopse, $quantidade, $trailer, $codigo);
      $stmt->execute();
      $stmt->close();
      return true;
    }
    printf("Erro: %s\n", mysqli_error($this->conexao->getConexao()));
    return false;
  }

  public function buscarFilme($codigo)
  {
    $sql = "SELECT * FROM filme WHERE codigo=?;";

    if ($stmt = $this->conexao->getConexao()->prepare($sql)) {
      $stmt->bind_param("i", $codigo);
      $stmt->execute();
      $result = $stmt->get_result();
      if (!$result || $result->num_rows < 1) {
        $stmt->close();
        return false;
      }
      $filme = $result->fetch_object();
      $stmt->close();
      return new Filme(
        $filme->titulo,
        $filme->codigo,
        $filme->sinopse,
        $filme->quantidade,
        $filme->trailer
      );
    }
    printf("Erro: %s\n", mysqli_error($this->conexao->getConexao()));
    return false;
  }

  public function getListaFilmes()
  {
    $lista = $this->conexao->executarQuery('SELECT * FROM filme');
    $arrayFilmes = array();

    while ($linha = mysqli_fetch_array($lista)) {
      array_push($arrayFilmes, new Filme(
        $linha['titulo'],
        $linha['codigo'],
        $linha['sinopse'],
        $linha['quantidade'],
        $linha['trailer']
      ));
    }

    return $arrayFilmes;
  }
}

$repositorio = new RepositorioFilmesMySQL();
