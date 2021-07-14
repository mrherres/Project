<?php
header("Content-Type: application/json");
$checkFile = file_get_contents("../data/gamestate.json");
echo $checkFile;
