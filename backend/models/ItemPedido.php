<?php

class ItemPedido {
    public $produto;
    public $quantidade;

    public function __construct($produto, $quantidade) {
        $this->produto = $produto;
        $this->quantidade = $quantidade;
    }

    public function subtotal() {
        return $this->produto->preco * $this->quantidade;
    }
}