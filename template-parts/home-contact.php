<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package _s
 */

$home_section_contact_header = get_field('home_section_contact_header');
$home_section_contact_subheader = get_field('home_section_contact_subheader');

 $contact_name = get_field('contact_name');
 $contact_address = get_field('contact_address');
 $contact_nip = get_field('contact_nip');
 $contact__regon= get_field('contact_regon');
 $contact_phone = get_field('contact_phone');
 $contact_mail = get_field('contact_mail');
 
?>

<section class="contact-section">
		<div class="contact-section__header section-header">
			<h3><?php echo $home_section_contact_header ?></h3>
			<span class="sub-text--grey"><?php echo $home_section_contact_subheader ?></span>
		</div>
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

</section>
