$(function() {

    $('#dice').click(function () {
        const abba = window.location.search;
        const urlParams = new URLSearchParams(abba);
        const pname = urlParams.get('name');
        const pturn = urlParams.get('turn');
        var dice_result = Math.floor(Math.random() * 6)+1;
        $('#dice').attr('src', "img/dice" + dice_result + ".png")
        $("#dice-text").html("You rolled: " + dice_result);
        if(dice_result === 6){
            let request = $.ajax({
                url: "http://localhost/Project/spawn.php",
                method: "POST",
                data: {
                    "rolled" : dice_result,
                    "name" : pname
                },
                dataType: "json"
            });
            request.done(function(data){
                console.log(data);
            });
        }
        else if(pturn === "1" && $(".pawnb").hasClass("inPlay")){
            console.log("Go on1");
        }
        else if(pturn === "2" && $(".pawng").hasClass("inPlay")) {
            console.log("Go on2");
        }
        else {
            console.log("You need a 6");
            let request = $.ajax({
                url: "http://localhost/Project/notSix.php",
                method: "POST",
                data: {
                    "rolled" : dice_result,
                    "name" : pname
                },
                dataType: "json"
            });
            request.done(function(data){
                console.log(data);
            });
        }
    });
});

$(function() {
    $('.round, .static_blue, .static_green, .static_red, .static_yellow').click(function () {
        const abba = window.location.search;
        const urlParams = new URLSearchParams(abba);
        const thrown = $("#dice-text").text();
        const throwns = thrown.slice(-1);
        const pname = urlParams.get('name');
        const pturn = urlParams.get('turn');
        let Pos = $(this).attr("id");
        if(pturn === "1" && $(this).hasClass("pawnb")){
            console.log(Pos.substring(1));
            //console.log(throwns);
            let currentPosB = Pos.substring(1);
            let currentPosG = "00";
            let request = $.ajax({
                url: "http://localhost/Project/move.php",
                method: "POST",
                data: {
                    "rolled": throwns,
                    "name": pname,
                    "posB": currentPosB,
                    "posG": currentPosG
                },
                dataType: "json"
            });
            request.done(function (data) {
                console.log(data);
            });
        }
        else if(pturn === "2" && $(this).hasClass("pawng")){
            let newPos = $(this).html();
            console.log(newPos);
            //console.log(throwns);
            let currentPosB = "00";
            let currentPosG = Pos.substring(1);
            let request = $.ajax({
                url: "http://localhost/Project/move.php",
                method: "POST",
                data: {
                    "rolled": throwns,
                    "name": pname,
                    "posB": currentPosB,
                    "posG": currentPosG
                },
                dataType: "json"
            });
            request.done(function (data) {
                console.log(data);
            });
        }
    });
});

(function worker2() {
    $.ajax({
        url: 'data/gamestate.json',
        success: function(data) {
            //let i;
            for (let i in data["field"]) {
                let item = data["field"][i];
                if (item === "blue" && $("#"+i).hasClass("round_green pawng")) {
                    $("#"+i).addClass("round_blue pawnb inPlay").removeClass("round_green pawng");
                    let request = $.ajax({
                        url: "http://localhost/Project/throw.php",
                        method: "POST",
                        data: {
                            "color": item
                        },
                        dataType: "json"
                    });
                    request.done(function (data) {
                        console.log(data);
                    });
                }
                else if (item === "blue") {
                    $("#"+i).addClass("round_blue pawnb inPlay").removeClass("round_green");
                }
                else if (item === "green" && $("#"+i).hasClass("round_blue pawnb")){
                    $("#"+i).addClass("round_green pawng inPlay").removeClass("round_blue pawnb");
                    let request = $.ajax({
                        url: "http://localhost/Project/throw.php",
                        method: "POST",
                        data: {
                            "color": item
                        },
                        dataType: "json"
                    });
                    request.done(function (data) {
                        console.log(data);
                    });
                }
                else if(item === "green") {
                    $("#"+i).addClass("round_green pawng inPlay");
                }
                else if(item === "empty") {
                    $("#"+i).removeClass("round_blue round_green pawnb pawng inPlay");
                }
            }
            for (let i in data["finish"]){
                let item = data["finish"][i];
                if(item === "inB") {
                    $("#"+i).addClass("round_blue pawnb")
                }
                else if(item === "inG"){
                    $("#"+i).addClass("round_green pawng")
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

            const abba = window.location.search;
            const urlParams = new URLSearchParams(abba);
            const pturn = urlParams.get('turn')
            if (data['information'].status === pturn) {
                $("#dice").css("display", "inline");
            }
            else{
                $("#dice").hide();
            }
        },
        complete: function() {
            // Schedule the next request when the current one's complete
            setTimeout(worker2, 3000);
        }
    });
})();

$(function() {
    $('.reset-button').click(function () {
        $.get('http://localhost/Project/reset.php', function (data) {
            console.log(data)
        })
    });
});

(function worker3() {
    $.ajax({
        url: 'data/players.json',
        success: function (data) {
            if(data["player1"]["status"] === "unready" && data["player2"]["status"] === "unready"){
                document.location.href = "http://localhost/Project/simple_form.php";
            }
        },
        complete: function() {
            // Schedule the next request when the current one's complete
            setTimeout(worker3, 3000);
        }
    });
})();