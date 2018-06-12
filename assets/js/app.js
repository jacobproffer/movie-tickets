var theatres;
var count;
var num;
var body = $("body");
var movietickets = $(".movie-tickets");
var mainHeader = $("header");
var ctx;
var chart;

$(document).ready(function() {
  $.getJSON("json/movies.json")
    .done(function(json) {
      // Loop through data and output html
      $.each(json, function(i, item) {
        var date = new Date(0);
        date.setUTCSeconds(item.data_date);
        day = moment(date).format("MMMM Do YYYY");
        movietickets.append(
          "<div class='grid ticket-row'>" +
            "<div class='ticket-col'>" +
            "<h2>" +
            item.title +
            "</h2><span class='theatres' data-theatre='" +
            item.theatre +
            "'>" +
            item.theatre +
            "</span>" +
            "</div>" +
            "<div class='ticket-col'>" +
            "<h4 class='date' data-date='" +
            item.data_date +
            "'>" +
            day +
            "</h4>" +
            "</div>" +
            "</div>"
        );
      });
      // Sort movies by epoch date
      $(".movie-tickets .ticket-row")
        .sort(function(a, b) {
          return (
            new Date($(".date", b).data("date")) -
            new Date($(".date", a).data("date"))
          );
        })
        .appendTo(".movie-tickets");
      // Count number of movies
      num = $(".ticket-row").length;
      $("#numOfMovies").html(" " + num);
      // Count theatres
      theatres = [];
      $("span.theatres").each(function() {
        theatres[$(this).attr("data-theatre")] = true;
      });
      count = [];
      for (var i in theatres) {
        count.push(i);
      }
      $("#numOfTheatres").html(" " + count.length);
    })
    .fail(function(jqxhr, textStatus, error) {
      var err = textStatus + ", " + error;
      console.log("Request Failed: " + err);
    });

  /* Headroom.js settings
    ========================================================================== */

  mainHeader.headroom({
    offset: 0,
    tolerance: 0,
    classes: {
      pinned: "pinned",
      unpinned: "unpinned",
      top: "onTop",
      bottom: "onBottom",
      notTop: "scrolled"
    },
    onUnpin: function() {
      if (mainHeader.hasClass("open")) {
        mainHeader.removeClass("unpinned");
      }
    },
    onTop: function() {
      mainHeader.removeClass("pinned");
    }
  });

  ctx = document.getElementById("chart").getContext("2d");
  chart = new Chart(ctx, {
    type: "line",
    data: {
      labels: [
        "2007",
        "2008",
        "2009",
        "2010",
        "2011",
        "2012",
        "2013",
        "2014",
        "2015",
        "2016",
        "2017",
        "2018"
      ],
      datasets: [
        {
          data: [4, 7, 25, 20, 5, 17, 21, 16, 14, 7, 22, 13],
          borderColor: "rgba(238, 238, 238, 1)",
          pointRadius: 5,
          pointBackgroundColor: "rgba(239, 201, 84, 1)",
          pointBorderColor: "rgba(255, 255, 255, 0)"
        }
      ]
    },
    options: {
      scales: {
        yAxes: [
          {
            ticks: {
              beginAtZero: true
            }
          }
        ]
      },
      legend: {
        display: false
      }
    }
  });
});
