<?php

if ($_POST['action'] == 'update'){
	// Update data.

	//---- idSite = number
	$idSite = sanitize_text_field( $_POST['idSite'] );
	$safe_idSite = is_numeric($idSite);
	if ( ! $safe_idSite ) {
	  	$idSite = '';
	}
	if ( strlen( $idSite ) > 10 ) {
	  	$idSite = '';
	}
	update_option('hotwords-official-config-idsite', $idSite );


	//---- linkColor = string of 6 caracter.
	$linkColor = sanitize_text_field( $_POST['linkColor'] );
	// Hex value
	$safe_linkColor=preg_match('/^[a-f0-9]{6}$/i', $linkColor);
	if ( !$safe_linkColor ) {
	  	$linkColor = '';
	}
	if ( strlen( $linkColor ) != 6 ) {
	  	$linkColor = '';
	}
	update_option('hotwords-official-config-color', $linkColor);
		
}else{ 
	// IF first time.
	if ( ! (get_option( 'hotwords-official-config-idsite' ) !== false) ) {
	    add_option( 'hotwords-official-config-idsite' , '', null, 'no' );
	}

	if ( ! (get_option( 'hotwords-official-config-color' ) !== false) ) {
	    add_option( 'hotwords-official-config-color' , 'FFFFFF', null, 'no' );
	}

}

// Get data.
$idSite=get_option('hotwords-official-config-idsite');
$color=get_option('hotwords-official-config-color');

?>


<?php wp_enqueue_script( 'script-jscolor', plugins_url( 'assets/js/jscolor.js',dirname(__FILE__) ), array(), '1.0.0', true ); ?>

<div class="wrap">

	<div class="row">

		<div class="col-md-5">

    			<img src="<?php echo plugins_url( 'assets/img/hotwords.png',dirname(__FILE__) );?>"><br><br><br>

    			<h1>Configuration Hotwords Official</h1><br>

    		<div>

		<br>

		<form method="post" name="tcp_test" action="">

			<p> <b>IdSite:</b> <input type="text" class="form-control" name="idSite" value="<?php echo esc_html($idSite) ?>" maxlength="10" /></p>

			<p> 
				<b>Color: </b>

				<a id="styleInput" style="border: 1px solid #000000; font-family:Verdana; font-size:10px; text-decoration: none;">&nbsp;&nbsp;&nbsp;</a>

				<input name="linkColor"  id="valueInput" value="<?php echo esc_html($color) ?>" class="jscolor {valueElement:'valueInput', styleElement:'styleInput'}">

			</p>

			<input type="hidden" name="action" value='update' /><br>

			<input type="submit" name="Submit" class="form-control" style="background-color: #6666FF;color: white; font-weight: 700;font-size:16px;" value="Save" />

		</form>
    	</div>


</div>


<div class="col-md-7">

	

</div>
