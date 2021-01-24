
<div class="account-link">
	<?php if ( is_user_logged_in() ) { ?>
		<a href="<?php echo get_permalink( get_option('woocommerce_myaccount_page_id') ); ?>"><?php esc_html_e('My Account','shopstar'); ?></a>
	<?php } else { ?>
		<a href="<?php echo get_permalink( get_option('woocommerce_myaccount_page_id') ); ?>"><?php esc_html_e('Sign In | Register','shopstar'); ?></a>
	<?php } ?>
</div>

<div class="header-cart">
<?php
get_template_part( 'library/template-parts/header-cart-contents' );
?>
</div>
