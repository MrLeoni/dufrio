<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Dufrio
 */
 
 // Args to display Archives link
 $argsMonthly = array(
    "show_post_count"   => 1
 );

?>

  </div><!-- ./site-wrapper -->

	<footer id="footer">
    <div class="container">
      <div class="row">
        
        <div class="col-sm-3">
          <div class="footer-title">
            <h2>Sobre</h2>
            <hr class="header-line">
          </div>
          <div class="footer-about-info">
            <h3><img src="<?php bloginfo( "stylesheet_directory" ); ?>/assets/img/logo/logo-dufrio.svg" alt="Logo Dufrio">Blog</h3>
            <?php get_sidebar("footer"); ?>
          </div>
          <div class="footer-social-links">
            <div class="row">
              <div class="col-xs-2"><a href="https://www.facebook.com/Dufrio" target="_blank"><i class="fa fa-facebook-square" aria-hidden="true"></i></a></div>
              <div class="col-xs-2"><a href="https://www.youtube.com/channel/UCJPS-IUKM7rftFwh-KE1mNQ" target="_blank"><i class="fa fa-youtube-square" aria-hidden="true"></i></a></div>
              <div class="col-xs-2"><a href="https://www.linkedin.com/company/dufrio-refrigera-o" target="_blank"><i class="fa fa-linkedin-square" aria-hidden="true"></i></a></div>
            </div>
          </div>
        </div>
        
        <div class="col-sm-6">
          <div class="footer-title">
            <h2>Arquivos</h2>
            <hr class="header-line">
          </div>
          <div class="footer-archives-info">
            <ul>
              <?php wp_get_archives( $argsMonthly ); ?>
            </ul>
          </div>
        </div>
          
        <div class="col-sm-3">
          <div class="footer-title">
            <h2>Blog Dufrio por e-mail</h2>
            <hr class="header-line">
          </div>
          <div class="footer-news-info">
            <!-- News post -->
            <a class="back-top" href="#top"><i class="ion-ios-arrow-up"></i></a>
          </div>
        </div>
        
      </div>
    </div>
    
    <hr class="header-line">
      
    <div class="container">
      <div class="row copy">
        <div class="col-sm-12 clearfix">
          <p>&copy; Dufrio Blog</p>
          <a data-scroll href="http://www.agenciadelucca.com.br" target="_blank"><img class="pull-right" src="<?php bloginfo( "stylesheet_directory" ); ?>/assets/img/logo/logo-delucca.svg" alt="Logo Delucca"></a>
        </div>
      </div>
    </div>
  </footer>

	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<script src="<?php bloginfo( "template_url" ); ?>/assets/js/jquery-1.11.3.min.js"></script>
	<!-- Include all compiled plugins (below), or include individual files as needed -->
	<script src="<?php bloginfo( "template_url" ); ?>/assets/js/bootstrap.min.js"></script>
	<script src="<?php bloginfo( "template_url" ); ?>/assets/js/main.js"></script>

<?php wp_footer(); ?>

</body>
</html>
