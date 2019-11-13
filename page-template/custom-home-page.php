<?php
/**
 * Template Name: Custom Home
 */

get_header(); ?>

<main id="maincontent" role="main">
  <?php do_action( 'vw_hotel_before_slider' ); ?>

  <?php if(get_theme_mod('vw_hotel_slider_hide_show',true)==1){ ?>
    <section id="slider">
      <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel"> 
        <?php $slider_page = array();
          for ( $count = 1; $count <= 4; $count++ ) {
            $mod = intval( get_theme_mod( 'vw_hotel_slider_page' . $count ));
            if ( 'page-none-selected' != $mod ) {
              $slider_page[] = $mod;
            }
          }
          if( !empty($slider_page) ) :
            $args = array(
              'post_type' => 'page',
              'post__in' => $slider_page,
              'orderby' => 'post__in'
            );
            $query = new WP_Query( $args );
            if ( $query->have_posts() ) :
              $i = 1;
        ?>     
        <div class="carousel-inner" role="listbox">
          <?php  while ( $query->have_posts() ) : $query->the_post(); ?>
            <div <?php if($i == 1){echo 'class="carousel-item active"';} else{ echo 'class="carousel-item"';}?>>
              <?php the_post_thumbnail(); ?>
              <div class="carousel-caption">
                <div class="inner_carousel">
                  <h2><?php the_title(); ?></h2>
                  <p><?php $excerpt = get_the_excerpt(); echo esc_html( vw_hotel_string_limit_words( $excerpt, esc_attr(get_theme_mod('vw_hotel_slider_excerpt_number','30')))); ?></p>
                  <div class="more-btn">              
                    <a href="<?php the_permalink(); ?>"><?php esc_html_e('READ MORE','vw-hotel'); ?><span class="screen-reader-text"><?php esc_html_e( 'READ MORE','vw-hotel' );?></span></a>
                  </div>
                </div>
              </div>
            </div>
          <?php $i++; endwhile; 
          wp_reset_postdata();?>
        </div>
        <?php else : ?>
            <div class="no-postfound"></div>
        <?php endif;
        endif;?>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"><i class="fas fa-chevron-left"></i></span>
          <span class="screen-reader-text"><?php esc_attr_e( 'Previous','vw-hotel' );?></span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"><i class="fas fa-chevron-right"></i></span>
          <span class="screen-reader-text"><?php esc_attr_e( 'Next','vw-hotel' );?></span>
        </a>
      </div>  
      <div class="clearfix"></div>
    </section> 
  <?php }?>

  <?php do_action( 'vw_hotel_after_slider' ); ?>

  <?php if( get_theme_mod('vw_hotel_section_title') != '' || get_theme_mod('vw_hotel_service_category') != '' || get_theme_mod('vw_hotel_offer_image') != ''){ ?>
    <section id="about-hotel">
      <div class="container">
        <div class="about-mainbox">
          <div class="row">
            <div class="col-lg-8 col-md-8">
              <?php if( get_theme_mod('vw_hotel_section_title') != ''){ ?>
                <h3><?php echo esc_html(get_theme_mod('vw_hotel_section_title','')); ?></h3>
              <?php }?>
              <?php $about_page = array();
                for ( $count = 1; $count <= 1; $count++ ) {
                  $mod = intval( get_theme_mod( 'vw_hotel_about_section' . $count ));
                  if ( 'page-none-selected' != $mod ) {
                    $about_page[] = $mod;
                  }
                }
                if( !empty($about_page) ) :
                  $args = array(
                    'post_type' => 'page',
                    'post__in' => $about_page,
                    'orderby' => 'post__in'
                  );
                  $query = new WP_Query( $args );
                  if ( $query->have_posts() ) :
                    $count = 1;
                    while ( $query->have_posts() ) : $query->the_post(); ?>
                      <h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?><span class="screen-reader-text"><?php the_title(); ?></span></a></h4>
                      <hr class="hrclass">
                      <p><?php $excerpt = get_the_excerpt(); echo esc_html( vw_hotel_string_limit_words( $excerpt, esc_attr(get_theme_mod('vw_hotel_about_excerpt_number','30')))); ?></p>
                    <?php $count++; endwhile; 
                    wp_reset_postdata();?>
                  <?php else : ?>
                    <div class="no-postfound"></div>
                <?php endif;
              endif;?>
              <div class="about-category">       
                <div class="row">
                  <?php 
                  $catData1=  get_theme_mod('vw_hotel_service_category');
                  if($catData1){

                    $page_query = new WP_Query(array(  'category_name' => esc_html($catData1 ,'vw-hotel')));?>
                    <?php while( $page_query->have_posts() ) : $page_query->the_post(); ?>
                        <div class="col-lg-6 col-md-6">
                          <?php if(has_post_thumbnail()) { ?><?php the_post_thumbnail(); ?><?php } ?>
                          <div class="overlay-box">
                            <a href="<?php the_permalink(); ?>"><h4><?php the_title(); ?></h4><span class="screen-reader-text"><?php the_title(); ?></span></a>
                          </div>
                        </div>
                    <?php endwhile;
                    wp_reset_postdata();
                    }
                  ?>
                </div>
              </div>
            </div>
            <div class="col-lg-4 col-md-4">
              <?php
              $postData1=  get_theme_mod('vw_hotel_offer_image');
              if($postData1){
                $args = array( 'name' => esc_html($postData1 ,'vw-hotel'));
                $query = new WP_Query( $args );
                if ( $query->have_posts() ) :
                  while ( $query->have_posts() ) : $query->the_post(); ?>
                    <div class="imagebox">
                      <?php the_post_thumbnail(); ?>
                      <div class="overlay-bttn">
                        <a href="<?php echo esc_url( get_permalink() );?>"><?php esc_html_e('LEARN MORE','vw-hotel'); ?><span class="screen-reader-text"><?php esc_html_e( 'LEARN MORE','vw-hotel' );?></span></a>
                      </div>
                    </div>
                  <?php endwhile; 
                  wp_reset_postdata();?>
                  <?php else : ?>
                    <div class="no-postfound"></div>
                  <?php
              endif; }?>
            </div>
          </div>
        </div>
      </div>
    </section>
  <?php }?>

  <?php do_action( 'vw_hotel_after_about' ); ?>

  <div class="content-vw">
    <div class="container">
      <?php while ( have_posts() ) : the_post(); ?>
        <?php the_content(); ?>
      <?php endwhile; // end of the loop. ?>
    </div>
  </div>
</main>

<?php get_footer(); ?>