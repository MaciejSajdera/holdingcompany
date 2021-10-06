<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package _s
 */
$documents = get_field('documents');

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

<div class="post-thumbnail subpage__header-image" style="background-image: url(<?php echo get_the_post_thumbnail_url() ?>); background-repeat: no-repeat; <?php

	// if (!get_the_post_thumbnail_url()) {
	// 	echo 'background-image: linear-gradient(0deg, rgba(196, 196, 196, 0) 16.77%, rgba(196, 196, 196, 0.108) 55.78%, rgba(196, 196, 196, 0) 95.23%)';
	// }

?>">
	<?php

		if( has_term('', 'rodzaj_raportu') ){
			echo '<h1 class="post-category">Raport '.wp_get_object_terms( $post->ID, 'rodzaj_raportu', array( 'fields' => 'names' ) )[0].'</h1>';
		}

	?>
</div>
		<div class="content__wrapper">
			<header class="entry-header">
			<div class="entry-meta">
						<?php
						// _s_posted_on();
						// _s_posted_by();
						echo '
						<p class="sub-text--grey">Opublikowano: '.get_the_date().'</p>
						<p class="sub-text--grey">Raport '.wp_get_object_terms( $post->ID, 'rodzaj_raportu', array( 'fields' => 'names' ) )[0].' nr '.get_field('report_id').'</p>
						';
						?>
					</div><!-- .entry-meta -->
				<?php
				if ( is_singular() ) :
					the_title( '<h1 class="entry-title">', '</h1>' );
				else :
					the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
				endif;

				if ( 'post' === get_post_type() ) :
					?>

				<?php endif; ?>
			</header><!-- .entry-header -->



			<div class="entry-content">
				<?php
				the_content(
					sprintf(
						wp_kses(
							/* translators: %s: Name of current post. Only visible to screen readers */
							__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', '_s' ),
							array(
								'span' => array(
									'class' => array(),
								),
							)
						),
						wp_kses_post( get_the_title() )
					)
				);

				wp_link_pages(
					array(
						'before' => '<div class="page-links">' . esc_html__( 'Pages:', '_s' ),
						'after'  => '</div>',
					)
				);
				?>
			</div><!-- .entry-content -->

			<?php

			if ($documents) {

				foreach($documents as $document) {
					echo '
					<div class="document-file-container">
						<p>'.$document['document_title'].'</p>
						<a class="button button--black button--download" href="'.$document['document_file']['url'].'" download>Pobierz</a>
					</div>
					';
				}


			}

			?>

		</div>
	<footer class="entry-footer">
		<?php _s_entry_footer(); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-<?php the_ID(); ?> -->
