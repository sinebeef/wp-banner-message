<?php
/*
Plugin Name: Black Friday Banner
Plugin URI: https://github.com/sinebeef
Description: A really basic black friday or message banner made upon request.
Author: sine
Version: 0.1
Author URI: https://github.com/sinebeef
*/

// If this file is called directly, abort.
if(!defined('WPINC')){ die; }

add_action('wp_head','mde_black_friday_cookies',10);
add_action('wp_head','mde_black_friday_css',20);
add_action('wp_footer','mde_black_friday_js',10);

function mde_black_friday_cookies() {
	?>
	<script src="https://cdn.jsdelivr.net/npm/js-cookie@beta/dist/js.cookie.min.js"></script>	
	<?php
}

function mde_black_friday_css() {
	?>
	<style type="text/css">
		.blackfriday{
			display: block;
			position: fixed;
			bottom:0;
			left:0;
			width: 100%;
			padding: 1em 0;
			background: crimson;
			z-index:99999;
		}
		.bfin {
			text-align: left;
		}
		.bfin p {
			margin: 0;
		}
		.bftext{
			color: white;
			font-size: 1.2rem;
			padding: 0;
			margin: 0;
			font-weight: 300;
		}
		@media only screen and (max-width: 740px) {
			.bftext {
				font-size: 0.9rem;
			}
			.blackfriday{
				padding: 1em 4em 1em 8px;
			}
		}
		.bfbutton {
			position: absolute;
			top: 50%;
			right: 20px;
			width: 50px;
			height: 50px;
			color: #ffffff;
			font-size: 24px;
			background: #ffffff61;
			border-radius: 50%;
			display: flex;
			align-items: center;
			justify-content: center;
			transform: rotate(45deg);
			transform: translateY(-50%);
		}
	</style>
	<?php
}

function mde_black_friday_js() {
	?>
	<script type="text/javascript">
		jQuery(document).ready(function() {			
			var cookieValue = Cookies.get('blackfriday');			
			if( cookieValue != 1){
				jQuery("body").append('<div class="blackfriday"><div class="bfbutton">OK</div><div class="container"><div class="row"><div class="col-md-12 bfin"><p><span class="bftext">We are <strong>closed from the 20th December 2019 and reopen on Monday 6th January 2020</strong></span><br><span class="bftext">Any orders over this period will not be shipped until we are back in January - Merry Christmas!</span><br></p></div></div></div></div>');			
				jQuery( ".bfbutton, .blackfriday" ).click(function() {
					Cookies.set('blackfriday',1, { expires: 2 });
					jQuery('.blackfriday').hide();
				});
			}	
		});
	</script>
	<?php
}