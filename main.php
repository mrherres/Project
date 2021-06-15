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
    <!--<div>
        <form action="spawn.php" method="post"><input type="submit" class="btn btn-success" value="Set Move"/></form>
    </div> -->
    <h1>
        How to play:
    </h1>
    <p>
        Roll the dice by clicking it. You can only see the dice when it's your turn.
    </p>
    <p>
        After rolling the dice, select the pawn you would like to move.
        If you have no pawns on the board, you need to roll six first to get a pawn on the board.
    </p>
    <p>
        You win the game when all four of your pawns have reached the finish.
    </p>

</div>
</div>
</div>
</div>

