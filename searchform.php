<form class="custom-search-form" method="GET" action="<?php echo home_url( '/' ); ?>">
  <input type="search" name="s" id="search" value="<?php the_search_query(); ?>" placeholder="Busca">
  <input type="hidden" value="post" name="post_type" id="post_type" />
  <button type="submit" class="submit-btn"><i class="fa fa-search" aria-hidden="true"></i></button>
</form>