<?php

class Pedido {
    public $id;
    public $cliente;
    public $produto;
    public $quantidade;

    public function __construct($cliente, $produto, $quantidade) {
        $this->id = uniqid();
        $this->cliente = $cliente;
        $this->produto = $produto;
        $this->quantidade = $quantidade;
    }
}