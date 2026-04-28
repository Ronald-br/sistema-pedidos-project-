<?php

class PedidoRepository {
    private $arquivo = "pedidos.json";

    public function __construct() {
        if (!file_exists($this->arquivo)) {
            file_put_contents($this->arquivo, json_encode([]));
        }
    }

    public function listar() {
        return json_decode(file_get_contents($this->arquivo), true);
    }

    public function salvar($pedido) {
        $dados = $this->listar();
        $dados[] = $pedido;
        file_put_contents($this->arquivo, json_encode($dados));
    }
}