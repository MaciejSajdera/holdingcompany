<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package _s
 */

$home_section_contact_header = get_field('home_section_contact_header', get_option( 'page_on_front' ));
$home_section_contact_subheader = get_field('home_section_contact_subheader', get_option( 'page_on_front' ));

 $contact_name = get_field('contact_name', get_option( 'page_on_front' ));
 $contact_address = get_field('contact_address', get_option( 'page_on_front' ));
 $contact_nip = get_field('contact_nip', get_option( 'page_on_front' ));
 $contact__regon= get_field('contact_regon', get_option( 'page_on_front' ));
 $contact_phone = get_field('contact_phone', get_option( 'page_on_front' ));
 $contact_mail = get_field('contact_mail', get_option( 'page_on_front' ));
 
?>


	<div class="contact-section__data-wrapper">

		<div class="contact-section__data">
			<p><?php echo $contact_name ?><br />
			<?php echo $contact_address ?></p>
		</div>

		<div class="contact-section__data">
			<p><?php echo $contact_nip ?> <br />
			<?php echo $contact__regon ?></p>
		</div>

		<div class="contact-section__data">
			<p>
				<?php if (strlen($contact_phone) > 0) : ?>
				<a href="tel:<?php echo $contact_phone ?>">tel.: <?php echo $contact_phone ?></a> <br />
				<?php endif; ?>

				<a href="mailto:<?php echo $contact_mail ?>"><?php echo $contact_mail ?></a>
			</p>
		</div>

	</div>

