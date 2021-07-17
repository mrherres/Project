<?php
$player = $_POST['player'];
$checkFile = file_get_contents("../data/players.json");
$check = json_decode($checkFile, true);

if($player === $check["player1"]["name"]) {
    $check["player1"]["name"] = "";
    $check["player1"]["status"] = "unready";
    $check["player1"]["wins"] = 0;
    $json_object = json_encode($check, JSON_PRETTY_PRINT);
    file_put_contents('../data/players.json', $json_object);
}
else{
    $check["player2"]["name"] = "";
    $check["player2"]["status"] = "unready";
    $check["player2"]["wins"] = 0;
    $json_object = json_encode($check, JSON_PRETTY_PRINT);
    file_put_contents('../data/players.json', $json_object);
}
header('Location: ../index.php');