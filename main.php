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
            <td id="status1"><button class="btn btn-danger" disabled>Not Ready</button></td>
        </tr>
        <tr>
            <td id="player2Name"></td>
            <td id="status2"><button class="btn btn-danger" disabled>Not Ready</button></td>
        </tr>
    </table>
</div>
</div>
</div>
</div>

<div class="top"> <!-- This is the top row -->
    <button class="round"></button>
    <button class="round"></button>
    <button class="round"></button>
    <button class="round"></button>
    <button class="round blue"></button>
</div>

<div class="vertical">
    <button class="round divide"></button>
    <button class="round right"></button>
</div>

<div class="vertical">
    <button class="round divide"></button>
    <button class="round right"></button>
</div>

<div class="vertical">
    <button class="round divide"></button>
    <button class="round right"></button>
</div>

<div class="middle">
    <button class="round"></button>
    <button class="round"></button>
    <button class="round"></button>
    <button class="round"></button>
    <button class="round divide"></button>
    <button class="round"></button>
    <button class="round"></button>
    <button class="round"></button>
    <button class="round"></button>
    <button class="round"></button>
</div>

<div class="vertical">
    <button class="round split"></button>
    <button class="round"></button>
</div>

