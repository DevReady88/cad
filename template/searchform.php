<?php 
	
	/* Display the search forms in Media Consult Theme */ 

?>

<?php $mediaconsult_search_id = esc_attr( uniqid( 'search-form-' ) ); ?>

<form role="search" method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">

	<input type="search" id="<?php echo esc_html( $mediaconsult_search_id ); ?>" class="search-field" value="<?php echo get_search_query(); ?>" placeholder="<?php echo _x( 'type keywords', 'label', 'mediaconsult' ); ?>" name="s" required />
	<button type="submit" class="search-submit"><?php echo _x( 'Search', 'submit button', 'mediaconsult' ); ?></button>
	
</form>