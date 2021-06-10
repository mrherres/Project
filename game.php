<?php
/* Header */
$page_title = 'Mens Erger Je Niet';
#$navigation = Array(
#'active' => 'Main',
#'items' => Array(
#'Simple Form' => '/Project/simple_form.php'
#)
#);
include __DIR__ . '/tpl/headG.php';
include __DIR__ . '/tpl/body_start.php';
$getName = $_GET['name'];
?>
</div>
</div>
</div>

<div class="top">
    <button class="round_blue" id="home_1">h1</button>
    <button class="round_blue" id="home_2">h2</button>
    <button class="round_inv"></button>
    <button class="round_inv"></button>
    <button class="round" onclick="movePawn(39)" id="p39">p39</button>
    <button class="round" onclick="movePawn(40)" id="p40">p40</button>
    <button class="round_green" id="p1">p1</button>
    <button class="round_inv"></button>
    <button class="round_inv"></button>
    <button class="round_green" id="home_5">h5</button>
    <button class="round_green" id="home_6">h6</button>
</div>

<div class="top">
    <button class="round_blue" id="home_3">h3</button>
    <button class="round_blue" id="home_4">h4</button>
    <button class="round_inv"></button>
    <button class="round_inv"></button>
    <button class="round" onclick="movePawn(38)" id="p38">p38</button>
    <button class="round_green" id="gfinish_1">f1</button>
    <button class="round" onclick="movePawn(2)" id="p2">p2</button>
    <button class="round_inv"></button>
    <button class="round_inv"></button>
    <button class="round_green" id="home_7">h7</button>
    <button class="round_green" id="home_8">h8</button>
</div>

<div class="top">
    <button class="round_inv"></button>
    <button class="round_inv"></button>
    <button class="round_inv"></button>
    <button class="round_inv"></button>
    <button class="round" onclick="movePawn(37)" id="p37">p37</button>
    <button class="round_green" id="gfinish_2">f2</button>
    <button class="round" onclick="movePawn(3)" id="p3">p3</button>
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
    <button class="round" onclick="movePawn(36)" id="p36">p36</button>
    <button class="round_green" id="gfinish_3">f3</button>
    <button class="round" onclick="movePawn(4)" id="p4">p4</button>
    <button class="round_inv"></button>
    <button class="round_inv"></button>
    <button class="round_inv"></button>
    <button class="round_inv"></button>
</div>

<div class="top">
    <button class="round_blue" onclick="movePawn(31)" id="p31">p31</button>
    <button class="round" onclick="movePawn(32)" id="p32">p32</button>
    <button class="round" onclick="movePawn(33)" id="p33">p33</button>
    <button class="round" onclick="movePawn(34)" id="p34">p34</button>
    <button class="round" onclick="movePawn(35)" id="p35">p35</button>
    <button class="round_green" id="gfinish_4">f4</button>
    <button class="round" onclick="movePawn(5)" id="p5">p5</button>
    <button class="round" onclick="movePawn(6)" id="p6">p6</button>
    <button class="round" onclick="movePawn(7)" id="p7">p7</button>
    <button class="round" onclick="movePawn(8)" id="p8">p8</button>
    <button class="round" onclick="movePawn(9)" id="p9">p9</button>
</div>

<div class="top">
    <button class="round" onclick="movePawn(30)" id="p30">p30</button>
    <button class="round_blue" id="bfinish_1">f1</button>
    <button class="round_blue" id="bfinish_2">f2</button>
    <button class="round_blue" id="bfinish_3">f3</button>
    <button class="round_blue" id="bfinish_4">f4</button>
    <button class="round_inv"></button>
    <button class="round_yellow" id="yfinish_4">f4</button>
    <button class="round_yellow" id="yfinish_3">f3</button>
    <button class="round_yellow" id="yfinish_2">f2</button>
    <button class="round_yellow" id="yfinish_1">f1</button>
    <button class="round" onclick="movePawn(10)" id="p10">p10</button>
</div>

<div class="top">
    <button class="round" onclick="movePawn(29)" id="p29">p29</button>
    <button class="round" onclick="movePawn(28)" id="p28">p28</button>
    <button class="round" onclick="movePawn(27)" id="p27">p27</button>
    <button class="round" onclick="movePawn(26)" id="p26">p26</button>
    <button class="round" onclick="movePawn(25)" id="p25">p25</button>
    <button class="round_red" id="rfinish_4">f4</button>
    <button class="round" onclick="movePawn(15)" id="p15">p15</button>
    <button class="round" onclick="movePawn(14)" id="p14">p14</button>
    <button class="round" onclick="movePawn(13)" id="p13">p13</button>
    <button class="round" onclick="movePawn(12)" id="p12">p12</button>
    <button class="round_yellow" onclick="movePawn(11)" id="p11">p11</button>
</div>

<div class="top">
    <button class="round_inv"></button>
    <button class="round_inv"></button>
    <button class="round_inv"></button>
    <button class="round_inv"></button>
    <button class="round" onclick="movePawn(24)" id="p24">p24</button>
    <button class="round_red" id="rfinish_3">f3</button>
    <button class="round" onclick="movePawn(16)" id="p16">p16</button>
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
    <button class="round" onclick="movePawn(23)" id="p23">p23</button>
    <button class="round_red" id="rfinish_2">f2</button>
    <button class="round" onclick="movePawn(17)" id="p17">p17</button>
    <button class="round_inv"></button>
    <button class="round_inv"></button>
    <button class="round_inv"></button>
    <button class="round_inv"></button>
</div>

<div class="top">
    <button class="round_red" id="home_9">h9</button>
    <button class="round_red" id="home_10">h10</button>
    <button class="round_inv"></button>
    <button class="round_inv"></button>
    <button class="round" onclick="movePawn(22)" id="p22">p22</button>
    <button class="round_red" id="rfinish_1">f1</button>
    <button class="round" onclick="movePawn(18)" id="p18">p18</button>
    <button class="round_inv"></button>
    <button class="round_inv"></button>
    <button class="round_yellow" id="home_13">h13</button>
    <button class="round_yellow" id="home_14">h14</button>
</div>

<div class="top">
    <button class="round_red" id="home_11">h11</button>
    <button class="round_red" id="home_12">h12</button>
    <button class="round_inv"></button>
    <button class="round_inv"></button>
    <button class="round_red" onclick="movePawn(21)" id="p21">p21</button>
    <button class="round" onclick="movePawn(20)" id="p20">p20</button>
    <button class="round" onclick="movePawn(19)" id="p19">p19</button>
    <button class="round_inv"></button>
    <button class="round_inv"></button>
    <button class="round_yellow" id="home_13">h15</button>
    <button class="round_yellow" id="home_14">h16</button>
</div>
