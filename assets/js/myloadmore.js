jQuery(function($) {
	// use jQuery code inside this to avoid "$ is not defined" error

	let i = 0;
	var blogGrid = $(".blog-grid-home");

	function getPosts(e) {
		i++;

		if (i <= 1) {
			e.preventDefault();
		}

		if (i > 1) {
			return;
		}

		var button = $(this),
			data = {
				action: "loadmore",
				query: my_loadmore_params.posts // that's how we get params from wp_localize_script() function
			};

		$.ajax({
			url: my_loadmore_params.ajaxurl, // AJAX handler
			data: data,
			type: "POST",
			beforeSend: function(xhr) {
				button.text("Wczytuję..."); // change the button text, you can also add a preloader image
			},
			success: function(data) {
				if (data) {
					button
						.text("Zobacz wszystkie")
						.prev()
						.after(data); // insert new posts

					$(data).each(function(i, el) {
						$(el).appendTo(blogGrid);
						setTimeout(function() {
							$(el).css("opacity", "1");
						}, 100);
					});
				}
			},
			error: function(request, status, error) {
				console.error(request.statusText + ", " + error);
			}
		});
	}

	$(".my_loadmore").click(getPosts);
});
