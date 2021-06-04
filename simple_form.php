<?php
/* Header */
$page_title = 'Webprogramming Assignment 3';
$navigation = Array(
    'active' => 'Simple Form',
    'items' => Array(
        'Simple Form' => '/Project/simple_form.php'
    )
);
include __DIR__ . '/tpl/head.php';
include __DIR__ . '/tpl/body_start.php';
?>
<?php
    if (isset($_GET["name"])){
        if($_GET["name"] != ""){
            #echo "<h1>Welcome " . $_GET["name"] . "!</h1>";
            $player->name = $_GET["name"];
            $player->wins = 0;
            $playerJSON = json_encode($player);
            $checkFile = file_get_contents("data/player1.json");
            $check = json_decode($checkFile, true);
            if($check == ""){
                $json_file = fopen('data/player1.json', 'w');
                fwrite($json_file, $playerJSON);
                fclose($json_file);
            }
            else{
                $json_file = fopen('data/player2.json', 'w');
                fwrite($json_file, $playerJSON);
                fclose($json_file);
            }
            header('Location: main.php');
    }
}
?>
    <h1>Please enter your name</h1>
    <form name="myForm" id="form" action="simple_form.php" method="GET" novalidate>
        <label for="name">Name</label>
        <input class="form-control" type="text" id="name" name="name" placeholder="Jan Jansen" required>
        <button class="btn btn-primary" type="submit">Submit</button>
    </form>
<?php
include __DIR__ . '/tpl/body_end.php';
?>