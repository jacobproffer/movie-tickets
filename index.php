<?php include('header.php'); ?>
      <section class="movies">
        <div class="container">
          <div class="movie-tickets">
<?php foreach($data['movies'] as $key=>$val) : ?>
            <div class="ticket-row">
              <div class="ticket-col">
                <h2><?php echo $val['title']; ?></h2>
                <h3 class="date" data-date="<?php echo $val['data_date']; ?>"><?php echo $val['date']; ?></h3>
              </div>
              <div class="ticket-col">
                <h4><?php echo $val['theatre']; ?></h4>
              </div>
            </div>
<?php endforeach; ?>
          </div>
        </div>
      </section>
<?php include('footer.php'); ?>
