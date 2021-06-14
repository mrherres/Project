<?php
$checkFile = file_get_contents("data/players.json");
$check = json_decode($checkFile, true);
$checkFile2 = file_get_contents("data/gamestate.json");
$check2 = json_decode($checkFile2, true);
$checkFile3 = file_get_contents("data/pawns.json");
$check3 = json_decode($checkFile3, true);

$check["player1"]["name"] = "";
$check["player2"]["name"] = "";
$check["player1"]["status"] = "unready";
$check["player2"]["status"] = "unready";

for ($x = 1; $x <= 40; $x++) {
    $check2["field"]["p$x"] = "empty";
}

for ($x = 1; $x <= 4; $x++) {
        $check3["1"]["pawn$x"] = "base";
}

for ($x = 1; $x <= 4; $x++) {
    $check3["2"]["pawn$x"] = "base";
}


$json_object = json_encode($check);
$json_object2 = json_encode($check2);
$json_object3 = json_encode($check3);
file_put_contents('data/players.json', $json_object);
file_put_contents('data/gamestate.json', $json_object2);
file_put_contents("data/pawns.json", $json_object3);

