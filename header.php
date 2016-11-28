<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head>
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Dufrio
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<link rel="icon" href="<?php bloginfo( "stylesheet_directory" ); ?>/assets/img/favicon/dufrio-favicon-16.png" sizes="16x16">
<link rel="icon" href="<?php bloginfo( "stylesheet_directory" ); ?>/assets/img/favicon/dufrio-favicon-32.png" sizes="32x32">

	<!-- Google Font -->
	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700" rel="stylesheet">
	<!-- Bootstrap -->
	<link href="<?php bloginfo( "stylesheet_directory" ); ?>/assets/css/bootstrap.min.css" rel="stylesheet">
	<!-- Icons -->
	<link href="<?php bloginfo( "stylesheet_directory" ); ?>/assets/css/font-awesome.min.css" rel="stylesheet">
	
	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
	  <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
	  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->

<?php wp_head(); ?>
</head>
  <body>
    
    <header class="nav-menu" id="top">
     
      <div class="container">
        <div class="row">
          <div class="col-sm-5">
            <h1 class="menu-title"><a href="<?php echo home_url( '/' ); ?>"><img src="<?php bloginfo( "stylesheet_directory" ); ?>/assets/img/logo/logo-dufrio.svg" alt="Logo"></a>Blog</h1>
          </div>
          <div class="col-sm-7">
            <ul class="menu-list clearfix">
              <li class="dufrio-loja"><a href="https://www.dufrio.com.br" target="_blank"><i class="fa fa-shopping-cart" aria-hidden="true"></i>Loja Virtual</a></li>
              <li><?php get_search_form(); ?></li>
            </ul>
          </div>
        </div>
      </div>
      
      <hr class="header-line">
      
      <div class="navigation-wrapper">
        <div class="container">
          <?php
            // Site menu arguments
            $header_args = array(
              "theme_location"	=> "header",
              "container"	=> "nav",
              "container_class"	=> "main-nav",
              "menu_class"	=> "nav-links"
            );
            // Calling the function to build the menu with $header_args arguments
            wp_nav_menu( $header_args );
          ?>
        </div>
        <button id="js-mobile-btn" class="mobile-nav">Menu</button>
      </div>
      
    </header> 
    
    <div class="site-wrapper">