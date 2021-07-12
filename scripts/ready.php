<?php
$player = $_POST['player'];
$checkFile = file_get_contents("../data/players.json");
$check = json_decode($checkFile, true);
if($player === "Twan") {
    if ($check["player1"]["status"] === "unready") {
        $check["player1"]["status"] = "ready";
    } else {
        $check["player1"]["status"] = "unready";
    }
    $json_object = json_encode($check, JSON_PRETTY_PRINT);
    file_put_contents('../data/players.json', $json_object);
    header('Location: ../main.php?name='.$player);
}
else{
    if($check["player2"]["status"] === "unready"){
        $check["player2"]["status"] = "ready";
    }
    else{
        $check["player2"]["status"] = "unready";
    }
    $json_object = json_encode($check, JSON_PRETTY_PRINT);
    file_put_contents('../data/players.json', $json_object);
    header('Location: ../main.php?name='.$check["player2"]["name"]);
}
