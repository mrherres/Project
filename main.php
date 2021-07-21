<?php
/* Header */
$page_title = 'Mens Erger Je Niet';
#$navigation = Array(
    #'active' => 'Main',
    #'items' => Array(
        #'Simple Form' => '/Project/index.php'
    #)
#);
include __DIR__ . '/tpl/head.php';
include __DIR__ . '/tpl/body_start.php';
$getName = $_GET['name'];

?>

<div class="welcome">
    <h1> Welcome! </h1>
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
            </td>
        </tr>
        <tr>
            <td id="player2Name"></td>
            <td id="status2"></td>
            <td id="wins2">
            </td>
        </tr>
    </table>
    <form action="scripts/ready.php" method="post">
        <input type="hidden" name="player" value="<?php echo $_GET["name"] ?>" style="display: none"/>
        <input type="submit" class="btn btn-success" value="Click here if you want to (un)ready yourself"/>
    </form>
    </br>
    <form action="scripts/resetPlayer.php" method="post">
        <input type="hidden" name="player" value="<?php echo $_GET["name"] ?>" style="display: none"/>
        <input type="submit" class="btn btn-danger" value="Click here if you want to reset yourself"/>
    </form>
    <h1 id="rules-header">
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
        You can reach the finish when a pawn lands on one of the three finishing places.
        You can recognize your finish places by your color, light blue spots for team blue and light green spots for team green.
        If your pawn goes past all these places, you unfortunately have to do another round!
    </p>

</div>
</div>
</div>
</div>

