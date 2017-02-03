<?php

require 'conexao.php';
include 'cliente.php';

interface IRepositorioClientes
{
  public function cadastrarCliente($cliente);
  public function removerCliente($cliente);
  public function atualizarCliente($cliente);
  public function buscarCliente($codigo);
  public function getListaClientes();
}

class RepositorioClientesMySQL implements IRepositorioClientes
{
  private $conexao;

  function __construct()
  {
    $this->conexao = new Conexao("mysql", getenv('MYSQL_USER'), getenv('MYSQL_PASSWORD'), getenv('MYSQL_DATABASE'));
    if (!$this->conexao->conectar()) {
      echo "Erro " . mysqli_error();
    }
  }

  public function cadastrarCliente($cliente)
  {
    $nomeCliente = $cliente->getNomeCliente();
    $cpf = $cliente->getCpf();
    $endereco = $cliente->getEndereco();
    $saldoDevedor = $cliente->getSaldoDevedor();
    $situacaoDebito = $cliente->getSituacaoDebito();

    $sql = "INSERT INTO cliente (nome, cpf, endereco, saldo_devedor, situacao_debito) VALUES (?,?,?,?,?);";

    if ($stmt = $this->conexao->getConexao()->prepare($sql)) {
      $stmt->bind_param("sssds", $nomeCliente, $cpf, $endereco, $saldoDevedor, $situacaoDebito);
      $stmt->execute();
      $stmt->close();
      return true;
    }
    printf("Erro: %s\n", mysqli_error($this->conexao->getConexao()));
    return false;
  }

  public function removerCliente($cliente)
  {
    $sql = "DELETE FROM cliente WHERE cpf=?;";
    $cpf = $cliente->getCpf();

    if ($stmt = $this->conexao->getConexao()->prepare($sql)) {
      $stmt->bind_param("s", $cpf);
      $stmt->execute();
      $stmt->close();
      return true;
    }
    printf("Erro: %s\n", mysqli_error($this->conexao->getConexao()));
    return false;
  }

  public function atualizarCliente($cliente)
  {
    $nomeCliente = $cliente->getNomeCliente();
    $cpf = $cliente->getCpf();
    $endereco = $cliente->getEndereco();
    $dataCadastro = $cliente->getDataCadastro();
    $saldoDevedor = $cliente->getSaldoDevedor();
    $situacaoDebito = $cliente->getSituacaoDebito();

    $sql = "UPDATE cliente SET nome_cliente=?, cpf=?, endereco=?, data_cadastro=?, saldo_devedor=?, situacao_debito=? WHERE cpf=?;";

    if ($stmt = $this->conexao->getConexao()->prepare($sql)) {
      $stmt->bind_param("ssssdss", $nomeCliente, $cpf, $endereco, $dataCadastro, $saldoDevedor, $situacaoDebito, $cpf);
      $stmt->execute();
      $stmt->close();
      return true;
    }
    printf("Erro: %s\n", mysqli_error($this->conexao->getConexao()));
    return false;
  }

  public function buscarCliente($cpf)
  {
    $sql = "SELECT * FROM cliente WHERE cpf=?;";

    if ($stmt = $this->conexao->getConexao()->prepare($sql)) {
      $stmt->bind_param("s", $cpf);
      $stmt->execute();
      $result = $stmt->get_result();
      if (!$result || $result->num_rows < 1) {
        $stmt->close();
        return false;
      }
      $cliente = $result->fetch_object();
      $stmt->close();
      return new Cliente(
        $cliente->nome_cliente,
        $cliente->cpf,
        $cliente->endereco,
        $cliente->data_cadastro,
        $cliente->saldo_devedor,
        $cliente->situacao_debito
      );
    }
    printf("Erro: %s\n", mysqli_error($this->conexao->getConexao()));
    return false;
  }

  private function fetchObjectsInArray($lista)
  {
    $arrayClientes = array();

    while ($linha = mysqli_fetch_object($lista)) {
      array_push($arrayClientes, new Cliente(
        $linha->nome_cliente,
        $linha->cpf,
        $linha->endereco,
        $linha->data_cadastro,
        $linha->saldo_devedor,
        $linha->situacao_debito
      ));
    }

    return $arrayClientes;
  }

  public function getListaClientes()
  {
    $lista = $this->conexao->executarQuery('SELECT * FROM cliente;');
    return $this->fetchObjectsInArray($lista);
  }

  public function getListaClientesEmDia()
  {
    $lista = $this->conexao->executarQuery("SELECT * FROM cliente WHERE situacao_debito='Em dia';");
    return $this->fetchObjectsInArray($lista);
  }

  public function getListaClientesEmAtraso()
  {
    $lista = $this->conexao->executarQuery("SELECT * FROM cliente WHERE situacao_debito='Em atraso';");
    return $this->fetchObjectsInArray($lista);
  }
}

$repositorio = new RepositorioClientesMySQL();
