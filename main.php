<?php
/* Header */
$page_title = 'Mens Erger Je Niet';
#$navigation = Array(
    #'active' => 'Main',
    #'items' => Array(
        #'Simple Form' => '/Project/simple_form.php'
    #)
#);
include __DIR__ . '/tpl/head.php';
include __DIR__ . '/tpl/body_start.php';
$getName = $_GET['name'];

?>

<div class="welcome">
    <h1> Welcome! </h1>
    <button class="btn btn-warning" id="reset">Reset Player</button>
    <h2> Current players are:</h2>
    <table class="table">
        <tr>
            <th>Player</th>
            <th>Status</th>
            <th>Wins</th>
        </tr>
        <tr>
            <td id="player1Name"></td>
            <td id="status1"></td>
            <td id="wins1">
                <?
                $checkFile = file_get_contents("data/players.json");
                $check = json_decode($checkFile, true);
                echo $check["player1"]["wins"]
                ?>
            </td>
        </tr>
        <tr>
            <td id="player2Name"></td>
            <td id="status2"></td>
            <td id="wins2">
                <?
                $checkFile = file_get_contents("data/players.json");
                $check = json_decode($checkFile, true);
                echo $check["player2"]["wins"]
                ?>
            </td>
        </tr>
    </table>
</div>
</div>
</div>
</div>

