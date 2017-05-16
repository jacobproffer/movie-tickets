$(".movie-tickets .ticket-row").sort(function (a, b) {
    return new Date($(".date", a).data("date")) - new Date($(".date", b).data("date"));
}).appendTo(".movie-tickets");

var num = $(".ticket-row").length;
var date = $(".info-col[data-theatre='thomas theatre group']").length;

$(".numMovies h1").html(" " + num);
