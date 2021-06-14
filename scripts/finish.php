<?php

$checkFile = file_get_contents("data/gamestate.json");
$check = json_decode($checkFile, true);

$checkFile2 = file_get_contents("data/players.json");
$check2 = json_decode($checkFile, true);

if ($check["finish"]["b1"] === "inB" and $check["finish"]["b2"] === "inB" and $check["finish"]["b3"] === "inB" and $check["finish"]["b4"]=== "inB" ){
    $check2["player1"]["wins"] ++;
}
elseif ($check["finish"]["g1"] === "inG" and $check["finish"]["g2"] === "inG" and $check["finish"]["g3"] === "inG" and $check["finish"]["g4"]=== "inG" ){
    $check2["player2"]["wins"] ++;
}
