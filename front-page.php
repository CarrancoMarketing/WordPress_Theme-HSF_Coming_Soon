<?php get_header(); ?> 
  <div class="container">
    <div class="col-md-12 container1130 paddingNone">
    
    <?php if (have_posts()) : ?>
    <?php while (have_posts()) : the_post(); ?>
     
     <h1>Houston Sports Fan</h1>
     <h3><a href="https://www.google.com/maps/place/Crossfit+Achieve/@29.7353741,-95.4108517,15z/data=!4m2!3m1!1s0x0:0xe7384dd7c43980b" target="_blank" class="address">3414 S. Shepherd Dr. Houston, TX 77098</a></h3>
     <h2>Website Coming Soon</h2>
     <h4>For more information fill out form below or call <a href="tel:8326756089">832.675.6089</a></h4>
    <?php the_content(); ?>

    <?php endwhile; endif;?>

    </div>
      
  </div>

   <?php get_footer(); ?> 

