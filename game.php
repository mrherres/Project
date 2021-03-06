<?php
$page_title = 'Mens Erger Je Niet';
include __DIR__ . '/tpl/headG.php';
$getName = $_GET['name'];
?>

<div class="reset-button btn btn-danger" id="reset" type="button">
    Reset game
</div>

<div class="top">
    <button class="round_blue pawn" id="home_1"></button>
    <button class="round_blue pawn" id="home_2"></button>
    <button class="round_inv"></button>
    <button class="round_inv"></button>
    <button class="round finish_green" id="p39"></button>
    <button class="round finish_green" id="p40"></button>
    <button class="static_green" id="p1"></button>
    <button class="round_inv"></button>
    <button class="round_inv"></button>
    <button class="round_green pawn" id="home_5"></button>
    <button class="round_green pawn" id="home_6"></button>
</div>

<div class="top">
    <button class="round_blue pawn" id="home_3"></button>
    <button class="round_blue pawn" id="home_4"></button>
    <button class="round_inv"></button>
    <button class="round_inv"></button>
    <button class="round finish_green" id="p38"></button>
    <button class="static_green" id="g1"></button>
    <button class="round" id="p2"></button>
    <button class="round_inv"></button>
    <button class="round_inv"></button>
    <button class="round_green pawn" id="home_7"></button>
    <button class="round_green pawn" id="home_8"></button>
</div>

<div class="top">
    <button class="round_inv"></button>
    <button class="round_inv"></button>
    <button class="round_inv"></button>
    <button class="round_inv"></button>
    <button class="round" id="p37"></button>
    <button class="static_green" id="g2"></button>
    <button class="round" id="p3"></button>
    <button class="round_inv"></button>
    <button class="round_inv"></button>
    <button class="round_inv"></button>
    <button class="round_inv"></button>
</div>

<div class="top">
    <button class="round_inv"></button>
    <button class="round_inv"></button>
    <button class="round_inv"></button>
    <button class="round_inv"></button>
    <button class="round" id="p36"></button>
    <button class="static_green" id="g3"></button>
    <button class="round" id="p4"></button>
    <button class="round_inv"></button>
    <button class="round_inv"></button>
    <button class="round_inv"></button>
    <button class="round_inv"></button>
</div>

<div class="top">
    <button class="static_blue" id="p31"></button>
    <button class="round" id="p32"></button>
    <button class="round" id="p33"></button>
    <button class="round" id="p34"></button>
    <button class="round" id="p35"></button>
    <button class="static_green" id="g4"></button>
    <button class="round" id="p5"></button>
    <button class="round" id="p6"></button>
    <button class="round" id="p7"></button>
    <button class="round finish_yellow" id="p8"></button>
    <button class="round finish_yellow" id="p9"></button>
</div>

<div class="top">
    <button class="round finish_blue" id="p30"></button>
    <button class="static_blue" id="b1"></button>
    <button class="static_blue" id="b2"></button>
    <button class="static_blue" id="b3"></button>
    <button class="static_blue" id="b4"></button>
    <button class="round_inv"></button>
    <button class="static_yellow" id="y4"></button>
    <button class="static_yellow" id="y3"></button>
    <button class="static_yellow" id="y2"></button>
    <button class="static_yellow" id="y1"></button>
    <button class="round finish_yellow" id="p10"></button>
</div>

<div class="top">
    <button class="round finish_blue" id="p29"></button>
    <button class="round finish_blue" id="p28"></button>
    <button class="round" id="p27"></button>
    <button class="round" id="p26"></button>
    <button class="round" id="p25"></button>
    <button class="static_red" id="r4"></button>
    <button class="round" id="p15"></button>
    <button class="round" id="p14"></button>
    <button class="round" id="p13"></button>
    <button class="round" id="p12"></button>
    <button class="static_yellow" id="p11"></button>
</div>

<div class="top">
    <button class="round_inv"></button>
    <button class="round_inv"></button>
    <button class="round_inv"></button>
    <button class="round_inv"></button>
    <button class="round" id="p24"></button>
    <button class="static_red" id="r3"></button>
    <button class="round" id="p16"></button>
    <button class="round_inv"></button>
    <button class="round_inv"></button>
    <button class="round_inv"></button>
    <button class="round_inv"></button>
</div>

<div class="top">
    <button class="round_inv"></button>
    <button class="round_inv"></button>
    <button class="round_inv"></button>
    <button class="round_inv"></button>
    <button class="round" id="p23"></button>
    <button class="static_red" id="r2"></button>
    <button class="round" id="p17"></button>
    <button class="round_inv"></button>
    <button class="round_inv"></button>
    <button class="round_inv"></button>
    <button class="round_inv"></button>
</div>

<div class="top">
    <button class="round_red" id="home_9"></button>
    <button class="round_red" id="home_10"></button>
    <button class="round_inv"></button>
    <button class="round_inv"></button>
    <button class="round" id="p22"></button>
    <button class="static_red" id="r1"></button>
    <button class="round finish_red" id="p18"></button>
    <button class="round_inv"></button>
    <button class="round_inv"></button>
    <button class="round_yellow" id="home_13"></button>
    <button class="round_yellow" id="home_14"></button>
</div>

<div class="top">
    <button class="round_red" id="home_11"></button>
    <button class="round_red" id="home_12"></button>
    <button class="round_inv"></button>
    <button class="round_inv"></button>
    <button class="static_red" id="p21"></button>
    <button class="round finish_red" id="p20"></button>
    <button class="round finish_red" id="p19"></button>
    <button class="round_inv"></button>
    <button class="round_inv"></button>
    <button class="round_yellow" id="home_13"></button>
    <button class="round_yellow" id="home_14"></button>
</div>

<div>
    <p id="checkTurn"></p>
</div>

<div class="sidenav">
    <h5> Current players are:</h5>
    <table class="table">
        <tr>
            <th>Player</th>
            <td id="player1Name"></td>
            <td id="player2Name"></td>
        </tr>
        <tr>
            <th>Color</th>
            <td class="teamBlue">Blue</td>
            <td class="teamGreen">Green</td>
        </tr>
        <tr>
            <th>Wins</th>
            <td id="wins1">
            </td>
            <td id="wins2">
            </td>
        </tr>
    </table>
    <div id="yourturn">
        Your turn!
    </div>
</div>

<div class="dice-div">
    <div id="dice-roll">
        <input type="image" class="dice" id="dice" src="img/dice6.png" alt="">
        <input type="image" id="square" src="img/square.png" disabled alt="">
    </div>

    <div id="dice-text">

    </div>
    <div id="move-pawn">
        Click a pawn to move it!
    </div>
    <div id="six">
        You need a six!
    </div>
</div>

<div>
    <h1 class="rules-header">
        Hover over me to see the rules
    </h1>
    <div id="rules">
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
    <p>
        You can reach the finish when a pawn lands on one of the three finishing places.
    </p>
    <p>
        You can recognize your finish places by your color, light blue spots for team blue and light green spots for team green.
        If your pawn goes past all these places, you unfortunately have to do another round!
    </p>
    </div>
</div>