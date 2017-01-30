<?php

class Conexao
{
  private $host;
  private $usuario;
  private $senha;
  private $banco;
  private $conexao;


  function __construct($host, $usuario, $senha, $banco)
  {
    $this->host = $host;
    $this->usuario = $usuario;
    $this->senha = $senha;
    $this->banco = $banco;
  }

  public function conectar()
  {
    $this->conexao = new mysqli(
      $this->host,
      $this->usuario,
      $this->senha,
      $this->banco
    );
    /* verifica conexão */
    if (mysqli_connect_error($this->conexao)) {
      echo 'Connect Error (' . mysqli_connect_errno() . ') ' . mysqli_connect_error();
      return false;
    }
    return true;
  }

  public function executarQuery($sql)
  {
    return $this->conexao->query($sql);
  }

  public function obtemPrimeiroRegistroQuery($sql)
  {
    $query = $this->executarQuery($sql);
    return $this->conexao->fetch_array($query);
  }

  public function getConexao()
  {
    return $this->conexao;
  }
}
