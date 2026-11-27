<?php
$post = $wp_query->post;
if ( in_category('info') ) {
	include(TEMPLATEPATH.'/single-info.php');
} else {
	include(TEMPLATEPATH.'/single_recruit.php');
}
?>