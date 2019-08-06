<?php
/**
 *Personal One Theme Customizer
 *
 * @package Personal One
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function personal_one_customize_register( $wp_customize ) {
	
	function personal_one_sanitize_dropdown_pages( $page_id, $setting ) {
	  // Ensure $input is an absolute integer.
	  $page_id = absint( $page_id );
	
	  // If $page_id is an ID of a published page, return it; otherwise, return the default.
	  return ( 'publish' == get_post_status( $page_id ) ? $page_id : $setting->default );
	}
	
	function personal_one_sanitize_checkbox( $checked ) {
		// Boolean check.
		return ( ( isset( $checked ) && true == $checked ) ? true : false );
	}

	
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';	
	
	//Site Layout Section
	$wp_customize->add_section('site_layout_sec',array(
			'title'	=> __('Site Layout','personal-one'),			
			'priority'	=> 1,
	));		
	
	$wp_customize->add_setting('full_layout',array(
			'sanitize_callback' => 'personal_one_sanitize_checkbox',
	));	 

	$wp_customize->add_control( 'full_layout', array(
    	   'section'   => 'site_layout_sec',    	 
		   'label'	=> __('Check to Full Layout','personal-one'),
    	   'type'      => 'checkbox'
     )); //Site Layout Section
	
	
	$wp_customize->add_setting('color_scheme',array(
			'default'	=> '#f98700',
			'sanitize_callback'	=> 'sanitize_hex_color'
	));
	
	$wp_customize->add_control(
		new WP_Customize_Color_Control($wp_customize,'color_scheme',array(
			'label' => __('Color Scheme','personal-one'),			
			 'description'	=> __('More color options available in pro version','personal-one'),
			'section' => 'colors',
			'settings' => 'color_scheme'
		))
	);
	
	// Header Banner Section		
	$wp_customize->add_section( 'header_banner', array(
            'title' => __('Header Banner', 'personal-one'),
            'priority' => null,
			'description'	=> __('Featured Image Size Should be same ( 1400x650 )','personal-one'),            			
        )
    );	
	$wp_customize->add_setting('page_banner',array(
			'default'	=> '0',			
			'capability' => 'edit_theme_options',
			'sanitize_callback'	=> 'personal_one_sanitize_dropdown_pages'
	));	
	$wp_customize->add_control('page_banner',array(
			'type'	=> 'dropdown-pages',
			'label'	=> __('Select page for header banner','personal-one'),
			'section'	=> 'header_banner'
	));		
	
	$wp_customize->add_setting('disabled_banner',array(
				'default' => true,
				'sanitize_callback' => 'personal_one_sanitize_checkbox',
				'capability' => 'edit_theme_options',
	));	 	
	$wp_customize->add_control( 'disabled_banner', array(
			   'settings' => 'disabled_banner',
			   'section'   => 'header_banner',
			   'label'     => __('Uncheck To Enable This Section','personal-one'),
			   'type'      => 'checkbox'
	 ));// Hide Header Banner Section	
	
	
	
	//About Us Section 	
	$wp_customize->add_section('section_first',array(
		'title'	=> __('About Us Page','personal-one'),
		'description'	=> __('Select Page from the dropdown for about us page','personal-one'),
		'priority'	=> null
	));
	
	$wp_customize->add_setting('page-setting1',	array(
			'default'	=> '0',			
			'capability' => 'edit_theme_options',
			'sanitize_callback'	=> 'personal_one_sanitize_dropdown_pages'
		));
 
	$wp_customize->add_control(	'page-setting1',array('type' => 'dropdown-pages',			
			'section' => 'section_first',
	));
	
	$wp_customize->add_setting('disabled_aboutpage',array(
			'default' => true,
			'sanitize_callback' => 'personal_one_sanitize_checkbox',
			'capability' => 'edit_theme_options',
	));	 
	
	$wp_customize->add_control( 'disabled_aboutpage', array(
			   'settings' => 'disabled_aboutpage',
			   'section'   => 'section_first',
			   'label'     => __('Uncheck To Enable This Section','personal-one'),
			   'type'      => 'checkbox'
	 ));//Disable Homepage boxes Section		
		
}
add_action( 'customize_register', 'personal_one_customize_register' );

function personal_one_custom_css(){
		?>
        	<style type="text/css"> 
					
					a, .postslisting h2 a:hover,
					#sidebar ul li a:hover,									
					.postslisting h3 a:hover,
					.cols-4 ul li a:hover, .cols-4 ul li.current_page_item a,
					.recent-post h6:hover,					
					.oneforth:hover h3,					
					.footer-icons a:hover,
					.sitenav ul li a:hover, .sitenav ul li.current_page_item a, 
					.postmeta a:hover
					{ color:<?php echo esc_html( get_theme_mod('color_scheme','#f98700')); ?>;}
					 
					
					.pagination ul li .current, .pagination ul li a:hover, 
					#commentform input#submit:hover,					
					.nivo-controlNav a.active,					
					.appbutton:hover,
					.ReadMore:hover,
					.slide_info .slide_more,					
					.sitenav ul li.current-menu-ancestor a.parent,					
					#sidebar .search-form input.search-submit,				
					.wpcf7 input[type='submit']					
					{ background-color:<?php echo esc_html( get_theme_mod('color_scheme','#f98700')); ?>;}
					
					
					.footer-icons a:hover							
					{ border-color:<?php echo esc_html( get_theme_mod('color_scheme','#f98700')); ?>;}					
					
					
			</style> 
<?php                         
}
         
add_action('wp_head','personal_one_custom_css');	 

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function personal_one_customize_preview_js() {
	wp_enqueue_script( 'personal_one_customizer', get_template_directory_uri() . '/js/customize-preview.js', array( 'customize-preview' ), '20130508', true );
}
add_action( 'customize_preview_init', 'personal_one_customize_preview_js' );