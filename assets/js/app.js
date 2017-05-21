$(".movie-tickets .ticket-row").sort(function (a, b) {
    return new Date($(".date", b).data("date")) - new Date($(".date", a).data("date"));
}).appendTo(".movie-tickets");

var num = $(".ticket-row").length;

$(".numMovies span").html(" " + num);
