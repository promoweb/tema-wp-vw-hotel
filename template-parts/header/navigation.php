<?php
  $vw_hotel_search_hide_show = get_theme_mod( 'vw_hotel_search_hide_show' );
  if ( 'Disable' == $vw_hotel_search_hide_show ) {
   $colmd = 'col-lg-12 col-md-12';
  } else { 
   $colmd = 'col-lg-11 col-md-6 col-6';
  } 
?> 
<div id="header" class="menubar">
  <div class="header-menu <?php if( get_theme_mod( 'vw_hotel_sticky_header') != '') { ?> header-sticky"<?php } else { ?>close-sticky <?php } ?>">
    <div class="container">
      <div class="row bg-home">
        <div class="<?php echo esc_html( $colmd ); ?>">
          <div class="toggle-nav mobile-menu">
            <button onclick="menu_openNav()"><i class="fas fa-bars"></i><span class="screen-reader-text"><?php esc_html_e('Open Button','vw-hotel'); ?></span></button>
          </div> 
          <div id="mySidenav" class="nav sidenav">
            <nav id="site-navigation" class="main-navigation" role="navigation" aria-label="<?php esc_attr_e( 'Top Menu', 'vw-hotel' ); ?>">
              <a href="javascript:void(0)" class="closebtn mobile-menu" onclick="menu_closeNav()"><i class="fas fa-times"></i><span class="screen-reader-text"><?php esc_html_e('Close Button','vw-hotel'); ?></span></a>
              <?php 
                wp_nav_menu( array( 
                  'theme_location' => 'primary',
                  'container_class' => 'main-menu clearfix' ,
                  'menu_class' => 'clearfix',
                  'items_wrap' => '<ul id="%1$s" class="%2$s mobile_nav">%3$s</ul>',
                  'fallback_cb' => 'wp_page_menu',
                ) ); 
              ?>
            </nav>
          </div>
        </div>
        <?php if ( 'Disable' != $vw_hotel_search_hide_show ) {?>
          <div class="col-lg-1 col-md-6 col-6 search-field">
            <button class="search-box">
              <span><a href="#"><i class="fas fa-search"></i></a></span>
            </button>
          </div>
        <?php } ?>
      </div>
      <div class="serach_outer">
        <div class="closepop"><a href="#"><i class="far fa-window-close"></i></a></div>
        <div class="serach_inner">
          <?php get_search_form(); ?>
        </div>
      </div>
    </div>
  </div>
</div>