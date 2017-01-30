<?php

class Cliente
{
  private $idcliente;
  private $nome_cliente;
  private $cpf;
  private $endereco;
  private $data_cadastro;
  private $saldo_devedor;

  function __construct($idcliente, $nome_cliente, $cpf, $endereco, $data_cadastro)
  {
    $this->idcliente = $idcliente;
    $this->nome_cliente = $nome_cliente;
    $this->cpf = $cpf;
    $this->endereco = $endereco;
    $this->data_cadastro = $data_cadastro;
  }

  /**
   * Get the value of Idcliente
   *
   * @return mixed
   */
  public function getIdcliente()
  {
      return $this->idcliente;
  }

  /**
   * Set the value of Idcliente
   *
   * @param mixed idcliente
   *
   * @return self
   */
  public function setIdcliente($idcliente)
  {
      $this->idcliente = $idcliente;

      return $this;
  }

  /**
   * Get the value of Nome Cliente
   *
   * @return mixed
   */
  public function getNomeCliente()
  {
      return $this->nome_cliente;
  }

  /**
   * Set the value of Nome Cliente
   *
   * @param mixed nome_cliente
   *
   * @return self
   */
  public function setNomeCliente($nome_cliente)
  {
      $this->nome_cliente = $nome_cliente;

      return $this;
  }

  /**
   * Get the value of Cpf
   *
   * @return mixed
   */
  public function getCpf()
  {
      return $this->cpf;
  }

  /**
   * Set the value of Cpf
   *
   * @param mixed cpf
   *
   * @return self
   */
  public function setCpf($cpf)
  {
      $this->cpf = $cpf;

      return $this;
  }

  /**
   * Get the value of Endereco
   *
   * @return mixed
   */
  public function getEndereco()
  {
      return $this->endereco;
  }

  /**
   * Set the value of Endereco
   *
   * @param mixed endereco
   *
   * @return self
   */
  public function setEndereco($endereco)
  {
      $this->endereco = $endereco;

      return $this;
  }

  /**
   * Get the value of Data Cadastro
   *
   * @return mixed
   */
  public function getDataCadastro()
  {
      return $this->data_cadastro;
  }

  /**
   * Set the value of Data Cadastro
   *
   * @param mixed data_cadastro
   *
   * @return self
   */
  public function setDataCadastro($data_cadastro)
  {
      $this->data_cadastro = $data_cadastro;

      return $this;
  }

}
