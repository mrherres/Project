<?php
#$newdata = ['rolled' => $_POST['rolled'], 'name' => $_POST['name']];
$checkFile = file_get_contents("data/players.json");
$check = json_decode($checkFile, true);
$checkFile3 = file_get_contents("data/pawns.json");
$check3 = json_decode($checkFile3, true);
if($check["player1"]["name"] === $_POST["name"]){
    if ($check3["1"]["pawn1"] === "base" or $check3["1"]["pawn2"] === "base" or $check3["1"]["pawn3"] === "base" or $check3["1"]["pawn4"] === "base") {
        $checkFile2 = file_get_contents("data/gamestate.json");
        $check2 = json_decode($checkFile2, true);
        $check2["field"]["p31"] = "blue";
        $json_object = json_encode($check2);
        file_put_contents('data/gamestate.json', $json_object);


        if ($check3["1"]["pawn1"] === "base") {
            $check3["1"]["pawn1"] = "field";
        } elseif ($check3["1"]["pawn2"] === "base") {
            $check3["1"]["pawn2"] = "field";
        } elseif ($check3["1"]["pawn3"] === "base") {
            $check3["1"]["pawn3"] = "field";
        } elseif ($check3["2"]["pawn4"] === "base") {
            $check3["1"]["pawn4"] = "field";
        }
        $json_object = json_encode($check3);
        file_put_contents('data/pawns.json', $json_object);
    }
}
else {
    if ($check3["2"]["pawn1"] === "base" or $check3["2"]["pawn2"] === "base" or $check3["2"]["pawn3"] === "base" or $check3["2"]["pawn4"] === "base") {
        $checkFile2 = file_get_contents("data/gamestate.json");
        $check2 = json_decode($checkFile2, true);
        $check2["field"]["p1"] = "green";
        $json_object = json_encode($check2);
        file_put_contents('data/gamestate.json', $json_object);

        $checkFile3 = file_get_contents("data/pawns.json");
        $check3 = json_decode($checkFile3, true);
        if ($check3["2"]["pawn1"] === "base") {
            $check3["2"]["pawn1"] = "field";
        } elseif ($check3["1"]["pawn2"] === "base") {
            $check3["2"]["pawn2"] = "field";
        } elseif ($check3["1"]["pawn3"] === "base") {
            $check3["2"]["pawn3"] = "field";
        } elseif ($check3["2"]["pawn4"] === "base") {
            $check3["2"]["pawn4"] = "field";
        }
        $json_object = json_encode($check3);
        file_put_contents('data/pawns.json', $json_object);
    }
}

header("Content-Type: application/json");

