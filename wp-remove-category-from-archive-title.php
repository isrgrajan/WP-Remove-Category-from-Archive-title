<?php
/*
Plugin Name: WP Remove Category from Archive title
Plugin URI:  https://www.isrgrajan.com/
Description: WP Remove Category from Archive title help you to hide and remove the in-built Category: keyword from the archive.php and categories
Version:     0.0.7
Author:      Isrg KB
Author URI:  http://www.isrgrajan.com/
License:     GPL2
License URI:  https://www.gnu.org/licenses/gpl-2.0.html
Text Domain: wp-remove-category-from-archive-title
Tested up to: 6.0.2
*/

if(!function_exists(isrgkb_remove_category_title)) {
	
	add_filter( 'get_the_archive_title', 'isrgkb_remove_category_title' );
	
	function isrgkb_remove_category_title( $title ) {
		if ( is_category() ) {
			$title = single_cat_title( '', false );
		} elseif (is_tag()) {
			$title = single_tag_title('', false);
		} elseif (is_author()) {
			$title = '<span class="vcard">' . get_the_author() . '</span>';
		} elseif (is_tax()) { 
			$title = sprintf(__('%1$s'), single_term_title('', false));
		} elseif (is_post_type_archive()) {
			$title = post_type_archive_title('', false);
		} 
		return $title;
	}
}
?>