<?php
/**
 * Plugin Premium Offer Page
 *
 * @package Footer Mega Grid Columns
 * @since 1.1.2
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}
?>
<div class="wrap">

	<h2><?php _e( 'Hire Us - Get unlimited expert WordPress Support and Development', 'footer-mega-grid-columns' ); ?></h2><br />

	<div class="support-data">
	<h3 style="margin-bottom:5px;"><?php _e( 'Highlight of Hiring:', 'footer-mega-grid-columns' ); ?></h3>
		<ul>
		 	<li><?php _e( 'Hire once, get unlimited jobs done', 'footer-mega-grid-columns' ); ?></li>				 	
		 	<li><?php _e( 'Quick ticket support, quick solution', 'footer-mega-grid-columns' ); ?></li>
		 	<li><?php _e( 'Any sort of WP work with no extra cost', 'footer-mega-grid-columns' ); ?></li>
		 	<li><?php _e( 'Dedicated expert working only for you!', 'footer-mega-grid-columns' ); ?></li>
		</ul>
	</div>	

	<style>
		.support-data ul{list-style-type:disc ; margin:10px 0 15px 20px;}	
		.wprps-notice{padding: 10px; color: #3c763d; background-color: #dff0d8; border:1px solid #d6e9c6; margin: 0 0 20px 0;}
		.wpos-plugin-pricing-table thead th h2{font-weight: 400; font-size: 1.5em; line-height:normal; margin:0px; color: #2ECC71;}
		.wpos-plugin-pricing-table thead th h2 + p{font-size: 1.25em; line-height: 1.4; color: #999; margin:5px 0 5px 0;}

		table.wpos-plugin-pricing-table{width:90%; text-align: left; border-spacing: 0; border-collapse: collapse; -webkit-box-sizing: border-box; -moz-box-sizing: border-box; box-sizing: border-box;}

		.wpos-plugin-pricing-table th, .wpos-plugin-pricing-table td{font-size:14px; line-height:normal; color:#444; vertical-align:middle; padding:12px;}

		.wpos-plugin-pricing-table colgroup:nth-child(1) { width: 31%;  border: 1px solid #ccc;  }
		.wpos-plugin-pricing-table colgroup:nth-child(2) { width: 22%; border: 1px solid #ccc; }
		.wpos-plugin-pricing-table colgroup:nth-child(3) { width: 25%; border: 10px solid #2ECC71; }
		.wpos-plugin-pricing-table colgroup:nth-child(4) { width: 31%;  border: 1px solid #ccc;  }

		/* Tablehead */
		.wpos-plugin-pricing-table thead th {background-color: #fff; background:linear-gradient(to bottom, #ffffff 0%, #ffffff 100%); text-align: center; position: relative; border-bottom: 1px solid #ccc; padding: 1em 0 3em; font-weight:400; color:#999;}
		
		.wpos-plugin-pricing-table thead th:nth-child(3) {padding:1em 0 3.5em 0;}		
		.wpos-plugin-pricing-table thead th p.promo {font-size: 14px; color: #fff; position: absolute; bottom:0; left: -17px; z-index: 1000; width: 100%; margin: 0; padding: .625em 17px .75em; background-color: #ca4a1f; box-shadow: 0 2px 4px rgba(0,0,0,.25); border-bottom: 1px solid #ca4a1f;}
		.wpos-plugin-pricing-table thead th p.promo:before {content: ""; position: absolute; display: block; width: 0px; height: 0px; border-style: solid; border-width: 0 7px 7px 0; border-color: transparent #900 transparent transparent; bottom: -7px; left: 0;}
		.wpos-plugin-pricing-table thead th p.promo:after {content: ""; position: absolute; display: block; width: 0px; height: 0px; border-style: solid; border-width: 7px 7px 0 0; border-color: #900 transparent transparent transparent; bottom: -7px; right: 0;}

		/* Table Footer */
		.wpos-plugin-pricing-table tfoot th, .wpos-plugin-pricing-table tfoot td{text-align: center; border-top: 1px solid #ccc;}
		.wpos-plugin-pricing-table tfoot a{font-weight: 600; color: #fff; text-decoration: none; text-transform: uppercase; display: inline-block; padding: 1em 2em; background: #59c7fb; border-radius: .2em;}
	</style>

	<table class="wpos-plugin-pricing-table">
		<colgroup></colgroup>
		<colgroup></colgroup>
		<colgroup></colgroup>
		<colgroup></colgroup>			
	    <thead>
	    	<tr>
	    		<th>
	    			<h2><?php _e( 'Hire us for 1 Hr', 'footer-mega-grid-columns' ); ?></h2>
	    			<p><?php _e( '$20 USD', 'footer-mega-grid-columns' ); ?></p>
	    		</th>
	    		<th>
	    			<h2><?php _e( 'Hire us for 5 Hrs', 'footer-mega-grid-columns' ); ?></h2>
	    			<p><?php _e( '$99 USD', 'footer-mega-grid-columns' ); ?></p>
	    		</th>
	    		<th>
	    			<h2><?php _e( 'Hire us for 30 Hrs', 'footer-mega-grid-columns' ); ?></h2>
	    			<p><?php _e( '$499 USD', 'footer-mega-grid-columns' ); ?></p>
	    			<p class="promo"><?php _e( 'Our most valuable package!', 'footer-mega-grid-columns' ); ?></p>
	    		</th>
				<th>
	    			<h2><?php _e( 'Hire us for 70 Hrs', 'footer-mega-grid-columns' ); ?></h2>
	    			<p><?php _e( '$999 USD', 'footer-mega-grid-columns' ); ?></p>
	    		</th>	
	    	</tr>
	    </thead>

	    <tfoot>
	    	<tr>
	    		<td><a href="https://www.wponlinesupport.com/checkout/?edd_action=add_to_cart&download_id=6044&edd_options[price_id]=6&ref=wposthemeplugin" target="_blank"><?php _e( 'Hire Us', 'footer-mega-grid-columns' ); ?></a></td>
	    		<td><a href="https://www.wponlinesupport.com/checkout/?edd_action=add_to_cart&download_id=6044&edd_options[price_id]=3&ref=wposthemeplugin" target="_blank"><?php _e( 'Hire Us', 'footer-mega-grid-columns' ); ?></a></td>
	    		<td><a href="https://www.wponlinesupport.com/checkout/?edd_action=add_to_cart&download_id=6044&edd_options[price_id]=4&ref=wposthemeplugin" target="_blank"><?php _e( 'Hire Us', 'footer-mega-grid-columns' ); ?></a></td>
				<td><a href="https://www.wponlinesupport.com/checkout/?edd_action=add_to_cart&download_id=6044&edd_options[price_id]=5&ref=wposthemeplugin" target="_blank"><?php _e( 'Hire Us', 'footer-mega-grid-columns' ); ?></a></td>
			</tr>
	    </tfoot> 
	</table>
</div>