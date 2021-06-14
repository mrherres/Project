//function movePawn(id) {
  //  if($("#p"+id).hasClass("pawn")){
    //    $("#p"+id).addClass("round_green");
    //}
//}

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
            // Hier moet iets komen van, wil je een nieuwe pion opzetten
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
        else {
            let PosB = $(".round_blue.pawn.inPlay").attr("id");
            let PosG = $(".round_green.pawn.inPlay").attr("id");
            if ((PosB === undefined && pturn === "1") || (PosG === undefined && pturn === "2")) {
                console.log("You need a 6 sit1! " + pturn);
                let request = $.ajax({
                    url: "http://localhost/Project/notSix.php"
                });
                request.done(function(){
                    console.log("Fired the php!");
                });
            }
            else if(pturn ==="2"){
                let currentPosB = "00";
                let currentPosG = PosG.substring(1);
                let request = $.ajax({
                    url: "http://localhost/Project/move.php",
                    method: "POST",
                    data: {
                        "rolled": dice_result,
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
            else if(pturn ==="1"){
                let currentPosB = PosB.substring(1);
                let currentPosG = "00";
                let request = $.ajax({
                    url: "http://localhost/Project/move.php",
                    method: "POST",
                    data: {
                        "rolled": dice_result,
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
            else {
                let currentPosB = PosB.substring(1);
                let currentPosG = PosG.substring(1);
                let request = $.ajax({
                    url: "http://localhost/Project/move.php",
                    method: "POST",
                    data: {
                        "rolled": dice_result,
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
        }
    });
});

$(function() {
    $('.inPlay').click(function () {
        const abba = window.location.search;
        const urlParams = new URLSearchParams(abba);
        const pname = urlParams.get('name');
        const pturn = urlParams.get('turn');
        console.log("clicked");
    });
});

(function worker2() {
    $.ajax({
        url: 'data/gamestate.json',
        success: function(data) {
            //let i;
            for (let i in data["field"]) {
                let item = data["field"][i];
                if (item === "blue") {
                    $("#"+i).addClass("round_blue pawn inPlay").removeClass("round_green");
                }
                else if(item === "empty") {
                    $("#"+i).removeClass("round_blue round_green pawn inPlay");
                }
                else{
                    $("#"+i).addClass("round_green pawn inPlay").removeClass("round_blue");
                }
            }
            const abba = window.location.search;
            const urlParams = new URLSearchParams(abba);
            const pturn = urlParams.get('turn')
            if (data['information'].status === pturn) {
                $("#dice").css("display", "inline");
                //$("#dice-text").css("display", "inline");
            }
            else{
                $("#dice").hide();
                //$("#dice-text").hide();
            }
        },
        complete: function() {
            // Schedule the next request when the current one's complete
            setTimeout(worker2, 1000);
        }
    });
})();