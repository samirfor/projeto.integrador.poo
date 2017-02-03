<?php

class Cliente
{
  private $nomeCliente;
  private $cpf;
  private $endereco;
  private $dataCadastro;
  private $saldoDevedor;
  private $situacaoDebito;

  function __construct($nomeCliente=null, $cpf=null, $endereco=null, $dataCadastro=null, $saldoDevedor=0, $situacaoDebito=null)
  {
    $this->nomeCliente = $nomeCliente;
    $this->cpf = $cpf;
    $this->endereco = $endereco;
    $this->dataCadastro = $dataCadastro;
    if (!$dataCadastro) {
      $this->dataCadastro = date('Y-m-d');
    }
    $this->saldoDevedor = $saldoDevedor;
    $this->situacaoDebito = $situacaoDebito;
  }

  /**
   * Get the value of Nome Cliente
   *
   * @return mixed
   */
  public function getNomeCliente()
  {
      return $this->nomeCliente;
  }

  /**
   * Set the value of Nome Cliente
   *
   * @param mixed nomeCliente
   *
   * @return self
   */
  public function setNomeCliente($nomeCliente)
  {
      $this->nomeCliente = $nomeCliente;

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
      return $this->dataCadastro;
  }

  /**
   * Set the value of Data Cadastro
   *
   * @param mixed dataCadastro
   *
   * @return self
   */
  public function setDataCadastro($dataCadastro)
  {
      $this->dataCadastro = $dataCadastro;

      return $this;
  }

  /**
   * Get the value of Saldo Devedor
   *
   * @return mixed
   */
  public function getSaldoDevedor()
  {
      return $this->saldoDevedor;
  }

  /**
   * Set the value of Saldo Devedor
   *
   * @param mixed saldoDevedor
   *
   * @return self
   */
  public function setSaldoDevedor($saldoDevedor)
  {
      $this->saldoDevedor = $saldoDevedor;

      return $this;
  }

  /**
   * Get the value of Situacao Debito
   *
   * @return mixed
   */
  public function getSituacaoDebito()
  {
      return $this->situacaoDebito;
  }

  /**
   * Set the value of Situacao Debito
   *
   * @param mixed situacaoDebito
   *
   * @return self
   */
  public function setSituacaoDebito($situacaoDebito)
  {
      $this->situacaoDebito = $situacaoDebito;

      return $this;
  }

}
