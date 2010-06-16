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

        echo "<div id='mood_1'><table id='mood_tabel' width='200px' cellpadding='0' cellspacing='0'><tr><td width='30px' align='left' valign='top'>
		<table id='sub_mood_tabel' width='30px' height='30px'><tr height='10' >
		<td></td>
		<td><img id='pijl_1' src='/wp-content/plugins/wk-mood/pijl.png' height='10px' onclick='verwijder_mood()'></td>
		<td></td>
		</tr>
		<tr height='10' >
		<td><img id='pijl_L' src='/wp-content/plugins/wk-mood/pijl_l.png' height='10px' onclick='naar_links_mood()'></td>
		<td></td>
		<td><img id='pijl_R' src='/wp-content/plugins/wk-mood/pijl_r.png' height='10px' onclick='naar_rechts_mood()'></td>
		</tr></table></td><td align='center'><img src='/wp-content/plugins/wk-mood/wijsteunenoranje.png' alt='wij steunen oranje' longdesc='http://www.moodify.nl' /></td>";
        echo "</tr><tr height='90px' ><td width='30px' align='left' valign='bottom'>
<a href='http://moodify.achterdeschermen.nl/?page_id=4' target='_blank'><img id='info' src='/wp-content/plugins/wk-mood/info.png' height='10px'></a>
</td><td width='140px' align='center'>";
	echo "<div id='mood_flash1' height='90px' align='center'></div>"; 
	echo "</td>  </tr></table></div>";
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
                z-index: 9;
                width: 250px;
                background-image: url(/wp-content/plugins/wk-mood/oranje-verloop.png);

	}
        #mood_tabel {
                top: 0px;
                border:0px;
        }
       #sub_mood_tabel {
                top: 0px;
                border:0px;
        }
	</style>
	";
}
add_action('wp_footer', 'moodify_css');


?>
