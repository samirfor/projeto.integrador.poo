<?php

class Filme
{
  private $titulo;
  private $codigo;
  private $sinopse;
  private $quantidade;
  private $trailer;

  function __construct($titulo=null, $codigo=null, $sinopse=null, $quantidade=null, $trailer=null)
  {
    $this->titulo = $titulo;
    $this->codigo = $codigo;
    $this->sinopse = $sinopse;
    $this->quantidade = $quantidade;
    $this->trailer = $trailer;
  }

  /**
   * Get the value of Titulo
   *
   * @return mixed
   */
  public function getTitulo()
  {
      return $this->titulo;
  }

  /**
   * Set the value of Titulo
   *
   * @param mixed titulo
   *
   * @return self
   */
  public function setTitulo($titulo)
  {
      $this->titulo = $titulo;

      return $this;
  }

  /**
   * Get the value of Codigo
   *
   * @return mixed
   */
  public function getCodigo()
  {
      return $this->codigo;
  }

  /**
   * Set the value of Codigo
   *
   * @param mixed codigo
   *
   * @return self
   */
  public function setCodigo($codigo)
  {
      $this->codigo = $codigo;

      return $this;
  }

  /**
   * Get the value of Sinopse
   *
   * @return mixed
   */
  public function getSinopse()
  {
      return $this->sinopse;
  }

  /**
   * Set the value of Sinopse
   *
   * @param mixed sinopse
   *
   * @return self
   */
  public function setSinopse($sinopse)
  {
      $this->sinopse = $sinopse;

      return $this;
  }

  /**
   * Get the value of Quantidade
   *
   * @return mixed
   */
  public function getQuantidade()
  {
      return $this->quantidade;
  }

  /**
   * Set the value of Quantidade
   *
   * @param mixed quantidade
   *
   * @return self
   */
  public function setQuantidade($quantidade)
  {
      $this->quantidade = $quantidade;

      return $this;
  }

  /**
   * Get the value of Trailer
   *
   * @return mixed
   */
  public function getTrailer()
  {
      return $this->trailer;
  }

  /**
   * Set the value of Trailer
   *
   * @param mixed trailer
   *
   * @return self
   */
  public function setTrailer($trailer)
  {
      $this->trailer = $trailer;

      return $this;
  }

}
