=== WP Email Capture ===
Tags: wp email capture, multi list, form, shortcode, email, affiliate marketing
Requires at least: 3.0
Tested up to: 3.7.1
Version: 0.1
Stable tag: 0.1
Contributors: rhyswynne
Donate link: http://wpemailcapture.com/pricing/

Multi List Subscriber Addon for WP Email Capture Premium.

== Description ==
This plugin adds on a shortcode form that you can use to subscribe to any list from one form.

This plugin is **unsupported**.

For this plugin to work you need WP Email Capture Premium. For more information, and to purchase, [visit the plans and pricing page](http://wpemailcapture.com/pricing/).

Keep in Contact:-

* [WP Email Capture on Facebook](http://www.facebook.com/wpemailcapture)
* [@WPEmailCapture](http://www.twitter.com/wpemailcapture) on Twitter
* For support requests please visit the [FAQ's](http://wpemailcapture.com/free-plugin/frequently-asked-questions/), or leave a message in the Wordpress Support Forum. 
* For general feature requests or bug notices [please contact me directly](http://wpemailcapture.com/contact/), however any support requests sent via the contact form will be ignored - please use the WordPress Support Forum - please note I'm unable to support CSS or styling queries, please read the "Stylings" area on other notes.

== Installation ==
1. Upload the plugin (unzipped) into `/wp-content/plugins/`.
2. Activate the plugin under the "Plugins" menu.

The form can be inserted into the site at any location. To put the form anywhere, insert the following code into your template

`<?php if (function_exists('wp_email_capture_multi_form')) { wp_email_capture_multi_form(); } ?>` 

If you want to insert the form within a page, insert into any post or page the string `[wp_email_capture_multi_form]`. It will be replaced with a simple form.

Attributes you can use are the following

* **template** - Format the form in one of three preset templates, either (1, 2 or 3).
* **submittext** - The text or Image URL of the button.
* **displayerror** - Display errors above the form. Default switched on (yes).

== Change Log ==
= 0.1 (28/11/13) =
* Plugin Launched