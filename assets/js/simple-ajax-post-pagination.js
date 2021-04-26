// AJAX PAGINATION
import RevealChildrenOf from "./blogAnimations";

jQuery(document).ready(function($) {
	// var mypagination = $(".ic-pagination a");

	jQuery(document).on("click", function(e) {
		if (e.target.classList.contains("page-numbers")) {
			e.preventDefault();

			console.log(this);

			var properties_wrapper = $(".job-offers-wrapper");
			var link = jQuery(e.target).attr("href");

			// opacity and disable on click
			properties_wrapper.css({
				opacity: "0.5",
				"pointer-events": "none"
			});

			$.get(link, function(data, status) {
				//console.log(status);

				var properties = jQuery(
					".job-offers-wrapper .job-offers__ajax-element",
					data
				);
				properties_wrapper.html(properties); // load properties
				new RevealChildrenOf(document.querySelector(".job-offers-grid"), 4);
				// scroll in top of wrapper section
				// $("html,body").animate(
				// 	{
				// 		scrollTop: properties_wrapper.offset().top - 150
				// 	},
				// 	"slow"
				// );

				// opacity and disable on click
				properties_wrapper.css({
					opacity: "1",
					"pointer-events": "all"
				});
			});
		}

		// pagination.load(link + " .ic-pagination ul");
		// // update url
		// window.history.pushState("obj", "client", link);
		// return false;
	});

	// $(".ic-pagination a").on("click", function(e) {
	// 	e.preventDefault();
	// 	var properties_wrapper = $(".job-offers-wrapper");
	// 	var link = jQuery(this).attr("href");

	// 	// opacity and disable on click
	// 	properties_wrapper.css({
	// 		opacity: "0.5",
	// 		"pointer-events": "none"
	// 	});

	// 	$.get(link, function(data, status) {
	// 		//console.log(status);

	// 		var properties = jQuery(
	// 			".job-offers-wrapper .job-offers__ajax-element",
	// 			data
	// 		);
	// 		properties_wrapper.html(properties); // load properties
	// 		new RevealChildrenOf(document.querySelector(".job-offers-grid"), 4);
	// 		// scroll in top of wrapper section
	// 		$("html,body").animate(
	// 			{
	// 				scrollTop: properties_wrapper.offset().top - 150
	// 			},
	// 			"slow"
	// 		);

	// 		// opacity and disable on click
	// 		properties_wrapper.css({
	// 			opacity: "1",
	// 			"pointer-events": "all"
	// 		});
	// 	});

	// 	// pagination.load(link + " .ic-pagination ul");
	// 	// // update url
	// 	// window.history.pushState("obj", "client", link);
	// 	// return false;
	// });
});
