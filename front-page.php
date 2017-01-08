<?php get_header(); ?> 
  <div class="container">
    <div class="col-md-12 paddingNone">
      <?php if (have_posts()) : ?>
      <?php while (have_posts()) : the_post(); ?>
      <h1>Houston Sports Fan</h1>
    </div>
    <div class="col-md-6 col-md-offset-6">
      <h2>Website Coming Soon</h2>
      <h3>For more information fill out form below to be notified of when the site goes live.</h3>
      <?php the_content(); ?>
      <?php endwhile; endif;?>
    </div>
      <!-- Change the button from "Start Today" to "Sign Up" -->
  </div>

   <?php get_footer(); ?> 

