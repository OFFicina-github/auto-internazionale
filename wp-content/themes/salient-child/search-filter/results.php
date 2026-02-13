<?php
/**
 * Search & Filter Pro
 *
 * Sample Results Template
 *
 * @package   Search_Filter
 * @author    Ross Morsali
 * @link      https://searchandfilter.com
 * @copyright 2018 Search & Filter
 *
 * Note: these templates are not full page templates, rather
 * just an encaspulation of the your results loop which should
 * be inserted in to other pages by using a shortcode - think
 * of it as a template part
 *
 * This template is an absolute base example showing you what
 * you can do, for more customisation see the WordPress docs
 * and using template tags -
 *
 * http://codex.wordpress.org/Template_Tags
 */

// If this file is called directly, abort.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( $query->have_posts() ) {
	?>

	
	<?php
	while ( $query->have_posts() ) {
		$query->the_post();

		?>
		<a href="<?php the_permalink(); ?>" class="item_custom">
				<?php
				$prezzo = get_field('prezzo');
				$anno = get_field('anno');
				$bedge = get_field('bedge_new'); ?>
				<?php if ($bedge == true): ?>
					<img class="bedge_new" src="https://autointernazionale.it/wp-content/uploads/2025/10/bedge_new.png" alt="Nuovo Prodotto!">
				<?php endif; ?>
                <div class="img" style="background-image:url(<?php if(has_post_thumbnail()){ echo get_the_post_thumbnail_url(); } else{ echo ''; } ?>)"></div>
                <h3 class="titolo"><?php the_title(); ?></h3>
                <div class="flex_custom">
					<div class="prodotti_cat_box">
						<?php if ($prezzo): ?>
							<h3 class="prodotto_cat">Prezzo: <?php echo $prezzo; ?></h3>
						<?php endif; ?>
						<?php if ($anno): ?>
							<h3 class="prodotto_cat">Anno: <?php echo $anno; ?></h3>
						<?php endif; ?>
					</div>
                </div>
            </a>

		<?php
	}
	?>
	
	<div class="pagination">
		
		<div class="nav-previous"><?php previous_posts_link( '« Indietro' ); ?></div>
		<div class="nav-next"><?php next_posts_link( 'Avanti »', $query->max_num_pages ); ?></div>

		<?php
			/* example code for using the wp_pagenavi plugin */
		if ( function_exists( 'wp_pagenavi' ) ) {
			echo '<br />';
			wp_pagenavi( array( 'query' => $query ) );
		}
		?>
	</div>
	<?php
} else {
	echo 'No Results Found';
}
?>
