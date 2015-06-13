<?php 
	/* Template Name: About and contact Page */
?>

<?php

get_header();

?>


<div class = 'about-me box-shadow'>
            <div class = 'footer-text'>
                <?php if (have_posts()) : while(have_posts()) : the_post(); ?>
		
		<?php
		
		$portfolio_description = esc_html(get_post_meta($post->ID, 'portfolio_description', true));
							
	        ?>
						
			<?php
						
			if ($portfolio_description != '')
			{
			echo "<p>$portfolio_description</p>";
			}
						
			?>
				
		<?php endwhile; endif; ?>
            </div>
        </div>
        
        <div class = 'contact-me box-shadow'>
            
            
                <center>
                    <a id = 'contact'></a>
                    <form action = 'process.php' method = 'post'>
                        <p><input type = 'text' class = 'form-control' name = 'name' placeholder="Enter your name"></p>
                        <p><input type = 'email' class = 'form-control' name = 'email' placeholder="Enter your Email ID"></p>
                        <p><textarea name = 'message' class = 'form-control'  placeholder="Enter your message" rows = 10></textarea></p>
                        <p><button type="submit" class="btn btn-danger" name = 'contact_submit'>SUBMIT</button></p>
                        
                        
                    </form>
                    
                    
                    
                </center>
                
                
                
                
                
            
            
        </div>
        
        
        <?php
        
        get_footer();
        
        ?>