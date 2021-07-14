<?php
$checkFile2 = file_get_contents("../data/gamestate.json");
$check2 = json_decode($checkFile2, true);
if($check2["information"]["status"] === "1"){
    $check2["information"]["status"] = "2";
}
else{
    $check2["information"]["status"] = "1";
}

$json_object = json_encode($check2, JSON_PRETTY_PRINT);
file_put_contents('../data/gamestate.json', $json_object);

#$newdata = ['prev' => $POSB,'max' => $NEXT];
header("Content-Type: application/json");
#echo json_encode($newdata);
