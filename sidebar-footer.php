<?php
/**
 * The sidebar containing the footer content.
 *
 * @package Dufrio
 */

	if ( ! is_active_sidebar( 'sidebar-2' ) ) {
		return;
	}

dynamic_sidebar( 'sidebar-2' ); ?>


