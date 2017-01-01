var movies = {
  "movies": [
    {
      "title": "alien",
      "genre": "sci-fi",
      "yearWatched": 1979,
      "theatreWatched": "gkc"
    },
    {
      "title": "aliens",
      "genre": "sci-fi",
      "yearWatched": 1986,
      "theatreWatched": "gkc"
    },
    {
      "title": "alien 3",
      "genre": "sci-fi",
      "yearWatched": 1993,
      "theatreWatched": "gkc"
    },
    {
      "title": "alien: resurrection",
      "genre": "sci-fi",
      "yearWatched": 1997,
      "theatreWatched": "gkc"
    }
  ]
};

for (var i = 0, l = movies.movies.length; i < l; i++) {
  // Get movie values
  var movieTitle = movies.movies[i].title;
  var movieYear = movies.movies[i].yearWatched;
  var movieTheatre = movies.movies[i].theatreWatched;
  // Append ticket-row div to movie-tickets
  var movieTickets = document.querySelector('.movie-tickets');
  var ticketRow = document.createElement('div');
  ticketRow.className = 'ticket-row';
  var movieEntry = document.createElement('div');
  movieTickets.appendChild(ticketRow);
  // Append movie data
}
