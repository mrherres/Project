

$(function() {
    print_latest_news();
    window.setInterval(function () {
        print_latest_news();
    }, 5000);
});