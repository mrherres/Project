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
            $player_name = $_GET["name"];
            $checkFile = file_get_contents("data/players.json");
            $check = json_decode($checkFile, true);
            if($check["player1"]["name"] == ""){
                $json_file = file_get_contents('data/players.json');
                $data = json_decode($json_file, true);
                $data['player1']['name'] = $player_name;
                $json_object = json_encode($data);
                file_put_contents('data/players.json', $json_object);
            }
            else{
                $json_file = file_get_contents('data/players.json');
                $data = json_decode($json_file, true);
                $data['player2']['name'] = $player_name;
                $json_object = json_encode($data);
                file_put_contents('data/players.json', $json_object);
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