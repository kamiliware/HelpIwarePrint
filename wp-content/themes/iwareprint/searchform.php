<form role="search" method="get" action="<?php echo home_url( '/' ); ?>">
	<input type="search" class="form-control search-input" value="<?php echo get_search_query() ?>" name="s" title="Wyszukaj" />
	<button type="submit" name="submit" id="searchsubmit" value="Search"><img type="submit" name="submit" id="searchsubmit" value="Search"src="<?php echo get_template_directory_uri(); ?>/img/search.png" alt="szukaj" /></button>
</form>