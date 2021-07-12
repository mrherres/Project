<?php
header("Content-Type: application/json");
$checkFile = file_get_contents("../data/players.json");
echo $checkFile;
