<?php
/*
 * Template Name: Contact Investors Page Template
 * description: >-
  Page template without sidebar
 */
get_header();

$contact_data_for_investors_1 = get_field("contact_data_for_investors_1");
$contact_data_for_investors_2 = get_field("contact_data_for_investors_2");
$contact_data_for_investors_3 = get_field("contact_data_for_investors_3");

?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main subpage">

				<div class="subpage__header-image" style="background-image: url(<?php echo get_the_post_thumbnail_url() ?>); background-repeat: no-repeat;">
						<?php echo '<h1>'.get_the_title().'</h1>' ?>
				</div>
				
				<div class="content__wrapper">


				<div class="subpage__content">
					<?php
						the_content();
					?>
				</div>

				<?php
					echo do_shortcode('[contact-form-7 id="568" title="Kontakt"]');
				?>

				<div class="wrapper-flex__drow-mcol contact-info">

					<div class="">
					<?php
						echo
						'<h3>' .$contact_data_for_investors_1['contact_data_header']. '</h3>
						<p>' .$contact_data_for_investors_1['contact_name']. '</p>
						<p>' .$contact_data_for_investors_1['contact_krs']. '</p>
						<p>' .$contact_data_for_investors_1['contact_nip']. '</p>
						<p>' .$contact_data_for_investors_1['contact_regon']. '</p>
						<p>' .$contact_data_for_investors_1['contact_address']. '</p>
						<p>' .$contact_data_for_investors_1['contact_court']. '</p>
						<p>' .$contact_data_for_investors_1['contact_share_capital']. '</p>
						<p><a href="tel:' .$contact_data_for_investors_1['contact_phone']. '">' .$contact_data_for_investors_1['contact_phone']. '</a></p>
						<p><a href="mailto:' .$contact_data_for_investors_1['contact_mail']. '">' .$contact_data_for_investors_1['contact_mail']. '</a></p>
						<p>' .$contact_data_for_investors_1['contact_bank_account']. '</p>
						';
					 ?>
					</div>

					<div class="">
					<?php
						echo
						'<h3>' .$contact_data_for_investors_2['contact_data_header']. '</h3>
						<p>' .$contact_data_for_investors_2['contact_name']. '</p>
						<p>' .$contact_data_for_investors_2['contact_person']. '</p>
						<p><a href="mailto:' .$contact_data_for_investors_2['contact_mail']. '">' .$contact_data_for_investors_2['contact_mail']. '</a></p>
						<p><a href="tel:' .$contact_data_for_investors_2['contact_phone']. '">' .$contact_data_for_investors_2['contact_phone']. '</a></p>
						';
					 ?>
					</div>

					<!-- <div class=""> -->
					<?php
					// 	echo
					//    '<h3>' .$contact_data_for_investors_3['contact_data_header']. '</h3>
					// 	<p>' .$contact_data_for_investors_3['contact_name']. '</p>
					// 	<p>' .$contact_data_for_investors_3['contact_person']. '</p>
					// 	<p><a href="mailto:' .$contact_data_for_investors_3['contact_mail']. '">' .$contact_data_for_investors_3['contact_mail']. '</a></p>
					// 	<p><a href="tel:' .$contact_data_for_investors_3['contact_phone']. '">' .$contact_data_for_investors_3['contact_phone']. '</a></p>
					// 	';
					 ?>
					<!-- </div> -->

				</div>

			</div>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();