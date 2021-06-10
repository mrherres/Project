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
    <button class="btn btn-warning">Reset Player</button>
    <h2> Current players are:</h2>
    <table class="table">
        <tr>
            <th>Player</th>
            <th>Status</th>
        </tr>
        <tr>
            <td id="player1Name"></td>
            <td id="status1"></td>
        </tr>
        <tr>
            <td id="player2Name"></td>
            <td id="status2"></td>
        </tr>
    </table>
    <div>
        <form action="move.php" method="post"><input type="submit" class="btn btn-success" value="Set Move"/></form>
    </div>
</div>
</div>
</div>
</div>

