<?php
if ( is_active_sidebar( 'page-top' ) ) {
?>
<div class="page-top">
<div class="container"> 
<div class="row">

	<br />
<?php	
 dynamic_sidebar( 'page-top' );
?>
	</div>
</div>
</div>
<?php
}
