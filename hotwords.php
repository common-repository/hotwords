<?php

/*
Plugin Name: Hotwords
Plugin URI: https://www.hotwords.com
Description: Official plugin to integrate Hotwords into your Wordpress. Adapted for versions 4.x
Version: 2.3
Author: Mediaresponse
Author URI:  http://www.mediaresponse.es
License: GPL2
*/

// Creado por: KLR

// Hotwords Menu (Admin)
function hotwords_official_menu(){
	add_menu_page( 'Hotwords', 'Hotwords', 'manage_options', 'hotwords/templates/options.php'  , '', plugins_url( 'assets/img/icon.png',__FILE__ ) );
}

// Hotwords script added in the footer.
function hw_footer_add_script(){
	$idSite=get_option( 'hotwords-official-config-idsite' );
	$color=get_option( 'hotwords-official-config-color' );
	$protocol = (is_ssl() ? "https" : "http");
	wp_enqueue_script( 'script-hotwords',  $protocol.'://ads'. $idSite .'.hotwords.com/show.jsp?id='. $idSite .'&cor='. $color .'', array(), null, true );

}

// Insert div where in-text will appear.
function hw_insert_div($content){

	$start = '<div id="HOTWordsTxt">';
	$end = '</div>';

	$content = $start . $content . $end;

	return $content;
}

// Show a warning message if the user doesn't enter his IdSite.
/*function hw_warning() {
	
	$idSite=get_option( 'hotwords-official-config-idsite');

	if (  $idSite=='' || !isset($idSite)  ) {	
		echo "<div class='updated fade-ff0000'>
                         <p>
                            <strong>Hotwords Warning!</strong>
                            <br>
                             Don't forget to enter your idSite: <a href=\"admin.php?page=hotwords-official%2Ftemplates%2Foptions.php\">Here</a>
                            <br>
                         </p>
                      </div>";
	}
	return;
}*/

add_action('admin_menu', 'hotwords_official_menu');

add_action('wp_footer', 'hw_footer_add_script');

add_filter("the_content", 'hw_insert_div');

//add_action('admin_notices', 'hw_warning');
