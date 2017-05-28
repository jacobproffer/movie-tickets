var theatres;
var count;
var num;

// Open modal
$('.open-info-modal').click(function() {
  $('.info-modal').removeClass('close-info-modal');
  $('body').addClass('stop-scroll');
});

// Close modal
$('.info-modal-close').click(function() {
  $('.info-modal').addClass('close-info-modal');
  $('body').removeClass('stop-scroll');
});

// Sort movies by epoch date
$(".movie-tickets .ticket-row").sort(function (a, b) {
    return new Date($(".date", b).data("date")) - new Date($(".date", a).data("date"));
}).appendTo(".movie-tickets");

// Count number of movies
num = $(".ticket-row").length;
$("#numOfMovies").html(" " + num);

// Count theatres
theatres = [];
$('h4.theatres').each(function() {
  theatres[$(this).attr('data-theatre')] = true;
});
count = [];
for( var i in theatres ) {
  count.push(i);
}
$('#numOfTheatres').html(" " + count.length);
