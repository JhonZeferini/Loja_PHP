<?php

class Produto{
    private $codigo;
    private $nome;
    private $categoria;
    private $valor;
    public function getCodigo(){
        return $this->codigo;
    }
    public function setCodigo($codigo){
        $this->codigo = $codigo;
    }
    public function getNome(){
        return $this->nome;
    }
    public function setNome($nome){
        $this->nome = $nome;
    }

    public function getCategoria(){
        return $this->categoria;
    }
    public function setCategoria($categoria){
        $this->categoria = $categoria;
    }

    public function getValor(){
        return $this->valor;
    }
    public function setValor($valor){
        $this->valor = $valor;
    }
}

?>