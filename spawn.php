<?php
#$newdata = ['rolled' => $_POST['rolled'], 'name' => $_POST['name']];
$checkFile = file_get_contents("data/players.json");
$check = json_decode($checkFile, true);
if($check["player1"]["name"] === $_POST["name"]){
    $checkFile2 = file_get_contents("data/gamestate.json");
    $check2 = json_decode($checkFile2, true);
    $check2["field"]["p31"] = "blue";
    $json_object = json_encode($check2);
    file_put_contents('data/gamestate.json', $json_object);
    }
else{
    $checkFile2 = file_get_contents("data/gamestate.json");
    $check2 = json_decode($checkFile2, true);
    $check2["field"]["p1"] = "green";
    $json_object = json_encode($check2);
    file_put_contents('data/gamestate.json', $json_object);
}

header("Content-Type: application/json");


