<?php
$checkFile = file_get_contents("../data/players.json");
$check = json_decode($checkFile, true);
$checkFile2 = file_get_contents("../data/gamestate.json");
$check2 = json_decode($checkFile2, true);

$check["player1"]["name"] = "";
$check["player2"]["name"] = "";
$check["player1"]["status"] = "reset";
$check["player2"]["status"] = "reset";
$check["player1"]["wins"] = 0;
$check["player2"]["wins"] = 0;

$check2["information"]["status"] = "1";

$check2["finish"]["b1"] = "empty";
$check2["finish"]["b2"] = "empty";
$check2["finish"]["b3"] = "empty";
$check2["finish"]["b4"] = "empty";
$check2["finish"]["g1"] = "empty";
$check2["finish"]["g2"] = "empty";
$check2["finish"]["g3"] = "empty";
$check2["finish"]["g4"] = "empty";

$check2["pawns"]["blue"] = 0;
$check2["pawns"]["green"] = 0;

for ($x = 1; $x <= 40; $x++) {
    $check2["field"]["p$x"] = "empty";
}

$json_object = json_encode($check, JSON_PRETTY_PRINT);
$json_object2 = json_encode($check2, JSON_PRETTY_PRINT);
file_put_contents('../data/players.json', $json_object);
file_put_contents('../data/gamestate.json', $json_object2);
