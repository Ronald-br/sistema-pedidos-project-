<?php

require_once __DIR__ . "/../models/Pedido.php";

class PedidoFactory {
    public static function criar($dados) {
        return new Pedido(
            $dados["cliente"],
            $dados["produto"],
            $dados["quantidade"]
        );
    }
}