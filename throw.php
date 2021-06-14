<?php
$color = $_POST["color"];
$throw = $_POST["throw"];
$checkFile2 = file_get_contents("data/gamestate.json");
$check2 = json_decode($checkFile2, true);
if($color === "blue"){
    $check2["pawns"]["green"] -= 0.5;
}
else{
    $check2["pawns"]["blue"] -= 0.5;
}

$json_object = json_encode($check2, JSON_PRETTY_PRINT);
file_put_contents('data/gamestate.json', $json_object);

#$newdata = ['prev' => $POSB,'max' => $NEXT];
header("Content-Type: application/json");
#echo json_encode($newdata);