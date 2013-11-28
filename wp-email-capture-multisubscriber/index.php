<?php 

/*
Plugin Name: WP Email Capture (Muli List Subscriber)
Plugin URI: 
Description: Adds a multi list selector for <a href="http://wpemailcapture.com/">WP Email Capture Premium</a>.
Version: 0.1
Author: Rhys Wynne
Author URI: http://www.rhyswynne.co.uk/
*/

function wp_email_capture_display_multi_form_shortcode( $atts ) {

    //$listid = get_option('wp_wpecp_default_list');
    extract( shortcode_atts( array(

        'template'=>"1",
        'displayerror'=>"yes",
        'submittext'=>"Subscribe"
      
    ), $atts ) );
 
 	$feeddisplay = wp_email_capture_form_multi_form_page(esc_attr($template),esc_attr($submittext),esc_attr($displayerror));

    return $feeddisplay;
}

function wp_email_capture_form_multi_form_page($template = "1", $submittext = "Subscribe", $displayerror="yes", $error = 0)
{

        $lists = wpecp_get_all_lists();
        
        $listtype = wpecp_get_list_type($listid);
        
        $url = get_option('home');
        $url = addLastCharacter($url);

        $display = "";
            
        $display .= "<div id='wp_email_capture_2' class='wp-email-capture wp-email-capture-fields".$fieldnumbers." wp-email-capture-display wp-email-capture-listid".$listid." wp-email-capture-template".$template."'><form name='wp_email_capture_display' method='post' action='" . $url ."'>\n";
            
        $displayerror = strtolower($displayerror);
            
        if (isset($_GET['wp_email_capture_error']) && $displayerror=="yes") {
    
            $error = sanitize($_GET['wp_email_capture_error']);
            $listid = sanitize($_GET['listid']);
            $geterror =  wp_email_capture_get_error($listid, $error);
            $display .= "<div class='wp-email-capture-error  wp-email-capture-listid".$listid." wp-email-capture-template".$template."'>". $geterror ."</div>\n";
            
        } 
    
        $display .= "<label class='wp-email-capture-name wp-email-capture-name-template".$template." wp-email-capture-name-listid".$listid." wp-email-capture-label wp-email-capture-display wp-email-capture-name-display wp-email-capture-name-label wp-email-capture-name-label-display' for='wp-email-capture-name'>".__('Name: ','WPEC').":</label> <input name='wp-email-capture-name' type='text' class='wp-email-capture-name wp-email-capture-name-template".$template." wp-email-capture-name-listid".$listid." wp-email-capture-input wp-email-capture-display wp-email-capture-name-display wp-email-capture-name-input wp-email-capture-name-input-display' title='".__('Name','WPEC')."' />";
        
            
        if ($template == "1") { $display .= "<br/>\n"; };
    
        $display .= "<label class='wp-email-capture-email wp-email-capture-email-template".$template." wp-email-capture-email-listid".$listid." wp-email-capture-label wp-email-capture-display wp-email-capture-email-display wp-email-capture-email-label wp-email-capture-email-label-display' for='wp-email-capture-email'>".__('Email','WPEC'). ":</label> <input name='wp-email-capture-email' type='text' class='wp-email-capture-email wp-email-capture-email-template".$template." wp-email-capture-email-listid".$listid." wp-email-capture-input wp-email-capture-display wp-email-capture-email-display wp-email-capture-email-input wp-email-capture-email-input-display' title='".__('Email','WPEC')."' />";
        
        if ($template == "1" || $template == "2") { $display .= "<br/>\n"; };
            
        $display .= "<select name='listid'>";
    	foreach ($lists as $list)
        {
            $display .= "<option value='".$list->listid."'>".$list->listname."</option>";
        }
        $display .= "</select>"; 
        $display .= "<input type='hidden' name='wp_capture_action' value='1' />\n";
        
        if (stristr($submittext, 'http://') === FALSE)
        {
           $display .= "<input name='Submit' type='submit' value='".$submittext."' class='wp-email-capture-submit wp-email-capture-button-text wp-email-capture-button-template".$template." wp-email-capture-button-listid".$listid."' title='".$submittext."' />";    
        } else {
           $display .= "<input type='image' src='".$submittext."' name='Submit' class='wp-email-capture-submit wp-email-capture-button-image wp-email-capture-button-template".$template." wp-email-capture-button-listid".$listid."' >";
        }
        
        $display .= "</form></div>\n";
    
        if (get_option("wp_email_capture_link") == 1) {
    
            $display .= "<p style='font-size:10px;' class='wp-email-capture-link wp-email-capture-link-template".$template." wp-email-capture-link-listid".$listid."'>". __('Powered by','WPEC') . "<a href='http://wpemailcapture.com/' target='_blank'>WP Email Capture</a></p>\n";
    	   
        }

    return $display;

}

add_action('plugins_loaded','wp_email_capture_multi_signup_form_check');

function wp_email_capture_multi_signup_form_check()
{
    if (function_exists('wp_email_capture_multi_signup'))
    {
        add_shortcode( 'wp_email_capture_multi_form', 'wp_email_capture_display_multi_form_shortcode' );
    } else {
        add_action( 'admin_notices', 'wp_email_capture_multi_form_admin_notice' );
    }
    
}

function wp_email_capture_multi_form_admin_notice() {
    ?>
    <div class="error">
        <p><?php _e( 'WP Email Capture Premium (Muli List Subscriber) requires WP Email Capture Premium installed & activated, <a href="http://wpemailcapture.com/">Click here to buy it</a>.', 'WPEC' ); ?></p>
    </div>
    <?php
}

?>