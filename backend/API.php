<?php
header("Content-Type: application/json");

$metodo = $_SERVER['REQUEST_METHOD'];

$arquivo = "pedidos.json";

if (!file_exists($arquivo)) {
    file_put_contents($arquivo, json_encode([]));
}

$pedidos = json_decode(file_get_contents($arquivo), true);

if ($metodo == "GET") {
    echo json_encode($pedidos);
}

if ($metodo == "POST") {
    $dados = json_decode(file_get_contents("php://input"), true);

    $novoPedido = [
        "id" => uniqid(),
        "cliente" => $dados["cliente"],
        "produto" => $dados["produto"],
        "quantidade" => $dados["quantidade"]
    ];

    $pedidos[] = $novoPedido;

    file_put_contents($arquivo, json_encode($pedidos));

    echo json_encode(["mensagem" => "Pedido criado"]);
}