var theatres;
var count;
var num;
var body = $("body");
var movietickets = $(".movies__tickets");
var mainHeader = $("header");
var ctx;
var chart;

$(document).ready(function() {
  function groupByYear(arr) {
    var groupBy = {};
    $.each(arr, function() {
      groupBy[this.year] = 1 + (groupBy[this.year] || 0);
    });
    return groupBy;
  }

  function createArray(obj) {
    var arr = [];
    Object.keys(obj).forEach(function(key) {
      arr.push({
        year: key,
        count: obj[key]
      });
    });
    return arr;
  }

  $.getJSON("json/movies.json")
    .done(function(json) {
      // Loop through data and output html
      var obj = groupByYear(json);
      var resArray = createArray(obj);
      $.each(json, function(i, item) {
        var date = new Date(0);
        date.setUTCSeconds(item.data_date);
        day = moment(date).format("MMMM Do YYYY");
        movietickets.append(
          "<div class='data__grid movies__ticket__row'>" +
            "<div class='movies__ticket__col'>" +
            "<h2>" +
            item.title +
            "</h2><span class='theatres' data-theatre='" +
            item.theatre +
            "'>" +
            item.theatre +
            "</span>" +
            "</div>" +
            "<div class='movies__ticket__col'>" +
            "<h4 class='date' data-date='" +
            item.data_date +
            "'>" +
            day +
            "</h4>" +
            "</div>" +
            "</div>"
        );
      });
      var years = [];
      var count = [];
      $.each(resArray, function(i, obj) {
        years.push(obj.year);
        count.push(obj.count);
      });
      ctx = document.getElementById("chart").getContext("2d");
      chart = new Chart(ctx, {
        type: "line",
        data: {
          labels: years,
          datasets: [
            {
              data: count,
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
      // Sort movies by epoch date
      $(".movies__tickets .movies__ticket__row")
        .sort(function(a, b) {
          return (
            new Date($(".date", b).data("date")) -
            new Date($(".date", a).data("date"))
          );
        })
        .appendTo(".movies__tickets");
      // Count number of movies
      num = $(".movies__ticket__row").length;
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
});
