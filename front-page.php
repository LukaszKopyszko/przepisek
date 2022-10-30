<?php get_header(); ?>

<section class="hero">
    <div class="banner-wrap left" style="background-image: url('<?php echo get_stylesheet_directory_uri() . './assets/img/dish.jpg'?>')">
        <div class="layer"></div>
        
        <div class="slogan-wrap">
            <h1>Poznaj <span class="changer"> </span> przepisy!</h1>
            <?php echo search_form(); ?>
        </div>
    </div>
    <div class="banner-wrap right">
        <h2>Przepis dnia!</h2>
    <div class="container">
  <div class="card">
    <div class="imgBx">
      <img src="<?php echo get_stylesheet_directory_uri() . './assets/img/burger.png'?>" alt="dish">
    </div>
    <div class="contentBx">
      <h3>Burger wołowy</h3>
      <a href="<?php echo the_permalink();?>" class="view button-33">Zobacz przepis</a>
    </div>
  </div>
</div>
  </div>
    </div>
    
</section>

<section class="popular-dishes" id="popular">
    <div class="section-wrap">
        <h2 class="popular-heading">Popularne przepisy</h2>
        <div class="cards">
            <?php
            $args = array(  
                'post_type' => 'recipes',
                'post_status' => 'publish',
                'posts_per_page' => 8
            );

            $loop = new WP_Query( $args );   
            while ( $loop->have_posts() ) : $loop->the_post();?> 

            <div class="single-card">
            <img src="<?php echo get_the_post_thumbnail_url(); ?>" alt="<?php the_title_attribute(); ?>">
                <h3 class="title"><?php echo the_title(); ?></h3>
                <hr>
                <div class="card-details">
                    <div class="minutes">
                        <div class="up">
                        <img src="<?php echo get_template_directory_uri() . './assets/img/30-minutes.png'?>" alt="dish">
                            <p class="time"><?php echo the_field('czas');?></p>
                        </div>
                        <p>Minut</p>
                    </div>
                    <div class="ingr">
                        <div class="up">
                        <img src="<?php echo get_template_directory_uri() . './assets/img/cooking.png'?>" alt="dish">
                            <p class="ingr-count"><?php echo the_field('liczba_skladnikow');?></p>
                        </div>
                        <p>Składników</p>
                    </div>
                    <div class="serving">
                        <div class="up">
                        <img src="<?php echo get_template_directory_uri() . './assets/img/team.png'?>" alt="dish">
                            <p class="ingr-count"><?php echo the_field('ilosc_osob');?></p>
                        </div>
                        <p>Głodnych</p>
                    </div>
                </div>
                <p class="desc"><?php echo the_field('zajawka_na_kafelku');?></p>
                <div class="btn-wrap">
                    <a href="<?php echo the_permalink();?>" class="view button-33">Zobacz przepis</a>
                </div>
            </div>
            <?php endwhile; wp_reset_postdata();?>
        </div>
    </div>

</section>

<?php get_footer(); ?>