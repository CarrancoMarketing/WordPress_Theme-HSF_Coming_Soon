<?php get_header(); ?> 
  <div class="container">
      <?php if (have_posts()) : ?>
      <?php while (have_posts()) : the_post(); ?>
    <div class="col-md-6 col-md-offset-6">
      <h2>Website Coming Soon</h2>
      <h3>For deals on Houston's officially licensed sports team merchandise fill out the form below.</h3>
      <?php the_content(); ?>
      <?php endwhile; endif;?>
    </div>
  </div>
<?php get_footer(); ?> 

