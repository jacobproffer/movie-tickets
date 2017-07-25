var theatres;
var count;
var num;
var movietickets = $('.movie-tickets');

// Open modal
$('.open-info-modal').click(function() {
  $('.info-modal').removeClass('close-info-modal');
  $('body').addClass('stop-scroll');
  $('body').addClass('disable-scrolling');
});

// Close modal
$('.info-modal-close').click(function() {
  $('.info-modal').addClass('close-info-modal');
  $('body').removeClass('stop-scroll');
  $('body').removeClass('disable-scrolling');
});

// Disable scrolling if modal is open
document.ontouchmove = function ( event ) {
  var isTouchMoveAllowed = true, target = event.target;
  while ( target !== null ) {
    if ( target.classList && target.classList.contains( 'disable-scrolling' ) ) {
      isTouchMoveAllowed = false;
      break;
    }
    target = target.parentNode;
  }
  if ( !isTouchMoveAllowed ) {
    event.preventDefault();
  }
};

$.getJSON( "json/movies.json" )
  .done(function( json ) {
    // Loop through data and output html
    $.each(json, function(i, item) {
      movietickets.append(
        "<div class='ticket-row'>" +
          "<div class='ticket-col'>" +
            "<h2>" + item.title + "</h2>" +
            "<h3 class='date' data-date='" + item.data_date + "'>" + item.date + "</h3>" +
          "</div>" +
          "<div class='ticket-col'>" +
            "<h4 class='theatres' data-theatre='" + item.theatre + "'>" + item.theatre + "</h4>" +
          "</div>" +
        "</div>"
      );
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
  })
  .fail(function( jqxhr, textStatus, error ) {
    var err = textStatus + ", " + error;
    console.log( "Request Failed: " + err );
});
