<?php get_header(); ?> 
  <div class="container">
      <?php if (have_posts()) : ?>
      <?php while (have_posts()) : the_post(); ?>
        <div class="col-md-6 col-md-offset-6 content paddingNone">
          <h2>Website Coming Soon</h2>
          <p>For deals on Houston's officially licensed sports team merchandise fill out the form below.</p>
          <?php the_content(); ?>
        </div>
      <?php endwhile; endif;?>
  </div>
<?php get_footer(); ?> 

