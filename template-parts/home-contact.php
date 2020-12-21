<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package _s
 */

$home_header_3 = get_field('home_header_3');

 $contact_name = get_field('contact_name');
 $contact_address = get_field('contact_address');
 $contact_nip = get_field('contact_nip');
 $contact__regon= get_field('contact_regon');
 $contact_phone = get_field('contact_phone');
 $contact_mail = get_field('contact_mail');
 
?>

<section class="contact-section">
		<div class="contact-section__header">
			<h3>Kontakt</h3>
			<span class="sub-text--grey"><?php echo $home_header_3 ?></span>
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
			<p><a href="tel:<?php echo $contact_phone ?>">tel.: <?php echo $contact_phone ?></a> <br />
			<a href="mailto:<?php echo $contact_mail ?>"><?php echo $contact_mail ?></a></p>
		</div>

	</div>

</section>
