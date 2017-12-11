var theatres,
    count,
    num,
    body = $('body'),
    movietickets = $('.movie-tickets'),
    mainHeader = $('header');

$(document).ready(function() {

  // Open modal
  $('.open-info-modal').click(function() {
    $('.info-modal').removeClass('close-info-modal');
    body.addClass('stop-scroll');
    body.addClass('disable-scrolling');
  });

  // Close modal
  $('.info-modal-close').click(function() {
    $('.info-modal').addClass('close-info-modal');
    body.removeClass('stop-scroll');
    body.removeClass('disable-scrolling');
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
        var date = new Date(0);
        date.setUTCSeconds(item.data_date);
        day = moment(date).format("MMMM Do YYYY");
        movietickets.append(
          "<div class='ticket-row'>" +
            "<div class='ticket-col'>" +
              "<h2>" + item.title + "</h2><span class='theatres' data-theatre='" + item.theatre + "'>" + item.theatre + "</span>" +
            "</div>" +
            "<div class='ticket-col'>" +
              "<h4 class='date' data-date='" + item.data_date + "'>" + day + "</h4>" +
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
      $('span.theatres').each(function() {
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



  /* Headroom.js settings
    ========================================================================== */

  mainHeader.headroom({
    offset    : 0,
    tolerance   : 0,
    classes : {
      pinned   : "pinned",
      unpinned : "unpinned",
      top      : "onTop",
      bottom   : "onBottom",
      notTop   : "scrolled"
    },
  	onUnpin : function() {
  		if ( mainHeader.hasClass('open') ) {
  			mainHeader.removeClass('unpinned');
  		}
  	},
    onTop : function() {
      mainHeader.removeClass('pinned');
    }
  });



});
