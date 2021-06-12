(function worker1() {
    $.ajax({
        url: 'data/players.json',
        success: function(data) {
            $('#player1Name').html(data["player1"].name);
        },
        error: function() {
            $('#player1Name').html("Not Available");
        },
        complete: function() {
            // Schedule the next request when the current one's complete
            setTimeout(worker1, 5000);
        }
    });
})();

(function worker2() {
    $.ajax({
        url: 'data/players.json',
        success: function(data) {
            $('#player2Name').html(data["player2"].name);
            //console.log($('#player2Name').text());
        },
        error: function() {
            $('#player2Name').html("Waiting for player");
        },
        complete: function() {
            // Schedule the next request when the current one's complete
            setTimeout(worker2, 5000);
        }
    });
})();

(function worker3() {
    $.ajax({
        url: 'data/players.json',
        success: function(data) {
            const abba = window.location.search;
            const urlParams = new URLSearchParams(abba);
            const pname = urlParams.get('name');
            if(pname === data["player1"].name) {
                if (data["player1"].status === "unready") {
                    $("#status1").empty();
                    $("#status1").html('<form action="ready1.php" method="post"><input type="submit" class="btn btn-danger" value="Not Ready"/></form>');
                } else if (data["player1"].status === "ready") {
                    $("#status1").empty();
                    $("#status1").html('<form action="ready1.php" method="post"><input type="submit" class="btn btn-success" value="Ready"/></form>');
                }
                if (data["player2"].status === "unready") {
                    $("#status2").empty();
                    $("#status2").html('<form action="ready1.php" method="post"><input type="submit" class="btn btn-danger" value="Not Ready" disabled/></form>');
                }
                else if (data["player2"].status === "ready") {
                    $("#status2").empty();
                    $("#status2").html('<form action="ready1.php" method="post"><input type="submit" class="btn btn-success" value="Ready" disabled/></form>');
                }
            }
            else{
                    if (data["player2"].status === "unready") {
                        $("#status2").empty();
                        $("#status2").html('<form action="ready2.php" method="post"><input type="submit" class="btn btn-danger" value="Not Ready"/></form>');
                    } else if (data["player2"].status === "ready") {
                        $("#status2").empty();
                        $("#status2").html('<form action="ready2.php" method="post"><input type="submit" class="btn btn-success" value="Ready"/></form>');
                    }
                    if (data["player1"].status === "unready") {
                        $("#status1").empty();
                        $("#status1").html('<form action="ready2.php" method="post"><input type="submit" class="btn btn-danger" value="Not Ready" disabled/></form>');
                    }
                    else if (data["player1"].status === "ready") {
                        $("#status1").empty();
                        $("#status1").html('<form action="ready2.php" method="post"><input type="submit" class="btn btn-success" value="Ready" disabled/></form>');
                    }
            }
        },
        error: function() {
            console.log("dikke vette pech");
        },
        complete: function() {
            // Schedule the next request when the current one's complete
            setTimeout(worker3, 2000);
        }
    });
})();

(function worker4() {
    $.ajax({
        url: 'data/players.json',
        success: function(data) {
            const abba = window.location.search;
            const urlParams = new URLSearchParams(abba);
            const pname = urlParams.get('name');
            if(data["player1"].status === "ready" && data["player2"].status === "ready"){
                if(data["player1"].name === pname){
                    document.location.href = "http://localhost/Project/game.php?name=" + pname + "&turn=" + 1;
                }
                else{document.location.href = "http://localhost/Project/game.php?name=" + pname + "&turn=" + 2;}
            }
        },
        complete: function() {
            // Schedule the next request when the current one's complete
            setTimeout(worker4, 2000);
        }
    });
})();