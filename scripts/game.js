function movePawn(id) {
    if($("#p"+id).hasClass("pawn")){
        $("#p"+id).addClass("round_green");
    }
}

$(function() {

    $('#dice').click(function () {
        const abba = window.location.search;
        const urlParams = new URLSearchParams(abba);
        const pname = urlParams.get('name')
        var dice_result = Math.floor(Math.random() * 6)+1;
        $('#dice').attr('src', "img/dice" + dice_result + ".png")
        $("#dice-text").html("You rolled: " + dice_result);
        if(dice_result === 6){
            // Hier moet iets komen van, wil je een nieuwe pion opzetten
            let request = $.ajax({
                url: "http://localhost/Project/move.php",
                method: "POST",
                data: {
                    "rolled" : dice_result,
                    "name" : pname
                },
                dataType: "json"
            });
            //request.done(function(data){
                //console.log(data);
            //});
        }
    });
});

(function worker2() {
    $.ajax({
        url: 'data/gamestate.json',
        success: function(data) {
            if(data["field"].p31 === "blue"){
                $("#p31").html("").addClass("round_blue pawn");
            }

        },
        complete: function() {
            // Schedule the next request when the current one's complete
            setTimeout(worker2, 1000);
        }
    });
})();