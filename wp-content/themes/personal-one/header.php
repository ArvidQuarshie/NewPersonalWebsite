<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div class="container">
 *
 * @package Personal One
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<?php if ( is_singular() && pings_open( get_queried_object() ) ) : ?>
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<?php endif; ?>
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<div id="pageholder" <?php if( get_theme_mod( 'full_layout' ) ) { echo 'class="fulllayout"'; } ?> >
<div class="header <?php if( !is_front_page() && !is_home() ){ ?>headerinner<?php } ?>" <?php if( get_theme_mod('disabled_banner', '1') ) { echo 'style="position:relative"'; } ?>>
        <div class="container">
            <div class="logo">
            			<?php personal_one_the_custom_logo(); ?>
                       <h1><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo('name'); ?></a></h1>
            <?php $description = get_bloginfo( 'description', 'display' );
            if ( $description || is_customize_preview() ) : ?>
                <p><?php echo esc_html($description); ?></p>
            <?php endif; ?>
            </div><!-- logo -->
             <div class="hdrright">
             <div class="toggle">
                <a class="toggleMenu" href="#"><?php esc_html_e('Menu','personal-one'); ?></a>
             </div><!-- toggle --> 
            
            <div class="sitenav">
                    <?php wp_nav_menu(array('theme_location' => 'primary')); ?>
            </div><!-- site-nav -->
            </div>
            <div class="clear"></div>
            
        </div><!-- container -->
  </div><!--.header -->

<?php if ( is_front_page() && !is_home() ) { ?>
	<?php $hidebanner = get_theme_mod('disabled_banner', '1'); ?>
		<?php if($hidebanner == ''){ ?>        
        <div id="bannerarea"> 
              <?php if( get_theme_mod('page_banner')) { ?>
				  <?php $queryvar = new WP_query('page_id='.absint(get_theme_mod('page_banner' ,true)) ); ?>
                  <?php while( $queryvar->have_posts() ) : $queryvar->the_post();?>  
                                           
                  <?php if(has_post_thumbnail() ) { ?>
                     <div class="frontbanner">
                      <?php the_post_thumbnail();?>
                     </div>
                  <?php } else { ?>
                     <div class="frontbanner">
                       <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/header-banner.jpg" alt="" />
                     </div>
                  <?php } ?> 
                  <div class="bannerdesc">                                       
                   <h2><?php the_title(); ?></h2>
                   <p><?php echo esc_html( wp_trim_words( get_the_content(), 20, '...' ) );  ?></p> 
                  </div>                           
			<?php endwhile; 
                  wp_reset_postdata();
             } ?>  
        </div><!--#bannerarea --> 
<?php } ?>
<?php } ?> 



<?php if ( is_front_page() && ! is_home() ) { ?> 
    <?php
		$hideabout = get_theme_mod('disabled_aboutpage', '1');
		if( $hideabout == ''){
	?> 
       <section id="aboutwrap">  
            	<div class="container">
                   <div class="grip-1">                   
					<?php if( get_theme_mod('page-setting1')) { ?>
                          <?php $queryvar = new WP_query('page_id='.absint(get_theme_mod('page-setting1' ,true)) ); ?>
                          <?php while( $queryvar->have_posts() ) : $queryvar->the_post();?>  
                                                   
                          <?php if(has_post_thumbnail() ) { ?>
                              <div class="circlethumb">
                                  <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail();?></a>
                               </div>
                          <?php } else { ?>
                           <div class="circlethumb">
                           <a href="<?php echo esc_url( get_permalink() ); ?>"><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/abouthumb.jpg" alt="" /></a>
                           </div>
                          <?php } ?>
                                        
                          <h2 class="headingtitle"><?php the_title(); ?></h2>
                          <p><?php echo esc_html( wp_trim_words( get_the_content(), 40, '...' ) );  ?></p> 
                            <a class="ReadMore" href="<?php the_permalink(); ?>">
                             <?php esc_html_e('Read More','personal-one'); ?>
                            </a> 
                        <?php endwhile; 
						      wp_reset_postdata();
						 } ?>
                                                  
              <div class="clear"></div>
            </div><!-- container -->
   </section>  
       
<?php } ?>
<?php } ?>