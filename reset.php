<?php
$checkFile = file_get_contents("data/players.json");
$check = json_decode($checkFile, true);
$checkFile2 = file_get_contents("data/gamestate.json");
$check2 = json_decode($checkFile2, true);

$check["player1"]["name"] = "";
$check["player2"]["name"] = "";
$check["player1"]["status"] = "unready";
$check["player2"]["status"] = "unready";

$check2["finish"]["b1"] = "empty";
$check2["finish"]["g1"] = "empty";

$check2["pawns"]["blue"] = "0";
$check2["pawns"]["green"] = "0";

for ($x = 1; $x <= 40; $x++) {
    $check2["field"]["p$x"] = "empty";
}

$json_object = json_encode($check);
$json_object2 = json_encode($check2);
file_put_contents('data/players.json', $json_object);
file_put_contents('data/gamestate.json', $json_object2);

