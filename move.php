<?php
$checkFile = file_get_contents("data/players.json");
$check = json_decode($checkFile, true);
if($check["player1"]["name"] === $_POST["name"]){
    $POSB = $_POST["posB"];
    $NEXT = $_POST["posB"] + $_POST["rolled"];
    if($NEXT > 40){
        $NEXT = $NEXT - 40;
    }

    $checkFile2 = file_get_contents("data/gamestate.json");
    $check2 = json_decode($checkFile2, true);
    $check2["field"]["p".$POSB] = "empty";
    $check2["field"]["p".$NEXT] = "blue";

    $json_object = json_encode($check2);
    file_put_contents('data/gamestate.json', $json_object);

    $newdata = ['prev' => $POSB,'max' => $NEXT];
    header("Content-Type: application/json");
    echo json_encode($newdata);
}
