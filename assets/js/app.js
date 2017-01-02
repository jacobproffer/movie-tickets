// I'd prefer to do this with vanilla JavaScript
// I'd prefer to sort year by XX/XX/XXXX instead of XXXX

// var $movies = $('.movie-tickets');
// $movies.find('.ticket-row').sort(function(a, b) {
//     return +a.dataset.year - +b.dataset.year;
// })
// .appendTo($movies);

$(".movie-tickets .ticket-row").sort(function (a, b) {
    return new Date($(".date", a).data("date")) - new Date($(".date", b).data("date"));
}).appendTo(".movie-tickets");