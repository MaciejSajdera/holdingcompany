<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package _s
 */

$home_section_structure_header = get_field('home_section_structure_header');
$home_section_structure_subheader = get_field('home_section_structure_subheader');

$tab1 = get_field('tab_1');
$tab2 = get_field('tab_2');
$tab3 = get_field('tab_3');
$tab4 = get_field('tab_4');
$tab5 = get_field('tab_5');

?>
	<section class="structure">

		<span id="fractals"></span>


		<div class="structure__header section-header">
			<h3>
				<!-- <?php echo $home_section_structure_header ?> -->
			</h3>
			<span class="sub-text--grey"><?php echo $home_section_structure_subheader ?></span>
			</a>
		</div>

		<div class="tabs">
			
			<div class="tabs-menu">

				<div class="tab-menu__position tab-menu__position--active" data-tab="tab-1">
					<p><?php echo $tab1['title'] ?></p>
					<span class="tab-edge"></span>
				</div>

				<div class="tab-menu__position" data-tab="tab-2">
					<p><?php echo $tab2['title'] ?></p>
					<span class="tab-edge"></span>
				</div>

				<div class="tab-menu__position" data-tab="tab-3">
					<p><?php echo $tab3['title'] ?></p>
					<span class="tab-edge"></span>
				</div>

				<div class="tab-menu__position" data-tab="tab-4">
					<p><?php echo $tab4['title'] ?></p>
					<span class="tab-edge"></span>
				</div>

				<div class="tab-menu__position" data-tab="tab-5">
					<p><?php echo $tab5['title'] ?></p>
					<span class="tab-edge"></span>
				</div>

			</div>

			<div class="tabs-content">

					<div id='tab-1' class="tab tab--active tab--loaded">

						<div class="tab__text">

							<h4><?php echo $tab1['title'] ?></h4>

							<div class="tab__text-business-data__wrapper tab__text-description">
							<p><?php echo $tab1['description'] ?></p>

							</div>

							<div class="tab__text-business-data">

								<div class="tab__text-business-data__wrapper">
									<p><?php echo $tab1['address_field_1'] ?></p>
									<p><?php echo $tab1['address_field_2'] ?></p>
									<p><?php echo $tab1['address_field_3'] ?></p>
								</div>
								<div class="tab__text-business-data__wrapper">
									<p><?php echo $tab1['bussiness_data_1'] ?></p>
									<p><?php echo $tab1['bussiness_data_2'] ?></p>
									<p><?php echo $tab1['bussiness_data_3'] ?></p>
								</div>
								<div class="tab__text-business-data__wrapper">
									<a href="mailto:<?php echo $tab1['contact_field'] ?>"><?php echo $tab1['contact_field'] ?></a>
								</div>
							</div>

						</div>

						<div class="tab__image" style="background-image: url(<?php echo $tab1['image'] ?>); background-repeat: no-repeat; background-size: cover;"></div>

					</div>

					<div id='tab-2' class="tab">

						<div class="tab__text">

							<h4><?php echo $tab2['title'] ?></h4>

							<div class="tab__text-business-data__wrapper tab__text-description">
							<p><?php echo $tab2['description'] ?></p>

							</div>

							<div class="tab__text-business-data">

								<div class="tab__text-business-data__wrapper">
									<p><?php echo $tab2['address_field_1'] ?></p>
									<p><?php echo $tab2['address_field_2'] ?></p>
									<p><?php echo $tab2['address_field_3'] ?></p>
								</div>
								<div class="tab__text-business-data__wrapper">
									<p><?php echo $tab2['bussiness_data_1'] ?></p>
									<p><?php echo $tab2['bussiness_data_2'] ?></p>
									<p><?php echo $tab2['bussiness_data_3'] ?></p>
								</div>
								<div class="tab__text-business-data__wrapper">
									<a href="mailto:<?php echo $tab2['contact_field'] ?>"><?php echo $tab2['contact_field'] ?></a>
								</div>
							</div>

						</div>

						<div class="tab__image" style="background-image: url(<?php echo $tab2['image'] ?>); background-repeat: no-repeat; background-size: cover;"></div>		
					</div>

					<div id='tab-3' class="tab">

							<div class="tab__text">

								<h4><?php echo $tab3['title'] ?></h4>

								<div class="tab__text-business-data__wrapper tab__text-description">
									<p><?php echo $tab3['description'] ?></p>
								</div>

								<div class="tab__text-business-data">

									<div class="tab__text-business-data__wrapper">
										<p><?php echo $tab3['address_field_1'] ?></p>
										<p><?php echo $tab3['address_field_2'] ?></p>
										<p><?php echo $tab3['address_field_3'] ?></p>
									</div>
									<div class="tab__text-business-data__wrapper">
										<p><?php echo $tab3['bussiness_data_1'] ?></p>
										<p><?php echo $tab3['bussiness_data_2'] ?></p>
										<p><?php echo $tab3['bussiness_data_3'] ?></p>
									</div>
									<div class="tab__text-business-data__wrapper">
										<a href="mailto:<?php echo $tab3['contact_field'] ?>"><?php echo $tab3['contact_field'] ?></a>
									</div>
								</div>

							</div>

							<div class="tab__image" style="background-image: url(<?php echo $tab3['image'] ?>); background-repeat: no-repeat; background-size: cover;"></div>
					</div>

					<div id='tab-4' class="tab">

							<div class="tab__text">

								<h4><?php echo $tab4['title'] ?></h4>

								<div class="tab__text-business-data__wrapper tab__text-description">
									<p><?php echo $tab4['description'] ?></p>
								</div>

								<div class="tab__text-business-data">

									<div class="tab__text-business-data__wrapper">
										<p><?php echo $tab4['address_field_1'] ?></p>
										<p><?php echo $tab4['address_field_2'] ?></p>
										<p><?php echo $tab4['address_field_3'] ?></p>
									</div>
									<div class="tab__text-business-data__wrapper">
										<p><?php echo $tab4['bussiness_data_1'] ?></p>
										<p><?php echo $tab4['bussiness_data_2'] ?></p>
										<p><?php echo $tab4['bussiness_data_3'] ?></p>
									</div>
									<div class="tab__text-business-data__wrapper">
										<a href="mailto:<?php echo $tab4['contact_field'] ?>"><?php echo $tab4['contact_field'] ?></a>
									</div>
								</div>

							</div>

							<div class="tab__image" style="background-image: url(<?php echo $tab4['image'] ?>); background-repeat: no-repeat; background-size: cover;"></div>
						</div>

						<div id='tab-5' class="tab">

								<div class="tab__text">

									<h4><?php echo $tab5['title'] ?></h4>

									<div class="tab__text-business-data__wrapper tab__text-description">
									<p><?php echo $tab5['description'] ?></p>

									</div>

									<div class="tab__text-business-data">

										<div class="tab__text-business-data__wrapper">
											<p><?php echo $tab5['address_field_1'] ?></p>
											<p><?php echo $tab5['address_field_2'] ?></p>
											<p><?php echo $tab5['address_field_3'] ?></p>
										</div>
										<div class="tab__text-business-data__wrapper">
											<p><?php echo $tab5['bussiness_data_1'] ?></p>
											<p><?php echo $tab5['bussiness_data_2'] ?></p>
											<p><?php echo $tab5['bussiness_data_3'] ?></p>
										</div>
										<div class="tab__text-business-data__wrapper">
											<a href="mailto:<?php echo $tab5['contact_field'] ?>"><?php echo $tab5['contact_field'] ?></a>
										</div>
									</div>

								</div>

								<div class="tab__image" style="background-image: url(<?php echo $tab5['image'] ?>); background-repeat: no-repeat; background-size: cover;"></div>
						</div>

			</div>


		</div>

</section>
