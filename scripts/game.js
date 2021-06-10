function movePawn(id) {
    if($("#p"+id).hasClass("pawn")){
        $("#p"+id).addClass("round_green");
    }
}

$(function() {

    $('#dice').click(function () {
        var dice_result = Math.floor(Math.random() * 6)+1;
        $('#dice').attr('src', "img/dice" + dice_result + ".png")
        $("#dice-text").html("You rolled:");
    });
});