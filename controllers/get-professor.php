<?php

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

include_once '../config/database.php';
include_once '../models/professor.php';

$database = new Database();
$db = $database->getConexao();

$professor = new Professor($db);

$stmt = $professor->getProfessor();
$num = $stmt->rowCount();

if($num > 0){
    $professor_arr=array();
    $professor_arr["professores"]=array();

    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
        // extract row
        // this will make $row['name'] to
        // just $name only
        extract($row);
 
        $professor_item=array(
            "id" => $id,
            "nome" => $nome,
            "dt_nascimento" => $dt_nascimento,
            "foto_url" => $foto_url,
            "curriculo" => $curriculo,
            "status" => $status
        );
 
        
        array_push($professor_arr["professores"], $professor_item);
    }

    http_response_code(200);
    echo json_encode($professor_arr);

} else {
    http_response_code(404);
    echo json_encode(
        array("mensagem" => "Nenhum professor encontrado.")
    );
}

?>