$(".movie-tickets .ticket-row").sort(function (a, b) {
    return new Date($(".date", a).data("date")) - new Date($(".date", b).data("date"));
}).appendTo(".movie-tickets");