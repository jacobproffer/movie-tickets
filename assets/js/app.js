// Sort movies by epoch date
$(".movie-tickets .ticket-row").sort(function (a, b) {
    return new Date($(".date", b).data("date")) - new Date($(".date", a).data("date"));
}).appendTo(".movie-tickets");

// Count number of movies
var num = $(".ticket-row").length;
$(".numMovies span").html(" " + num);

// Open modal
$('.open-info-modal').click(function() {
  $('.info-modal').removeClass('close-info-modal');
});

// Close modal
$('.info-modal-close').click(function() {
  $('.info-modal').addClass('close-info-modal');
});
