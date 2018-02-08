<?php 
// sidebar for settings page
?>

<div id="ageverify-sidebar" style="width: 23%; float: right; min-width: 150px;">
	
	<div class="box go-pro" id="av-sidebar-inner">
		<header>
			<?php _e( 'Ready to go Pro?', 'ageverify' ); ?>
		</header>
		<p><?php _e( 'Additional perks you\'ll get with AgeVerify Pro', 'ageverify' ); ?></p>
		<ul id="pro-perks">
			<li><?php _e( 'NEW LOW PRICE!! ONLY $39!', 'ageverify' ); ?></li>
			<li><?php _e( 'No Ads! Woo Hoo!', 'ageverify' ); ?></li>
			<li><?php _e( 'Prioritized Support', 'ageverify' ); ?></li>
			<li><?php _e( 'Early Access to New Features and Templates', 'ageverify' ); ?></li>
		</ul>
		<p><a href="https://ageverify.co/wordpress-upgrade/" target="_blank" class="button submit-button button-primary">
			<?php _e( 'Upgrade to Pro Now', 'ageverify' ); ?>
		</a></p>
	</div>

	<div class="box resources" style="margin-top:20px;">
		<header>
			<?php _e( 'Resources', 'ageverify' ); ?>
		</header>
		
		<p style="text-align:center;">Questions, comments, feedback,<br />feature requests? We'd love to hear from you.<br /><a href="https://ageverify.co/contact-us/" target="_blank"class="button submit-button button-primary" style="margin-top:10px;"><?php _e( 'Contact Us', 'ageverify' ); ?></a>
		</p>
		<hr>
		
		<p style="text-align:center;">AgeVerify is made by the fine folks at <a href="https://imbibedigital.co" target="_blank">ImbibeDigital.co</a>.<br /><br />We specialize in websites, software, and e-commerce solutions for Distilleries, Wineries, Breweries, Dispensaries, Vape Shops, even your local Gin Joints.</p>

	<div class="logo">
		<a href="https://imbibedigital.co/" target="_blank">
			<img src="<?php echo plugins_url() . '/ageverify/includes/imbibedigital.png'; ?>" style="width:200px;height:auto;margin-top:5px;" >
		</a>
	</div>
	
				<script type='text/javascript'>
			if(window.location.href.indexOf("moreFromImbibeDigital") > -1){
				document.getElementById("av-sidebar-inner").style.marginTop = '20px';
			} 
			</script>

</div>


<?php

?>