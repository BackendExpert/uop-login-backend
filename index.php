<?php
header("Content-Type: application/json");
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type, Authorization");

$response = [
    "status" => "success",
    "message" => "PHP API working on Render!"
];

echo json_encode($response);
?>
