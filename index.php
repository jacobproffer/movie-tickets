<?php

// Get JSON
$movies_data = "json/movies.json";
$movies_json = file_get_contents($movies_data);
$data = json_decode($movies_json, TRUE);

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <title>I Collect Movie Tickets</title>
    <meta name="keywords" content="movie, tickets, movie tickets, collection" />
    <meta name="description" content="My name is Jacob Proffer and I collect movie tickets." />
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1"/>
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:200" rel="stylesheet">
    <link rel="stylesheet" href="dist/css/project-main.min.css">
  </head>
  <body>
    <div class="page-wrap">
      <div class="movie-tickets">
        <div class="info-row">
          <div class="info-col">
            Title
          </div>
          <div class="info-col">
            Genre
          </div>
          <div class="info-col">
            Date
          </div>
          <div class="info-col">
            Theatre
          </div>
        </div>
<?php foreach($data['movies'] as $key=>$val) : ?>
        <div class="ticket-row">
          <div class="info-col"><?php echo $val['title']; ?></div>
          <div class="info-col"><?php echo $val['genre']; ?></div>
          <div class="info-col date" data-date="<?php echo $val['data_date']; ?>"><?php echo $val['date']; ?></div>
          <div class="info-col"><?php echo $val['theatre']; ?></div>
        </div>
<?php endforeach; ?>
      </div>
      <section class="counters">
        <div class="numMovies">
          <h1></h1>
          <h2>Movies</h2>
        </div>
      </section>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
    <script src="dist/js/app.min.js" charset="utf-8"></script>
  </body>
</html>
