<?php if (!empty($title)): ?>
  <h3><?php print $title ?></h3>
<?php endif ?>

<div id="views-bootstrap-carousel-<?php print $id ?>" class="<?php print $classes ?>" <?php print $attributes ?>>
  <?php if ($indicators): ?>
    <!-- Carousel indicators -->
    <ol class="carousel-indicators">
      <?php foreach ($rows as $key => $value): ?>
        <li data-target="#views-bootstrap-carousel-<?php print $id ?>" data-slide-to="<?php print $key ?>" class="<?php if ($key == $first_key) print 'active' ?>"></li>
      <?php endforeach ?>
    </ol>
  <?php endif ?>

  <!-- Carousel items -->
  <div class="carousel-inner">
    <?php $i=0; ?>
	<?php foreach ($rows as $key => $row): ?>
      <div class="item <?php if ($key == $first_key) print 'active' ?>" style="background-image: url(<?php echo ('/sites/default/files/'.file_uri_target($view->result[$i]->field_field_slide_image[0]["rendered"]["#item"]["uri"]));?>); background-position: center center;">
        <?php print $row ?>
	<?php
		//ob_start();
		////var_dump($view->result[0]["field_field_slide_image"][0]["rendered"]["#item"]["filename"]);
		////var_dump($view->result[0]->field_field_slide_image[0]["rendered"]["#item"]["filename"]);
		//
		////"slide/nucliasbanner.jpg"
		//var_dump(file_uri_target($view->result[$i]->field_field_slide_image[0]["rendered"]["#item"]["uri"]));
		//$dumpy = ob_get_clean();
		//watchdog ('dlink','Bootstrap:'.$i.' '.$dumpy);		
		
	?>
		
		<?php $i++; ?>
      </div>
    <?php endforeach ?>
  </div>

  <?php if ($navigation): ?>
    <!-- Carousel navigation -->
    <a class="carousel-control left" href="#views-bootstrap-carousel-<?php print $id ?>" data-slide="prev">
      <span class="icon-prev"></span>
    </a>
    <a class="carousel-control right" href="#views-bootstrap-carousel-<?php print $id ?>" data-slide="next">
      <span class="icon-next"></span>
    </a>
  <?php endif ?>
</div>
