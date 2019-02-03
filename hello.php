<?php
/**
 * @package Hello_Dolly_Redux
 * @version 1.1
 */
/*
Plugin Name: Hello Dolly Redux
Plugin URI: http://wordpress.org/plugins/hello-dolly/
Description: This is a redux version of the original Hello Dolly plugin by Matt Mullenweg 
using the lyrics for Drone Racing League by Gunship
Author: Bren Murrell
Version: 1.1.3
Author URI: http://ma.tt/
GitHub Plugin URI: https://github.com/BrenMurrell/test-plugin
*/

function hello_dolly_get_lyric() {
	/** These are the lyrics to Hello Dolly */
	$lyrics = "She's a bird, she's a sidewinder
	Just hold on, we're in this together
	Like a ghost, like a vampire
	Hey spirit, can I take you home?
	Survive, overdrive
	A thousand teeth of a thousand voices
	When the sun goes down, it goes on and on
	(On and on and on and on and-)
	Enter the night through the eye of the storm
	This dark machine, an impossible hero
	Hey starlight, yo battle bird
	Only in dreams can I take you home
	Survive, overdrive
	A thousand teeth of a thousand voices
	When the sun goes down, it goes on and on
	(On and on and on and on and...)
	Hold it, Hell's right here
	My fingers, slip the controls I steer
	As the blood, eyes, hope dies
	A thousand ways to overdrive, go
	Drive, push, harder
	Drive, push, harder
	Hold it, Hell's right here
	My fingers, slip the controls I steer
	As the blood, eyes, hope dies
	A thousand ways to overdrive";

	// Here we split it into lines
	$lyrics = explode( "\n", $lyrics );

	// And then randomly choose a line
	return wptexturize( $lyrics[ mt_rand( 0, count( $lyrics ) - 1 ) ] );
}

// This just echoes the chosen line, we'll position it later
function hello_dolly() {
	$chosen = hello_dolly_get_lyric();
	echo "<p id='dolly'>$chosen</p>";
}

// Now we set that function up to execute when the admin_notices action is called
add_action( 'admin_notices', 'hello_dolly' );

// We need some CSS to position the paragraph
function dolly_css() {
	// This makes sure that the positioning is also good for right-to-left languages
	$x = is_rtl() ? 'left' : 'right';

	echo "
	<style type='text/css'>
	#dolly {
		float: $x;
		padding-$x: 15px;
		padding-top: 5px;		
		margin: 0;
		font-size: 11px;
	}
	</style>
	";
}

add_action( 'admin_head', 'dolly_css' );

?>
