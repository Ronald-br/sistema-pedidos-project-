<?php

class PedidoController {

    public function listar() {
        $pedidos = [];

        echo json_encode($pedidos);
    }

    public function criar() {
        $dados = json_decode(file_get_contents("php://input"), true);

        echo json_encode([
            "mensagem" => "Pedido recebido",
            "dados" => $dados
        ]);
    }
}