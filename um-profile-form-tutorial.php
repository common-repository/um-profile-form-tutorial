<?php
  
/**
 * Plugin Name: UM Profile Form Tutorial

 * Plugin URI: http://averyniceweb.com/test

 * Description: Many new users don't know the majority of the time how to fill out a profile page form. This add-on for the Ultimate Member ("UM") plugin allows admins to provide UM users a step by step guided tour to fill out an UM profile form. This plugin uses javascript code to create pop up bubbles with comemnts and back/next buttons and is a custom version of WP-Tutorial. To create your own customized virtual tour on demand, please visit our development site. 

 * Version: 1.2

 * Author: Boris Vinatea Jr.


 * Author URI: http://averyniceweb.com


 */

    // add links
    add_filter('plugin_row_meta', 'addUMPFTPluginPageLinks', 10, 2);
    // links on the plugin page
    function addUMPFTPluginPageLinks($links, $file){
      // current plugin ?
      if ($file == 'um-profile-form-tutorial/um-profile-form-tutorial.php'){
        $links[] = '<a href="'.admin_url().'options-general.php?page=um-profile-form-tutorial">'.__('Setup', 'um-profile-form-tour').'</a>';
        $links[] = '<a href="http://averyniceweb.com/login" target="_blank">'.__('Demo', 'um-profile-form-tour').'</a>';
        $links[] = '<a href="http://averyniceweb.com/support/viewforum.php?f=3" target="_blank">'.__('Support', 'um-profile-form-tour').'</a>';
        $links[] = '<a href="https://wordpress.org/support/view/plugin-reviews/um-profile-form-tutorial#postform" target="_blank">'.__('Rate', 'um-profile-form-tour').'</a>';
      }
      
      return $links;
    }

add_action( 'admin_menu', 'um_tutorial_form_menu' );
function um_tutorial_form_menu() {
	add_options_page( 'UM Tutorial Form Options', 'UM Tutorial Form', 'manage_options', 'um-profile-form-tutorial', 'um_tutorial_form_options' );
}
function um_tutorial_form_options() {
	if ( !current_user_can( 'manage_options' ) )  {
		wp_die( __( 'You do not have sufficient permissions to access this page.' ) );
	}
	echo '<div class="wrap">';
	echo '<p><p><font size="3"><strong><a href="http://averyniceweb.com/contact/" target="_blank">Request Custom Modifications</a></strong></font></p></p>
<p><img src="' . plugins_url( 'img/take-tour.png', __FILE__ ) . '" ></p> 
<p>ATTENTION: You need to have <strong>Ultimate Member</strong> installed first for this 
  plugin to work!</p> 
<p>The plugin comes with a button like the one above which you have to insert as 
  a shorcode so that the tutorial tour can be triggered:</p>


<p>The shortcode is:</p>
<p>[um-profile-form-tour-btn]</p>
<p><font size="5"><strong>Instructions to make a shortcode</strong></font></p>
<p>Go to your <a href="'.admin_url().'edit.php?post_type=um_form">UM Profile Form</a> and click on edit mode:</p>
<p>Add a new row.<br />Add a new field .<br />
  Add a shortcode.<br />
  Click edit.<br />
  Visibility: Everywhere<br />
  Privacy: Only visible to profile owners and admin<br />
  Shortcode:<br />
  [um-profile-form-tour-btn]<br />
  Click on update.</p>
<p>The tour button should show up now and it should behave a bit different in view mode. For example, the last step in view mode points at the gear (cog) icon and doesn\'t have an end of tour button, but the bubble will disapper as soon as the edit icon is clicked on. However, in edit mode, the last step should be the update button at the bottom of the UM form. You can. of course, modify the behaviour from start to finish.</p>

<p><font size="5"><strong>Instructions to modify a virtual tour</strong></font></p>

  <p>There are several parameters that can be modified in the tour.js file (/um-profile-form-tutorial/js/tour.js).</p>

  <ol>
  <li> <strong>target</strong></li>
  <li><strong> placement</strong></li>
  <li><strong> title</strong></li>
  <li><strong> content</strong></li>
  <li><strong> Offset</strong></li>
  </ol>
<p>Be aware that the most problematic element in the UM form is the upload cover section. The script is configured to point at the + icon which is what one clicks to change the cover for the first time and which Ultimate Member uses by default (see illustration below).</p>
<div align="left">
<img src="' . plugins_url( 'img/um-cover-default-icon.png', __FILE__ ) . '" >
</div>
<p>You may have to tweak the X/Y Offsettings a bit, especially if your template 
  in the Page Attributes is other than <b>\'Full Width\'</b>.
<p><img src="' . plugins_url( 'img/um-cover-icon.png', __FILE__ ) . '" ></p>
<p>If you are seeing the picture icon and prefer to start your tour with it instead, change the following parameters:</p>
<p><strong>Change the target to:</strong></p>
<p>target: \'i.um-faicon-picture-o\',
<p><strong>And change the offset to:</strong></p>
<p>xOffset: 100</p>
<p>In most cases, the step number 2 of the virtual tour is ignored if the picture icon is already showing at the cover.</p>
<p><strong>You may have to clear your cache after you activate the plugin!</strong></p>
<p>You can modify the tour.js file settings to your heart\'s content, but with the knowledge that you are doing it at your own risk. <a href="'.admin_url().'plugin-editor.php?file=um-profile-form-tutorial%2Fjs%2Ftour.js&plugin=um-profile-form-tutorial%2Fjs%2Ftour.js">Click here</a>. If you have any questions, you can get limited support <a href="http://averyniceweb.com/support/viewforum.php?f=3" target="_blank">(click here)</a>.</p>
<p><font size="5"><strong>Take virtual tour to demo UMPFT</strong></font></p>
<p>You can test a virtual tour with a live site running with Ultimate Member, but you will have to login first at:</p>
<p><b>Website</b>: <a href="http://averyniceweb.com/login" target="_blank">http://averyniceweb.com/login</a><br>
<strong>Username:</strong> test<br>
<strong>Password</strong>: averyniceweb</p>
<p>To create your own customized virtual tour on demand, please visit our development site.</p>
<p><b>If you like this plugin, please donate to continue its development!</b></p>
<p>
<form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
<input type="hidden" name="cmd" value="_s-xclick">
<input type="hidden" name="encrypted" value="-----BEGIN PKCS7-----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-----END PKCS7-----
">
<input type="image" src="https://www.paypalobjects.com/en_US/i/btn/btn_donateCC_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
<img alt="" border="0" src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" width="1" height="1">
</form>
</p>

<p><p><font size="3"><strong><a href="http://averyniceweb.com/contact/" target="_blank">Request Custom Modifications</a></strong></font></p></p>';

echo '</div>';
}


function boro_adds_UMPFT_javascripts_to_header() { // Our own unique function 
wp_enqueue_script('jquery');  // Enqueue jQuery that's already built into WordPress
wp_register_script( 'add-tour-js', plugins_url( '/js/tour.js', __FILE__ ), array('jquery'),'',true  );  // Register our first script for um profile tutorial, to be brought out in the footer

wp_register_script( 'add-borohop-js', plugins_url( '/js/borohop.js', __FILE__ ), '', null,''  ); // Register our second custom script for um profile tutorial

wp_register_style( 'add-borohop-css', content_url() . '/plugins/um-profile-form-tutorial/css/borohop.css','','', 'screen' ); // Register the um profile tutorial stylsheet
    wp_enqueue_script( 'add-tour-js' );  // Enqueue our first script
    wp_enqueue_script( 'add-borohop-js' ); // Enqueue our second script
    wp_enqueue_style( 'add-borohop-css' ); // Enqueue our stylesheet
}
add_action( 'wp_enqueue_scripts', 'boro_adds_UMPFT_javascripts_to_header' ); //Hooks our custom function into WP's wp_enqueue_scripts function




function shortcode_to_form_tour_UMPFT_btn() {

?>

    <div id="beginBoroHop"><div align="center">
<a href="#/" id="beginBoroHop"><?php
echo '<img src="' . plugins_url( 'img/take-tour.png', __FILE__ ) . '" > ';
?></a></div></div>


<?php

}

add_shortcode('um-profile-form-tour-btn', 'shortcode_to_form_tour_UMPFT_btn');



?>