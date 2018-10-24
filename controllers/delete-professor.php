<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

include_once '../config/database.php';
include_once '../models/professor.php';

$database = new Database();
$db = $database->getConexao();

$professor = new Professor($db);

// pegando id do professor
$data = json_decode(file_get_contents("php://input"));

$professor->id = $data->id;

if($professor->excluiProfessor()){
    http_response_code(200);
    echo json_encode(array("mensagem" => "Professor foi deletado"));
} else {
    http_response_code(503);
    echo json_encode(array("mensagem" => "Não foi possível excluir o professor."));
}

?>