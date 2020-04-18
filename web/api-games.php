<?php

require __DIR__ . "/../src/Repository/GameRepository.php";

$request_body = json_decode(file_get_contents('php://input'), true);

$clean = [];
$clean['user'] = filter_var($request_body['user'], FILTER_SANITIZE_NUMBER_INT);

$repo = new GameRepository();
$games = $repo->findByUserId($clean['user']);

$data = [];
foreach ($games as $game) {
    $data[] = $game->toArray();
}

header('Content-Type: application/json');
echo json_encode([
    'data' => $data,
]);