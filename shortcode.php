<?php
/*
* Plugin Name: WordPress Plugin Piktochart Responsive Embed
* Description: Shortcode to embed the responsive piktochart code
* Version: 1.5
* Author: Rob Saum
* Author URI: https://www.robsaum.com
*/


function get_piktoID($content) {
	// Sample:
    // https://create.piktochart.com/output/46166503-course-policies
		$url_parts = explode('/', $content);
	    $parts = sizeof($url_parts);
	    $last_element = $parts -1;
	    $new_content = $url_parts[$last_element];
	    return $new_content;
}


function gen_infographic($content) {
	$player_code = '<div class="piktowrapper-embed" style="height: 300px; position: relative;" data-uid="'. $content .'"><div class="pikto-canvas-wrap"><div class="pikto-canvas"><div class="embed-loading-overlay" style="width: 100%; height: 100%; position: absolute; text-align: center;"><img alt="Loading..." style="margin-top: 100px" src="https://create.piktochart.com/loading.gif" width="60px"><p style="margin: 0; padding: 0; font-family: Lato, Helvetica, Arial, sans-serif; font-weight: 600; font-size: 16px">Loading...</p></div></div></div></div><script>(function(d){var js, id="pikto-embed-js", ref=d.getElementsByTagName("script")[0];if (d.getElementById(id)) { return;}js=d.createElement("script"); js.id=id; js.async=true;js.src="https://create.piktochart.com/assets/embedding/embed.js";ref.parentNode.insertBefore(js, ref);}(document));</script>';
	return $player_code;	
}


function piktochart_emebed_function( $atts, $content = null) {

	if( strpos( $content, ':' ) !== false) {
			// It's a URL
		    $content = get_vidID($content);
		    echo gen_infographic($content);


		} else {
	    	echo gen_infographic($content);
		}
}

add_shortcode('pc', 'piktochart_emebed_function');

?>