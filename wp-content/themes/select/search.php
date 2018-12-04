<?php
/**
 * The template for displaying search results pages.
 *
 * @package WordPress
 * @subpackage Twenty_Fifteen
 * @since Twenty Fifteen 1.0
 */

get_header(); ?>

	<div class="main">
		<div class="container">
			<div class="secondary-content">

		<?php if ( have_posts() ) : ?>
			<h1 class="search-title"><?php printf( __( 'Search Results for: %s' ), get_search_query() ); ?></h1>

			<?php
			// Start the loop.
			while ( have_posts() ) : the_post(); ?>

				<?php
				/*
				 * Run the loop for the search to output the results.
				 * If you want to overload this in a child theme then include a file
				 * called content-search.php and that will be used instead.
				 */
				get_template_part( 'partials/archive-item', 'search' );

			// End the loop.
			endwhile;

			// Previous/next page navigation.
			?>
			<div class="pagination">
				<?php echo paginate_links(array(
					'prev_text' => __('«'),
					'next_text' => __('»'),
				)) ?>
			</div>
			
		<?php // If no content, include the "No posts found" template.
		else : ?>
		<div class="search-no-results">
			<?php printf( __( "<h1>Sorry, we couldn't find any posts for %s.</h1>" ), get_search_query() ) ?>
			<p>Please try another search critera.</p>
		</div>
		<?php endif;
		?>
			</div>
		</div>
	</div>

<?php get_footer(); ?>
