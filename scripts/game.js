function movePawn(id) {
    if($("#p"+id).hasClass("pawn")){
        $("#p"+id).addClass("round_green");
    }
}

$(function() {

    $('#dice').click(function () {
        var dice_result = Math.floor(Math.random() * 7);
        $("#dice-result").html("You rolled: "+dice_result);
    });
});