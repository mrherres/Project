<?php
$checkFile = file_get_contents("data/players.json");
$check = json_decode($checkFile, true);
if($check["player2"]["status"] === "unready"){
    $check["player2"]["status"] = "ready";
}
else{
    $check["player2"]["status"] = "unready";
}
$json_object = json_encode($check, JSON_PRETTY_PRINT);
file_put_contents('data/players.json', $json_object);
header('Location: main.php?name='.$check["player2"]["name"]);
