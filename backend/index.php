<?php
header("Content-Type: application/json");

require_once "models/Pedido.php";
require_once "repositories/PedidoRepository.php";
require_once "factories/PedidoFactory.php";
require_once "config/Database.php";

$metodo = $_SERVER['REQUEST_METHOD'];

$db = Database::getInstancia();

$repo = new PedidoRepository();

if ($metodo == "GET") {
    echo json_encode($repo->listar());
}

if ($metodo == "POST") {
    $dados = json_decode(file_get_contents("php://input"), true);

    $pedido = PedidoFactory::criar($dados);

    $repo->salvar($pedido);

    echo json_encode(["mensagem" => "Pedido salvo"]);
}