<?php
	
	/*---------------------------First highlight color-------------------*/

	$vw_hotel_first_color = get_theme_mod('vw_hotel_first_color');

	$custom_css = '';

	if($vw_hotel_first_color != false){
		$custom_css .='.search-box i, #slider .carousel-control-prev-icon, #slider .carousel-control-next-icon, .more-btn a, .overlay-bttn a, input[type="submit"], .footer .tagcloud a:hover, .footer-2, .scrollup i, .sidebar input[type="submit"], .sidebar .tagcloud a:hover, .blogbutton-small, .pagination span, .pagination a, nav.woocommerce-MyAccount-navigation ul li, .woocommerce #respond input#submit, .woocommerce a.button, .woocommerce button.button, .woocommerce input.button, .woocommerce #respond input#submit.alt, .woocommerce a.button.alt, .woocommerce button.button.alt, .woocommerce input.button.alt, .woocommerce span.onsale, #comments a.comment-reply-link, .toggle-nav i, a.button{';
			$custom_css .='background-color: '.esc_html($vw_hotel_first_color).';';
		$custom_css .='}';
	}
	if($vw_hotel_first_color != false){
		$custom_css .='#comments input[type="submit"].submit, .sidebar ul li::before{';
			$custom_css .='background-color: '.esc_html($vw_hotel_first_color).'!important;';
		$custom_css .='}';
	}
	if($vw_hotel_first_color != false){
		$custom_css .='a, .more-btn a:hover, .overlay-bttn a:hover, .footer h3, .post-info i, .post-navigation a:hover .post-title, .post-navigation a:focus .post-title, .woocommerce-info::before,.logo h1 a,p.site-description,.footer li a:hover, .main-navigation ul.sub-menu a:hover, .main-navigation a:hover, .entry-content a, .sidebar .textwidget p a, .textwidget p a, #comments p a, .slider .inner_carousel p a{';
			$custom_css .='color: '.esc_html($vw_hotel_first_color).';';
		$custom_css .='}';
	}
	if($vw_hotel_first_color != false){
		$custom_css .='hr.hrclass, .woocommerce-info, .main-navigation ul ul{';
			$custom_css .='border-top-color: '.esc_html($vw_hotel_first_color).';';
		$custom_css .='}';
	}
	if($vw_hotel_first_color != false){
		$custom_css .='.main-navigation ul ul, .header-fixed{';
			$custom_css .='border-bottom-color: '.esc_html($vw_hotel_first_color).';';
		$custom_css .='}';
	}
	if($vw_hotel_first_color != false){
		$custom_css .='.post-main-box:hover{
		box-shadow: 0 0 10px 1px '.esc_html($vw_hotel_first_color).';
		}';
	}

	/*---------------------------Width Layout -------------------*/

	$theme_lay = get_theme_mod( 'vw_hotel_width_option','Full Width');
    if($theme_lay == 'Boxed'){
		$custom_css .='body{';
			$custom_css .='max-width: 1140px; width: 100%; padding-right: 15px; padding-left: 15px; margin-right: auto; margin-left: auto;';
		$custom_css .='}';
	}else if($theme_lay == 'Wide Width'){
		$custom_css .='body{';
			$custom_css .='width: 100%;padding-right: 15px;padding-left: 15px;margin-right: auto;margin-left: auto;';
		$custom_css .='}';
	}else if($theme_lay == 'Full Width'){
		$custom_css .='body{';
			$custom_css .='max-width: 100%;';
		$custom_css .='}';
	}

	/*--------------------------- Slider Opacity -------------------*/

	$theme_lay = get_theme_mod( 'vw_hotel_slider_opacity_color','0.5');
	if($theme_lay == '0'){
		$custom_css .='#slider img{';
			$custom_css .='opacity:0';
		$custom_css .='}';
		}else if($theme_lay == '0.1'){
		$custom_css .='#slider img{';
			$custom_css .='opacity:0.1';
		$custom_css .='}';
		}else if($theme_lay == '0.2'){
		$custom_css .='#slider img{';
			$custom_css .='opacity:0.2';
		$custom_css .='}';
		}else if($theme_lay == '0.3'){
		$custom_css .='#slider img{';
			$custom_css .='opacity:0.3';
		$custom_css .='}';
		}else if($theme_lay == '0.4'){
		$custom_css .='#slider img{';
			$custom_css .='opacity:0.4';
		$custom_css .='}';
		}else if($theme_lay == '0.5'){
		$custom_css .='#slider img{';
			$custom_css .='opacity:0.5';
		$custom_css .='}';
		}else if($theme_lay == '0.6'){
		$custom_css .='#slider img{';
			$custom_css .='opacity:0.6';
		$custom_css .='}';
		}else if($theme_lay == '0.7'){
		$custom_css .='#slider img{';
			$custom_css .='opacity:0.7';
		$custom_css .='}';
		}else if($theme_lay == '0.8'){
		$custom_css .='#slider img{';
			$custom_css .='opacity:0.8';
		$custom_css .='}';
		}else if($theme_lay == '0.9'){
		$custom_css .='#slider img{';
			$custom_css .='opacity:0.9';
		$custom_css .='}';
		}

	/*---------------------------Slider Content Layout -------------------*/

	$theme_lay = get_theme_mod( 'vw_hotel_slider_content_option','Center');
    if($theme_lay == 'Left'){
		$custom_css .='#slider .carousel-caption, #slider .inner_carousel, #slider .inner_carousel h2{';
			$custom_css .='text-align:left; left:15%; right:45%;';
		$custom_css .='}';
	}else if($theme_lay == 'Center'){
		$custom_css .='#slider .carousel-caption, #slider .inner_carousel, #slider .inner_carousel h2{';
			$custom_css .='text-align:center; left:20%; right:20%;';
		$custom_css .='}';
	}else if($theme_lay == 'Right'){
		$custom_css .='#slider .carousel-caption, #slider .inner_carousel, #slider .inner_carousel h2{';
			$custom_css .='text-align:right; left:45%; right:15%;';
		$custom_css .='}';
	}

	/*---------------------------Blog Layout -------------------*/

	$theme_lay = get_theme_mod( 'vw_hotel_blog_layout_option','Default');
    if($theme_lay == 'Default'){
		$custom_css .='.post-main-box{';
			$custom_css .='';
		$custom_css .='}';
	}else if($theme_lay == 'Center'){
		$custom_css .='.post-main-box, .post-main-box h2, .post-info, .new-text p{';
			$custom_css .='text-align:center;';
		$custom_css .='}';
		$custom_css .='.post-info{';
			$custom_css .='margin-top:10px;';
		$custom_css .='}';
	}else if($theme_lay == 'Left'){
		$custom_css .='.post-main-box, .post-main-box h2, .post-info, .new-text p{';
			$custom_css .='text-align:Left;';
		$custom_css .='}';
	}