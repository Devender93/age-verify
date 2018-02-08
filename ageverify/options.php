<?php
/* Options Page */

// --------------------------------------------------------------------------------------
// CALLBACK FUNCTION FOR: register_uninstall_hook(__FILE__, 'ageverify_delete_plugin_options')
// --------------------------------------------------------------------------------------

// Delete options table entries ONLY when plugin deactivated AND deleted
function ageverify_delete_plugin_options() {
	delete_option('ageverify_options');
}

// ------------------------------------------------------------------------------
// CALLBACK FUNCTION FOR: register_activation_hook(__FILE__, 'ageverify_add_defaults')
// ------------------------------------------------------------------------------

// Define default option settings
function ageverify_add_defaults() {
	$tmp = get_option('ageverify_options');
    if(!is_array($tmp)) {
		delete_option('ageverify_options'); // so we don't have to reset all the 'off' checkboxes too! (dont think this is needed but leave for now)
		$arr = array(	
			"ageverify_on" => 0,
			"ageverify_template" => "opaque",
			"ageverify_cookielength" => "1",
			"ageverify_underageredirect" => "https://ageverify.co",
			"ageverify_prompttext" => "Welcome!<br /><br />Please verify your<br />age to enter.",
			"ageverify_entertext" => "I am 18 or Older",
			"ageverify_exittext" => "I am Under 18",
			"ageverify_prompttextdob" => "Welcome!<br /><br />Please submit your<br />date of birth to enter.",
			"ageverify_yytext" => "YYYY",
			"ageverify_mmtext" => "MM",
			"ageverify_ddtext" => "DD",
			//"ageverify_language" => "en",
			"ageverify_age" => "18",
			"ageverify_method" => "dob"

		);
		update_option('ageverify_options', $arr);
	}
}

// ------------------------------------------------------------------------------
// CALLBACK FUNCTION FOR: add_action('admin_init', 'ageverify_init' )
// ------------------------------------------------------------------------------
// THIS FUNCTION RUNS WHEN THE 'admin_init' HOOK FIRES, AND REGISTERS YOUR PLUGIN
// SETTING WITH THE WORDPRESS SETTINGS API. YOU WON'T BE ABLE TO USE THE SETTINGS
// API UNTIL YOU DO.
// ------------------------------------------------------------------------------

// Init plugin options to white list our options
function ageverify_init(){
	register_setting( 'ageverify_plugin_options', 'ageverify_options', 'ageverify_validate_options' );
}

// ------------------------------------------------------------------------------
// CALLBACK FUNCTION FOR: add_action('admin_menu', 'ageverify_add_options_page');
// ------------------------------------------------------------------------------

// Add menu page
function ageverify_add_options_page() {
	add_menu_page( 
		'AgeVerify', 
		'AgeVerify', 
		'manage_options', 
		'age-verify-options', 
		'ageverify_render_options_page', 
		plugin_dir_url( __FILE__ ) . '/includes/AVicon20.png', 
		85.420
	);
}


// ------------------------------------------------------------------------------
// CALLBACK FUNCTION SPECIFIED IN: add_options_page()
// ------------------------------------------------------------------------------
add_action( 'admin_init', 'ageverify_settings_init' );

function ageverify_settings_init(  ) { 

	register_setting( 'pluginPage', 'ageverify_settings' );
	register_setting( 'customize', 'ageverify_settings' );
	register_setting( 'moreFromImbibeDigital', 'ageverify_settings' );

	add_settings_section(
		'ageverify_pluginPage_section', 
		__( '', 'ageverify' ), 
		'ageverify_settings_section_callback', 
		'pluginPage'
	);

	add_settings_field( 
		'ageverify_on', 
		__( 'Enable or Disable AgeVerify', 'ageverify' ), 
		'ageverify_on_render', 
		'pluginPage', 
		'ageverify_pluginPage_section' 
	);

	add_settings_field( 
		'ageverify_template', 
		__( 'Select a Background', 'ageverify' ), 
		'ageverify_template_render', 
		'pluginPage', 
		'ageverify_pluginPage_section' 
	);
	
		add_settings_field( 
		'ageverify_method', 
		__( 'Select Age Verification Method', 'ageverify' ), 
		'ageverify_method_render', 
		'pluginPage', 
		'ageverify_pluginPage_section' 
	);
	
		add_settings_field( 
		'ageverify_prompttext', 
		__( 'Age Verification Button Prompt Text<br />(use &lt;br /&gt; for line breaks)', 'ageverify' ), 
		'ageverify_prompttext_render', 
		'pluginPage', 
		'ageverify_pluginPage_section' 
	);
	
			add_settings_field( 
		'ageverify_entertext', 
		__( 'Enter Button Text', 'ageverify' ), 
		'ageverify_entertext_render', 
		'pluginPage', 
		'ageverify_pluginPage_section' 
	);
	
			add_settings_field( 
		'ageverify_exittext', 
		__( 'Exit Button Text', 'ageverify' ), 
		'ageverify_exittext_render', 
		'pluginPage', 
		'ageverify_pluginPage_section' 
	);
	
			add_settings_field( 
		'ageverify_prompttextdob', 
		__( 'Age Verification Date of Birth Prompt Text<br />(use &lt;br /&gt; for line breaks)', 'ageverify' ), 
		'ageverify_prompttextdob_render', 
		'pluginPage', 
		'ageverify_pluginPage_section' 
	);

	add_settings_field( 
		'ageverify_age', 
		__( 'Minimum Age for Entry (in years)', 'ageverify' ), 
		'ageverify_age_render', 
		'pluginPage', 
		'ageverify_pluginPage_section' 
	);
	
	add_settings_field( 
		'ageverify_yytext', 
		__( 'Birth Year Input Placeholder Text', 'ageverify' ), 
		'ageverify_yytext_render', 
		'pluginPage', 
		'ageverify_pluginPage_section' 
	);
	
	add_settings_field( 
		'ageverify_mmtext', 
		__( 'Birth Month Input Placeholder Text', 'ageverify' ), 
		'ageverify_mmtext_render', 
		'pluginPage', 
		'ageverify_pluginPage_section' 
	);
	
	add_settings_field( 
		'ageverify_ddtext', 
		__( 'Birth Day Input Placeholder Text', 'ageverify' ), 
		'ageverify_ddtext_render', 
		'pluginPage', 
		'ageverify_pluginPage_section' 
	);
	
	add_settings_field( 
		'ageverify_cookielength', 
		__( 'Cookie Duration (in hours)', 'ageverify' ), 
		'ageverify_cookielength_render', 
		'pluginPage', 
		'ageverify_pluginPage_section' 
	);
		add_settings_field( 
		'ageverify_underageredirect', 
		__( 'Location of Underage Redirect (full URL)', 'ageverify' ), 
		'ageverify_underageredirect_render', 
		'pluginPage', 
		'ageverify_pluginPage_section' 
	);

	// customize tab
	add_settings_section(
		'ageverify_customize_section', 
		'', 
		'ageverify_customize_section_callback', 
		'customize'
	);
	
		    // More from Imbibe Digital tab
	add_settings_section(
		'ageverify_moreFromImbibeDigital_section', 
		'', 
		'ageverify_moreFromImbibeDigital_section_callback', 
		'moreFromImbibeDigital'
	);

}

function ageverify_on_render() {

	$options = get_option( 'ageverify_settings' );
	?>
	<input 	type='checkbox' 
			id='on'
			name='ageverify_settings[ageverify_on]' 
			<?php checked( $options['ageverify_on'], 1 ); ?> 
			value='1'
	>
	<label for='on' id='toggle-on'><?php _e( 'On', 'ageverify' ); ?></label>
	<hr style="margin-bottom:30px;">
	<?php

}

function ageverify_template_render(  ) { 

	$options = get_option( 'ageverify_settings' );
	require_once( plugin_dir_path( __FILE__ ) . 'includes/templates.php' ); ?>
	<div id="ageverify-gallery">
		<?php foreach( $templates as $template ) { ?>
			<div class="galleryItem <?php echo $template['tags']; ?>">
				<input 	type='radio' 
						name='ageverify_settings[ageverify_template]' 
						value='<?php echo $template['name']; ?>' 
						id='<?php echo $template['name']; ?>' 
						<?php checked( $options['ageverify_template'], $template['name'], true) ; ?>
				> 
				<label for='<?php echo $template['name']; ?>'>
					<img src='<?php echo plugins_url() . '/ageverify/includes/' . $template['image']; ?>' alt='<?php echo $template['title']; ?>'>
                    
                    <div class="TemplateTitle"><?php echo $template['title']; ?>
                    </div>
				</label>
			</div>
		<?php }	?>
		<hr style='margin-top:20px;margin-bottom:30px;'>
	</div>
	
<?php }


function ageverify_method_render(  ) { 

	$options = get_option( 'ageverify_settings' );
	$methods = array(
		array( 
			"name" => __( 'Date of Birth Input<br />(month / day / year)', 'ageverify' ),
			"code" => "MDY",
			),
            array( 
			"name" => __( 'Date of Birth Input<br />(day / month / year)', 'ageverify' ),
			"code" => "DMY",
			),
		array(
			"name" => __( 'Button Prompt<br />(over age / under age)', 'ageverify' ),
			"code" => "ABP"
			)
		);
	foreach( $methods as $method ) { ?>
		<input 	type='radio' 
				name='ageverify_settings[ageverify_method]' 
				value='<?php echo $method['code']; ?>'
				id='<?php echo $method['code']; ?>'
				onclick='methodSelect();'
				<?php checked( $options['ageverify_method'], $method['code'], true) ; ?>
		> 
		<label for='<?php echo $method['code']; ?>'>
			<?php echo $method['name']; ?>
		</label>
		
						    <?php
    echo "<script language='javascript'>
	
	function methodSelect(){
	var prompttextParent = document.getElementById('prompttext').parentNode;
	prompttextParent.setAttribute('id','prompttextParent');
	var prompttextParentParent = document.getElementById('prompttextParent').parentNode;
	prompttextParentParent.setAttribute('id','prompttextParentParent');
	prompttextParentParent.style.display='none';
	
	var prompttextdobParent = document.getElementById('prompttextdob').parentNode;
	prompttextdobParent.setAttribute('id','prompttextdobParent');
	var prompttextdobParentParent = document.getElementById('prompttextdobParent').parentNode;
	prompttextdobParentParent.setAttribute('id','prompttextdobParentParent');
	prompttextdobParentParent.style.display='none';
	
	var entertextParent = document.getElementById('entertext').parentNode;
	entertextParent.setAttribute('id','entertextParent');
	var entertextParentParent = document.getElementById('entertextParent').parentNode;
	entertextParentParent.setAttribute('id','entertextParentParent');
	entertextParentParent.style.display='none';
	
	var exittextParent = document.getElementById('exittext').parentNode;
	exittextParent.setAttribute('id','exittextParent');
	var exittextParentParent = document.getElementById('exittextParent').parentNode;
	exittextParentParent.setAttribute('id','exittextParentParent');
	exittextParentParent.style.display='none';
	
	var ageParent = document.getElementById('age').parentNode;
	ageParent.setAttribute('id','ageParent');
	var ageParentParent = document.getElementById('ageParent').parentNode;
	ageParentParent.setAttribute('id','ageParentParent');
	ageParentParent.style.display='none';
	
	var yytextParent = document.getElementById('yytext').parentNode;
	yytextParent.setAttribute('id','yytextParent');
	var yytextParentParent = document.getElementById('yytextParent').parentNode;
	yytextParentParent.setAttribute('id','yytextParentParent');
	yytextParentParent.style.display='none';
	
	var mmtextParent = document.getElementById('mmtext').parentNode;
	mmtextParent.setAttribute('id','mmtextParent');
	var mmtextParentParent = document.getElementById('mmtextParent').parentNode;
	mmtextParentParent.setAttribute('id','mmtextParentParent');
	mmtextParentParent.style.display='none';
	
	var ddtextParent = document.getElementById('ddtext').parentNode;
	ddtextParent.setAttribute('id','ddtextParent');
	var ddtextParentParent = document.getElementById('ddtextParent').parentNode;
	ddtextParentParent.setAttribute('id','ddtextParentParent');
	ddtextParentParent.style.display='none';
	
	var MDYmethod = document.getElementById('MDY');
	var DMYmethod = document.getElementById('DMY');
	var ABPmethod = document.getElementById('ABP');
	
	if (MDYmethod.checked === true || DMYmethod.checked === true) {
	ageParentParent.style.display='block';
	prompttextParentParent.style.display='none';
	prompttextdobParentParent.style.display='block';
	entertextParentParent.style.display='none';
	exittextParentParent.style.display='none';
	yytextParentParent.style.display='block';
	mmtextParentParent.style.display='block';
	ddtextParentParent.style.display='block';}
	if (ABPmethod.checked === true) {
	ageParentParent.style.display='none';
	prompttextParentParent.style.display='block';
	prompttextdobParentParent.style.display='none';
	entertextParentParent.style.display='block';
	exittextParentParent.style.display='block';
	yytextParentParent.style.display='none';
	mmtextParentParent.style.display='none';
	ddtextParentParent.style.display='none';}
	}
	
	window.onload = methodSelect;
</script>

";
?>
		
		
	<?php }
?>		<hr style='margin-top:20px;margin-bottom:30px;'><?php
}


function ageverify_age_render() { 

	$options = get_option( 'ageverify_settings' );
    ?>		
			<input 	style='font-weight:bold;width:100px;color:green;margin-bottom:20px;'
    		type='number' 
			id='age'
			name='ageverify_settings[ageverify_age]' 
            value='<?php echo $options['ageverify_age']; ?>'
       
	>
	
	    <?php
    echo "<script language='javascript'>
	var age = document.getElementById('age').value;
	if (age === '0' || age === '' || age === 0){
		document.getElementById('age').setAttribute('value', '18');}
</script>
";
?>
	<hr style='margin-top:10px;margin-bottom:30px;'>
	<?php 

}

function ageverify_prompttext_render() {

	$options = get_option( 'ageverify_settings' );
	?>
	<textarea 	style='font-weight:bold;width:330px; height:105px;color:green;border:1px solid green;margin-bottom:20px;'
    		type='text' 
			id='prompttext'
			name='ageverify_settings[ageverify_prompttext]'
          maxlength='140' 
          rows='5'
           placeholder='Welcome!<br /><br />Please verify your<br />age to enter.'
	><?php echo $options['ageverify_prompttext']; ?></textarea>
    <?php
    echo "<script language='javascript'>
	var prompttextcheck = document.getElementById('prompttext').innerHTML;
	if (prompttextcheck === 'Welcome!<br /><br />Please verify your<br />age to enter.' || prompttextcheck === ''){
		document.getElementById('prompttext').innerHTML = 'Welcome!<br /><br />Please verify your<br />age to enter.';}
</script>
";
?><hr style='margin-top:10px;margin-bottom:30px;'>
	<?php

}

function ageverify_entertext_render() {

	$options = get_option( 'ageverify_settings' );
	?>
	<input 	style='font-weight:bold;width:235px;color:green;margin-bottom:20px;text-align:center;border:1px solid green;'
    		type='text' 
			id='entertext'
			maxlength='24'
			name='ageverify_settings[ageverify_entertext]' 
            value='<?php echo $options['ageverify_entertext']; ?>'
            
	>
    <?php
    echo "<script language='javascript'>
	var entertextcheck = document.getElementById('entertext').value;
	if (entertextcheck === 'I am 18 or Older' || entertextcheck === ''){
		document.getElementById('entertext').setAttribute('value', 'I am 18 or Older');}
</script>
";
?><hr style='margin-top:10px;margin-bottom:30px;'>
	<?php

}

function ageverify_exittext_render() {

	$options = get_option( 'ageverify_settings' );
	?>
	<input 	style='font-weight:bold;width:235px;color:green;margin-bottom:20px;text-align:center;border:1px solid green;'
    		type='text' 
			id='exittext'
			maxlength='24'
			name='ageverify_settings[ageverify_exittext]' 
            value='<?php echo $options['ageverify_exittext']; ?>'
            
	>
    <?php
    echo "<script language='javascript'>
	var exittextcheck = document.getElementById('exittext').value;
	if (exittextcheck === 'I am Under 18' || exittextcheck === ''){
		document.getElementById('exittext').setAttribute('value', 'I am Under 18');}
</script>
";
?><hr style='margin-top:10px;margin-bottom:30px;'>
	<?php

}


function ageverify_prompttextdob_render() {

	$options = get_option( 'ageverify_settings' );
	?>
	<textarea 	style='font-weight:bold;width:330px; height:105px;color:green;border:1px solid green;margin-bottom:20px;'
    		type='text' 
			id='prompttextdob'
			name='ageverify_settings[ageverify_prompttextdob]'
          maxlength='140' 
          rows='5'
           placeholder='Welcome!<br /><br />Please submit your<br />date of birth to enter.'
	><?php echo $options['ageverify_prompttextdob']; ?></textarea>
    <?php
    echo "<script language='javascript'>
	var prompttextdobcheck = document.getElementById('prompttextdob').innerHTML;
	if (prompttextdobcheck === 'Welcome!<br /><br />Please submit your<br />date of birth to enter.' || prompttextdobcheck === ''){
		document.getElementById('prompttextdob').innerHTML = 'Welcome!<br /><br />Please submit your<br />date of birth to enter.';}
		</script>
";
?>
  <hr style='margin-top:10px;margin-bottom:30px;'>
	<?php

}

function ageverify_yytext_render() {

	$options = get_option( 'ageverify_settings' );
	?>
	<input 	style='font-weight:bold;width:60px;color:green;margin-bottom:20px;text-align:center;border:1px solid green;'
    		type='text' 
			id='yytext'
			maxlength='4'
			name='ageverify_settings[ageverify_yytext]' 
            value='<?php echo $options['ageverify_yytext']; ?>'
            
	>
    <?php
    echo "<script language='javascript'>
	var yytextcheck = document.getElementById('yytext').value;
	if (yytextcheck === 'YYYY' || yytextcheck === ''){
		document.getElementById('yytext').setAttribute('value', 'YYYY');}
</script>
";
?><hr style='margin-top:10px;margin-bottom:30px;'>
	<?php

}

function ageverify_mmtext_render() {

	$options = get_option( 'ageverify_settings' );
	?>
	<input 	style='font-weight:bold;width:60px;color:green;margin-bottom:20px;text-align:center;border:1px solid green;'
    		type='text' 
			id='mmtext'
			maxlength='2'
			name='ageverify_settings[ageverify_mmtext]' 
            value='<?php echo $options['ageverify_mmtext']; ?>'
            
	>
    <?php
    echo "<script language='javascript'>
	var mmtextcheck = document.getElementById('mmtext').value;
	if (mmtextcheck === 'MM' || mmtextcheck === ''){
		document.getElementById('mmtext').setAttribute('value', 'MM');}
</script>
";
?><hr style='margin-top:10px;margin-bottom:30px;'>
	<?php

}

function ageverify_ddtext_render() {

	$options = get_option( 'ageverify_settings' );
	?>
	<input 	style='font-weight:bold;width:60px;color:green;margin-bottom:20px;text-align:center;border:1px solid green;'
    		type='text' 
			id='ddtext'
			maxlength='2'
			name='ageverify_settings[ageverify_ddtext]' 
            value='<?php echo $options['ageverify_ddtext']; ?>'
            
	>
    <?php
    echo "<script language='javascript'>
	var ddtextcheck = document.getElementById('ddtext').value;
	if (ddtextcheck === 'DD' || mmtextcheck === ''){
		document.getElementById('ddtext').setAttribute('value', 'DD');}
</script>
";
?><hr style='margin-top:10px;margin-bottom:30px;'>
	<?php

}


	function ageverify_cookielength_render() {

	$options = get_option( 'ageverify_settings' );
	?>
	<input 	style='font-weight:bold;width:100px;color:green;margin-bottom:20px;'
    		type='number' 
			id='cookielength'
			step='0.1'
			name='ageverify_settings[ageverify_cookielength]' 
            value='<?php echo $options['ageverify_cookielength']; ?>'
            
	>
    
    <?php
    echo "<script language='javascript'>
	var cookiecheck = document.getElementById('cookielength').value;
	if (cookiecheck === '0' || cookiecheck === '' || cookiecheck === 0){
		document.getElementById('cookielength').setAttribute('value', '1');}
</script>
";
?><hr style='margin-top:10px;margin-bottom:30px;'>
	<?php

}


function ageverify_underageredirect_render() {

	$options = get_option( 'ageverify_settings' );
	?>
	<input 	style='font-weight:bold;width:300px;color:green;margin-bottom:20px;'
    		type='text' 
			id='underageredirect'
			name='ageverify_settings[ageverify_underageredirect]' 
            value='<?php echo $options['ageverify_underageredirect']; ?>'
            
	>
    <?php
    echo "<script language='javascript'>
	var redirectcheck = document.getElementById('underageredirect').value;
	if (redirectcheck === 'https://ageverify.co' || redirectcheck === ''){
		document.getElementById('underageredirect').setAttribute('value', 'https://ageverify.co');}
</script>
";
?><hr style='margin-top:10px;margin-bottom:20px;'>
	<?php

}


function ageverify_settings_section_callback(  ) { 

}

function ageverify_customize_section_callback() { ?>
	<?php add_thickbox(); ?> 
	<div id="ageverify-customize">
		<div id="ageverify-customize-header">
			<h2><?php _e( 'Custom AgeVerify Designs', 'ageverify' ); ?></h2>
			<p><?php _e( 'We build custom AgeVerify instances that meet the unique needs of your business and feature the importance of your brand. Review the features listed below and check out some of our recent custom work in the gallery.', 'ageverify' ); ?></p>
		</div>
		<div id="ageverify-custom-features">
			<h3><?php _e( 'Features', 'ageverify' ); ?></h3>
			<ul>
				<li><?php _e( 'Use Any Background Image or Video (one of our templates or provide your own)', 'ageverify' ); ?></li>
			    <li><?php _e( 'Add your logo to the age-verification prompt', 'ageverify' ); ?></li>
			    <li><?php _e( 'Add Multi-Location Functionality (State, Country, etc)', 'ageverify' ); ?></li>
			    <li><?php _e( 'Buttons are color-coded to match your website or logo', 'ageverify' ); ?></li>
			    <li><?php _e( 'Multi-Language Prompt Toggle', 'ageverify' ); ?></li>
			    <li><?php _e( 'Add Remember Me Functionality', 'ageverify' ); ?></li>
			    <li><?php _e( 'Add a Terms of Service or User Agreement', 'ageverify' ); ?></li>
			    <li><?php _e( 'Add social media icons and links to age verification', 'ageverify' ); ?></li>
			    <li><?php _e( 'Ads and links to AgeVerify are removed', 'ageverify' ); ?></li>
				<li><?php _e( 'Already using AgeVerify Pro? We’ll happily credit the full price of your Pro instance towards a new custom instance.', 'ageverify' ); ?></li>
			</ul>
            <div style="text-align:center;padding-top:20px;padding-bottom:20px;"><a href="https://ageverify.co/custom-template/" target="_blank" style="padding:10px; color:#fff;background-color:green;box-shadow: #777 2px 2px 4px;text-decoration:none;font-size:18px;">Get Started</a></div>
		</div>
		<div id="ageverify-custom-examples">
			<div class="ageverify-custom-example">
				<a class="thickbox" href="<?php echo plugins_url(); ?>/ageverify/includes/custom_madswede.jpg">
                    <img src="<?php echo plugins_url(); ?>/ageverify/includes/custom_madswede.jpg">
                  
				</a>
				<span class="caption"><a href="http://madswedebrewing.com/" target="_blank"><?php _e( 'Mad Swede Brewing', 'ageverify' ); ?></a></span>
			</div>
			
			<div class="ageverify-custom-example">
				<a class="thickbox" href="<?php echo plugins_url(); ?>/ageverify/includes/custom_madmodder.jpg">
                    <img src="<?php echo plugins_url(); ?>/ageverify/includes/custom_madmodder.jpg">
                  
				</a>
				<span class="caption"><a href="http://www.madmodderstudios.com/" target="_blank"><?php _e( 'Mad Modder Studios', 'ageverify' ); ?></a></span>
			</div>
			
	        <div class="ageverify-custom-example">
				<a class="thickbox" href="<?php echo plugins_url(); ?>/ageverify/includes/custom_azuniatequila.jpg">
                    <img src="<?php echo plugins_url(); ?>/ageverify/includes/custom_azuniatequila.jpg">
                  
				</a>
				<span class="caption"><a href="https://www.azuniatequila.com/" target="_blank"><?php _e( 'Azunia Tequila', 'ageverify' ); ?></a></span>
			</div>
			
			<div class="ageverify-custom-example">
				<a class="thickbox" href="<?php echo plugins_url(); ?>/ageverify/includes/custom_blaqvapor.jpg">
                    <img src="<?php echo plugins_url(); ?>/ageverify/includes/custom_blaqvapor.jpg">
                  
				</a>
				<span class="caption"><a href="http://blaqvapor.com/" target="_blank"><?php _e( 'BLAQ Vapor', 'ageverify' ); ?></a></span>
			</div>
            
            
			<div class="ageverify-custom-example">
				<a class="thickbox" href="<?php echo plugins_url(); ?>/ageverify/includes/custom_craftedextracts.jpg">
                    <img src="<?php echo plugins_url(); ?>/ageverify/includes/custom_craftedextracts.jpg">
				</a>
				<span class="caption"><a href="https://craftedextracts.co/" target="_blank"><?php _e( 'Crafted Extracts', 'ageverify' ); ?></a></span>
			</div>
            
            
			<div class="ageverify-custom-example">
				<a class="thickbox" href="<?php echo plugins_url(); ?>/ageverify/includes/custom_cloverhill.jpg">
                    <img src="<?php echo plugins_url(); ?>/ageverify/includes/custom_cloverhill.jpg">
				</a>
				<span class="caption"><a href="http://cloverhillwines.com.au/" target="_blank"><?php _e( 'Clover Hill Wines', 'ageverify' ); ?></a></span>
			</div>
            
            
			<div class="ageverify-custom-example">
				<a class="thickbox" href="<?php echo plugins_url(); ?>/ageverify/includes/custom_LuckyMoonshine.jpg">
                    <img src="<?php echo plugins_url(); ?>/ageverify/includes/custom_LuckyMoonshine.jpg">
				</a>
				<span class="caption"><a href="http://luckymoonshine.com/" target="_blank"><?php _e( 'Lucky Moonshine', 'ageverify' ); ?></a></span>
			</div>
           
           	<div class="ageverify-custom-example">
				<a class="thickbox" href="<?php echo plugins_url(); ?>/ageverify/includes/custom_experienceacid.jpg">
                    <img src="<?php echo plugins_url(); ?>/ageverify/includes/custom_experienceacid.jpg">
				</a>
				<span class="caption"><a href="http://experienceacid.com/" target="_blank"><?php _e( 'Experience ACID Cigars', 'ageverify' ); ?></a></span>
			</div>
            
            
            <div class="ageverify-custom-example">
				<a class="thickbox" href="<?php echo plugins_url(); ?>/ageverify/includes/custom_CopperAndKings.jpg">
                    <img src="<?php echo plugins_url(); ?>/ageverify/includes/custom_CopperAndKings.jpg">
				</a>
				<span class="caption"><a href="http://www.copperandkings.com/" target="_blank"><?php _e( 'Copper and Kings Distillery', 'ageverify' ); ?></a></span>
			</div>
            
            
			<div class="ageverify-custom-example">
				<a class="thickbox" href="<?php echo plugins_url(); ?>/ageverify/includes/custom_WakeAndVape.jpg">
                    <img src="<?php echo plugins_url(); ?>/ageverify/includes/custom_WakeAndVape.jpg">
				</a>
				<span class="caption"><a href="http://www.wakeandvape.com/" target="_blank"><?php _e( 'Wake and Vape', 'ageverify' ); ?></a></span>
			</div>
            
            
			<div class="ageverify-custom-example">
				<a class="thickbox" href="<?php echo plugins_url(); ?>/ageverify/includes/custom_warpigs.jpg">
                    <img src="<?php echo plugins_url(); ?>/ageverify/includes/custom_warpigs.jpg">
				</a>
				<span class="caption"><a href="http://warpigs.com/" target="_blank"><?php _e( 'WarPigs Brewing', 'ageverify' ); ?></a></span>
			</div>
      
      		<div class="ageverify-custom-example">
				<a class="thickbox" href="<?php echo plugins_url(); ?>/ageverify/includes/custom_kudjoe.jpg">
                    <img src="<?php echo plugins_url(); ?>/ageverify/includes/custom_kudjoe.jpg">
				</a>
				<span class="caption"><a href="http://www.kudjoe.com/" target="_blank"><?php _e( 'Kudjoe Jamaican Rum', 'ageverify' ); ?></a></span>
			</div>
      
            <div class="ageverify-custom-example">
				<a class="thickbox" href="<?php echo plugins_url(); ?>/ageverify/includes/custom_purecbd.jpg">
                    <img src="<?php echo plugins_url(); ?>/ageverify/includes/custom_purecbd.jpg">
				</a>
				<span class="caption"><a href="https://www.purecbdvapors.com/" target="_blank"><?php _e( 'Pure Cannabidiol Vapors', 'ageverify' ); ?></a></span>
			</div>
      
            <div class="ageverify-custom-example">
				<a class="thickbox" href="<?php echo plugins_url(); ?>/ageverify/includes/custom_dripdropdistro.jpg">
                    <img src="<?php echo plugins_url(); ?>/ageverify/includes/custom_dripdropdistro.jpg">
				</a>
				<span class="caption"><a href="https://dripdropdistro.com/" target="_blank"><?php _e( 'Drip Drop Distro', 'ageverify' ); ?></a></span>
			</div>
      
            <div class="ageverify-custom-example">
				<a class="thickbox" href="<?php echo plugins_url(); ?>/ageverify/includes/custom_jerrysvodka.jpg">
                    <img src="<?php echo plugins_url(); ?>/ageverify/includes/custom_jerrysvodka.jpg">
				</a>
				<span class="caption"><a href="https://www.jerrysvodka.com/" target="_blank"><?php _e( 'Jerrys Vodka', 'ageverify' ); ?></a></span>
			</div>
      
            <div class="ageverify-custom-example">
				<a class="thickbox" href="<?php echo plugins_url(); ?>/ageverify/includes/custom_rouleurbrewing.jpg">
                    <img src="<?php echo plugins_url(); ?>/ageverify/includes/custom_rouleurbrewing.jpg">
				</a>
				<span class="caption"><a href="http://rouleurbrewing.com/" target="_blank"><?php _e( 'Rouleur Brewing', 'ageverify' ); ?></a></span>
			</div>
       
            
       
		</div>
	</div>

<?php }

// begin moreFromImbibeDigital page section


function ageverify_moreFromImbibeDigital_section_callback() { ?>
	<?php add_thickbox(); ?> 
	<div id="ageverify-localsip">
		<div id="ageverify-localsip-header">
			<h2><?php _e( 'Introducing: LocalSip', 'ageverify' ); ?></h2>
			<p><?php _e( 'With LocalSip, breweries, wineries, and distilleries can easily add a bottle / tap location web service to any website in a matter of minutes. LocalSip is powered by Google Maps, is fully customized to match any website and uses the power of geo-location and data analytics to help website visitors find sales outlets, resulting in increased sales. ', 'ageverify' ); ?></p>
		</div>
		<div id="ageverify-localsip-features">
			<h3><?php _e( 'Features', 'ageverify' ); ?></h3>
			<ul>
				<li><?php _e( 'Embed your LocalSip Locator directly on any website', 'ageverify' ); ?></li>
			    <li><?php _e( 'Powered by Google Maps. Secure, accurate and reliable.', 'ageverify' ); ?></li>
			    <li><?php _e( 'Geo-location so your website visitors can find the location nearest them', 'ageverify' ); ?></li>
			    <li><?php _e( 'Display your LocalSip locator on any screen or display', 'ageverify' ); ?></li>
			    <li><?php _e( 'Installs in minutes', 'ageverify' ); ?></li>
			    <li><?php _e( 'No coding required. Send us your location list, and we will do the heavy lifting.', 'ageverify' ); ?></li>
			</ul>
            <div style="text-align:center;padding-top:20px;padding-bottom:40px;"><a href="https://localsip.co" target="_blank" style="padding:10px; color:#fff;background-color:#f1a501;box-shadow: #777 2px 2px 4px;text-decoration:none;font-size:18px;">Learn More</a></div>
            <img src="<?php echo plugins_url() . '/ageverify/includes/LocalSipLogo.png'; ?>" style='width:136px;height:auto;margin-bottom:20px;'/>
		</div>
		<div id="ageverify-localsip-examples">
		
			</div>
       
            
       
		</div>
	</div>

<?php }


// Render the Plugin options form
function ageverify_render_options_page() {
	?>

	<div class="wrap">
		<h2><?php _e('AgeVerify Configuration', 'ageverify'); ?></h2>
		<?php settings_errors(); ?>

		<?php  
                $active_tab = isset( $_GET[ 'tab' ] ) ? $_GET[ 'tab' ] : 'pluginPage';  
        ?> 

        <h2 class="nav-tab-wrapper">  
            <a href="?page=age-verify-options&tab=pluginPage" class="nav-tab <?php echo $active_tab == 'pluginPage' ? 'nav-tab-active' : ''; ?>"><?php _e( 'Settings', 'ageverify' ); ?></a>  
            <a href="?page=age-verify-options&tab=customize" class="nav-tab <?php echo $active_tab == 'customize' ? 'nav-tab-active' : ''; ?>"><?php _e( 'Customize', 'ageverify' ); ?></a>  
            <a href="?page=age-verify-options&tab=moreFromImbibeDigital" class="nav-tab <?php echo $active_tab == 'moreFromImbibeDigital' ? 'nav-tab-active' : ''; ?>"><?php _e( 'More from Imbibe Digital', 'ageverify' ); ?></a>  
        </h2> 

		<div id="ageverify" style="width: 75%; min-width: 350px; float: left;">
		<img src="<?php echo plugins_url() . '/ageverify/includes/AgeVerifyLogo.png'; ?>" id="AgeVerifyLogo" />
			<script type='text/javascript'>
			if(window.location.href.indexOf("moreFromImbibeDigital") > -1){
				document.getElementById("AgeVerifyLogo").style.display = 'none';
			} 
			</script>
			
			<!-- Beginning of the Plugin Options Form -->
			<form method="post" action="options.php">
				<?php 
	            if( $active_tab == 'pluginPage' ) {  
	                settings_fields( 'pluginPage' );
					do_settings_sections( 'pluginPage' ); 
					submit_button();
	            } else if( $active_tab == 'customize' ) {
	                settings_fields( 'customize' );
	                do_settings_sections( 'customize' ); 

	            } else if( $active_tab == 'moreFromImbibeDigital' ) {
	                settings_fields( 'moreFromImbibeDigital' );
	                do_settings_sections( 'moreFromImbibeDigital' ); 

	            }
				
				?>
			</form>

		</div><!-- #main -->
		<?php include( plugin_dir_path( __FILE__ ) . '/includes/aside.php' ); ?>
	</div>

	<?php	
}



// Sanitize and validate input. Accepts an array, return a sanitized array.
function ageverify_validate_options($input) {
	$input['sample_field'] =  wp_filter_nohtml_kses($input['sample_field']); 
	// $input['txt_one'] =  wp_filter_nohtml_kses($input['txt_one']); // Sanitize textbox input (strip html tags, and escape characters)
	// $input['textarea_one'] =  wp_filter_nohtml_kses($input['textarea_one']); // Sanitize textarea input (strip html tags, and escape characters)
	return $input;
}



?>