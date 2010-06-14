<?php
/*
Plugin Name: WK Moodify
Plugin URI: http://wordpress.org/#
Description: Deze plugin verzorgt een leuke sfeer widget op je wordpress-website
Author: Maarten H�lscher
Version: 1.0
Author URI: http://www.achterdeschermen.nl
*/

if (!is_admin()) {
		wp_deregister_script('jquery');

		// load the local copy of jQuery in the footer
		wp_register_script('jquery', '/wp-content/plugins/wk-mood/jquery.js');

		wp_enqueue_script('jquery');
	}
wp_enqueue_script('myscript', '/wp-content/plugins/wk-mood/Tween.js');


// echo the flash (div)
function moodify_obj() {

        echo "<div id='mood_1'><table id='mood_tabel' width='200px'><tr><td width='30px' align='left' valign='top'><img id='pijl_1' src='/wp-content/plugins/wk-mood/pijl.png' height='10' onclick='verwijder_mood()'></td><td align='center'>Wij steunen Oranje</td><td width='30px'></td>";
        echo "</tr><tr width='200px' height='90px' ><td colspan='3'align='center'>";
	echo "<div id='mood_flash1' height='90px' align='center'></div>"; 
	echo "</td></tr></table></div>";
}

// Now we set that function up to execute when the wp_footer action is called

add_action('wp_footer', 'moodify_obj');

// We need some CSS to position the paragraph
function moodify_css() {

	// This makes sure that the positioning is also good for right-to-left languages
	$x = ( 'rtl' == get_bloginfo( 'text_direction' ) ) ? 'left' : 'right';

	echo "
	<style type='text/css'>
      	#mood_1 {
		position: fixed;
		top: -20px;
		margin: 0;
		padding: 0;
		left: 15px;
		font-size: 11px;
                
                width: 250px;
                background-image: url(/wp-content/plugins/wk-mood/oranje-verloop.png);

	}
        #mood_tabel {
                top: 0px;
        }
	</style>
	";
}
add_action('wp_footer', 'moodify_css');


?>
