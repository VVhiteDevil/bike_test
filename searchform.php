<form method="get" class="search" action="<?php echo esc_url( home_url( '/' ) ); ?>">
    <input type="search" class="search-field" id="search-field-header" name="s" placeholder="Type for search..." value="<?php echo get_search_query(); ?>">
    <i class="fas fa-search"></i><input type="submit" id="bike-header-search-submit"alt="Search" value="" />
</form>