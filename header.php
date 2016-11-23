<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
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
	<link href="<?php bloginfo( "stylesheet_directory" ); ?>/assets/css/ionicons.min.css" rel="stylesheet">
	
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
              <li class="menu-social-loja"><a href="https://www.dufrio.com.br" target="_blank"><i class="ion-ios-cart"></i>Loja Virtual</a></li>
              <li>
                <?php get_search_form(); ?>
              </li>
            </ul>
          </div>
        </div>
      </div>
      
      <hr class="header-line">
      
      
      
      <nav class="navbar navbar-default">
        <div class="container">
          <!-- Brand and toggle get grouped for better mobile display -->
          <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
          </div>
      
          <!-- Collect the nav links, forms, and other content for toggling -->
          <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul id="js-main-menu" class="nav navbar-nav menu-category">
              
              <?php
              // Get categories ID to exclude
              $categorySidebar      = get_cat_ID("sidebar");
              $categoryNewsletter   = get_cat_ID("newsletter");
              $categoryPostsSidebar = get_cat_ID("posts sidebar");
              $categoryDestaques    = get_cat_ID("destaques");
              $categorySemCategoria = get_cat_ID("sem categoria");
              
              // Make a variable with all categories IDs
              $excludeCategories = "$categoryNewsletter, $categoryPostsSidebar, $categoryDestaques, $categorySidebar, $categorySemCategoria";
              
              // Applying the exclude category variable and some others parameters
              $categoriesArgs = array(
                  
                  "exclude"     => $excludeCategories,
                  "hide_empty"  => 0
                
                );
              
              // Query the categories with the earlier arguments
              $categories = get_categories($categoriesArgs);
              
              // Get category for archives pages
              $post_cats = wp_get_post_categories($post->ID);
              
              // Creating loop to display the queried categories
              foreach ($categories as $category) {
                
                // With category has no parent it will be displayed (First If)
                if ($category->category_parent == 0) : ?>
                  <li><?php
                  
                  /*
                  Creating another if to check if the category has posts or not (Second If)
                  If don't exist any posts for the category, the category will be treated like a 'not have child' category
                  and it will be generate a link to that category's page
                  If category has child categories, a drop down menu will appear with the child categories.
                  
                  IMPORTANT -- With this theme, only the direct category of a post must be set as "post category" the parent categories MUST HAVE 0 posts related to then.
                  The only parent categories that will have posts is the parent categories with no child.
                  */
                  
                  // If has child
                  if ($category->count == 0) : 
                  
                    // Display <p> tag to call the 'dropdown' list ?>
                    <p id="<?php echo $category->slug; ?>"><?php echo $category->name; ?></p>
                      
                  <?php else : 
                
                    // IF has no child category, create a link to the category page (no dropdown)?>
                    <a href="<?php echo esc_url(get_category_link($category->cat_ID)); ?>"><?php echo $category->name; ?></a>
                  </li>
                  
                  
                  <?php endif;
                  // End of the Second If
                
                else: /*Empty*/ endif;
                // End of the First If ?>
                
              <?php }
              // End of the Loop ?>
            </ul>
          </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
      </nav>
      
      <div id="dropdown" class="child-category-wrapper">
        <div class="container">
          <div class="row">
            <div class="col-md-12">
              <ul class="child-categories-list">
                
                <?php
                
                // Creating another Loop for displaying child categories only
                foreach ($categories as $childCats) {
                  
                  // Loop to check if the categorie has parent category. If has, display the category.
                  if ($childCats->category_parent !== 0) : ?>
                    <li class="<?php echo $childCats->description; ?> child-cat"><a href="<?php echo esc_url(get_category_link($childCats->cat_ID)); ?>"><?php echo $childCats->name; ?></a></li>
                  <?php else :
                    // Empty
                  endif;
                  // End If
                }
                // End Loop
                ?>
                
              </ul>
            </div>
          </div>
        </div>
      </div>
      
    </header> 
    
    <div class="site-wrapper">