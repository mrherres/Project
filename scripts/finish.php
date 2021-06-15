<?php

$checkFile = file_get_contents("../data/gamestate.json");
$check = json_decode($checkFile, true);

$checkFile2 = file_get_contents("../data/players.json");
$check2 = json_decode($checkFile2, true);
if ($check["finish"]["b1"] === "inB" and $check["finish"]["b2"] === "inB" and $check["finish"]["b3"] === "inB" and $check["finish"]["b4"]=== "inB" ){

    $check2["player1"]["wins"] ++;

    $check2["information"]["status"] = "1";
    $check2["player1"]["status"] = "unready";
    $check2["player2"]["status"] = "unready";
    $check2["information"]["gamestatus"] = "waiting";

    $check["finish"]["b1"] = "empty";
    $check["finish"]["b2"] = "empty";
    $check["finish"]["b3"] = "empty";
    $check["finish"]["b4"] = "empty";
    $check["finish"]["g1"] = "empty";
    $check["finish"]["g2"] = "empty";
    $check["finish"]["g3"] = "empty";
    $check["finish"]["g4"] = "empty";

    $check["pawns"]["blue"] = 0;
    $check["pawns"]["green"] = 0;

    for ($x = 1; $x <= 40; $x++) {
        $check["field"]["p$x"] = "empty";
    }
    $json_object = json_encode($check, JSON_PRETTY_PRINT);
    file_put_contents('../data/gamestate.json', $json_object);
    $json_object2 = json_encode($check2, JSON_PRETTY_PRINT);
    file_put_contents('../data/players.json', $json_object2);
    echo "win";
}
elseif ($check["finish"]["g1"] === "inG" and $check["finish"]["g2"] === "inG" and $check["finish"]["g3"] === "inG" and $check["finish"]["g4"]=== "inG" ) {
    $check2["player2"]["wins"]++;

    $check2["information"]["status"] = "1";
    $check2["player1"]["status"] = "unready";
    $check2["player2"]["status"] = "unready";
    $check2["information"]["gamestatus"] = "waiting";

    $check["finish"]["b1"] = "empty";
    $check["finish"]["b2"] = "empty";
    $check["finish"]["b3"] = "empty";
    $check["finish"]["b4"] = "empty";
    $check["finish"]["g1"] = "empty";
    $check["finish"]["g2"] = "empty";
    $check["finish"]["g3"] = "empty";
    $check["finish"]["g4"] = "empty";

    $check["pawns"]["blue"] = 0;
    $check["pawns"]["green"] = 0;

    for ($x = 1; $x <= 40; $x++) {
        $check["field"]["p$x"] = "empty";
    }
    $json_object = json_encode($check, JSON_PRETTY_PRINT);
    file_put_contents('../data/gamestate.json', $json_object);
    $json_object2 = json_encode($check2, JSON_PRETTY_PRINT);
    file_put_contents('../data/players.json', $json_object2);
    echo "win";
}

else
    echo "no-win";
