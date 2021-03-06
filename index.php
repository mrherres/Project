<?php
$page_title = "Mens Erger Je Niet";
include __DIR__ . '/tpl/head.php';
include __DIR__ . '/tpl/body_start.php';
?>

<?php
    if (isset($_GET["name"])){
        if($_GET["name"] != ""){
            session_start();
            $player_name = $_GET["name"];
            $checkFile = file_get_contents("data/players.json");
            $check = json_decode($checkFile, true);
            if($check["player1"]["name"] == ""){
                $json_file = file_get_contents('data/players.json');
                $data = json_decode($json_file, true);
                $data['player1']['name'] = $player_name;
                $data["player1"]["status"] = "unready";
                $turn = $data['player1']['turn'];
                $json_object = json_encode($data, JSON_PRETTY_PRINT);
                file_put_contents('data/players.json', $json_object);
            }
            else{
                $json_file = file_get_contents('data/players.json');
                $data = json_decode($json_file, true);
                if ($data['player1']['name'] == $player_name) {
                    $player_name = $player_name . "(2)";
                }
                $data['player2']['name'] = $player_name;
                $data["player2"]["status"] = "unready";
                $turn = $data['player2']['turn'];
                $json_object = json_encode($data, JSON_PRETTY_PRINT);
                file_put_contents('data/players.json', $json_object);
            }
            header('Location: main.php?name='.$player_name);
    }
}
?>

    <h1>Please enter your name</h1>
    <form name="myForm" id="form" action="index.php" method="get" novalidate>
        <label for="name">Name</label>
        <input class="form-control" type="text" id="name" name="name" placeholder="Jan Jansen" required maxlength="10">
        <button class="btn btn-primary" type="submit">Submit</button>
    </form>

<?php
include __DIR__ . '/tpl/body_end.php';
?>