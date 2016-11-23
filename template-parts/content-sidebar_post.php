<?php
/**
 * Template part for displaying posts on sidebar.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Dufrio
 */
?>

<div class="sidebar-posts-banner-box">    
  <div class="sidebar-posts-img-box"><a href="<?php the_permalink(); ?>"><?php the_post_thumbnail("full"); ?></a></div>
</div>