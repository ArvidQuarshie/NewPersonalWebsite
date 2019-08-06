<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package Personal One
 */
?>
<div id="footer">
    	<div class="container">
              <?php if ( ! dynamic_sidebar( 'footer-1' ) ) : ?>             
               <?php endif; // end footer widget area ?>    
                        
               <?php if ( ! dynamic_sidebar( 'footer-2' ) ) : ?>                                  	
               <?php endif; // end footer widget area ?>   
            
               <?php if ( ! dynamic_sidebar( 'footer-3' ) ) : ?>                
               <?php endif; // end footer widget area ?>  
              
               <?php if ( ! dynamic_sidebar( 'footer-4' ) ) : ?>                 
               <?php endif; // end footer widget area ?>    
                
            <div class="clear"></div>
        </div><!--end .container-->
        
        <div class="footerbottom">
        	<div class="container">
            	<div class="footerleft">
				 <?php bloginfo('name'); ?>. <?php esc_html_e('All Rights Reserved', 'personal-one');?>
                </div>
                <div class="footerright">
				 <a href="<?php echo esc_url( __( 'https://classictemplate.com/', 'personal-one' ) ); ?>"><?php esc_html_e('Theme by ClassicTemplate', 'personal-one');?></a>
                </div>
                <div class="clear"></div>
            </div><!--end .container-->            
        </div><!--end #footerbottom-->
    </div><!--end #footer-->
</div><!--#end pageholder-->
<?php wp_footer(); ?>
</body>
</html>