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
          "<div class='movies__ticket__col'>" +
            "<div class='movies__ticket__content'>" +
            "<h2>" +
            item.title +
            "</h2>" +
            "<h4 class='movies__date' data-date='" +
            item.data_date +
            "'>" +
            day +
            "</h4>" +
            "<span class='movies__theatres' data-theatre='" +
            item.theatre +
            "'>" +
            item.theatre +
            "</span>" +
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
              borderColor: "#ffffaa",
              pointRadius: 4,
              pointBackgroundColor: "#ffffaa",
              pointBorderColor: "rgba(255, 255, 255, 0)",
              backgroundColor: "rgba(255, 255, 255, .0)"
            }
          ]
        },
        maintainAspectRatio: false,
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
          },
          layout: {
            padding: {
              top: 10
            }
          }
        }
      });
      chart.aspectRatio = 0;
      // Sort movies by epoch date
      $(".movies__tickets .movies__ticket__col")
        .sort(function(a, b) {
          return (
            new Date($(".movies__date", b).data("date")) -
            new Date($(".movies__date", a).data("date"))
          );
        })
        .appendTo(".movies__tickets");
      // Count number of movies
      num = $(".movies__ticket__col").length;
      $("#number-of-movies").html(num + " movies");
      // Count theatres
      theatres = [];
      $("span.movies__theatres").each(function() {
        theatres[$(this).attr("data-theatre")] = true;
      });
      count = [];
      for (var i in theatres) {
        count.push(i);
      }
      $("#number-of-theatres").html(count.length + " theaters");
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
