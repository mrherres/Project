<?php
$Bpawns = $_POST["PawnB"];
$Gpawns = $_POST["PawnG"];
$checkFile = file_get_contents("../data/players.json");
$check = json_decode($checkFile, true);
$checkFile2 = file_get_contents("../data/gamestate.json");
$check2 = json_decode($checkFile2, true);

if($check["player1"]["name"] === $_POST["name"]){
    if ($check2["pawns"]["blue"] < 4 && $check2["field"]["p31"] === "empty" || $check2["field"]["p31"] === "green") {
        $check2["field"]["p31"] = "blue";
        $check2["pawns"]["blue"] ++;
        $check2["information"]["status"] = "2";
        $json_object = json_encode($check2, JSON_PRETTY_PRINT);
        file_put_contents('../data/gamestate.json', $json_object);
    }
}

else if($check["player2"]["name"] === $_POST["name"]) {
    if ($check2["pawns"]["green"] < 4 && $check2["field"]["p1"] === "empty" || $check2["field"]["p1"] === "blue") {
        $check2["field"]["p1"] = "green";
        $check2["pawns"]["green"] ++;
        $check2["information"]["status"] = "1";
        $json_object = json_encode($check2, JSON_PRETTY_PRINT);
        file_put_contents('../data/gamestate.json', $json_object);
    }
}

header("Content-Type: application/json");

