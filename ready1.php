<?php
$checkFile = file_get_contents("data/players.json");
$check = json_decode($checkFile, true);
if($check["player1"]["status"] === "unready"){
    $check["player1"]["status"] = "ready";
    $json_object = json_encode($check);
    file_put_contents('data/players.json', $json_object);
}
else{
    $check["player1"]["status"] = "unready";
    $json_object = json_encode($check);
    file_put_contents('data/players.json', $json_object);
}

header('Location: main.php?name='.$check["player1"]["name"]);


