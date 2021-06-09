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
        },
        error: function() {
            $('#player2Name').html("Not Available");
        },
        complete: function() {
            // Schedule the next request when the current one's complete
            setTimeout(worker2, 5000);
        }
    });
})();