$(function() {
    setInterval(worker1, 200);
});

function worker1() {
    $.ajax({
        url: 'scripts/getPlayers.php',
        method: 'POST',
        dataType: "json"
    })
        .done(function (data) {
            const abba = window.location.search;
            const urlParams = new URLSearchParams(abba);
            const pname = urlParams.get('name');
            $('#player1Name').html(data["player1"].name);
            $('#player2Name').html(data["player2"].name);
            if (data["player1"].status === "unready") {
                $("#status1").empty();
                $("#status1").html('<button class="btn btn-danger" disabled>Not Ready</button>');
            }
            else if (data["player1"].status === "ready") {
                $("#status1").empty();
                $("#status1").html('<button class="btn btn-success" disabled>Ready</button>');
            }
            if (data["player2"].status === "unready") {
                $("#status2").empty();
                $("#status2").html('<button class="btn btn-danger" disabled>Not Ready</button>');
            }
            else if (data["player2"].status === "ready") {
                $("#status2").empty();
                $("#status2").html('<button class="btn btn-success" disabled>Ready</button>');
            }
            if(data["player1"].status === "ready" && data["player2"].status === "ready"){
                if(data["player1"].name === pname){
                    document.location.href = "http://localhost/Project/game.php?name=" + pname + "&turn=" + 1;
                }
                else{document.location.href = "http://localhost/Project/game.php?name=" + pname + "&turn=" + 2;}
            }})
        }

$(function() {
    $('.reset-button').click(function () {
        $.get('scripts/resetPlayer.php', function (data) {
            console.log(data)
        })
    });
});