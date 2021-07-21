$(function() {
    setInterval(worker3, 200);
    setInterval(worker4, 200);
    setInterval(worker5, 200);
});

// This function lets the player roll the dice.
// When the result is not 6 and there are no active pawns on the board from that player,
// the turn will be passed on. Otherwise, if they throw 6 but there are still pawns to be spawned,
// the game will automatically spawn a new pawn, if possible.
$(function() {
    $('#dice').click(function () {
        const abba = window.location.search;
        const urlParams = new URLSearchParams(abba);
        const pname = urlParams.get('name');
        const playerturn = $("#checkTurn").html();
        const dice_result = Math.floor(Math.random() * 6) + 1;
        $('#dice').attr('src', "img/dice" + dice_result + ".png").prop('disabled', true);
        $("#dice-text").html("You rolled: " + dice_result);
        $("#dice-text").css("visibility", "visible");
        $("#move-pawn").css("visibility", "visible");
        $(".round, .static_blue, .static_green, .static_yellow, .static_red").prop("disabled", false);
        if(dice_result === 6){
            $("#six").css("visibility", "hidden")
            $.ajax({
                url: "scripts/spawn.php",
                method: "POST",
                data: {
                    "rolled" : dice_result,
                    "name" : pname
                },
                dataType: "json"
            });
        }
        else if(playerturn === "1" && $(".pawnb").hasClass("inPlay")){
            // Statement is empty, since the player may now move a pawn
        }
        else if(playerturn === "2" && $(".pawng").hasClass("inPlay")) {
            // Statement is empty, since the player may now move a pawn
        }
        else {
            $("#six").css("visibility", "visible")
            $.ajax({
                url: "scripts/notSix.php",
                method: "POST",
                data: {
                    "rolled" : dice_result,
                    "name" : pname
                },
                dataType: "json"
            });
        }
    });
});

// This function is to make sure that the player can move their pawn, but only their pawns.
$(function() {
    $('.round, .static_blue, .static_green, .static_red, .static_yellow').click(function () {
        const abba = window.location.search;
        const urlParams = new URLSearchParams(abba);
        const thrown = $("#dice-text").text();
        const throwns = thrown.slice(-1);
        const pname = urlParams.get('name');
        const playerturn = $("#checkTurn").html();
        $("#dice-text").css("visibility", "hidden");

        let Pos = $(this).attr("id");
        if(playerturn === "1" && $(this).hasClass("pawnb")){
            let currentPosB = Pos.substring(1);
            let currentPosG = "00";
            $.ajax({
                url: "scripts/move.php",
                method: "POST",
                data: {
                    "rolled": throwns,
                    "name": pname,
                    "posB": currentPosB,
                    "posG": currentPosG
                },
                dataType: "json"
            });
        }
        else if(playerturn === "2" && $(this).hasClass("pawng")){
            let currentPosB = "00";
            let currentPosG = Pos.substring(1);
            $.ajax({
                url: "scripts/move.php",
                method: "POST",
                data: {
                    "rolled": throwns,
                    "name": pname,
                    "posB": currentPosB,
                    "posG": currentPosG
                },
                dataType: "json"
            });
        }
    });
});

// Function to reset the whole game, e.g. all json files.
$(function() {
    $('.reset-button').click(function () {
        $.get('scripts/reset.php', function (data) {
        })
    });
});

// This function checks when to go back to the main screen (when the reset button is pressed)
// It also tracks the names and wins of the players
function worker3() {
    const abba = window.location.search;
    const urlParams = new URLSearchParams(abba);
    const pname = urlParams.get('name');
    $.ajax({
        url: 'scripts/getPlayers.php',
        method: 'POST',
        dataType: "json"
    })
        .done(function (data) {
            if (data["player1"]["status"] === "reset" && data["player2"]["status"] === "reset") {
                document.location.href = "../Project/index.php";
            }
            else if(data["player1"]["status"] === "unready" && data["player2"]["status"] === "unready"){
                document.location.href = "main.php?name=" + pname
            }
            $('#player1Name').html(data["player1"].name);
            $('#player2Name').html(data["player2"].name);
            $('#wins1').html(data["player1"].wins);
            $('#wins2').html(data["player2"].wins);
        });
}


// This function checks multiple things;
//  - Displaying/hiding the die
//  - Displaying the pawn(s) if they should be in the base
//  - Display and update the movements of the pawns
//  - Remove/add pawns from/to their base, when they are played or thrown off
//    and adjust the json accordingly
function worker5() {
    $.ajax({
        url:"scripts/getGamestate.php",
        method:"POST",
        dataType: "json"
    })
        .done(function (data){
            const abba = window.location.search;
            const urlParams = new URLSearchParams(abba);
            const pturn = urlParams.get('turn');
            const jsonturn = data["information"]["status"];

            $("#checkTurn").html(jsonturn);

            if (data['information'].status === pturn) {
                $("#dice").css("display", "inline");
                $("#yourturn").html(
                    "<p>Your turn!</p>" +
                    "<p>Click the dice to roll!</p>"
                );
            }
            else{
                $("#dice").hide().prop('disabled', false);
                $("#move-pawn").css("visibility", "hidden");
                $("#yourturn").html("Opponent playing!");
                $(".round, .static_blue, .static_green, .static_yellow, .static_red").prop("disabled", true);
            }
            for (let i in data["finish"]){
                let item = data["finish"][i];
                if(item === "inB") {
                    $("#"+i).addClass("round_blue pawnb")
                }
                else if(item === "inG"){
                    $("#"+i).addClass("round_green pawng")
                }
                else if(i === "b1" || i === "b2" || i === "b3" || i === "b4"){
                    $("#"+i).addClass("static_blue").removeClass("round_green pawng round_blue pawnb")
                }
                else{
                    $("#"+i).addClass("static_green").removeClass("round_green pawng round_blue pawnb")
                }
            }
            for (let i in data["field"]) {
                let item = data["field"][i];
                if (item === "blue" && $("#"+i).hasClass("round_green pawng")) {
                    $("#"+i).addClass("round_blue pawnb inPlay").removeClass("round_green pawng");
                    $.ajax({
                        url: "scripts/throw.php",
                        method: "POST",
                        data: {
                            "color": item
                        },
                        dataType: "json"
                    });
                }
                else if (item === "blue") {
                    $("#"+i).addClass("round_blue pawnb inPlay").removeClass("round_green");
                }
                else if (item === "green" && $("#"+i).hasClass("round_blue pawnb")){
                    $("#"+i).addClass("round_green pawng inPlay").removeClass("round_blue pawnb");
                    $.ajax({
                        url: "scripts/throw.php",
                        method: "POST",
                        data: {
                            "color": item
                        },
                        dataType: "json"
                    });
                }
                else if(item === "green") {
                    $("#"+i).addClass("round_green pawng inPlay");
                }
                else if(item === "empty") {
                    $("#"+i).removeClass("round_blue round_green pawnb pawng inPlay");
                }
            }
            if(data["pawns"]["blue"] === 4){
                $("#home_1").addClass("round").removeClass("round_blue");
                $("#home_2").addClass("round").removeClass("round_blue");
                $("#home_3").addClass("round").removeClass("round_blue");
                $("#home_4").addClass("round").removeClass("round_blue");
            }
            else if(data["pawns"]["blue"] === 3){
                $("#home_1").addClass("round").removeClass("round_blue");
                $("#home_2").addClass("round").removeClass("round_blue");
                $("#home_3").addClass("round").removeClass("round_blue");
                $("#home_4").addClass("round_blue").removeClass("round");
            }
            else if(data["pawns"]["blue"] === 2){
                $("#home_1").addClass("round").removeClass("round_blue");
                $("#home_2").addClass("round").removeClass("round_blue");
                $("#home_3").addClass("round_blue").removeClass("round");
                $("#home_4").addClass("round_blue").removeClass("round");
            }
            else if(data["pawns"]["blue"] === 1){
                $("#home_1").addClass("round").removeClass("round_blue");
                $("#home_2").addClass("round_blue").removeClass("round");
                $("#home_3").addClass("round_blue").removeClass("round");
                $("#home_4").addClass("round_blue").removeClass("round");
            }
            else if(data["pawns"]["blue"] === 0){
                $("#home_1").addClass("round_blue").removeClass("round");
                $("#home_2").addClass("round_blue").removeClass("round");
                $("#home_3").addClass("round_blue").removeClass("round");
                $("#home_4").addClass("round_blue").removeClass("round");
            }

            if(data["pawns"]["green"] === 4){
                $("#home_5").addClass("round").removeClass("round_green");
                $("#home_6").addClass("round").removeClass("round_green");
                $("#home_7").addClass("round").removeClass("round_green");
                $("#home_8").addClass("round").removeClass("round_green");
            }
            else if(data["pawns"]["green"] === 3){
                $("#home_5").addClass("round").removeClass("round_green");
                $("#home_6").addClass("round").removeClass("round_green");
                $("#home_7").addClass("round").removeClass("round_green");
                $("#home_8").addClass("round_green").removeClass("round");
            }
            else if(data["pawns"]["green"] === 2){
                $("#home_5").addClass("round").removeClass("round_green");
                $("#home_6").addClass("round").removeClass("round_green");
                $("#home_7").addClass("round_green").removeClass("round");
                $("#home_8").addClass("round_green").removeClass("round");
            }
            else if(data["pawns"]["green"] === 1){
                $("#home_5").addClass("round").removeClass("round_green");
                $("#home_6").addClass("round_green").removeClass("round");
                $("#home_7").addClass("round_green").removeClass("round");
                $("#home_8").addClass("round_green").removeClass("round");

            }
            else if(data["pawns"]["green"] === 0){
                $("#home_5").addClass("round_green").removeClass("round");
                $("#home_6").addClass("round_green").removeClass("round");
                $("#home_7").addClass("round_green").removeClass("round");
                $("#home_8").addClass("round_green").removeClass("round");
            }
        });
}

// This function will check whether or not someone has 4 pawns in their base
function worker4() {
    $.ajax({
        url: 'scripts/finish.php',
        method: 'POST',
        dataType: "json"
    })
}
