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
        <!-- 
        <div class="ticket-row">
          <div class="info-col">He's Just Not That Into You</div>
          <div class="info-col">Romance</div>
          <div class="info-col date" data-date="1236643200">03/10/2009</div>
          <div class="info-col">Carmike Cinemas</div>
        </div>
        <div class="ticket-row">
          <div class="info-col">Victor Frankenstein</div>
          <div class="info-col">Sci-Fi</div>
          <div class="info-col date" data-date="1422403200">01/28/2015</div>
          <div class="info-col">Thomas Theatre Group</div>
        </div>
        <div class="ticket-row">
          <div class="info-col">Did You Hear About the Morgans?</div>
          <div class="info-col">Romance</div>
          <div class="info-col date" data-date="1261872000">12/27/2009</div>
          <div class="info-col">Carmike Cinemas</div>
        </div>
        <div class="ticket-row">
          <div class="info-col">Magic Mike</div>
          <div class="info-col">Drama</div>
          <div class="info-col date" data-date="1342310400">07/15/2012</div>
          <div class="info-col">Carmike Cinemas</div>
        </div>
        <div class="ticket-row">
          <div class="info-col">The Hangover 2</div>
          <div class="info-col">Comedy</div>
          <div class="info-col date" data-date="1307836800">06/12/2011</div>
          <div class="info-col">Carmike Cinemas</div>
        </div>
        <div class="ticket-row">
          <div class="info-col">Zero Dark Thirty</div>
          <div class="info-col">Action</div>
          <div class="info-col date" data-date="1358121600">01/14/2013</div>
          <div class="info-col">Carmike Cinemas</div>
        </div>
        <div class="ticket-row">
          <div class="info-col">Wild Hogs</div>
          <div class="info-col">Comedy</div>
          <div class="info-col date" data-date="1173484800">03/10/2007</div>
          <div class="info-col">Carmike Cinemas</div>
        </div>
        <div class="ticket-row">
          <div class="info-col">Yes Man</div>
          <div class="info-col">Comedy</div>
          <div class="info-col date" data-date="1230422400">12/28/2008</div>
          <div class="info-col">Carmike Cinemas</div>
        </div>
        <div class="ticket-row">
          <div class="info-col">Prom Night</div>
          <div class="info-col">Thriller</div>
          <div class="info-col date" data-date="1208563200">04/19/2008</div>
          <div class="info-col">Carmike Cinemas</div>
        </div>
        <div class="ticket-row">
          <div class="info-col">Traitor</div>
          <div class="info-col">Action</div>
          <div class="info-col date" data-date="1220659200">09/06/2008</div>
          <div class="info-col">Carmike Cinemas</div>
        </div>
        <div class="ticket-row">
          <div class="info-col">The Town</div>
          <div class="info-col">Crime</div>
          <div class="info-col date" data-date="1285372800">09/25/2010</div>
          <div class="info-col">Carmike Cinemas</div>
        </div>
        <div class="ticket-row">
          <div class="info-col">Prometheus</div>
          <div class="info-col">Sci-Fi</div>
          <div class="info-col date" data-date="1339804800">06/16/2012</div>
          <div class="info-col">AMC Empire 25</div>
        </div>
        <div class="ticket-row">
          <div class="info-col">Hancock</div>
          <div class="info-col">Action</div>
          <div class="info-col date" data-date="1216425600">07/19/2008</div>
          <div class="info-col">Carmike Cinemas</div>
        </div>
        <div class="ticket-row">
          <div class="info-col">22 Jump Street</div>
          <div class="info-col">Comedy</div>
          <div class="info-col date" data-date="1402617600">06/13/2014</div>
          <div class="info-col">Thomas Theatre Group</div>
        </div>
        <div class="ticket-row">
          <div class="info-col">Terminator Salvation</div>
          <div class="info-col">Thriller</div>
          <div class="info-col date" data-date="1242950400">05/22/2009</div>
          <div class="info-col">Carmike Cinemas</div>
        </div>
        <div class="ticket-row">
          <div class="info-col">Disturbia</div>
          <div class="info-col">Thriller</div>
          <div class="info-col date" data-date="1176508800">04/14/2007</div>
          <div class="info-col">Carmike Cinemas</div>
        </div>
        <div class="ticket-row">
          <div class="info-col">Jurassic 3D</div>
          <div class="info-col">Fantasy</div>
          <div class="info-col date" data-date="1365120000">04/05/2013</div>
          <div class="info-col">Carmike Cinemas</div>
        </div>
        <div class="ticket-row">
          <div class="info-col">Zombieland</div>
          <div class="info-col">Comedy</div>
          <div class="info-col date" data-date="1254528000">10/03/2009</div>
          <div class="info-col">Carmike Cinemas</div>
        </div>
        <div class="ticket-row">
          <div class="info-col">2012</div>
          <div class="info-col">Sci-Fi</div>
          <div class="info-col date" data-date="1258070400">11/13/2009</div>
          <div class="info-col">Carmike Cinemas</div>
        </div>
        <div class="ticket-row">
          <div class="info-col">Bruno</div>
          <div class="info-col">Comedy</div>
          <div class="info-col date" data-date="1247270400">07/11/2009</div>
          <div class="info-col">Carmike Cinemas</div>
        </div>
        <div class="ticket-row">
          <div class="info-col">I Love You, Man</div>
          <div class="info-col">Romance</div>
          <div class="info-col date" data-date="1238284800">03/29/2009</div>
          <div class="info-col">Carmike Cinemas</div>
        </div>
        <div class="ticket-row">
          <div class="info-col">Avatar 3D</div>
          <div class="info-col">Sci-Fi</div>
          <div class="info-col date" data-date="1261958400">12/26/2009</div>
          <div class="info-col">Carmike Cinemas</div>
        </div>
        <div class="ticket-row">
          <div class="info-col">Snow White</div>
          <div class="info-col">Fantasy</div>
          <div class="info-col date" data-date="1339473900">06/12/2012</div>
          <div class="info-col">Carmike Cinemas</div>
        </div>
        <div class="ticket-row">
          <div class="info-col">Jackass 3D</div>
          <div class="info-col">Comedy</div>
          <div class="info-col date" data-date="1287720300">10/22/2010</div>
          <div class="info-col">Carmike Cinemas</div>
        </div>
        <div class="ticket-row">
          <div class="info-col">Paranormal</div>
          <div class="info-col">Thriller</div>
          <div class="info-col date" data-date="1256270700">10/23/2009</div>
          <div class="info-col">Carmike Cinemas</div>
        </div>
        <div class="ticket-row">
          <div class="info-col">Rogue One: A Star Wars Story</div>
          <div class="info-col">Sci-Fi</div>
          <div class="info-col date" data-date="1482019200">12/18/2016</div>
          <div class="info-col">Thomas Theatre Group</div>
        </div>
        <div class="ticket-row">
          <div class="info-col">Star Wars: The Force Awakens</div>
          <div class="info-col">Sci-Fi</div>
          <div class="info-col date" data-date="1451088000">12/26/2015</div>
          <div class="info-col">Thomas Theatre Group</div>
        </div>
        <div class="ticket-row">
          <div class="info-col">Fifty Shades of Grey</div>
          <div class="info-col">Drama</div>
          <div class="info-col date" data-date="1423785600">02/13/2015</div>
          <div class="info-col">Thomas Theatre Group</div>
        </div>
        <div class="ticket-row">
          <div class="info-col">Sicario</div>
          <div class="info-col">Thriller</div>
          <div class="info-col date" data-date="1444262400">10/08/2015</div>
          <div class="info-col">Thomas Theatre Group</div>
        </div>
        <div class="ticket-row">
          <div class="info-col">The A-Team</div>
          <div class="info-col">Thriller</div>
          <div class="info-col date" data-date="1277078400">06/21/2010</div>
          <div class="info-col">Regal Entertainment Group</div>
        </div>
        <div class="ticket-row">
          <div class="info-col">World War Z</div>
          <div class="info-col">Thriller</div>
          <div class="info-col date" data-date="1373328000">07/09/2013</div>
          <div class="info-col">Carmike Cinemas</div>
        </div>
        <div class="ticket-row">
          <div class="info-col">Spiderman 3</div>
          <div class="info-col">Sci-Fi</div>
          <div class="info-col date" data-date="1180137600">05/26/2007</div>
          <div class="info-col">Carmike Cinemas</div>
        </div>
        <div class="ticket-row">
          <div class="info-col">Krampus</div>
          <div class="info-col">Horror</div>
          <div class="info-col date" data-date="1449204000">12/04/2015</div>
          <div class="info-col">Thomas Theatre Group</div>
        </div>
        <div class="ticket-row">
          <div class="info-col">Hercules</div>
          <div class="info-col">Fantasy</div>
          <div class="info-col date" data-date="1406419200">07/27/2014</div>
          <div class="info-col">Thomas Theatre Group</div>
        </div>
        <div class="ticket-row">
          <div class="info-col">Hell or High Water</div>
          <div class="info-col">Crime</div>
          <div class="info-col date" data-date="1473552000">09/11/2016</div>
          <div class="info-col">Thomas Theatre Group</div>
        </div>
        <div class="ticket-row">
          <div class="info-col">Penguins of Madagascar</div>
          <div class="info-col">Adventure</div>
          <div class="info-col date" data-date="1418256000">12/11/2014</div>
          <div class="info-col">Thomas Theatre Group</div>
        </div>
        <div class="ticket-row">
          <div class="info-col">Mission Impossible: Rogue Nation</div>
          <div class="info-col">Action</div>
          <div class="info-col date" data-date="1438905600">08/07/2015</div>
          <div class="info-col">Thomas Theatre Group</div>
        </div>
        <div class="ticket-row">
          <div class="info-col">Deadpool</div>
          <div class="info-col">Fantasy</div>
          <div class="info-col date" data-date="1455580800">02/16/2016</div>
          <div class="info-col">Thomas Theatre Group</div>
        </div>
        <div class="ticket-row">
          <div class="info-col">Straight Outta Compton</div>
          <div class="info-col">Drama</div>
          <div class="info-col date" data-date="1439769600">08/17/2015</div>
          <div class="info-col">Thomas Theatre Group</div>
        </div>
        <div class="ticket-row">
          <div class="info-col">Black Mass</div>
          <div class="info-col">Crime</div>
          <div class="info-col date" data-date="1442534400">09/18/2015</div>
          <div class="info-col" data-theatre="thomas theatre group">Thomas Theatre Group</div>
        </div>
        <div class="ticket-row">
          <div class="info-col">Entourage</div>
          <div class="info-col">Drama</div>
          <div class="info-col date" data-date="1433289600">06/03/2015</div>
          <div class="info-col" data-theatre="thomas theatre group">Thomas Theatre Group</div>
        </div>
        <div class="ticket-row">
          <div class="info-col">Hardcore Henry</div>
          <div class="info-col" data-genre="action">Action</div>
          <div class="info-col date" data-date="1459987200">04/07/2016</div>
          <div class="info-col" data-theatre="thomas theatre group">Thomas Theatre Group</div>
        </div> -->
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
